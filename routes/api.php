<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api\Auth\AuthController;
use \App\Http\Controllers\Api\Auth\RegisterController;
use \App\Http\Controllers\BookController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware("auth:sanctum")->group(function() {
    Route::prefix("oauth")->group(function() {
        Route::post("logout", [AuthController::class, 'logout']);
    });
    Route::apiResource("books", BookController::class);
});

Route::prefix("oauth")->group(function() {
    Route::post("login", [AuthController::class, 'login']);
});

Route::post("users", [RegisterController::class, 'register']);
