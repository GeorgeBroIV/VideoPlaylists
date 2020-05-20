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
        // https://laravel.com/docs/7.x/blade#custom-if-statements
        // PHPStorm .. Settings .. Languages & Frameworks .. PHP .. Blade .. Directives
        Blade::if('verified', function () {
            return auth()->check() && isset(auth()->user()->email_verified_at);
        });
    }
}
