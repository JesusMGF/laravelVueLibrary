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

Route::get('/mainapi', function () {
    return view('mainapi');
});

Auth::routes();

Route::get('/apilogin', function () {
    return view('apilogin');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::apiResource('categories', 'CategorieController')->only([
    'index', 'store', 'update', 'destroy'
]);

Route::get('/items/{id}', 'ItemController@itemById')->name('itemById');

Route::apiResource('items', 'ItemController')->only([
    'index', 'store', 'update', 'destroy'
]);


