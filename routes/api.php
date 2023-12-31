<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ResturantController as ResturantController;
use App\Http\Controllers\Api\DishController as DishController;
use App\Http\Controllers\Api\OrderController as OrderController;


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
    Route::get('/resturants/search/{search}', [ResturantController::class, 'search']);
    Route::get('/resturants/{slug}', [DishController::class, 'index']);
});

Route::prefix('payments')->group(function(){
    Route::get('/token', [OrderController::class, 'getToken']);
    Route::post('/process', [OrderController::class, 'processPayment']);
});

// Route per l'invio dell'email al cliente
Route::post('api/send-email-to-customer', 'EmailController@sendEmailToCustomer');

// Route per l'invio dell'email al ristoratore
Route::post('api/send-email-to-restaurant', 'EmailController@sendEmailToRestaurant');

