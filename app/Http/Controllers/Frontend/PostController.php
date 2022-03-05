<?php

namespace App\Http\Controllers\Frontend;

use Wink\WinkTag;
use Wink\WinkPost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Support\Facades\Storage;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;

class PostController extends Controller
{
    public function index()
    {
        $posts = WinkPost::with('tags')
                ->live()
                ->orderBy('publish_date', 'DESC')
                ->paginate(12);
                $tags = WinkTag::all();

                SEOMeta::setTitle('Posts | Laravel Vuejs Livewire Tutorials');
                SEOMeta::setDescription('Welcome to laraveller. Learn Laravel tutorials. Free tutorials.');
                SEOMeta::setCanonical(url()->current());
        
                OpenGraph::setDescription('Welcome to laraveller. Learn Laravel tutorials. Free tutorials.');
                OpenGraph::setTitle('Posts | Laravel Vuejs Livewire Tutorials');
                OpenGraph::setUrl(url()->current());
                OpenGraph::addProperty('type', 'articles');
        
                TwitterCard::setTitle('Posts | Laravel Vuejs Livewire Tutorials');
                TwitterCard::setSite('@Laravellercom');
        
                JsonLd::setTitle('Laravel Tutorials');
                JsonLd::setDescription('Welcome to laraveller. Learn Laravel tutorials. Free tutorials.');
                JsonLd::addImage(asset('images/logo.svg'));
                
        return view('posts.index', compact('posts', 'tags'));
    }

    public function show($slug)
    {
        $post = WinkPost::live()->whereSlug($slug)->firstOrFail();
        $tags = WinkTag::all();

        SEOMeta::setTitle($post->title);
        SEOMeta::setDescription($post->body);
        SEOMeta::addMeta('article:published_time', $post->created_at->toW3CString(), 'property');
        SEOMeta::addMeta('article:section', $post->title, 'property');
        SEOMeta::addKeyword(['laravel', 'vuejs', 'react']);

        OpenGraph::setDescription($post->body);
        OpenGraph::setTitle($post->title);
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'en-us');

        OpenGraph::addImage(Storage::url($post->poster_path));
        OpenGraph::addImage(Storage::url($post->poster_path), ['height' => 300, 'width' => 300]);

        JsonLd::setTitle($post->title);
        JsonLd::setDescription($post->body);
        JsonLd::setType('Article');
        JsonLd::addImage(Storage::url($post->poster_path));

        return view('posts.show', compact('post', 'tags'));
    }
}
