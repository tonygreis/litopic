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
        return Inertia::render('Frontend/Series/Lessons/Show', [
            'serie' => $serie,
            'lesson' => [
                'slug' => $lesson->slug,
                'id' => $lesson->id,
                'embed_html' => $lesson->embed_html,
                'title' => $lesson->title,
                'duration' => date('H:i:s', $lesson->duration)
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
