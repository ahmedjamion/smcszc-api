<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
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

    // todo: add authorization to the routes in the controller, idk
    Route::apiResource('students', StudentController::class); // ! temporary
});


Route::get('/', function () {
    return 'Hello World!';
});
