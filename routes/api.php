<?php

use App\Http\Controllers\api\AuthController;
use Illuminate\Support\Facades\Route;

/* public routes */
Route::post('/register', [AuthController::class,'register'])->name('api.register');
Route::post('/login', [AuthController::class,'login'])->name('api.login');

/* private routes */
Route::middleware('auth:sanctum')->group(function () {
    /* auth */
    Route::post('/logout', [AuthController::class,'logout'])->name('api.logout');
    Route::get('/profile', [AuthController::class,'profile'])->name('profile');
    Route::get('/check-status', [AuthController::class,'checkStatus'])->name('check-status');

    /* LMS routes - to be implemented */
    // Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
    // Route::get('/courses/{course}', [CourseController::class, 'show'])->name('courses.show');
    // Route::post('/enrollments', [EnrollmentController::class, 'store'])->name('enrollments.store');
    // Route::get('/my-courses', [EnrollmentController::class, 'myCourses'])->name('my-courses');
});

/* test routes */
Route::get('/test', function () {
    return response()->json([
        'success' => true,
        'message' => 'API is working - LMS Sistema Centros de Capacitación',
    ], 200);
})->name('test');
