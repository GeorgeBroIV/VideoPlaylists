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
    Route::get('/api', 'APIController@index')->middleware('auth')->name('api');

    // Social API Scope view
    Route::get('/scopes', 'ScopeController@index')->middleware('auth')->name('scopes');

    // Social Login (WebApp) view
    Route::get('/loginprovider','Auth\LoginProviderController@index')->name('loginprovider')->middleware('auth');

    // Social Provider view
    Route::get('/providers', 'ProviderController@index')->middleware('auth')->name('providers');
//  Route::get('/providers/create', 'ProviderController@create');

/*
|--------------------------------------------------------------------------
| Social Provider routes
|--------------------------------------------------------------------------
*/
    // Called from Auth\LoginProviderController@show "sendFailedResponse" method
    Route::get('/auth/social', 'Auth\LoginProviderController@show')->name('social.login');

    // Called from View "provider.index" when user clicks Social Provider Login
    Route::post('/oauth', 'Auth\LoginProviderController@show')->name('social.oauth');

    // Social Provider Callback
    Route::get('/oauth/{driver}/callback', 'Auth\LoginProviderController@handleProviderCallback')->name('social.callback');

    // Test Route for Google Login Button
//  Route::get('/google', 'GetGooglePlaylistsController@index');
