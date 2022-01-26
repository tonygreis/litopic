<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Serie;
use Inertia\Inertia;

class SerieController extends Controller
{
    public function index()
    {
        return Inertia::render('Frontend/Series/Index', [
            'series' => Serie::query()
                ->latest()
                ->withCount('lessons')
                ->paginate(6)
                ->withQueryString()->through(fn($serie) => [
                    'name' => $serie->name,
                    'url'  => route('frontend.series.show', $serie->slug),
                    'image' => asset('storage/'. $serie->poster_path ),
                    'lessons_count' => $serie->lessons_count
                ]),
        ]);
    }

    public function show(Serie $serie)
    {
        return Inertia::render('Frontend/Series/Show', [
            'serie' => $serie,
            'lessons' => $serie->lessons()->latest()->paginate(12)
                ->withQueryString()->through(fn($lesson) => [
                    'name' => $lesson->title,
                    'url'  => route('frontend.lessons.show', [$serie->slug,$lesson->slug]),
                    'image' => $lesson->thumbnail_url
                ]),
        ]);
    }
}
