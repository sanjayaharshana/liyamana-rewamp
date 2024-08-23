<?php

use Illuminate\Routing\Router;
use App\Admin\Controllers\TempletesController;
use App\Admin\Controllers\TempleteCategoriesController;
use OpenAdmin\Admin\Facades\Admin;
use Illuminate\Support\Facades\Route;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('templates', TempletesController::class);
    $router->resource('template-categories', TempleteCategoriesController::class);
    $router->resource('settings', \App\Admin\Controllers\SettingsController::class);
    $router->get('settings-plat', [\App\Admin\Controllers\SettingsController::class,'settingPanel']);
    $router->resource('inquiries', \App\Admin\Controllers\InquiriesController::class);
});
