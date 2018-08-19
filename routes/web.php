<?php


Route::prefix('admin')->group(function () {
    Route::get('/', 'AdminController@index')->name('main');
    Route::get('/home', 'HomeController@index')->name('home');
});

Route::prefix('api')->group(function () {
    Route::resource('/pages', 'PageController');
    Route::put('/pages/{id}', 'PageController@update');

    Route::prefix('admin')->group(function () {
        Route::post('/register', 'Auth\RegisterController@register');
        Route::post('/login', 'Auth\LoginController@login');
        Route::post('/logout', 'Auth\LoginController@logout');
    });
});

Route::any('{query}','AdminController@index')
    ->where('query', '.*');




