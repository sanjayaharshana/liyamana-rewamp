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
Route::get('offline',[\App\Http\Controllers\Frontend\HomeController::class,'offline'])->name('landing.offline');
Route::get('market-place',[\App\Http\Controllers\Frontend\MarketPlaceController::class,'index'])->name('landing.home');
Route::get('market-place/{slug}',[\App\Http\Controllers\Frontend\MarketPlaceController::class,'show'])->name('landing.home');
Route::get('market-place/{slug}/writing-desk/{order_id}',[\App\Http\Controllers\Frontend\MarketPlaceController::class,'writingDesk'])->name('landing.writing-desk');
Route::post('market-place/{slug}/writing-desk/{order_id}',[\App\Http\Controllers\Frontend\MarketPlaceController::class,'writingDeskStore'])->name('landing.writing-desk.store');
Route::get('market-place/{slug}/writing-desk/{order_id}/checkout',[\App\Http\Controllers\Frontend\MarketPlaceController::class,'checkoutPage'])->name('landing.checkout');

Route::post('create-order/{slug}',[\App\Http\Controllers\Frontend\MarketPlaceController::class,'createOrderAsGuest'])->name('landing.create-order');

Route::get('market-place/inc/json/settings.json',[\App\Http\Controllers\Frontend\MarketPlaceController::class,'jsonSetting'])->name('landing.home');
Route::get('market-place/dummy_data/products/load_products.json',[\App\Http\Controllers\Frontend\MarketPlaceController::class,'jsonProducts'])->name('landing.home');
