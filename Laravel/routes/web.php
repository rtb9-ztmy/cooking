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
    return view('welcome');
});

Route::get('product-list', 'ProductInfoController@index');

Route::get('product-registration', 'ProductInfoController@create');

Route::post('product-registration', 'ProductInfoController@store');

Route::get('product-update', 'ProductInfoController@edit');

Route::post('product-update', 'ProductInfoController@update');

Route::post('product-delete', 'ProductInfoController@delete');

Route::get('/logout', 'ProductInfoController@logout');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
