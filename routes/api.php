<?php

use App\Http\Controllers\Frontend\WelcomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::get('/search', [WelcomeController::class, 'search']);
