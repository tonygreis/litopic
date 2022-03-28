<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Component;
use App\Models\Section;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Component $component)
    {
        $perPage = \Illuminate\Support\Facades\Request::input('perPage') ?: 5;
        return Inertia::render('Admin/Components/Sections/Index', [
            'component' => $component,
            'sections' => Section::query()->latest()
                ->where('component_id', $component->id)
                ->when(Request::input('search'), function ($query, $search) {
                    $query->where('name', 'like', "%{$search}%");
                })
                ->paginate($perPage)
                ->withQueryString(),
            'filters' => Request::only(['search', 'perPage'])
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Component $component)
    {
        return Inertia::render('Admin/Components/Sections/Create', [
            'component' => $component
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Component $component)
    {
        Request::validate([
            'name' => 'required'
        ]);
        $component->sections()->create([
            'name' => Request::input('name')
        ]);
        return Redirect::route('admin.sections.index', $component->id)->with('flash.banner', 'Sections Created.');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Component $component, Section $section)
    {
        return Inertia::render('Admin/Components/Sections/Edit', [
            'component' => $component,
            'section' => $section
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Component $component, Section $section)
    {
        Request::validate([
            'name' => 'required'
        ]);
        $section->update([
            'name' => Request::input('name')
        ]);
        return Redirect::route('admin.sections.index', $component->id)->with('flash.banner', 'Sections updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Component $component, Section $section)
    {
        $section->delete();
        return Redirect::route('admin.sections.index', $component->id)->with('flash.banner', 'Sections deleted.');
    }
}
