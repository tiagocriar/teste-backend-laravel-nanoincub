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
        date_default_timezone_set('America/Sao_Paulo');
    }

    function registerViews(){
        $this->loadViewsFrom(resource_path('views/layout/admin'), 'layout-admin');

        $this->loadViewsFrom(resource_path('views/layout/login'), 'layout-login');
        $this->loadViewsFrom(resource_path('views/components/login'), 'login');

        $this->loadViewsFrom(resource_path('views/components/administrador/funcionario'), 'administrador-funcionario');
        $this->loadViewsFrom(resource_path('views/components/administrador/movimentacao'), 'administrador-movimentacao');
    }
}
