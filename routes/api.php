<?php

use App\Http\Controllers\admin\CourseController;
use App\Http\Controllers\admin\lessonController;
use App\Http\Controllers\auth\AuthController;
use App\Http\Middleware\adminCheck;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('jwt.auth');
    Route::post('/refresh', [AuthController::class, 'refresh'])->middleware('jwt.auth');
    Route::post('/profile', [AuthController::class, 'profile'])->middleware('jwt.auth');
    Route::post('/user/address', [AuthController::class, 'addAddress'])->middleware('jwt.auth');
    Route::get('/user/course', [AuthController::class, 'userCourses'])->middleware('jwt.auth');
});

Route::controller(CourseController::class)->group(function () {
    Route::get('/courses', 'index');
    Route::get('/course/{id}', 'find');
    Route::post('/course', 'store')->middleware('jwt.auth')->middleware(adminCheck::class);
    Route::post('/course/{id}', 'update');
    Route::delete('/course/{id}', 'destroy');
});

Route::controller(lessonController::class)->group(function () {
    Route::get('course/{id}/lessons', 'allLessons');
    Route::get('/lesson/{id}', 'findLesson');
    Route::post('course/{id}/lesson', 'storeLesson')->middleware(adminCheck::class);
    Route::post('/lesson/{id}', 'updateLesson');
    Route::delete('/lesson/{id}', 'deleteLesson');
});
