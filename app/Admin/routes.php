<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {
    $router->get('/', 'HomeController@index')->name('home');

    // 管理画面のURL+/informationにリソースコントローラーを割り当て
    $router->resource('/information', InformationController::class);

    // 管理画面のURL+/categoriesにリソースコントローラーを割り当て
    $router->resource('/categories', CategoryController::class);

    // 管理画面のURL+/usersにリソースコントローラーを割り当て
    $router->resource('/users', UserController::class);

});
