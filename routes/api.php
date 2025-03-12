<?php

use App\Http\Controllers\OffersController;
use App\Http\Controllers\OffersUserController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get( '/users', [UserController::class, 'create']);
Route::post( '/users', [UserController::class, 'store']);
Route::post( '/login', [UserController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    

	Route::get( '/users/{id}', [UserController::class, 'edit']);
	Route::put( '/users/{id}', [UserController::class, 'update']);

	

	Route::get( '/offers_users', [OffersUserController::class, 'index']);
	Route::get( '/offers_users/create', [OffersUserController::class, 'create']);
	Route::post( '/offers_users', [OffersUserController::class, 'store']);
	Route::get( '/offers_users/{id}', [OffersUserController::class, 'show']);
	Route::get( '/offers_users/{id}/edit', [OffersUserController::class, 'edit']);
	Route::put( '/offers_users/{id}', [OffersUserController::class, 'update']);
	Route::delete( '/offers_users/{id}', [OffersUserController::class, 'destroy']);

	
    
	Route::get( '/offers', [OffersController::class, 'index']);
	Route::get( '/offers/create', [OffersController::class, 'create']);
	Route::post( '/offers', [OffersController::class, 'store']);
	Route::get( '/offers/{id}', [OffersController::class, 'show']);
	Route::get( '/offers/{id}/edit', [OffersController::class, 'edit']);
	Route::put( '/offers/{id}', [OffersController::class, 'update']);
	Route::delete( '/offers/{id}', [OffersController::class, 'destroy']);

});


