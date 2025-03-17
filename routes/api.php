<?php

use App\Http\Controllers\OffersController;
use App\Http\Controllers\OffersUserController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Public routes
Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);
// Route::get('/users', [UserController::class, 'create']);
// Route::post('/users', [UserController::class, 'store']);

// JWT 
Route::middleware('auth:api')->group(function () {
	
	Route::get('user', [UserController::class, 'me']);
	
	// Users
	Route::prefix('users')->group(function () {
		Route::get('/{id}', [UserController::class, 'edit']);
		Route::put('/{id}', [UserController::class, 'update']);
	});

	// Offers_users 
	Route::prefix('offers_users')->group(function () {
		Route::get('/', [OffersUserController::class, 'index']);
		Route::get('/create', [OffersUserController::class, 'create']);
		Route::post('/', [OffersUserController::class, 'store']);
		Route::get('/{id}', [OffersUserController::class, 'show']);
		Route::get('/{id}/edit', [OffersUserController::class, 'edit']);
		Route::put('/{id}', [OffersUserController::class, 'update']);
		Route::delete('/{id}', [OffersUserController::class, 'destroy']);
	});

	// Offers 
	Route::prefix('offers')->group(function () {
		Route::get('/', [OffersController::class, 'index']);
		Route::get('/create', [OffersController::class, 'create']);
		Route::post('/', [OffersController::class, 'store']);
		Route::get('/{id}', [OffersController::class, 'show']);
		Route::get('/{id}/edit', [OffersController::class, 'edit']);
		Route::put('/{id}', [OffersController::class, 'update']);
		Route::delete('/{id}', [OffersController::class, 'destroy']);
	});
});

