<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class PermissionsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     *
     */
    public function boot()
    {
        //Blade directives
        Blade::directive('role', function ($role) {
            return "<?php if(auth()->check() && auth()->user()->hasRole({$role})) : ?>";
        });
        Blade::directive('endrole', function ($role) {
            return "<?php endif; ?>";
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
