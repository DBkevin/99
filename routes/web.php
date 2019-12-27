<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return 'aaa';
});
Route::post('users','UsersController@store')->name('users.store');
Route::path('users','UsersController@uppasswd')->name('users.restpasswd');
Route::get('restpasswd', 'UsersController@restpasswd')->name('restpasswd');
Route::get('signup', 'UsersController@create')->name('signup');
Auth::routes();