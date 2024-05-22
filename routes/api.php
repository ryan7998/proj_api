<?php

use App\Http\Controllers\Api\V1\CompleteTaskController;
use App\Http\Controllers\Api\V1\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// (use v1 as prefix)
Route::middleware('auth:sanctum')->prefix('v1')->group(function () {
    Route::apiResource('/tasks', TaskController::class);
    Route::patch('/tasks/{task}/complete', CompleteTaskController::class);
});
// use apiResource instead of direct get method: 
// we could use Route::apiResource('/v1/tasks', TaskController::class) if prefix was not used
// Route::apiResource('/tasks', TaskController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// php artisan route:list --path=api -> create route
// php artisan make:resource TaskResource -> create resource