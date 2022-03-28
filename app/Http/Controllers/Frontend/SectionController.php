<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Component;
use App\Models\Section;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SectionController extends Controller
{
    public function show(Component $component, Section $section)
    {
        $main_component = $component;
        SEOMeta::setTitle($main_component->name .' '.$section->name . ' Components for Free | Laraveller');
        SEOMeta::setDescription($main_component->name .' '.$section->name .' components, Get free tailwind css navbar. Tailwind CSS tables, forms, heros, sections, footer and more.');
        SEOMeta::addMeta('article:published_time', $section->created_at->toW3CString(), 'property');
        SEOMeta::addMeta('article:section', $main_component->name .' '.$section->name, 'property');
        SEOMeta::addKeyword(['laravel', 'vuejs', 'react', 'livewire', 'inertia js']);
        SEOMeta::setCanonical(url()->current());

        OpenGraph::setDescription($main_component->name .' '.$section->name .' components, Get free tailwind css navbar. Tailwind CSS tables, forms, heros, sections, footer and more.');
        OpenGraph::setTitle($main_component->name .' '.$section->name . ' Components for Free | Laraveller');
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'en-us');

        OpenGraph::addImage(Storage::url($main_component->poster_path));
        OpenGraph::addImage(Storage::url($main_component->poster_path), ['height' => 300, 'width' => 300]);

        JsonLd::setTitle($main_component->name .' '.$section->name . ' Components for Free | Laraveller');
        JsonLd::setDescription($main_component->name .' '.$section->name .' components, Get free tailwind css navbar. Tailwind CSS tables, forms, heros, sections, footer and more.');
        JsonLd::setType('Article');
        JsonLd::addImage(Storage::url($main_component->poster_path));
        return view('main.sections.show', compact('main_component', 'section'));
    }
}
