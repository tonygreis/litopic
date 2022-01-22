<?php

use App\Http\Controllers\Admin\LessonController;
use App\Http\Controllers\Admin\SerieController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\TopicController;
use App\Http\Controllers\Frontend\LessonController as LessonFrontendController;
use App\Http\Controllers\Frontend\SerieController as SerieFrontendController;
use App\Http\Controllers\Frontend\TopicController as TopicFrontendController;
use App\Http\Controllers\Frontend\WelcomeController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::get('/topics', [TopicFrontendController::class, 'index'])->name('frontend.topics.index');
Route::get('/topics/{topic:slug}', [TopicFrontendController::class, 'show'])->name('frontend.topics.show');
Route::get('/series', [SerieFrontendController::class, 'index'])->name('frontend.series.index');
Route::get('/series/{serie:slug}', [SerieFrontendController::class, 'show'])->name('frontend.series.show');
Route::get('/lessons', [LessonFrontendController::class, 'index'])->name('frontend.lessons.index');
Route::get('/series/{serie:slug}/lessons/{lesson:slug}', [LessonFrontendController::class, 'show'])->name('frontend.lessons.show');

Route::middleware(['auth:sanctum', 'verified', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return Inertia::render('Admin/Index');
    })->name('index');
    Route::resource('/topics', TopicController::class);
    Route::resource('/series', SerieController::class);
    Route::post('/series/{serie}/add-topic', [SerieController::class, 'addTopic'])->name('series.add_topic');
    Route::resource('/series/{serie}/lessons', LessonController::class);
    Route::resource('/tags', TagController::class);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
