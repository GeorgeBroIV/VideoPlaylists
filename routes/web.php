<?php

    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Authentication routes
|--------------------------------------------------------------------------
*/
    // WebApp authentication (login, redirects, etc)
    Auth::routes(['verify' => true]);

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

    // Social API view
    Route::get('/api', 'Social\APIController@index')->middleware('verified')->name('api');

    // Social API Scope view
    Route::get('/scopes', 'Social\ScopeController@index')->middleware('verified')->name('scopes');

    // Social Login (WebApp) view
    Route::get('/socialLogin','Social\LoginController@index')->name('socialLogin')->middleware('auth');

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
//Route::get('/{driver}', 'GoogleController@index');

/*
|--------------------------------------------------------------------------
| Admin routes
|--------------------------------------------------------------------------
*/
    // Admin view
// TODO Develop route variables
//    Route::get('/admin/{slug}', 'Admin\SlugController@index')->name('admin');

    // User views
    Route::resource('/admin/users', 'Admin\UserController')->middleware('verified');

    // Social Provider view
    Route::get('/providers', 'Social\SocialProviderController@index')->middleware('verified')->name('providers');
//  Route::get('/providers/create', 'ProviderController@create');

    // Profile Routes (middleware is in 'ProfileController _construct method)
    Route::get('/profile', 'Admin\ProfileController@index')->name('profile')->middleware('auth');
    Route::post('/profile/update', 'Admin\ProfileController@updateProfile')->name('profile.update')->middleware('auth');

/*
|--------------------------------------------------------------------------
| Legal routes
|--------------------------------------------------------------------------
*/
    // WebApp Privacy Policy
    Route::get('/privacy', 'LegalController@privacy');

    // WebApp Terms of Service
    Route::get('/tos', 'LegalController@tos');
