<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Course;
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
        SEOMeta::setTitle('Laravel Tutorials for beginners | Laraveller');
        SEOMeta::setDescription('Laravel tutorial for beginners. Laravel is a powerful MVC PHP framework, designed for developers who need a simple and elegant toolkit to create full-featured web applications.');
        SEOMeta::setCanonical(url()->current());
        SEOMeta::addKeyword(['Laravel', 'tutorlais', 'vuejs', 'livewire']);

        OpenGraph::setDescription('Laravel tutorial for beginners. Laravel is a powerful MVC PHP framework, designed for developers who need a simple and elegant toolkit to create full-featured web applications.');
        OpenGraph::setTitle('Laravel Tutorials for beginners | Laraveller');
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'articles');

        TwitterCard::setTitle('Laravel Tutorials for beginners | Laraveller');
        TwitterCard::setSite('@Laravellercom');

        JsonLd::setTitle('Laravel Tutorials for beginners | Laraveller');
        JsonLd::setDescription('Laravel tutorial for beginners. Laravel is a powerful MVC PHP framework, designed for developers who need a simple and elegant toolkit to create full-featured web applications.');
        JsonLd::addImage(asset('images/logo.svg'));

        $topics = Topic::orderBy('created_at', 'desc')->take(8)->get();
        $courses = Course::orderBy('created_at', 'desc')->take(8)->get();
        $lessons = Lesson::orderBy('created_at', 'desc')->take(8)->get();

        return view('welcome', compact('topics', 'courses', 'lessons'));
    }

    public function search(\Illuminate\Http\Request $request)
    {
        $lessons = Lesson::search($request->term)->take(8)->query(function ($builder) {
            $builder->with('course');
        })->get()->map(fn ($lesson) => [
            'url' => route('frontend.lessons.show', [$lesson->serie->slug, $lesson->slug]),
            'name' => $lesson->title,
            'image' => $lesson->thumbnail_url,
            'course' => $lesson->course
        ]);
        return $lessons;
    }
}
