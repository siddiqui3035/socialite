## About Socialite

Laravel socialite is a package, which is help you to login or register your user with google, facebook, linkined, github easily. Follow below process for setup socialite in laravel project.

## 1. Create a laravel project.

## 2. Create database in ENV.

## 3. Install Laravel Socialite Package for social login.

```php  

    composer require laravel/socialite 

```
## 4. Go to config/app.php register Socialite in provider 

```php
    Laravel\Socialite\SocialiteServiceProvider::class,

    Go to config/app.php register Socialite in aliases
    'Socialite' => Laravel\Socialite\Facades\Socialite::class,
```
## 5. Go to config/service.php 

```php
      'google' => [
        'client_id' => 'Google ID',
        'client_secret' => 'Google key',
        'redirect' => 'http://127.0.0.1:8000/callback/google',
      ],

      'facebook' => [
        'client_id' => 'facebook id',
        'client_secret' => 'facebook key',
        'redirect' => 'http://localhost:8000/login/callback/facebook',
      ],

```
## 6. Create Controller for gmail and facebook.

```php

    php artisan make:controller GoogleController

```
```php

    php artisan make:controller FacebookController

```


<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>





