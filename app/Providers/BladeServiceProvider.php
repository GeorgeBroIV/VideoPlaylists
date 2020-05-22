<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    // To add custom Blade directives:
    // 1. php artisan make:provider BladeServiceProvider
    // 2. Then add to /config/app.php in 'providers' array
    // 3. App\Providers\BladeServiceProvider::class
    // 4. Add 'use Illuminate\Support\Facades\Blade;
    // 5. In 'boot' method create the custom Blade directive,
    //    e.g. Blade::directive('message_type', function($type_id) {
    //    return "<input id=\"message_type\" type=\"hidden\" name=\"type_id\" value=\"{$type_id}\">";});
    //    In this case, in Blade, we can use like @message_type(1)
    // 6. In PHPStorm, https://www.jetbrains.com/help/phpstorm/laravel.html#configuring-blade-templates
    //    - and remember to 'php artisan view:clear

    /**
     * Bootstrap services.
     *
     * @return string
     */
    public function boot()
    {

    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
