<?php

namespace Consilience\LaravelJWT;

// use Validator;
// use Firebase\JWT\JWT;

class JWTService
{
    // public $key;
    // public $algo;

    // TODO: Bind this as a singleton to the service container.

    public function __construct()
    {
        // $this->key = config('jwt.secret');
        // $this->algo = config('jwt.algo');

        // JWT::$leeway = config('jwt.leeway');
    }

    // public function createToken($payload)
    // {
    //     $jwt = JWT::encode($payload, $this->key, $this->algo);

    //     return $jwt;
    // }

    // public function parseToken(string $jwt)
    // {
    //     if ($this->algo === 'HS256' || $this->algo === 'HS384' || $this->algo === 'HS512') {
    //         $payload = JWT::decode($jwt, $this->key, [$this->algo]);
    //     } else {
    //         // $privateKeyPath = base_path(config('jwt.keys.private'));
    //         $publicKeyPath = base_path(config('jwt.keys.public'));

    //         // $privateKey = file_get_contents($privateKeyPath);
    //         $publicKey = file_get_contents($publicKeyPath);
            
    //         $payload = JWT::decode($jwt, $publicKey, [$this->algo]);
    //     }

    //     return $payload;
    // }

    // public function validateToken($jwt, array $rules)
    // {
    //     $validator = Validator::make((array)$jwt, $rules);

    //     if ($validator->fails()) {
    //         return false;
    //     }

    //     return true;
    // }
}