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

//Route::get('/', function () {
//    return view('welcome');
//});
//


$this->get('loginadmin', 'Auth\LoginController@showLoginForm')->name('loginadmin');
$this->post('loginadmin', 'Auth\LoginController@login')->name('loginadmin');

$this->post('logoutTest', 'Auth\LogoutController@logout')->name('logoutTest');

// Registration Routes...
$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
$this->post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
$this->post('password/reset', 'Auth\ResetPasswordController@reset');
Route::get('/home', 'HomeController@index')->name('home');





Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::resource('admin-users', 'AdminUserController');
Route::resource('categories','CategoriesController');
Route::resource('/subcategory', 'SubcategoriesController');
Route::resource('/productsss', 'ProductsController');

Route::get('/sub_category/ajax/{id}','ProductsController@sub_category_ajax');

