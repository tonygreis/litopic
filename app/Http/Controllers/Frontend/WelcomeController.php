<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\Serie;
use App\Models\Topic;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

class WelcomeController extends Controller
{
    public function index()
    {
        return Inertia::render('Welcome', [
            'lessons' => Lesson::latest()->with('serie')->take(6)->get()
                ->map(fn ($lesson) => [
                'url' => route('frontend.lessons.show', [$lesson->serie->slug, $lesson->slug]),
                'name' => $lesson->title,
                'image' => $lesson->thumbnail_url,
            ]),
            'lessons_count' => count(Lesson::all()),
            'series' => Serie::withCount(['lessons'])->latest()->take(8)->get()
                ->map(fn ($serie) => [
                'url' => route('frontend.series.show', $serie->slug),
                'name' => $serie->name,
                'count' => $serie->lessons_count,
                'image' => asset('storage/'. $serie->poster_path ),
                ]),
            'series_count' => count(Serie::all()),
            'topics' => Topic::withCount(['series'])->latest()->get()
                ->map(fn ($topic) => [
                    'url' => route('frontend.topics.show', $topic->slug),
                    'name' => $topic->name,
                    'image' => asset('storage/'. $topic->poster_path ),
                    'count' => $topic->series_count
                ]),
            'topics_count' => count(Topic::all()),
        ]);
    }

    public function search(\Illuminate\Http\Request $request)
    {
        $lessons = Lesson::where('title', 'like', "%{$request->term}%")->with('serie')->get()->map(fn ($lesson) => [
            'url' => route('frontend.lessons.show', [$lesson->serie->slug, $lesson->slug]),
            'name' => $lesson->title,
            'image' => $lesson->thumbnail_url,
            'serie' => $lesson->serie
        ]);
       return $lessons;
    }
}
