<?php

/**
 * jwt.php config file
 * 
 * This config file controls various aspects of how Consilience/Laravel-JWT behaves.
 */

return [
    // Secret: JWT Secret, used to encode and decode the JWTs that are being sent between servers.
    // This will have to be the same on the endcode and the decode side if you want the JWTs to be useable.
    'secret' => env('JWT_SECRET'),
    
    // Leeway: This will allow for system clocks to be out by up to X seconds.
    // Helps in situations where the machine's [that generated the JWT] clock is out of sync.
    // The leeway is on the token's expiry time.
    'leeway' => env('JWT_LEEWAY_SECONDS', 60),

    // Algo: Algorithm type used for encoding and decoding the JWTs
    'algo' => env('JWT_ALGO', 'HS256'),

    // Keys: This is for when you're using RS256, RS512, or some other certification-based encoding.
    'keys' => [
        'public' => env('JWT_PUBLIC_KEY'),
        'private' => env('JWT_PRIVATE_KEY'),
        'passphrase' => env('JWT_PASSPHRASE'),
    ],
];
