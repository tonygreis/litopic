<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\Post;
use App\Models\Serie;
use App\Models\Topic;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;
use Wink\WinkPost;

class WelcomeController extends Controller
{
    public function index()
    {
        SEOMeta::setTitle('Laravel Tutorial from Laraveller | Learn Laravel');
        SEOMeta::setDescription('Laravel tutorial for beginners. Laravel is a powerful MVC PHP framework, designed for developers who need a simple and elegant toolkit to create full-featured web applications.');
        SEOMeta::setCanonical(url()->current());
        SEOMeta::addKeyword(['Laravel', 'tutorlais', 'vuejs', 'livewire']);

        OpenGraph::setDescription('Laravel tutorial for beginners. Laravel is a powerful MVC PHP framework, designed for developers who need a simple and elegant toolkit to create full-featured web applications.');
        OpenGraph::setTitle('Laravel Tutorial for beginners | Learn Laravel');
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'articles');

        TwitterCard::setTitle('Laravel Tutorial for beginners | Learn Laravel');
        TwitterCard::setSite('@Laravellercom');

        JsonLd::setTitle('Laravel Tutorial for beginners | Learn Laravel');
        JsonLd::setDescription('Laravel tutorial for beginners. Laravel is a powerful MVC PHP framework, designed for developers who need a simple and elegant toolkit to create full-featured web applications.');
        JsonLd::addImage(asset('images/logo.svg'));

       $topics = Topic::orderBy('created_at', 'desc')->take(8)->get();
       $series = Serie::orderBy('created_at', 'desc')->take(8)->get();
       $lessons = Lesson::orderBy('created_at', 'desc')->take(8)->get();
       $posts = WinkPost::published()->take(8)->get();

       return view('welcome', compact('topics', 'series', 'lessons', 'posts'));
    }

    public function search(\Illuminate\Http\Request $request)
    {
        $lessons = Lesson::search($request->term)->take(8)->query(function ($builder) {
            $builder->with('serie');
        })->get()->map(fn($lesson) => [
            'url' => route('frontend.lessons.show', [$lesson->serie->slug, $lesson->slug]),
            'name' => $lesson->title,
            'image' => $lesson->thumbnail_url
        ]);
        $posts = Post::search($request->term)->take(8)->get()->map( fn($post) => [
            'url' => route('frontend.posts.show', $post->slug),
            'name' => $post->title,
            'image' => $post->featured_image,
        ]);
        $res = $lessons->merge($posts);
        $response = $res->take(8);
        return $response;
    }
}
