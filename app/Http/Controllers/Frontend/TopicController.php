<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Topic;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;
use Illuminate\Support\Facades\Storage;

class TopicController extends Controller
{
    public function index()
    {
        $topics = Topic::latest()->paginate(12);

        SEOMeta::setTitle('Topics | Laravel Tutorials');
        SEOMeta::setDescription('Welcome to laraveller. Learn Laravel tutorials. Free full courses for Laravel vuejs, inertiajs, livewire and more.');
        SEOMeta::setCanonical(url()->current());

        OpenGraph::setDescription('Welcome to laraveller. Learn Laravel tutorials. Free full courses for Laravel vuejs, inertiajs, livewire and more.');
        OpenGraph::setTitle('Topics | Laravel Tutorials');
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'articles');

        TwitterCard::setTitle('Topics | Laravel Tutorials');
        TwitterCard::setSite('@Laravellercom');

        JsonLd::setTitle('Laravel Tutorials');
        JsonLd::setDescription('Welcome to laraveller. Learn Laravel tutorials. Free full courses for Laravel vuejs, inertiajs, livewire and more.');
        JsonLd::addImage(asset('images/logo.svg'));

        return view('topics.index', compact('topics'));
    }

    public function show(Topic $topic)
    {
        $courses = $topic->courses()->paginate(12);

        SEOMeta::setTitle($topic->name . ' Tutorials');
        SEOMeta::setDescription($topic->description);
        SEOMeta::addMeta('article:published_time', $topic->created_at->toW3CString(), 'property');
        SEOMeta::addMeta('article:section', $topic->name, 'property');
        SEOMeta::addKeyword(['laravel', 'vuejs', 'react', 'livewire', 'inertia js']);
        SEOMeta::setCanonical(url()->current());

        OpenGraph::setDescription($topic->description);
        OpenGraph::setTitle($topic->name . ' Tutorials');
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'en-us');

        OpenGraph::addImage(Storage::url($topic->poster_path));
        OpenGraph::addImage(Storage::url($topic->poster_path), ['height' => 300, 'width' => 300]);

        JsonLd::setTitle($topic->name . ' Tutorials');
        JsonLd::setDescription($topic->description);
        JsonLd::setType('Article');
        JsonLd::addImage(Storage::url($topic->poster_path));

        return view('topics.show', compact('topic', 'courses'));
    }
}
