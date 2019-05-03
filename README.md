# laravel-jwt
### A PHP-JWT wrapper for Laravel
---


# Installation

## Composer

    composer require consilience/laravel-jwt

or more likely:

    composer require consilience/laravel-jwt dev-master

Until released on packagist, include the repository in your `composer.json`:

```json
    "repositories": [
        {
            "type": "vcs",
            "url": "git@github.com:consilience/laravel-jwt.git"
        }
    ]
```

## Laravel

### Publish Assets

`$ php artisan vendor:publish --provider='Consilience\LaravelJwt\LaravelJwtServiceProvider'`

## Lumen

### Publish the Assents

Manually copy the config file:

    cp vendor/consilience/laravel-jwt/config/jwt.php config/jwt.php

In `bootstrap/app.php`:

    $app->configure('jwt');

### Register the Service Provider

In `bootstrap/app.php`:

    $app->register(Consilience\LaravelJwt\LaravelJwtServiceProvider::class);

### Create a Facade

In `bootstrap/app.php`:

```php
if (! class_exists('JwtService')) {
    class_alias('Consilience\LaravelJwt\JwtServiceFacade', 'JwtService');
}
```
---

# Configuration

If you're using certificates for encoding/decoding JWTs, you'll need to specify the path to those files.

JWT_SECRET=some-long-string
JWT_LEEWAY_SECONDS=600
JWT_ALGO=hs256
JWT_PUBLIC_KEY='storage/app/certs/somefile.cer'
JWT_PRIVATE_KEY='storage/app/certs/somefile.pem'
JWT_PASSPHRASE=some-long-string

---

# Usage

First you'll want to import the class.

```php
    use Consilience\LaravelJwt\JwtService;
```

Now create an instance of the JwtService to use.

```php
    $jwt = new JwtService();
```

Now you have access to the following methods:

 * __parseToken()__ - Attempt to decode a token, returns the token's payload.
```php
    $payload = $jwt->parseToken($token);
```

 * __createToken()__ - Create a new JWT from provided payload.
```php
    $payload = array(
        "sub" => "1234567890",
        "name" => "John Doe",
        "iat" => 1516239022
    );

    $new_jwt = $jwt->createToken($payload);
```

 * __validateToken()__ - Pass some built-in Laravel validation rules to validate the contents of a JWT.
```php
    $rules = [
        'sub' => 'required|string|max:15',
        'name' => 'required|string|max:20',
        'iat' => 'required|numeric|max:10'
    ];
    $success = $jwt->validateToken($token, $rules);
```
