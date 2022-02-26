<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Serie;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class SerieController extends Controller
{
    public function index()
    {
        $series = Serie::query()
            ->latest()
            ->withCount('lessons')
            ->paginate(6);

        SEOMeta::setTitle('Series | Laravel Tutorials');
        SEOMeta::setDescription('Welcome to laraveller. Learn Laravel tutorials. Free tutorials.');
        SEOMeta::setCanonical(url()->current());

        OpenGraph::setDescription('Welcome to laraveller. Learn Laravel tutorials. Free tutorials.');
        OpenGraph::setTitle('Series | Laravel Tutorials');
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'articles');

        TwitterCard::setTitle('Series | Laravel Tutorials');
        TwitterCard::setSite('@Laravellercom');

        JsonLd::setTitle('Series | Laravel Tutorials');
        JsonLd::setDescription('Welcome to laraveller. Learn Laravel tutorials. Free tutorials.');
        JsonLd::addImage(asset('images/logo.svg'));

        return view('series.index', compact('series'));
    }

    public function show(Serie $serie)
    {
        $lessons = $serie->lessons()->paginate(12);

        SEOMeta::setTitle($serie->name);
        SEOMeta::setDescription($serie->description);
        SEOMeta::addMeta('article:published_time', $serie->created_at->toW3CString(), 'property');
        SEOMeta::addMeta('article:section', $serie->name, 'property');
        SEOMeta::addKeyword(['laravel', 'vuejs', 'react']);

        OpenGraph::setDescription($serie->description);
        OpenGraph::setTitle($serie->name);
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'en-us');

        OpenGraph::addImage(Storage::url($serie->poster_path));
        OpenGraph::addImage(Storage::url($serie->poster_path), ['height' => 300, 'width' => 300]);

        JsonLd::setTitle($serie->title);
        JsonLd::setDescription($serie->description);
        JsonLd::setType('Article');
        JsonLd::addImage(Storage::url($serie->poster_path));

        return view('series.show', compact('serie', 'lessons'));
    }
}
