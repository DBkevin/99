<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/',function(){
         return redirect('/admin/users');
    });
    $router->get('products', 'ProductsController@index');
    $router->resource('users', UsersController::class);
    $router->get('products/create', 'ProductsController@create');
    $router->post('products', 'ProductsController@store');
    $router->get('products/{id}/edit', 'ProductsController@edit');
    $router->put('products/{id}', 'ProductsController@update');
    $router->get('orders', 'OrdersController@index')->name('admin.orders.index');
    $router->get('rates', 'RatesController@index')->name('admin.rates.index');
    $router->get('rates/create', 'RatesController@create');
    $router->post('rates', 'RatesController@store');
    $router->get('rates/{id}/edit', 'RatesController@edit');
    $router->put('rates/{id}', 'RatesController@update');
});
