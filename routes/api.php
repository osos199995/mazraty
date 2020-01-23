<?php

Route::group(['prefix' => 'auth'], function () {

    Route::post('login', 'AuthController@login')->name('usersLogin');
    Route::post('logout', 'AuthController@logout')->name('userLogout');
    Route::post('refresh', 'AuthController@refresh')->middleware('auth');
    Route::post('me', 'AuthController@me')->middleware('auth');
    Route::post('register', 'AuthController@Register')->name('usersRegister');
    Route::patch('editprofile','AuthController@editProfile')->middleware('auth');
    Route::patch('editaddress','AuthController@editAddress')->middleware('auth');
    Route::patch('changepassword','AuthController@changePassword')->middleware('auth');
    Route::Patch('varify/{user_id}','AuthController@verify')->middleware('auth');
    Route::post('forgot', 'AuthController@forgot');
});


Route::resource('categories','ApiCategoriesController');
Route::get('subcategories/{category}/categories','ApiSubcategoriesController@index');
Route::resource('subcategories/{products}/ourproducts','ApiProductController');
Route::resource('offers','ApiOfferController');
Route::get('search','ApiSearchController@Search');


Route::group(['middleware' => 'auth'], function () {
Route::post('cart','ApiCartController@addCart');
Route::patch('updatecart/{cartUpdate}','ApiCartController@updateCart');
Route::get('getcart/{user_id}','ApiCartController@getCart');
Route::delete('deletecart/{cart_id}','ApiCartController@deleteCart');

});
