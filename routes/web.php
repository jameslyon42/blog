<?php


Route::prefix('admin')->group(function () {
    Route::get('/', 'AdminController@index')->name('main');
    Route::get('/home', 'HomeController@index')->name('home');

    Route::any('{query}', 'AdminController@index')
        ->where('query', '.*');
});

Route::prefix('api')->group(function () {
    Route::resource('/pages', 'PageController');
    Route::put('/pages/{id}', 'PageController@update');

    Route::resource('/images', 'ImageController')->only([
        'store'
    ]);

    Route::prefix('admin')->group(function () {
        //Route::post('/register', 'Auth\RegisterController@register');
        Route::post('/login', 'Auth\LoginController@login');
        Route::post('/logout', 'Auth\LoginController@logout');
    });
});

Route::get('/', 'BlogController@home')->name('blog_home');

Route::get('/blog', 'BlogController@index')->name('blog_index');

Route::get('/blog/{slug}', 'BlogController@show');

Route::get('/about', 'BlogController@about');

Route::get('/policy', 'BlogController@policy');
