<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RestaurantController;
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

Route::prefix('companies')->group(function(){
    Route::get('/',[CompanyController::class, 'index'])->name('companies.get');
    Route::post('/insert',[CompanyController::class, 'store'])->name('company.store');
    Route::delete('/{company_id}',[CompanyController::class, 'destroy'])->name('company.delete');
    Route::put('/{company_id}',[CompanyController::class, 'update'])->name('company.update');
    Route::get('/{company_id}',[CompanyController::class, 'show'])->name('company.show');
    Route::get('/{company_id}/restaurants',[CompanyController::class, 'restaurants'])->name('company.restaurants');
});

Route::prefix('restaurants')->group(function(){
    Route::get('/',[RestaurantController::class, 'index'])->name('restaurants.get');
    Route::post('/insert',[RestaurantController::class, 'store'])->name('restaurants.store');
    Route::delete('/{company_id}',[RestaurantController::class, 'destroy'])->name('restaurants.delete');
    Route::put('/{company_id}',[RestaurantController::class, 'update'])->name('restaurants.update');
    Route::get('/{company_id}',[RestaurantController::class, 'show'])->name('restaurants.show');
    Route::get('/{company_id}/restaurants',[RestaurantController::class, 'menus'])->name('restaurants.menus');
});

Route::prefix('menus')->group(function(){
    Route::get('/',[MenuController::class, 'index'])->name('menus.get');
    Route::get('{menu_id}',[MenuController::class, 'show'])->name('menus.show');
    Route::delete('{menu_id}',[MenuController::class, 'destroy'])->name('menus.delete');
    Route::put('{menu_id}',[MenuController::class, 'update'])->name('menus.update');
    Route::post('/insert',[MenuController::class, 'store'])->name('menus.store');
    Route::get('/{menu_id}/products',[MenuController::class, 'products'])->name('menus.products');
});

Route::prefix('products')->group(function(){
    Route::get('/',[ProductController::class, 'index'])->name('products.get');
    Route::get('{menu_id}',[ProductController::class, 'show'])->name('products.show');
    Route::delete('{menu_id}',[ProductController::class, 'destroy'])->name('products.delete');
    Route::put('{menu_id}',[ProductController::class, 'update'])->name('products.update');
    Route::post('/insert',[ProductController::class, 'store'])->name('products.store');
});

