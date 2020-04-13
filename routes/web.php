<?php

use Illuminate\Support\Facades\Route;

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
//  Routes WebApp authentication to the Auth resource controller
    Auth::routes();

//  Routes WebApp unauthenticated users to 'Welcome'
    Route::resource('/', 'WelcomeController');

	Route::resource('/welcome', 'WelcomeController');

//  Named routes https://laravel.com/docs/7.x/routing#named-routes
	Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

//  This route handles what would normally result in an untrapped error
//  (e.g. a user right-clicking "Logout" and opening in a new tab).
	Route::get('/logout', 'Auth\LogoutController@logout')->name('logout');
//  This route triggers during a normal logout process.
	Route::post('/logout', 'Auth\LogoutController@logout')->name('logout');

//  Routes WebApp 'users' requests (user information CRUD)
Route::resource('/users', 'UserController')->middleware('auth');

//  Routes WebApp 'providers' requests
Route::get('/providers', 'ProviderController@index')->middleware('auth');

//  Routes WebApp 'loginprovider' requests (user information CRUD)
Route::get('/loginprovider','Auth\LoginProviderController@index')->name('loginprovider')->middleware('auth');

/*
|--------------------------------------------------------------------------
| Web Routes Under Development
|--------------------------------------------------------------------------
*/

Route::get('auth/social', 'Auth\LoginProviderController@show')->name('social.login');
Route::post('oauth', 'Auth\LoginProviderController@show')->name('social.oauth');
Route::get('oauth/{driver}/callback', 'Auth\LoginProviderController@handleProviderCallback')->name('social.callback');

//  Route::get('/providers/create', 'ProviderController@create');
