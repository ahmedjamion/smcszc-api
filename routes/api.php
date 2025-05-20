<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GradeLevelController;
use App\Http\Controllers\LearnerRegistrationController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\SchoolYearController;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// auth routes
Route::controller(AuthController::class)->group(function () {
    // register
    Route::post('/register', 'register'); // * unauthenticated user can access

    // login
    Route::post('/login', 'login'); // * unauthenticated user can access

    // logout
    // * middleware('auth:sanctum') protects the route from unauthenticated users
    Route::post('/logout', 'logout')->middleware('auth:sanctum');

    // activate role
    Route::post('/role', 'setActiveRole')->middleware('auth:sanctum');
});

// todo: add a grouped route for get user and active user role, idk
Route::middleware(['auth:sanctum'])->group(function () {
    // get the authenticated user
    Route::get('/user', function (Request $request) {
        return new UserResource($request->user);
    });
});



Route::apiResource('school-year', SchoolYearController::class);
Route::apiResource('school', SchoolController::class);

Route::post('/learner-registration', [LearnerRegistrationController::class, 'store']);

Route::apiResource('grade-levels', GradeLevelController::class);

Route::get('/', function () {
    return 'Hello World!';
});
