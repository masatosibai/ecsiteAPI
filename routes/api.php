<?php

use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\LikeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::apiResource('/shops', ShopController::class);
Route::apiResource('/users', UserController::class);
Route::get('/login', [LoginController::class, 'get']);
Route::post('/logout', [LogoutController::class, 'post']);
Route::post('/reservation', [ReservationController::class, 'post']);
Route::delete('/reservation/{reservation}', [ReservationController::class, 'destroy']);
Route::post('/likes', [LikeController::class, 'post']);
Route::delete('/likes', [LikeController::class, 'destroy']);


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
