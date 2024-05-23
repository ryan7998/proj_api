<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\TaskController;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\LogoutController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\V1\CompleteTaskController;

require __DIR__ . '/api/v1.php';
require __DIR__ . '/api/v2.php';

// (use v1 as prefix)
// Route::middleware('auth:sanctum')->prefix('v1')->group(function () {
//     Route::apiResource('/tasks', TaskController::class);
//     Route::patch('/tasks/{task}/complete', CompleteTaskController::class);
// });

Route::prefix('auth')->group(function () {
    Route::post('/login', LoginController::class);
    Route::post('/logout', LogoutController::class)->middleware('auth:sanctum');
    Route::post('/register', RegisterController::class);
});

// use apiResource instead of direct get method: 
// we could use Route::apiResource('/v1/tasks', TaskController::class) if prefix was not used
// Route::apiResource('/tasks', TaskController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// php artisan route:list --path=api -> create route
// php artisan make:resource TaskResource -> create resource