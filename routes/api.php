<?php

Route::group(['prefix' => 'auth'], function () {

    Route::post('login', 'AuthController@login')->name('usersLogin');
    Route::post('logout', 'AuthController@logout')->name('userLogout');
    Route::post('refresh', 'AuthController@refresh')->middleware('auth');
    Route::post('me', 'AuthController@me')->middleware('auth');
    Route::post('register', 'AuthController@Register')->name('usersRegister');
    Route::patch('editprofile','AuthController@editProfile');
    Route::patch('editaddress','AuthController@editAddress');
    Route::patch('changepassword','AuthController@changePassword');

});
Route::resource('categories','ApiCategoriesController');
Route::resource('subcategories/{categories}/categories','ApiSubcategoriesController');
Route::resource('subcategories/{products}/ourproducts','ApiProductController');
Route::resource('offers','ApiOfferController');
Route::post('cart','ApiCartController@addCart');
Route::patch('updatecart','ApiCartController@updateCart');