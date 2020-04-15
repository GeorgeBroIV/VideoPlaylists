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

//  BaseURI 'Welcome Page'
    Route::get('/', 'WelcomeController@index');
	Route::get('/welcome', 'WelcomeController@index')->name('welcome');

//  Named routes https://laravel.com/docs/7.x/routing#named-routes
	Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

//  The 'get' route handles what would normally result in an untrapped error (e.g. a user right-clicking "Logout" and opening in a new tab).
	Route::get('/logout', 'Auth\LogoutController@logout')->name('logout');
	Route::post('/logout', 'Auth\LogoutController@logout')->name('logout');

//  Routes WebApp 'users' requests (user information CRUD)
Route::resource('/users', 'UserController')->middleware('auth');

//  Routes WebApp 'providers' requests
Route::get('/providers', 'ProviderController@index')->middleware('auth')->name('providers');

//  Routes WebApp 'scopes' requests
Route::get('/scopes', 'ScopeController@index')->middleware('auth')->name('scopes');

//  Routes WebApp 'loginprovider' requests (user information CRUD)
Route::get('/loginprovider','Auth\LoginProviderController@index')->name('loginprovider')->middleware('auth');

/*
|--------------------------------------------------------------------------
| Web Routes Under Development
|--------------------------------------------------------------------------
*/

Route::get('/auth/social', 'Auth\LoginProviderController@show')->name('social.login');
Route::post('/oauth', 'Auth\LoginProviderController@show')->name('social.oauth');
Route::get('/oauth/{driver}/callback', 'Auth\LoginProviderController@handleProviderCallback')->name('social.callback');

//  Test Route for Google Login Button
    Route::get('/google', 'GetGooglePlaylistsController@index');

//  Route::get('/providers/create', 'ProviderController@create');
