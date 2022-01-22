<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Topic;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class TopicController extends Controller
{
    public function index()
    {
        $perPage = \Illuminate\Support\Facades\Request::input('perPage') ?: 5;
        return Inertia::render('Admin/Topics/Index', [
            'topics' => Topic::query()
                ->when(Request::input('search'), function($query, $search) {
                    $query->where('name', 'like', "%{$search}%");
                })
                ->paginate($perPage)
                ->withQueryString()
                ->through(fn ($topic) => [
                    'id' => $topic->id,
                    'name' => $topic->name,
                    'slug' => $topic->slug,
                    'poster_path' => asset('storage/'. $topic->poster_path ),
                    'deleted_at' => $topic->deleted_at,
                    'series' => $topic->series ? $topic->series->only('name') : null,
                ]),
            'filters' => Request::only(['search', 'perPage'])
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/Topics/Create');
    }

    public function store()
    {
        Request::validate([
            'name' => 'required',
            'poster_path' => 'required'
        ]);
        $image = Request::file('poster_path')->store('topics', 'public');
        Topic::create([
            'name' => Request::input('name'),
            'poster_path' => $image
        ]);
        return Redirect::route('admin.topics.index')->with('flash.banner', 'Topic Created.');
    }

    public function edit(Topic $topic)
    {
        return Inertia::render('Admin/Topics/Edit', [
            'topic' => $topic,
            'image' => asset('storage/'. $topic->poster_path )
        ]);
    }

    public function update(Topic $topic)
    {
        $image = $topic->poster_path;
        if (Request::file('poster_path')){
            Storage::delete('public/'. $topic->poster_path);
            $image = Request::file('poster_path')->store('topics', 'public');
        }
        $topic->update([
            'name' => Request::input('name'),
            'poster_path' => $image
        ]);
        return Redirect::route('admin.topics.index')->with('flash.banner', 'Topic updated.');
    }

    public function destroy(Topic $topic)
    {
        Storage::delete('public/'. $topic->poster_path);
        $topic->delete();
        return Redirect::route('admin.topics.index')->with('flash.banner', 'Topic deleted.')->with('flash.bannerStyle', 'danger');
    }
}
