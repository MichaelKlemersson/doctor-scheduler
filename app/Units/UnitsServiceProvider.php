<?php

namespace DoctorScheduler\Units;

use Illuminate\Support\ServiceProvider;

class UnitsServiceProvider extends ServiceProvider
{
    protected $providers = [
        // Api
        \DoctorScheduler\Units\Api\Providers\RouteServiceProvider::class,

        // Dashboard
        \DoctorScheduler\Units\Dashboard\Providers\RouteServiceProvider::class,
    ];

    public function boot()
    {
    }

    public function register()
    {
        foreach ($this->providers as $provider) {
            $this->app->register($provider);
        }
    }
}
