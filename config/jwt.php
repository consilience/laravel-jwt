<?php

return [
    'secret' => env('JWT_SECRET'),
    'leeway' => env('JWT_LEEWAY_SECONDS', 60),
    'algo' => env('JWT_ALGO', 'HS256'),

    'keys' => [
        'public' => env('JWT_PUBLIC_KEY'),
        'private' => env('JWT_PRIVATE_KEY'),
        'passphrase' => env('JWT_PASSPHRASE'),
    ],
];
