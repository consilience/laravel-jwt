<?php

namespace Consilience\LaravelJWT;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class LaravelJwtServiceProvider extends BaseServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/jwt.php' => config_path('jwt.php'),
        ], 'config');
    }

    public function register()
    {
        // ...
    }
}