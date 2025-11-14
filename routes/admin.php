<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.dashboard');
})->name('dashboard');

/* LMS Admin routes - to be implemented */
// Route::get('/courses', function () {
//     return view('admin.courses.index');
// })->name('courses.index');

// Route::get('/courses/create', function () {
//     return view('admin.courses.create');
// })->name('courses.create');

// Route::get('/courses/{course}/edit', function ($course) {
//     return view('admin.courses.edit', compact('course'));
// })->name('courses.edit');

// Route::get('/users', function () {
//     return view('admin.users.index');
// })->name('users.index');

// Route::get('/enrollments', function () {
//     return view('admin.enrollments.index');
// })->name('enrollments.index');
