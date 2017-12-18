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

// pada {kategori} merupakan variabel dari function($kategori) 

// User Route
Route::group(['namespace' => 'User'],function(){
	//Auth User
	Auth::routes();
	Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');

	Route::get('/','HomeController@index');

	Route::get('/galeri','GaleriController@index')->name('galeri');

	Route::get('/guru','GuruController@index')->name('guru');

	Route::get('post/{post}','PostController@post')->name('post');
	
	Route::get('post/tag/{tag}','KategoriController@tag')->name('tag');
	
	Route::get('post/kategori/{kategori}','KategoriController@kategori')->name('kategori');

});



// Admin Route
Route::group(['prefix' => 'admin'], function(){
	Route::get('/home','Admin\HomeController@index')->name('admin.home');
	Route::resource('/user','Admin\UserController');
	Route::resource('/post','Admin\PostController');
	Route::resource('/tag','Admin\TagController');
	Route::resource('/kategori','Admin\KategoriController');

	//Auth Admin
	Route::get('/login', 'Admin\AuthAdmin\LoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Admin\AuthAdmin\LoginController@login')->name('admin.login.submit');
	// Route::get('/', 'Admin\AdminController@index')->name('admin.home');
	Route::get('/logout', 'Admin\AuthAdmin\LoginController@logout')->name('admin.logout');

	Route::get('/password/reset', 'Admin\AuthAdmin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
	Route::post('/password/email', 'Admin\AuthAdmin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
	Route::get('/password/reset/{token}', 'Admin\AuthAdmin\ResetPasswordController@showResetForm')->name('admin.password.reset');
	Route::post('/password/reset', 'Admin\AuthAdmin\ResetPasswordController@reset');
	
});






