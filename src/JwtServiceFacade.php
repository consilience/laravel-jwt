<?php

namespace Consilience\LaravelJwt;

use Illuminate\Support\Facades\Facade;

class JwtServiceFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return JwtServiceProvider::CONTAINER_KEY;
    }
}
