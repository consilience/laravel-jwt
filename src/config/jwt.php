<?php

return [
    'secret' => env('JWT_SECRET'),
    'leeway' => env('JWT_LEEWAY_SECONDS', 60),
    'algo' => env('JWT_ALGO', 'RS256'),

    'keys' => [
        'public' => env('JWT_PUBLIC_KEY', 'certs/jwtRS256.key.pub'),
        'private' => env('JWT_PRIVATE_KEY', 'certs/jwtRS256.key'),
        'passphrase' => env('JWT_PASSPHRASE'),
    ],
];
