<?php

namespace Consilience\LaravelJwt;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class JwtServiceProvider extends BaseServiceProvider
{
    const CONTAINER_KEY = 'consilience-jwt-serivce';

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/jwt.php' => $this->configPath('jwt.php'),
        ], 'config');
    }

    public function register()
    {
        $this->app->singleton(static::CONTAINER_KEY, function ($app) {
            return new JwtService();
        });
    }

    /**
     * Provide support for Lumen's lack of config_path()
     */
    public function configPath(string $path = '')
    {
        if (function_exists('config_path')) {
            return config_path($path);
        }

        return app()->basePath() . '/config' . ($path ? '/' . $path : $path);
    }
}
