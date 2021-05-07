<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\VenueController;
use App\Http\Controllers\Api\PersonController;

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
/* 
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
 */

// Users API endpoints
Route::apiResource('users', UserController::class);
Route::post('users/{id}/avatar', [UserController::class, 'updateAvatar']);
// Events API endpoints
Route::apiResource('events', EventController::class);
Route::post('events/{id}/avatar', [EventController::class, 'updateAvatar']);
// People API endpoints
Route::apiResource('people', PersonController::class);
Route::post('people/{id}/avatar', [PersonController::class, 'updateAvatar']);
// Venues API endpoints
Route::apiResource('venues', VenueController::class);
Route::post('venues/{id}/avatar', [VenueController::class, 'updateAvatar']);
