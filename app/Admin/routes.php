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
    $router->resource('services', ServiceController::class);
    $router->resource('hair-stylists', HairStylistController::class);
    $router->resource('customers', CustomerController::class);
    $router->resource('orders', OrderController::class);
    $router->resource('order-services', OrderServiceController::class);
    $router->resource('bills', BillController::class);
    $router->resource('news', NewsController::class);
});
