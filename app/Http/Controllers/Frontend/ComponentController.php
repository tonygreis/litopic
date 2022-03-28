<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Component;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ComponentController extends Controller
{
    public function index()
    {

        SEOMeta::setTitle('Free Tailwind CSS Components | Laraveller');
        SEOMeta::setDescription('Free Tailwind CSS Components | Laraveller. Tailwind css cards, tables and more. Tailwind css responsive navigation.');
        SEOMeta::setCanonical(url()->current());

        OpenGraph::setDescription('Free Tailwind CSS Components | Laraveller. Tailwind css cards, tables and more. Tailwind css responsive navigation.');
        OpenGraph::setTitle('Free Tailwind CSS Components | Laraveller');
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'articles');

        TwitterCard::setTitle('Free Tailwind CSS Components | Laraveller');
        TwitterCard::setSite('@Laravellercom');

        JsonLd::setTitle('Free Tailwind CSS Components | Laraveller');
        JsonLd::setDescription('Free Tailwind CSS Components | Laraveller. Tailwind css cards, tables and more. Tailwind css responsive navigation.');
        JsonLd::addImage(asset('images/logo.svg'));
        $components = Component::all();
        $first_component = Component::orderBy('id', 'desc')->first();
        return view('main.components.index', compact('components', 'first_component'));
    }

    public function show($slug)
    {
        $main_component = Component::with('sections')->where('slug', $slug)->first();
        SEOMeta::setTitle($main_component->name . ' Components for Free | Laraveller');
        SEOMeta::setDescription($main_component->name .' components, Get free tailwind css navbar. Tailwind CSS tables, forms, heros, sections, footer and more.');
        SEOMeta::addMeta('article:published_time', $main_component->created_at->toW3CString(), 'property');
        SEOMeta::addMeta('article:section', $main_component->name, 'property');
        SEOMeta::addKeyword(['laravel', 'vuejs', 'react', 'livewire', 'inertia js']);
        SEOMeta::setCanonical(url()->current());

        OpenGraph::setDescription($main_component->name .' components, Get free tailwind css navbar. Tailwind CSS tables, forms, heros, sections, footer and more.');
        OpenGraph::setTitle($main_component->name . ' Components for Free | Laraveller');
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'en-us');

        OpenGraph::addImage(Storage::url($main_component->poster_path));
        OpenGraph::addImage(Storage::url($main_component->poster_path), ['height' => 300, 'width' => 300]);

        JsonLd::setTitle($main_component->name . ' Components for Free | Laraveller');
        JsonLd::setDescription($main_component->name .' components, Get free tailwind css navbar. Tailwind CSS tables, forms, heros, sections, footer and more.');
        JsonLd::setType('Article');
        JsonLd::addImage(Storage::url($main_component->poster_path));
        return view('main.components.show', compact('main_component'));
    }
}
