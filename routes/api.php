<?php

use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ShopAdminController;
use App\Http\Controllers\ShopAdminRegisterController;
use App\Http\Middleware\AdminCheck;
use App\Http\Middleware\ShopAdminCheck;
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

//userAPI
Route::apiResource('/shops', ShopController::class);
Route::apiResource('/users', UserController::class);
Route::get('/login', [LoginController::class, 'get']);
// Route::post('/logout', [LogoutController::class, 'post']);
Route::post('/reservation', [ReservationController::class, 'post']);
Route::delete('/reservation/{reservation}', [ReservationController::class, 'destroy']);
Route::post('/likes', [LikeController::class, 'post']);
Route::delete('/likes', [LikeController::class, 'destroy']);

//shopadminAPI
Route::get('/shopadmin/shops', [ShopAdminController::class, 'index'])->middleware("ShopAdminCheck");
Route::post('/shopadmin/register/shop', [ShopAdminController::class, 'store'])->middleware("ShopAdminCheck");
Route::get('/shopadmin/shops/{shop}', [ShopAdminController::class, 'show'])->middleware("ShopAdminCheck");
Route::post('/shopadmin/update/shop', [ShopAdminController::class, 'update'])->middleware("ShopAdminCheck");
Route::post('/shopadmin/delete/shop', [ShopAdminController::class, 'delete'])->middleware("ShopAdminCheck");
Route::delete('/shopadmin/delete/reservation/{reservation}', [ReservationController::class, 'destroy'])->middleware("ShopAdminCheck");


//adminAPI
Route::post('/admin/register/shopadmin', [ShopAdminRegisterController::class, 'post'])->middleware("AdminCheck");


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
