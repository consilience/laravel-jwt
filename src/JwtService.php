<?php

namespace Consilience\LaravelJwt;

/**
 *
 */

use Validator;
use Firebase\JWT\JWT;

/**
 * The JWTService Class handles creation/decoding/encoding of JWTs.
 */
class JwtService
{
    /**
     * $key : Hash used for encoding/decoding a JWT - Not required if using certificate-based encoding/decoding.
     * $algo : Hashing method used for encoding/decoding a JWT
     */
    public $key;
    public $algo;

    /**
     * TODO: inject the config from the service provider.
     */
    public function __construct()
    {
        $this->key = config('jwt.secret');
        $this->algo = config('jwt.algo');

        JWT::$leeway = config('jwt.leeway');
    }

    /**
     * createToken() : Creates a JWT using provided payload and headers.
     * 
     * @param $payload : The JWT Payload
     * @param $headers : Any custom headers you wish to add to the JWT
     * @param $keyId   : Used to set the 'kid' header
     * 
     */
    public function createToken($payload, $headers = null, $keyId = null)
    {
        // Small function to create a JWT.
        // Encodes provided payload
        $jwt = JWT::encode($payload, $this->key, $this->algo, $keyId, $headers);
        
        return $jwt;
    }

    /**
     * parseToken() : Decodes a JWT
     * 
     * @param $jwt : Encoded JWT to decode.
     */
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
}
