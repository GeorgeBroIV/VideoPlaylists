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

        // verified
        Blade::if('verified', function () {
            return auth()->check() && isset(auth()->user()->email_verified_at);
        });

        // hasRole
        Blade::directive('hasRole', function ($role) {
            return "<?php if(auth()->check() && auth()->user()->hasRole({$role})) : ?>";
        });
        Blade::directive('endRole', function ($role) {
            return "<?php endif; ?>";
        });

        // Visibility
        Blade::directive('isVisible',function() {
            $isVisible = false;
            // check to see if 'isVisible' is true
            if(Auth()->user()->isVisible()) {
                $isVisible = true;
            }
            return "<?php if ($isVisible) { ?>";
        });
        Blade::directive('endVisible', function() {
            return "<?php } ?>";
        });
    }
}
