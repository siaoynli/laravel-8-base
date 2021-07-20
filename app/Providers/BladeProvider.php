<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     * 自定义blade 语法
     * @return void
     */
    public function boot(): void
    {
        //@admin
        //@else
        //@endadmin
        Blade::if('admin', fn() => Auth::check() && Auth::user()->isAdmin());
    }
}
