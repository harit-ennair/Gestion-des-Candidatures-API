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

route::get( '/users', [UserController::class, 'create']);
route::post( '/users', [UserController::class, 'store']);
route::post( '/login', [UserController::class, 'login']);
route::get( '/users/{id}', [UserController::class, 'edit']);
route::put( '/users/{id}', [UserController::class, 'update']);


route::get( '/offers_users', [OffersUserController::class, 'index']);
route::get( '/offers_users', [OffersUserController::class, 'create']);
route::post( '/offers_users', [OffersUserController::class, 'store']);
route::get( '/offers_users/{id}', [OffersUserController::class, 'show']);
route::get( '/offers_users/{id}', [OffersUserController::class, 'edit']);
route::put( '/offers_users/{id}', [OffersUserController::class, 'update']);
route::delete( '/offers_users/{id}', [OffersUserController::class, 'destroy']);


route::get( '/offers', [OffersController::class, 'index']);
route::get( '/offers', [OffersController::class, 'create']);
route::post( '/offers', [OffersController::class, 'store']);
route::get( '/offers/{id}', [OffersController::class, 'show']);
route::get( '/offers/{id}', [OffersController::class, 'edit']);
route::put( '/offers/{id}', [OffersController::class, 'update']);
route::delete( '/offers/{id}', [OffersController::class, 'destroy']);
