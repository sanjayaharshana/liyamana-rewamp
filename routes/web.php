<?php

use App\Http\Controllers\Frontend\PostCardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaticPageController;
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
Route::get('/about-us',[\App\Http\Controllers\Frontend\AboutUsController::class,'index'])->name('landing.about-us');
Route::get('/post-card',[PostCardController::class,'index'])->name('landing.post-card');



Route::get('/terms-and-conditions',[StaticPageController::class,'termsAndConditions'])->name('terms.conditions');
Route::get('/privacy-policy',[StaticPageController::class,'privacyPolicy'])->name('privacy.policy');
Route::get('/refund-policy',[StaticPageController::class,'refundPolicy'])->name('refund.policy');
Route::get('cookie-policy',[StaticPageController::class,'cookiePolicy'])->name('cookie.policy');


Route::get('/test', function () {
    return view('welcome');
})->name('welcome');

Route::get('offline',[\App\Http\Controllers\Frontend\HomeController::class,'offline'])->name('landing.offline');
Route::get('market-place',[\App\Http\Controllers\Frontend\MarketPlaceController::class,'index'])->name('landing.home');
Route::get('market-place/{slug}',[\App\Http\Controllers\Frontend\MarketPlaceController::class,'show'])->name('landing.home');
Route::get('market-place/{slug}/writing-desk/{order_id}',[\App\Http\Controllers\Frontend\MarketPlaceController::class,'writingDesk'])->name('landing.writing-desk');
Route::post('market-place/{slug}/writing-desk/{order_id}',[\App\Http\Controllers\Frontend\MarketPlaceController::class,'writingDeskStore'])->name('landing.writing-desk.store');
Route::get('market-place/{slug}/writing-desk/{order_id}/checkout',[\App\Http\Controllers\Frontend\MarketPlaceController::class,'checkoutPage'])->name('landing.checkout');


Route::get('/login',[\App\Admin\Controllers\AuthController::class,'loginPage'])->name('landing.loginPage');
Route::get('/register',[\App\Admin\Controllers\AuthController::class,'registerPage'])->name('landing.registerPage');



Route::get('preview-design/{slug}/{order_id}',[\App\Http\Controllers\Frontend\MarketPlaceController::class,'previewDesign'])->name('preview_design');
Route::post('preview-design/{slug}/{order_id}',[\App\Http\Controllers\Frontend\MarketPlaceController::class,'previewDesignStore'])->name('preview_design_store');

Route::post('create-order/{slug}',[\App\Http\Controllers\Frontend\MarketPlaceController::class,'createOrderAsGuest'])->name('landing.create-order');

Route::get('market-place/inc/json/settings.json',[\App\Http\Controllers\Frontend\MarketPlaceController::class,'jsonSetting'])->name('landing.home');
Route::get('market-place/dummy_data/products/load_products.json',[\App\Http\Controllers\Frontend\MarketPlaceController::class,'jsonProducts'])->name('landing.home');
