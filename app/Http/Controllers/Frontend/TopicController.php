<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Topic;
use Inertia\Inertia;

class TopicController extends Controller
{
    public function index()
    {
        return Inertia::render('Frontend/Topics/Index', [
            'topics' => Topic::query()
                ->latest()
                ->withCount('series')
                ->paginate(6)
                ->withQueryString()->through(fn($topic) => [
                    'name' => $topic->name,
                    'url'  => route('frontend.topics.show', $topic->slug),
                    'image' => asset('storage/'. $topic->poster_path ),
                    'series_count' => $topic->series_count
                ]),
        ]);
    }

    public function show(Topic $topic)
    {
        return Inertia::render('Frontend/Topics/Show', [
            'topic' => $topic,
            'series' => $topic->series()->paginate(12)
                ->withQueryString()->through(fn($serie) => [
                'name' => $serie->name,
                'url'  => route('frontend.series.show', $serie->slug),
                'image' => asset('storage/'. $serie->poster_path ),
                'lessons_count' => $serie->lessons_count
            ]),
        ]);
    }
}
