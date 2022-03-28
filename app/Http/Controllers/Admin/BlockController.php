<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Block;
use App\Models\Component;
use App\Models\Section;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class BlockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Component $component, Section $section)
    {
        $perPage = \Illuminate\Support\Facades\Request::input('perPage') ?: 5;
        return Inertia::render('Admin/Components/Sections/Blocks/Index', [
            'component' => $component,
            'section' => $section,
            'blocks' => Block::query()->latest()
                ->where('section_id', $section->id)
                ->when(\Illuminate\Support\Facades\Request::input('search'), function ($query, $search) {
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
    public function create(Component $component, Section $section)
    {
        return Inertia::render('Admin/Components/Sections/Blocks/Create', [
            'component' => $component,
            'section' => $section
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Component $component, Section $section)
    {
        $image = null;
        Request::validate([
            'name' => 'required',
        ]);
        if (Request::hasFile('poster_path')){
            $image = Request::file('poster_path')->store('blocks', 'public');
        }

        $section->blocks()->create([
            'name' => Request::input('name'),
            'html' => Request::input('html'),
            'vue' => Request::input('vue'),
            'react' => Request::input('react'),
            'poster_path' => $image
        ]);

        return to_route('admin.blocks.index', [$component->id, $section->id])->with('flash.banner', 'Block Created.');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Component $component, Section $section, Block $block)
    {
        return Inertia::render('Admin/Components/Sections/Blocks/Edit', [
            'component' => $component,
            'section' => $section,
            'block' => $block
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Component $component, Section $section, Block $block)
    {
        $image = null;
        Request::validate([
            'name' => 'required'
        ]);
        if (Request::hasFile('poster_path')){
            Storage::delete('public/' . $block->poster_path);
            $image = Request::file('poster_path')->store('blocks', 'public');
        }
        $block->update([
            'name' => Request::input('name'),
            'html' => Request::input('html'),
            'vue' => Request::input('vue'),
            'react' => Request::input('react'),
            'poster_path' => $image
        ]);
        return to_route('admin.blocks.index', [$component->id, $section->id])->with('flash.banner', 'Block updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Component $component, Section $section, Block $block)
    {
        if ($block->poster_path){
            Storage::delete('public/' . $block->poster_path);
        }
        $block->delete();
        return Redirect::route('admin.blocks.index', [$component->id, $section->id])->with('flash.banner', 'Block deleted.')->with('flash.bannerStyle', 'danger');
    }
}
