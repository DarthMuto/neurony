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

Route::get('', function(){
	return view('home');
});

Route::get('logout', 'AccountController@logout');

Route::get('register', 'AccountController@registerForm');
Route::post('register', 'AccountController@register');

Route::get('login', 'AccountController@loginForm');
Route::post('login', 'AccountController@login');

// {{{ todo: auth middleware
Route::get('profile', 'ForumController@profile');
Route::get('profile/new-thread', 'ForumController@threadEditForm');
Route::post('profile/thread', 'ForumController@saveThread');
Route::get('profile/thread/{id}', 'ForumController@threadEditForm');
// }}}
