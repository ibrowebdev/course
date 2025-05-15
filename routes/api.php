<?php

use App\Http\Controllers\ApiLoginController;
use App\Http\Controllers\CoursesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/login', function (Request $request) {
//     return "hhh";
// })->middleware('auth:sanctum');

Route::get('login', [ApiLoginController::class, 'login']);

Route::middleware(['throttle:course'])->group(function () {
    Route::get('courses', [CoursesController::class, 'allenrolledCourse'])->middleware('auth:sanctum');
    Route::get('courses/{id}', [CoursesController::class, 'viewEachCourseWithComment'])->middleware('auth:sanctum');
    Route::get('courses/{id}/comments', [CoursesController::class, 'viewComment'])->middleware('auth:sanctum');
    Route::post('courses/{id}/comments', [CoursesController::class, 'postComment'])->middleware('auth:sanctum');
});