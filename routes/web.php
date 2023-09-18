<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ResturantController as ResturantController;
use App\Http\Controllers\Admin\DishController as DishController;
use App\Http\Controllers\Admin\UserController as UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::middleware('auth', 'verified')->prefix('admin')->name('admin.')->group(function(){
    Route::get('/resturants', [ResturantController::class, 'index'])->name('resturants');
    Route::get('/resturants/edit', [ResturantController::class, 'edit'])->name('resturants.edit');
    Route::match(['put', 'patch'],'/resturants/{resturant}', [ResturantController::class, 'update'])->name('resturants.update');
    Route::resource('/dishes', DishController::class);
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
