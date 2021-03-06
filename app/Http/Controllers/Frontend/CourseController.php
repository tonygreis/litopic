<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::orderBy('updated_at', 'desc')
            ->withCount('lessons')
            ->paginate(12);

        SEOMeta::setTitle('All Free Laravel Courses Tutorials');
        SEOMeta::setDescription('Welcome to laraveller. Learn Laravel tutorials. Free tutorials.');
        SEOMeta::setCanonical(url()->current());

        OpenGraph::setDescription('Welcome to laraveller. Learn Laravel tutorials. Free tutorials.');
        OpenGraph::setTitle('All Free Laravel Courses Tutorials');
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'articles');

        TwitterCard::setTitle('All Free Laravel Courses Tutorials');
        TwitterCard::setSite('@Laravellercom');

        JsonLd::setTitle('All Free Laravel Courses Tutorials');
        JsonLd::setDescription('Welcome to laraveller. Learn Laravel tutorials. Free tutorials.');
        JsonLd::addImage(asset('images/logo.svg'));

        return view('courses.index', compact('courses'));
    }

    public function show(Course $course)
    {
        $lessons = $course->lessons()->paginate(12);

        SEOMeta::setTitle($course->name);
        SEOMeta::setDescription($course->description);
        SEOMeta::addMeta('article:published_time', $course->created_at->toW3CString(), 'property');
        SEOMeta::addMeta('article:section', $course->name, 'property');
        SEOMeta::addKeyword(['laravel', 'vuejs', 'react']);
        SEOMeta::setCanonical(url()->current());

        OpenGraph::setDescription($course->description);
        OpenGraph::setTitle($course->name);
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'en-us');

        OpenGraph::addImage(Storage::url($course->poster_path));
        OpenGraph::addImage(Storage::url($course->poster_path), ['height' => 300, 'width' => 300]);

        JsonLd::setTitle($course->title);
        JsonLd::setDescription($course->description);
        JsonLd::setType('Article');
        JsonLd::addImage(Storage::url($course->poster_path));

        return view('courses.show', compact('course', 'lessons'));
    }
}
