<?php

Route::group(['prefix' => 'auth'], function () {

    Route::post('login', 'AuthController@login')->name('usersLogin');
    Route::post('logout', 'AuthController@logout')->name('userLogout');
    Route::post('refresh', 'AuthController@refresh')->middleware('auth');
    Route::post('me', 'AuthController@me')->middleware('auth');
    Route::post('register', 'AuthController@Register')->name('usersRegister');

});
Route::resource('categories','ApiCategoriesController');
Route::resource('subcategories','ApiSubcategoriesController');
Route::resource('ourproducts','ApiProductController');
