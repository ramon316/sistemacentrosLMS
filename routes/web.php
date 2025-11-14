<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/privacy', function () {
    return view('public.privacy');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'redirect.if.admin',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('user.dashboard');
    })->name('dashboard');

    /* LMS routes - to be implemented */
    // Route::get('/my-courses', function () {
    //     return view('user.my-courses');
    // })->name('user.my-courses');
    // Route::get('/courses/{course}', function () {
    //     return view('user.course-detail');
    // })->name('user.course-detail');
});
