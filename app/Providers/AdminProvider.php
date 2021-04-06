<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Library\Admin\Auth;

class AdminProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Auth::class, function ($app) {
            return new Auth();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
