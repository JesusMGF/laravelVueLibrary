<?php

Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');

Route::group(['middleware' => 'auth:api'], function(){

    Route::post('details', 'API\UserController@details');

    Route::group(['prefix' => 'items'], function () {
        
        Route::get('/', 'Api\ItemController@index');

    });

    Route::apiResource('categories', 'Api\CategorieController')->only([
        'index', 'store', 'update', 'destroy'
    ]);
    
    Route::get('/items/{id}', 'Api\ItemController@itemById')->name('itemById');
    
    Route::apiResource('items', 'Api\ItemController')->only([
        'index', 'store', 'update', 'destroy'
    ]);




});