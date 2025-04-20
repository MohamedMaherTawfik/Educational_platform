<?php

use App\Http\Controllers\web\home\homeController;
use App\Http\Controllers\web\admin\adminController;
use App\Http\Controllers\web\admin\courseController;
use App\Http\Controllers\web\admin\lessonController;
use App\Http\Controllers\web\auth\AuthController;
use App\Http\Middleware\web\checkAdmin;
use Illuminate\Support\Facades\Route;

Route::controller(homeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/user/courses', 'userCourses')->name('user.courses');
    Route::get('/user/profile', 'profile')->name('user.profile');
    Route::get('/user/notification', 'notification')->name('user.notification');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/signup', 'register')->name('register');
    Route::post('/signup', 'signup')->name('signup');
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'signin')->name('signin');
    Route::post('/logout', 'logout')->name('logout');
});

Route::controller(adminController::class)->group(function () {
    Route::get('/admin/dashboard', 'index')->name('admin.dashboard')->middleware(checkAdmin::class);
});

Route::controller(courseController::class)->group(function () {
    Route::get('/admin/courses', 'courses')->name('admin.courses')->middleware(checkAdmin::class);
    Route::get('/admin/courses/create', 'create')->name('admin.courses.create')->middleware(checkAdmin::class);
    Route::post('/admin/courses/create', 'store')->name('admin.courses.store')->middleware(checkAdmin::class);
    Route::get('/course/{id}', 'showUser')->name('course.show');
    Route::get('admin/course/{id}', 'show')->name('admin.course.show')->middleware(checkAdmin::class);
    Route::delete('admin/course/{id}', 'destroy')->name('admin.course.destroy')->middleware(checkAdmin::class);
});

Route::controller(lessonController::class)->group(function () {
    Route::get('/admin/course/{id}/lessons', 'index')->name('admin.lessons')->middleware(checkAdmin::class);
    Route::get('/admin/course/{id}/lessons/create', 'create')->name('admin.lessons.create')->middleware(checkAdmin::class);
    Route::post('/admin/course/{id}/lessons/create', 'store')->name('admin.lessons.store')->middleware(checkAdmin::class);
    Route::get('/admin/course/{id}/lessons/{lesson_id}', 'show')->name('admin.lessons.show')->middleware(checkAdmin::class);
    Route::delete('/admin/course/{id}/lessons/{lesson_id}', 'destroy')->name('admin.lessons.destroy')->middleware(checkAdmin::class);
});
