<?php

namespace Consilience\LaravelJWT;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class LaravelJwtServiceProvider extends BaseServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/jwt.php' => $this->configPath('jwt.php'),
        ], 'config');
    }

    public function register()
    {
        // ...
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
