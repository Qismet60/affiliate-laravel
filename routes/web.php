<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RestaurantController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::prefix('companies')->group(function(){
//     Route::get('/',[CompanyController::class, 'index'])->name('companies.get');
//     Route::get('{id}',[CompanyController::class, 'show'])->name('company.show');
//     Route::post('{id}',[CompanyController::class, 'destroy'])->name('company.delete');
//     Route::post('{id}',[CompanyController::class, 'update'])->name('company.update');
//     Route::post('/create',[CompanyController::class, 'store'])->name('company.store');
// });

// Route::prefix('restaurants')->group(function(){
//     Route::get('/',[RestaurantController::class, 'index'])->name('restaurants.get');
//     Route::get('{id}',[RestaurantController::class, 'show'])->name('restaurants.show');
//     Route::post('{id}',[RestaurantController::class, 'destroy'])->name('restaurants.delete');
//     Route::post('{id}',[RestaurantController::class, 'update'])->name('restaurants.update');
//     Route::post('/create',[RestaurantController::class, 'store'])->name('restaurants.store');
// });

// Route::prefix('menus')->group(function(){
//     Route::get('/',[MenuController::class, 'index'])->name('menus.get');
//     Route::get('{id}',[MenuController::class, 'show'])->name('menus.show');
//     Route::post('{id}',[MenuController::class, 'destroy'])->name('menus.delete');
//     Route::post('{id}',[MenuController::class, 'update'])->name('menus.update');
//     Route::post('/create',[MenuController::class, 'store'])->name('menus.store');
// });