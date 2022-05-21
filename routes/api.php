<?php

use App\Http\Controllers\Api\AuthenticateController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\EnrollmentController;
use App\Http\Controllers\Api\LessonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(AuthenticateController::class)->prefix('authenticate')->group(function () {
    Route::get('user', 'getUser')->middleware('auth:sanctum');
    Route::post('login', 'login');
    Route::get('logout', 'logout')->middleware('auth:sanctum');
});

Route::controller(CourseController::class)->middleware('auth:sanctum')->prefix('authenticate')->group(function () {
    Route::post('create', 'create');
    Route::get('search', 'search');
    Route::get('get/{id}', 'getCourse');
    Route::delete('{id}', 'delete');
    Route::post('update', 'update');
});

Route::controller(LessonController::class)->middleware('auth:sanctum')->prefix('authenticate')->group(function () {
    Route::post('create', 'create');
    Route::get('search', 'search');
    Route::get('get/{id}', 'getLesson');
    Route::delete('{id}', 'delete');
    Route::post('update', 'update');
});

Route::controller(EnrollmentController::class)->middleware('auth:sanctum')->prefix('enrollment')->group(function () {
    Route::get('search/{userId}', 'search');
});