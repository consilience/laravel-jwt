# laravel-jwt
### A PHP-JWT wrapper for Laravel
---


# Installation

## Composer

`$ composer require consilience/laravel-jwt`

## Manual Install

### Clone Laravel JWT

`$ git clone https://github.com/consilience/laravel-jwt /path/to/project/packages/`

`$ cd /path/to/project/`

### Add to Project's Composer Config

`$ nano composer.json` (Or edit with your preferred editor)

Add the following to your _repositories_ array, or create it if it doesn't exist:

```json
"repositories": {
    "dev-package": {
        "type": "path",
        "url": "./packages/consilience/laravel-jwt",
        "options": {
            "symlink": true
        }
    }
}
```

Add the following to your _require_ array:

```json
"require": {
    "consilience/laravel-jwt": "*"
},
```

Dump composer's autoload cache

```bash
$ composer dump-autoload
$ composer install
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