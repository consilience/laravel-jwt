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

## Publish assets

`$ php artisan vendor:publish --provider='Consilience\LaravelJWT\LaravelJwtServiceProvider'`

---

# Usage

First you'll want to import the class.

```php
    use Consilience\LaravelJWT\JWTService;
```

Now create an instance of the JWTService to use.

```php
    $jwt = new JWTService();
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
