<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Component;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class ComponentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perPage = \Illuminate\Support\Facades\Request::input('perPage') ?: 5;
        return Inertia::render('Admin/Components/Index', [
            'components' => Component::query()
                ->when(Request::input('search'), function ($query, $search) {
                    $query->where('name', 'like', "%{$search}%");
                })
                ->paginate($perPage)
                ->withQueryString()
                ->through(fn ($topic) => [
                    'id' => $topic->id,
                    'name' => $topic->name,
                    'slug' => $topic->slug,
                    'poster_path' => asset('storage/' . $topic->poster_path),
                    'deleted_at' => $topic->deleted_at,
                ]),
            'filters' => Request::only(['search', 'perPage'])
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Admin/Components/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Request::validate([
            'name' => 'required',
            'poster_path' => 'required'
        ]);
        $image = Request::file('poster_path')->store('components', 'public');
        Component::create([
            'name' => Request::input('name'),
            'poster_path' => $image
        ]);
        return Redirect::route('admin.components.index')->with('flash.banner', 'Component Created.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $component = Component::find($id);
        return Inertia::render('Admin/Components/Edit', [
            'component' => $component,
            'image' => asset('storage/' . $component->poster_path)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $component = Component::findOrFail($id);
        $image = $component->poster_path;
        if (Request::file('poster_path')) {
            Storage::delete('public/' . $component->poster_path);
            $image = Request::file('poster_path')->store('components', 'public');
        }
        Request::validate([
            'name' => 'required',
        ]);
        $component->update([
            'name' => Request::input('name'),
            'poster_path' => $image,
        ]);
        return Redirect::route('admin.components.index')->with('flash.banner', 'Component updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $component = Component::findOrFail($id);
        Storage::delete('public/' . $component->poster_path);
        $component->delete();
        return Redirect::route('admin.components.index')->with('flash.banner', 'Components deleted.')->with('flash.bannerStyle', 'danger');
    }
}
