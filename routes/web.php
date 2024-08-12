<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/',[\App\Http\Controllers\Frontend\HomeController::class,'index'])->name('landing.home');
Route::get('market-place',[\App\Http\Controllers\Frontend\MarketPlaceController::class,'index'])->name('landing.home');
Route::get('market-place/{slug}',[\App\Http\Controllers\Frontend\MarketPlaceController::class,'show'])->name('landing.home');
Route::get('market-place/inc/json/settings.json',[\App\Http\Controllers\Frontend\MarketPlaceController::class,'jsonSetting'])->name('landing.home');
Route::get('market-place/dummy_data/products/load_products.json',[\App\Http\Controllers\Frontend\MarketPlaceController::class,'jsonProducts'])->name('landing.home');
