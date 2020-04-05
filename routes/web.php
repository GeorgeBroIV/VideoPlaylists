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

Route::get('/', function () {
	return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('auth/social', 'Auth\LoginProviderController@show')->name('social.login');
Route::get('oauth/{driver}', 'Auth\LoginProviderController@redirectToProvider')->name('social.oauth');
Route::get('oauth/{driver}/callback', 'Auth\LoginProviderController@handleProviderCallback')->name('social.callback');

Route::get('loginprovider','Auth\LoginProviderController@show')->name('loginprovider');
	
// This route handles what would normally result in an untrapped error
// (e.g. a user right-clicking "Logout" and opening in a new tab).
Route::get('logout', 'Auth\LogoutController@logout')->name('logout');
// This route triggers during a normal logout process.
Route::post('logout', 'Auth\LogoutController@logout')->name('logout');