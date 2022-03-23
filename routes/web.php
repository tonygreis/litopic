<?php

use App\Http\Controllers\Admin\BlockController;
use App\Http\Controllers\Admin\ComponentController;
use App\Http\Controllers\Admin\CourseController as AdminCourseController;
use App\Http\Controllers\Admin\LessonController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\SerieController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\TopicController;
use App\Http\Controllers\Frontend\CourseController;
use App\Http\Controllers\Frontend\LessonController as LessonFrontendController;
use App\Http\Controllers\Frontend\TopicController as TopicFrontendController;
use App\Http\Controllers\Frontend\WelcomeController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::get('/topics', [TopicFrontendController::class, 'index'])->name('frontend.topics.index');
Route::get('/topics/{topic:slug}', [TopicFrontendController::class, 'show'])->name('frontend.topics.show');
Route::get('/courses', [CourseController::class, 'index'])->name('frontend.courses.index');
Route::get('/courses/{course:slug}', [CourseController::class, 'show'])->name('frontend.courses.show');
Route::get('/lessons', [LessonFrontendController::class, 'index'])->name('frontend.lessons.index');
Route::get('/courses/{course:slug}/lessons/{lesson:slug}', [LessonFrontendController::class, 'show'])->name('frontend.lessons.show');


Route::view('/policy', 'policy')->name('policy');
Route::view('/terms', 'terms')->name('terms');

Route::middleware(['auth:sanctum', 'verified', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return Inertia::render('Admin/Index');
    })->name('index');
    Route::resource('/topics', TopicController::class);
    Route::resource('/courses', AdminCourseController::class);
    Route::post('/courses/{course}/add-topic', [AdminCourseController::class, 'addTopic'])->name('courses.add_topic');
    Route::resource('/courses/{course}/lessons', LessonController::class);
    Route::resource('/tags', TagController::class);
    Route::resource('/components', ComponentController::class);
    Route::resource('/components/{component:slug}/sections', SectionController::class);
    Route::resource('/components/{component:slug}/sections/{section:slug}/blocks', BlockController::class);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';
