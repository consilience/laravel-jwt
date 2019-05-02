<?php

namespace Consilience\LaravelJWT;

use Validator;
use Firebase\JWT\JWT;

/**
 * The JWTService Class handles creation/decoding/encoding of JWTs.
 */
class JWTService
{
    public $key;
    public $algo;

    // TODO: Bind this as a singleton to the service container.

    public function __construct()
    {
        $this->key = config('jwt.secret');
        $this->algo = config('jwt.algo');

        JWT::$leeway = config('jwt.leeway');
    }

    public function createToken($payload, $headers, $keyId)
    {
        // Small function to create a JWT.
        // Encodes provided payload
        $jwt = JWT::encode($payload, $this->key, $this->algo, $keyId, $headers);
        
        // TODO: Add exp time to options
        return $jwt;
    }

    public function parseToken(string $jwt)
    {
        // Handles parsing of tokens, based on algorithm types.
        // First we check what the algorithm type is.
        if ($this->algo === 'HS256' || $this->algo === 'HS384' || $this->algo === 'HS512') {
            // Doesn't require certificates.
            $payload = JWT::decode($jwt, $this->key, [$this->algo]);
        } else {
            // Does require certificates.

            // $privateKeyPath = base_path(config('jwt.keys.private'));
            $publicKeyPath = base_path(config('jwt.keys.public'));

            // $privateKey = file_get_contents($privateKeyPath);
            $publicKey = file_get_contents($publicKeyPath);
            
            $payload = JWT::decode($jwt, $publicKey, [$this->algo]);
        }

        return $payload;
    }

    public function validateToken($jwt, array $rules)
    {
        // This allows you to run some custom validation against the payload of a JWT.
        // Pass some rules (Standard Laravel validation logic) and the JWT.
        $validator = Validator::make((array)$jwt, $rules);

        if ($validator->fails()) {
            return false;
        }

        return true;
    }
}