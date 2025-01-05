<?php

use Illuminate\Routing\Router;
use App\Admin\Controllers\TempletesController;
use App\Admin\Controllers\TempleteCategoriesController;
use OpenAdmin\Admin\Facades\Admin;
use Illuminate\Support\Facades\Route;
use App\Admin\Controllers\BlogPostsController;
use App\Admin\Controllers\HelpAndSupportArticleController;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');

    // Template Management
    $router->resource('templates', TempletesController::class);
    $router->get('template/builder/{slug}',[TempletesController::class,'templateFEditor']);
    $router->get('template/designer/{slug}',[TempletesController::class,'templateDesigner']);
    $router->post('template/builder',[TempletesController::class,'storeTemplateFEditor']);


    $router->resource('template-categories', TempleteCategoriesController::class);
    $router->resource('settings', \App\Admin\Controllers\SettingsController::class);
    $router->get('settings-plat', [\App\Admin\Controllers\SettingsController::class,'settingPanel']);
    $router->resource('inquiries', \App\Admin\Controllers\InquiriesController::class);
    $router->resource('help-and-support-articles', HelpAndSupportArticleController::class);

    $router->resource('page-sizes', \App\Admin\Controllers\PageSizesController::class);

    $router->resource('blog-posts', BlogPostsController::class);
});
