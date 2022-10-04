<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
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
        $this->registerViews();
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

    function registerViews(){
        $this->loadViewsFrom(resource_path('views/layout/admin'), 'layout-admin');

        $this->loadViewsFrom(resource_path('views/layout/login'), 'layout-login');
        $this->loadViewsFrom(resource_path('views/components/login'), 'login');
    }
}
