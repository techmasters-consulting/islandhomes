<?php

//Auth vendor properties

Route::middleware('auth:api')->group(function () {
    Route::get('property/', 'PropertyController@vendor')->name('vendor');
    Route::put('property/{property}', 'PropertyController@update')->name('update');
    Route::post('property/store', 'PropertyController@store')->name('store');
    Route::delete('property/remove', 'PropertyController@destroy')->name('destroy');
});

Route::get('properties/all', 'PropertyController@index')->name('index');

//blog route
Route::get('blog', 'BlogController@index')->name('blog');


// Vendors routes
// login route
Route::post('vendor/login', 'AuthController@login')->name('login');
// register
Route::post('vendor/register', 'AuthController@register');
// verify token
Route::get('me', 'AuthController@me');
// logout route
Route::get('vendor/logout', 'AuthController@logout');
// refresh token
Route::get('vendor/refresh', 'AuthController@refresh');
