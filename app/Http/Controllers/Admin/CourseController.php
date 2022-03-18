<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Topic;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class CourseController extends Controller
{
    public function index()
    {
        $perPage = Request::input('perPage') ?: 5;
        return Inertia::render('Admin/Courses/Index', [
            'courses' => Course::query()->latest()
                ->when(Request::input('search'), function ($query, $search) {
                    $query->where('name', 'like', "%{$search}%");
                })
                ->paginate($perPage)
                ->withQueryString()
                ->through(fn ($course) => [
                    'id' => $course->id,
                    'name' => $course->name,
                    'slug' => $course->slug,
                    'poster_path' => asset('storage/' . $course->poster_path),
                    'deleted_at' => $course->deleted_at,
                    'lessons' => $course->lessons ? $course->lessons->only('name') : null,
                ]),
            'filters' => Request::only(['search', 'perPage'])
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/Courses/Create');
    }

    public function store()
    {
        Request::validate([
            'name' => 'required',
            'description' => 'required',
            'poster_path' => 'required'
        ]);
        $image = Request::file('poster_path')->store('courses', 'public');
        Course::create([
            'name' => Request::input('name'),
            'poster_path' => $image,
            'description' => Request::input('description')
        ]);
        return Redirect::route('admin.courses.index')->with('flash.banner', 'Course Created.');
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);
        $topics = Topic::all(['name', 'id']);
        return Inertia::render('Admin/Courses/Edit', [
            'course' => $course,
            'topics' => $topics,
            'courseTopics' => $course->topics,
            'image' => asset('storage/' . $course->poster_path)
        ]);
    }

    public function update($id)
    {

        $course = Course::findOrFail($id);
        $image = $course->poster_path;
        if (Request::file('poster_path')) {
            Storage::delete('public/' . $course->poster_path);
            $image = Request::file('poster_path')->store('courses', 'public');
        }
        Request::validate([
            'name' => 'required',
            'slug' => 'required',
            'description' => 'required',
        ]);
        $course->update([
            'name' => Request::input('name'),
            'slug' => Request::input('slug'),
            'poster_path' => $image,
            'description' => Request::input('description')
        ]);
        return Redirect::route('admin.courses.index')->with('flash.banner', 'Course updated.');
    }

    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();
        return Redirect::route('admin.courses.index')->with('flash.banner', 'Course deleted.')->with('flash.bannerStyle', 'danger');
    }

    public function addTopic($id)
    {
        $course = Course::findOrFail($id);
        $topics = Request::input('topics');
        $topic_ids = collect($topics)->pluck('id');
        $course->topics()->sync($topic_ids);
        return Redirect::route('admin.courses.edit', $id)->with('flash.banner', 'Topics Added.');
    }
}
