<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;
use Illuminate\Http\Request;
use Inertia\Inertia;

class LessonController extends Controller
{
    public function index()
    {
        $lessons = Lesson::orderBy('updated_at', 'desc')->paginate(12);

        SEOMeta::setTitle('Lessons | Laravel Tutorials');
        SEOMeta::setDescription('Welcome to laraveller. Learn Laravel tutorials. Free tutorials.');
        SEOMeta::setCanonical(url()->current());

        OpenGraph::setDescription('Welcome to laraveller. Learn Laravel tutorials. Free tutorials.');
        OpenGraph::setTitle('Lessons | Laravel Tutorials');
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'articles');

        TwitterCard::setTitle('Lessons | Laravel Tutorials');
        TwitterCard::setSite('@Laravellercom');

        JsonLd::setTitle('Lessons | Laravel Tutorials');
        JsonLd::setDescription('Welcome to laraveller. Learn Laravel tutorials. Free tutorials.');
        JsonLd::addImage(asset('images/logo.svg'));


        return view('lessons.index', compact('lessons'));
    }

    public function show(Course $course, Lesson $lesson)
    {
        $next = Lesson::where([['id', '>', $lesson->id], ['course_id', $course->id]])->orderBy('id')->first();
        $previous = Lesson::where([['id', '<', $lesson->id], ['course_id', $course->id]])->orderBy('id', 'desc')->first();

        SEOMeta::setTitle($lesson->title);
        SEOMeta::setDescription($lesson->description);
        SEOMeta::addMeta('article:published_time', $lesson->published_at->toW3CString(), 'property');
        SEOMeta::addMeta('article:section', $lesson->course->name, 'property');
        SEOMeta::addKeyword(['laravel', 'vuejs', 'react']);

        OpenGraph::setDescription($lesson->description);
        OpenGraph::setTitle($lesson->title);
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'en-us');

        OpenGraph::addImage($lesson->thumbnail_url);
        OpenGraph::addImage($lesson->thumbnail_url, ['height' => 300, 'width' => 300]);

        JsonLd::setTitle($lesson->title);
        JsonLd::setDescription($lesson->description);
        JsonLd::setType('Article');
        JsonLd::addImage($lesson->thumbnail_url);

        return view('lessons.show', compact('lesson', 'course', 'next', 'previous'));
    }
}
