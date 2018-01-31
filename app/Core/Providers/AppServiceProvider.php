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
    }

    public function registerDevServiceProviders()
    {

    }

    public function registerProdServiceProviders()
    {
        
    }
}
