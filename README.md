# laravel-jwt
A PHP-JWT wrapper for Laravel
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

## Publish assets

`$ php artisan vendor:publish --provider='Consilience\LaravelJWT\LaravelJWTServiceProvider'`


---

# Usage

*__placeholder__*