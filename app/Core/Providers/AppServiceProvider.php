<?php

namespace DoctorScheduler\Core\Providers;

use Illuminate\Support\ServiceProvider;
use DoctorScheduler\Units\UnitsServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ('production' === env('APP_ENV', 'development')) {
            $this->registerProdServiceProviders();
        } else {
            $this->registerDevServiceProviders();
        }

        $this->app->register(UnitsServiceProvider::class);
        // $this->app->register(\Artesaos\Defender\Providers\DefenderServiceProvider::class);
    }

    public function registerDevServiceProviders()
    {
        $this->app->register(\Barryvdh\Debugbar\ServiceProvider::class);
        $this->app->alias('Debugbar', \Barryvdh\Debugbar\Facade::class);
    }

    public function registerProdServiceProviders()
    {
    }
}
