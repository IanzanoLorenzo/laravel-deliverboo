<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ResturantController as ResturantController;
use App\Http\Controllers\Api\DishController as DishController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('')->group(function (){
    Route::get('/resturants', [ResturantController::class, 'index']);
    Route::get('/resturants/{slug}', [DishController::class, 'index']);
});

