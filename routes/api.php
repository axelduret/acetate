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
Route::post('users/{user}/avatar', [UserController::class, 'updateAvatar']);
Route::post('users/{user}/comments', [UserController::class, 'storeComment']);
Route::patch('users/{user}/comments/{comment}', [UserController::class, 'updateComment']);
Route::delete('users/{user}/comments/{comment}', [UserController::class, 'deleteComment']);
// Events API endpoints
Route::apiResource('events', EventController::class);
Route::post('events/{event}/avatar', [EventController::class, 'updateAvatar']);
Route::post('events/{event}/comments', [EventController::class, 'storeComment']);
Route::patch('events/{event}/comments/{comment}', [EventController::class, 'updateComment']);
Route::delete('events/{event}/comments/{comment}', [EventController::class, 'deleteComment']);
// People API endpoints
Route::apiResource('people', PersonController::class);
Route::post('people/{person}/avatar', [PersonController::class, 'updateAvatar']);
Route::post('people/{person}/comments', [PersonController::class, 'storeComment']);
Route::patch('people/{person}/comments/{comment}', [PersonController::class, 'updateComment']);
Route::delete('people/{person}/comments/{comment}', [PersonController::class, 'deleteComment']);
// Venues API endpoints
Route::apiResource('venues', VenueController::class);
Route::post('venues/{venue}/avatar', [VenueController::class, 'updateAvatar']);
Route::post('venues/{venue}/comments', [VenueController::class, 'storeComment']);
Route::patch('venues/{venue}/comments/{comment}', [VenueController::class, 'updateComment']);
Route::delete('venues/{venue}/comments/{comment}', [VenueController::class, 'deleteComment']);
