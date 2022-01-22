<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Serie;
use App\Models\Topic;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class SerieController extends Controller
{
    public function index()
    {
        $perPage = Request::input('perPage') ?: 5;
        return Inertia::render('Admin/Series/Index', [
            'series' => Serie::query()
                ->when(Request::input('search'), function($query, $search) {
                    $query->where('name', 'like', "%{$search}%");
                })
                ->paginate($perPage)
                ->withQueryString()
                ->through(fn ($serie) => [
                    'id' => $serie->id,
                    'name' => $serie->name,
                    'slug' => $serie->slug,
                    'poster_path' => asset('storage/'. $serie->poster_path ),
                    'deleted_at' => $serie->deleted_at,
                    'lessons' => $serie->lessons ? $serie->lessons->only('name') : null,
                ]),
            'filters' => Request::only(['search', 'perPage'])
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/Series/Create');
    }

    public function store()
    {
        Request::validate([
            'name' => 'required',
            'description' => 'required',
            'poster_path' => 'required'
        ]);
        $image = Request::file('poster_path')->store('series', 'public');
        Serie::create([
            'name' => Request::input('name'),
            'poster_path' => $image,
            'description' => Request::input('description')
        ]);
        return Redirect::route('admin.series.index')->with('flash.banner', 'Serie Created.');
    }

    public function edit($id)
    {
        $serie = Serie::findOrFail($id);
        $topics = Topic::all(['name', 'id']);
        return Inertia::render('Admin/Series/Edit', [
            'serie' => $serie,
            'topics' => $topics,
            'serieTopics' => $serie->topics,
            'image' => asset('storage/'. $serie->poster_path )
            ]);
    }

    public function update($id)
    {

        $serie = Serie::findOrFail($id);
        $image = $serie->poster_path;
        if (Request::file('poster_path')){
            Storage::delete('public/'. $serie->poster_path);
            $image = Request::file('poster_path')->store('series', 'public');
        }
         Request::validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $serie->update([
            'name' => Request::input('name'),
            'poster_path' => $image,
            'description' => Request::input('description')
        ]);
        return Redirect::route('admin.series.index')->with('flash.banner', 'Serie updated.');
    }

    public function destroy($id)
    {
        $serie = Serie::findOrFail($id);
        $serie->delete();
        return Redirect::route('admin.series.index')->with('flash.banner', 'Serie deleted.')->with('flash.bannerStyle', 'danger');
    }

    public function addTopic($id)
    {
        $serie = Serie::findOrFail($id);
        $topics = Request::input('topics');
        $topic_ids = collect($topics)->pluck('id');
        $serie->topics()->sync($topic_ids);
        return Redirect::route('admin.series.edit', $id)->with('flash.banner', 'Topics Added.');
    }
}
