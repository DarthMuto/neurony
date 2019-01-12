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

Route::get('', function() {
	return view('home');
});

Route::get('logout', 'AccountController@logout');

Route::get('register', 'AccountController@registerForm');
Route::post('register', 'AccountController@register');

Route::get('login', 'AccountController@loginForm')->name('user-login');
Route::post('login', 'AccountController@login');
Route::group(['middleware' => 'auth:web,user-login'], function() {
	Route::get('profile', 'ProfileController@profile');
	Route::get('profile/new-thread', 'ProfileController@threadEditForm');
	Route::post('profile/thread', 'ProfileController@saveThread');
	Route::get('profile/thread/{id}', 'ProfileController@threadEditForm');
	Route::get('threads/{order?}', 'ThreadsController@threads');
	Route::get('thread/{id}', 'ThreadsController@thread');
	Route::post('thread/{id}', 'ThreadsController@saveComment');
});


Route::get('admin/login', 'AdminController@loginForm')->name('admin-login');
Route::post('admin/login', 'AdminController@login');
Route::group(['middleware' => 'auth:admin,admin-login', 'prefix' => 'admin'], function() {
	Route::get('', 'AdminController@index');
	Route::post('delete', 'AdminController@deleteThreads');
	Route::get('logout', 'AdminController@logout');
});

