<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\Serie;
use App\Models\Topic;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

class WelcomeController extends Controller
{
    public function index()
    {
        SEOMeta::setTitle('Laravel Tutorials');
        SEOMeta::setDescription('Welcome to laraveller. Learn Laravel tutorials. Free tutorials.');
        SEOMeta::setCanonical(url()->current());

        OpenGraph::setDescription('Welcome to laraveller. Learn Laravel tutorials. Free tutorials.');
        OpenGraph::setTitle('Laravel Tutorials');
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'articles');

        TwitterCard::setTitle('Laravel Tutorials');
        TwitterCard::setSite('@Laravellercom');

        JsonLd::setTitle('Laravel Tutorials');
        JsonLd::setDescription('Welcome to laraveller. Learn Laravel tutorials. Free tutorials.');
        JsonLd::addImage(asset('images/logo.svg'));

       $topics = Topic::all();
       $series = Serie::all();
       $lessons = Lesson::all();

       return view('welcome', compact('topics', 'series', 'lessons'));
    }

    public function search(\Illuminate\Http\Request $request)
    {
        $lessons = Lesson::search($request->term)->query(function ($builder) {
            $builder->with('serie');
        })->get()->map(fn($lesson) => [
            'url' => route('frontend.lessons.show', [$lesson->serie->slug, $lesson->slug]),
            'name' => $lesson->title,
            'image' => $lesson->thumbnail_url,
            'serie' => $lesson->serie
        ]);
        return $lessons;
    }
}
