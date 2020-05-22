<?php

    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Route;

    /*
    |--------------------------------------------------------------------------
    | Guest routes
    |--------------------------------------------------------------------------
    */
        // Welcome view
        Route::get('/', 'WelcomeController@index');
        Route::get('/welcome', 'WelcomeController@index')->name('welcome');

        // WebApp Privacy Policy and Terms of Service
        Route::get('/privacy', 'Help\LegalController@privacy')->name('privacy');
        Route::get('/tos', 'Help\LegalController@tos')->name('tos');

    /*
    |--------------------------------------------------------------------------
    | Registered routes
    |--------------------------------------------------------------------------
    */

        // WebApp authentication (login, redirects, etc)
        Auth::routes(['verify' => true]);
        Route::get('/email/verify', 'Auth\VerificationController@show')->name('verify');


        // Home view
        Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

        // The 'get' route handles what would normally result in an untrapped error (e.g. a user right-clicking "Logout" and opening in a new tab).
        Route::get('/logout', 'Auth\LogoutController@logout')->name('logout')->middleware('auth');
        Route::post('/logout', 'Auth\LogoutController@logout')->name('logout')->middleware('auth');

    /*
    |--------------------------------------------------------------------------
    | Verified routes
    |--------------------------------------------------------------------------
    */

        // Profile Routes
        Route::get('/profile', 'Profile\ProfileController@index')->name('profile')->middleware('verified');
        Route::post('/profile/edit', 'Profile\ProfileController@edit')->name('profile.edit')->middleware('verified');

        // Social API view
        //    Route::get('/api', 'Social\APIController@index')->middleware('verified')->name('api');

        // Social API Scope view
        //    Route::get('/scopes', 'Social\ScopeController@index')->middleware('verified')->name('scopes');

        // Social Login (WebApp) view
        //    Route::get('/socialLogin','Social\LoginController@index')->name('socialLogin')->middleware('auth');

        // Called from Auth\LoginController@show "sendFailedResponse" method
        //    Route::get('/auth/social', 'Social\LoginController@login')->name('social.login');

        // Called from View "auth.provider.index" when user clicks one of the Social Provider Login buttons
        //    Route::post('/oauth', 'Social\LoginController@login')->name('social.oauth');

        // Social Provider Callback
       //    Route::get('/oauth/{driver}/callback', 'Social\LoginController@callback')->name('social.callback');
        //    Route::get('/oauth/{driver}/callback', 'Auth\LoginController@index')->name('social.callback');
        // Test Route for Google Login Button
        //  Route::get('/google', 'GooglePlaylistsController@index');
        //Route::get('/{driver}', 'GoogleController@index');

    /*
    |--------------------------------------------------------------------------
    | Reviewer routes
    |--------------------------------------------------------------------------
    */
        // To Define Here

    /*
    |--------------------------------------------------------------------------
    | Admin routes
    |--------------------------------------------------------------------------
    */
        // User views
        Route::resource('/admin/users', 'Admin\UserController')->middleware('isAdmin');

        // Social Provider view
        //    Route::get('/providers', 'Social\SocialProviderController@index')->middleware('verified')->name('providers');
        //  Route::get('/providers/create', 'ProviderController@create');
