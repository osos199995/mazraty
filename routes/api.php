<?php

Route::group([


    'prefix' => 'auth'

], function () {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('register', 'AuthController@Register');

});
Route::resource('categories','ApiCategoriesController');
Route::resource('subcategories','ApiSubcategoriesController');
Route::resource('ourproducts','ApiProductController');
