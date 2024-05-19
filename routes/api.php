<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Users\UserController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
|               Secured Routes
|--------------------------------------------------------------------------
*/

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/ping/authenticated', function () {
        return response()->json('Pong authenticated !');
    });

    Route::prefix('users')->group(function () {
        Route::get('me', [UserController::class, 'getConnectedUser']);
    });
});



/*
|--------------------------------------------------------------------------
|               Authentication Routes
|--------------------------------------------------------------------------
*/
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);


/*
|--------------------------------------------------------------------------
|               Test Routes
|--------------------------------------------------------------------------
*/
Route::get('ping', function () {
    return response()->json('pong !');
});
