<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\Serie;
use Illuminate\Http\Request;
use Inertia\Inertia;

class LessonController extends Controller
{
    public function index()
    {

        return Inertia::render('Frontend/Series/Lessons/Index', [
            'lessons' => Lesson::query()
                               ->latest()
                               ->with('serie')
                               ->paginate(12)
                               ->withQueryString()->through(fn($lesson) => [
                               'name' => $lesson->title,
                               'url'  => route('frontend.lessons.show', [$lesson->serie->slug, $lesson->slug]),
                               'image' => $lesson->thumbnail_url,
                                'serie' => $lesson->serie,
                                 'duration' => date('H:i:s',$lesson->duration)
                ]),
        ]);
    }

    public function show(Serie $serie, Lesson $lesson)
    {
        $next = Lesson::where([['id', '>', $lesson->id],['serie_id', $serie->id]])->orderBy('id')->first();
        $previous = Lesson::where([['id', '<', $lesson->id],['serie_id', $serie->id]])->orderBy('id','desc')->first();
        return Inertia::render('Frontend/Series/Lessons/Show', [
            'serie' => Serie::where('id', $serie->id)->with('topics')->first(),
            'lesson' => [
                'slug' => $lesson->slug,
                'id' => $lesson->id,
                'embed_html' => $lesson->embed_html,
                'title' => $lesson->title,
                'duration' => date('H:i:s', $lesson->duration),
                'next' => $next ? route('frontend.lessons.show', [$serie, $next]) : null,
                'previous' => $previous ? route('frontend.lessons.show', [$serie, $previous]) : null
            ],
            'lessons' => collect($serie->lessons)->map(fn($lesson) => [
                'slug' => $lesson->slug,
                'id' => $lesson->id,
                'embed_html' => $lesson->embed_html,
                'title' => $lesson->title,
                'duration' => date('H:i:s', $lesson->duration)
            ])
        ]);
    }
}
