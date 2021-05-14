<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FileController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\VenueController;
use App\Http\Controllers\Api\PersonController;
use App\Http\Controllers\Api\TicketController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\TaxonomyController;
use App\Http\Controllers\Api\UserAuthController;

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

// protected routes
Route::group(['middleware' => 'auth:sanctum'], function () {

  // Users API endpoints
  Route::apiResource('users', UserController::class);
  Route::get('dashboard', [UserController::class, 'dashboard']);
  Route::get('users/{user}/{content}', [UserController::class, 'show']);
  Route::post('users/{user}/avatar', [UserController::class, 'updateAvatar']);
  Route::post('users/{user}/comments', [UserController::class, 'storeComment']);
  Route::post('users/{user}/files', [UserController::class, 'storeFile']);

  // Events API endpoints
  Route::apiResource('events', EventController::class);
  Route::post('events/{event}/avatar', [EventController::class, 'updateAvatar']);
  Route::post('events/{event}/comments', [EventController::class, 'storeComment']);
  Route::post('events/{event}/files', [EventController::class, 'storeFile']);

  // People API endpoints
  Route::apiResource('people', PersonController::class);
  Route::post('people/{person}/avatar', [PersonController::class, 'updateAvatar']);
  Route::post('people/{person}/comments', [PersonController::class, 'storeComment']);
  Route::post('people/{person}/files', [PersonController::class, 'storeFile']);

  // Venues API endpoints
  Route::apiResource('venues', VenueController::class);
  Route::post('venues/{venue}/avatar', [VenueController::class, 'updateAvatar']);
  Route::post('venues/{venue}/comments', [VenueController::class, 'storeComment']);
  Route::post('venues/{venue}/files', [VenueController::class, 'storeFile']);

  // Comments API endpoints
  Route::apiResource('comments', CommentController::class);

  // Files API endpoints
  Route::apiResource('files', FileController::class);

  // Taxonomies API endpoints
  Route::apiResource('taxonomies', TaxonomyController::class);

  // Tickets API endpoints
  Route::apiResource('tickets', TicketController::class);
});

// Public routes
Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);
Route::post('logout/{user}', [UserController::class, 'logout']);
