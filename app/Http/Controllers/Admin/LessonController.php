<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\Serie;
use App\Models\YoutubeTalk;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

class LessonController extends Controller
{
    public function index($serie_id)
    {
        $serie = Serie::find($serie_id);
        $perPage = \Illuminate\Support\Facades\Request::input('perPage') ?: 5;
        return Inertia::render('Admin/Series/Lessons/Index', [
            'serie' => $serie,
            'lessons' => Lesson::query()->latest()
                ->where('serie_id', $serie_id)
                ->when(Request::input('search'), function($query, $search) {
                    $query->where('title', 'like', "%{$search}%");
                })
                ->paginate($perPage)
                ->withQueryString(),
            'filters' => Request::only(['search', 'perPage'])
        ]);
    }

    public function store($serie_id)
    {
        $serie = Serie::find($serie_id);
        $videoId = Request::input('youtubeId');
        $lesson = new Lesson();
        (new YoutubeTalk($videoId))->save($serie,$lesson);
        return Redirect::back()->with('flash.banner', 'Lesson created.');
    }

    public function edit($serie_id, Lesson $lesson)
    {
        $serie = Serie::find($serie_id);
        return Inertia::render('Admin/Series/Lessons/Edit', [
            'serie' => $serie,
            'lesson' => $lesson
        ]);
    }
    public function update($serie_id, Lesson $lesson)
    {
        $serie = Serie::find($serie_id);
        $validated = Request::validate([
            'title' => 'required',
            'duration' => 'required',
            'embed_html' => 'required',
            'thumbnail_url' => 'required',
            'description' => 'required',
            'external_id' => 'required',
        ]);
        $lesson->update($validated);
        return Redirect::route('admin.lessons.index', $serie)->with('flash.banner', 'Lesson updated.');
    }

    public function destroy($serie_id, Lesson $lesson)
    {
        $serie = Serie::find($serie_id);
        $lesson->delete();
        return Redirect::route('admin.lessons.index', $serie)->with('flash.banner', 'Lesson deleted.')->with('flash.bannerStyle', 'danger');
    }
}
