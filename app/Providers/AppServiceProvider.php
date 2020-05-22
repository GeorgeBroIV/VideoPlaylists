<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
	    $this->app->bind('path.public', function() { return base_path().'/public_html'; });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /* Custom Blade Directives */
        /* I want to have these in app\Providers\BladeServiceProvider.php */
        //
        // https://laravel.com/docs/7.x/blade#custom-if-statements
        // PHPStorm .. Settings .. Languages & Frameworks .. PHP .. Blade .. Directives

        // hasRole
        Blade::if('hasRole', function ($role) {
            return auth()->check() && auth()->user()->hasRole($role);
        });
        // Visibility
        Blade::if('isVisible', function () {
            $isVisible = false;
            // check to see if 'isVisible' is true
            if(Auth()->user()->isVisible()) {
                $isVisible = true;
            }
            return $isVisible;
        });
        // Verified
        Blade::if('isVerified', function () {
            return auth()->check() && isset(auth()->user()->email_verified_at);
        });
        // Reviewer
        Blade::if('isReviewer', function () {
            return auth()->check() && auth()->user()->hasRole('Reviewer');
        });
        // Admin
        Blade::if('isAdmin', function () {
            return auth()->check() && auth()->user()->hasRole('Admin');
        });
    }
}
