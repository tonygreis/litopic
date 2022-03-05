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

class TagController extends Controller
{
   public function show($slug)
   {
       $tag = WinkTag::where('slug', $slug)->firstOrFail();
       $posts = $tag->posts()->paginate(12);

       SEOMeta::setTitle($tag->name. ' Posts');
       SEOMeta::setDescription('Laravel, Vuejs, Inertiajs, Livewire posts about'. $tag->name .'.');
       SEOMeta::addMeta('article:published_time', $tag->created_at->toW3CString(), 'property');
       SEOMeta::addMeta('article:section', $tag->name, 'property');
       SEOMeta::addKeyword(['laravel', 'vuejs', 'react']);

       OpenGraph::setDescription('Laravel, Vuejs, Inertiajs, Livewire posts about'. $tag->name .'.');
       OpenGraph::setTitle($tag->name. ' Posts');
       OpenGraph::setUrl(url()->current());
       OpenGraph::addProperty('type', 'article');
       OpenGraph::addProperty('locale', 'en-us');

       OpenGraph::addImage(Storage::url($tag->tager_path));
       OpenGraph::addImage(Storage::url($tag->tager_path), ['height' => 300, 'width' => 300]);

       JsonLd::setTitle($tag->name. ' Posts');
       JsonLd::setDescription('Laravel, Vuejs, Inertiajs, Livewire posts about'. $tag->name .'.');
       JsonLd::setType('Article');
       JsonLd::addImage(Storage::url($tag->poster_path));

       
       return view('tags.show', compact('tag', 'posts'));
   }
}
