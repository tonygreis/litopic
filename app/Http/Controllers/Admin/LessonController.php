<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Serie;
use App\Models\YoutubeTalk;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

class LessonController extends Controller
{
    public function index($course_id)
    {
        $course = Course::find($course_id);
        $perPage = \Illuminate\Support\Facades\Request::input('perPage') ?: 5;
        return Inertia::render('Admin/Courses/Lessons/Index', [
            'course' => $course,
            'lessons' => Lesson::query()->latest()
                ->where('course_id', $course->id)
                ->when(Request::input('search'), function ($query, $search) {
                    $query->where('title', 'like', "%{$search}%");
                })
                ->paginate($perPage)
                ->withQueryString(),
            'filters' => Request::only(['search', 'perPage'])
        ]);
    }

    public function store($course_id)
    {
        $course = Course::find($course_id);
        $videoId = Request::input('youtubeId');
        $lesson = new Lesson();
        (new YoutubeTalk($videoId))->save($course, $lesson);
        return Redirect::back()->with('flash.banner', 'Lesson created.');
    }

    public function edit($course_id, Lesson $lesson)
    {
        $course = Course::find($course_id);
        return Inertia::render('Admin/Courses/Lessons/Edit', [
            'course' => $course,
            'lesson' => $lesson
        ]);
    }
    public function update($course_id, Lesson $lesson)
    {
        $course = Course::find($course_id);
        $validated = Request::validate([
            'title' => 'required',
            'slug' => 'required',
            'duration' => 'required',
            'embed_html' => 'required',
            'thumbnail_url' => 'required',
            'description' => 'required',
            'external_id' => 'required',
        ]);
        $lesson->update($validated);
        return Redirect::route('admin.lessons.index', $course)->with('flash.banner', 'Lesson updated.');
    }

    public function destroy($course_id, Lesson $lesson)
    {
        $course = Course::find($course_id);
        $lesson->delete();
        return Redirect::route('admin.lessons.index', $course)->with('flash.banner', 'Lesson deleted.')->with('flash.bannerStyle', 'danger');
    }
}
