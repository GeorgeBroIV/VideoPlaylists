<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Authentication routes
|--------------------------------------------------------------------------
*/
    // WebApp authentication (login, redirects, etc)
    Auth::routes();

    // The 'get' route handles what would normally result in an untrapped error (e.g. a user right-clicking "Logout" and opening in a new tab).
    Route::get('/logout', 'Auth\LogoutController@logout')->name('logout');
    Route::post('/logout', 'Auth\LogoutController@logout')->name('logout');

/*
|--------------------------------------------------------------------------
| View routes
|--------------------------------------------------------------------------
*/
    // Welcome view
    Route::get('/', 'WelcomeController@index');
    Route::get('/welcome', 'WelcomeController@index')->name('welcome');

    // Home view
    Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

    // User views
    Route::resource('/users', 'UserController')->middleware('auth');

    // Social API view
    Route::get('/api', 'Social\APIController@index')->middleware('auth')->name('api');

    // Social API Scope view
    Route::get('/scopes', 'Social\ScopeController@index')->middleware('auth')->name('scopes');

    // Social Login (WebApp) view
    Route::get('/loginprovider','Social\LoginController@index')->name('loginprovider')->middleware('auth');

    // Social Provider view
    Route::get('/providers', 'Social\ProviderController@index')->middleware('auth')->name('providers');
//  Route::get('/providers/create', 'ProviderController@create');

/*
|--------------------------------------------------------------------------
| Social Provider routes
|--------------------------------------------------------------------------
*/
    // Called from Auth\LoginController@show "sendFailedResponse" method
    Route::get('/auth/social', 'Social\LoginController@login')->name('social.login');

    // Called from View "auth.provider.index" when user clicks one of the Social Provider Login buttons
    Route::post('/oauth', 'Social\LoginController@login')->name('social.oauth');

    // Social Provider Callback
    Route::get('/oauth/{driver}/callback', 'Social\LoginController@callback')->name('social.callback');
//    Route::get('/oauth/{driver}/callback', 'Auth\LoginController@index')->name('social.callback');
    // Test Route for Google Login Button
//  Route::get('/google', 'GooglePlaylistsController@index');
Route::get('/google', 'Social\GoogleUserController@index');
