<?php

use App\Http\Controllers\Api\{
    CourseController,
    ModuleController
};

use Illuminate\Support\Facades\Route;

Route::apiResource('courses/{course}/modules', ModuleController::class);

Route::put('/courses/{course}', [CourseController::class, 'update']);
Route::get('/courses',  [CourseController::class, 'index']);
Route::get('/courses/{identify}', [CourseController::class, 'show']);
Route::delete('/courses/{identify}', [CourseController::class, 'destroy']);
Route::post('/courses', [CourseController::class, 'store']);

Route::get('/', function () {
    return response()->json(['message' => 'ok']);
});