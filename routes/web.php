<?php

use App\Http\Controllers\Frontend\PostCardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaticPageController;
use App\Admin\Controllers\AuthController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\User\DashboardController;

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
Route::post('market-place/{slug}/writing-desk-select',[\App\Http\Controllers\Frontend\MarketPlaceController::class,'selectOrder'])->name('landing.selectOrder');

Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('google-auth');
Route::get('auth/google/callback', [GoogleAuthController::class, 'callbackGoogle']);


Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'loginPage'])->name('landing.loginPage');
    Route::post('/login', [AuthController::class, 'login'])->name('landing.login');
    Route::get('/register', [AuthController::class, 'registerPage'])->name('landing.registerPage');
    Route::post('/register', [AuthController::class, 'register'])->name('landing.register');

    // Add these new routes
    Route::get('/forgot-password', [AuthController::class, 'forgotPasswordPage'])->name('password.request');
    Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');
    Route::get('/reset-password/{token}', [AuthController::class, 'resetPasswordPage'])->name('password.reset');
    Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');
});


Route::middleware('auth')->group(function () {
    Route::post('/logout', [\App\Admin\Controllers\AuthController::class, 'logout'])->name('landing.logout');
});


Route::get('dashboard', [DashboardController::class, 'index'])
    ->name('user.dashboard')
    ->middleware('auth');



Route::get('preview-design/{slug}/{order_id}',[\App\Http\Controllers\Frontend\MarketPlaceController::class,'previewDesign'])->name('preview_design');
Route::post('preview-design/{slug}/{order_id}',[\App\Http\Controllers\Frontend\MarketPlaceController::class,'previewDesignStore'])->name('preview_design_store');

Route::post('create-order/{slug}',[\App\Http\Controllers\Frontend\MarketPlaceController::class,'createOrderAsGuest'])->name('landing.create-order');

Route::get('market-place/inc/json/settings.json',[\App\Http\Controllers\Frontend\MarketPlaceController::class,'jsonSetting'])->name('landing.home');
Route::get('market-place/dummy_data/products/load_products.json',[\App\Http\Controllers\Frontend\MarketPlaceController::class,'jsonProducts'])->name('landing.home');

Route::get('/dashboard/payment-history', [DashboardController::class, 'paymentHistory'])->name('dashboard.payment-history');

