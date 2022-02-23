## About Socialite

Laravel socialite is a package, which is help you to login or register your user with google, facebook, linkined, github easily. Follow below process for setup socialite in laravel project.

## Create a laravel project.

## Create database in ENV.

## Now Install Breeze:

```php

composer require laravel/breeze --dev

```

```php

php artisan breeze:install
 
npm install
npm run dev

```
## Now add 2 field in User database table:

```php

$table->string('provider')->nullable();
$table->string('provider_id')->nullable();

```

```php 

php artisan migrate

```

## Now go to config/service.php and google and facebook app keys:

```php

'google' => [
    'client_id' => '***************************************.apps.googleusercontent.com',
    'client_secret' => '***************************',
    'redirect' => 'http://localhost:8000/callback/google',
  ],
```

```php

'facebook' => [
  'client_id' => '****************',
  'client_secret' => '*********************************',
  'redirect' => 'http://localhost:8000/login/callback/facebook',
],

```

## Install Laravel Socialite Package for social login.

```php  

composer require laravel/socialite 

```

## Now go to config/app.php file for register socialite in provider and aliases array:

```php

'providers' => [

Laravel\Socialite\SocialiteServiceProvider::class,

]

```

```php

'aliases' => [
  
'Socialite' => Laravel\Socialite\Facades\Socialite::class,

]

```

## Go to config/service.php 

```php

'google' => [
  'client_id' => 'Google ID',
  'client_secret' => 'Google key',
  'redirect' => 'http://localhost:8000/callback/google',
],

```

```php

'facebook' => [
  'client_id' => 'facebook id',
  'client_secret' => 'facebook key',
  'redirect' => 'http://localhost:8000/login/callback/facebook',
],

```
## Create Controller for gmail and facebook.

```php

php artisan make:controller GoogleController

```
```php

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response,File;
use Laravel\Socialite\Facades\Socialite;
use App\User;

class GoogleLoginController extends Controller
{
    public function redirect($provider){
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider){
        $getInfo = Socialite::driver($provider)->user();
     
        $user = $this->createUser($getInfo,$provider);
     
        auth()->login($user);
     
        return redirect()->to('/home');
    }

    function createUser($getInfo,$provider){
 
        $user = User::where('provider_id', $getInfo->id)->first();
        
        if (!$user) {
            $user = User::create([
               'name'     => $getInfo->name,
               'email'    => $getInfo->email,
               'password' => encrypt('user@123'),
               'provider' => $provider,
               'provider_id' => $getInfo->id
           ]);
         }
         return $user;
    }
}


```
```php

php artisan make:controller FacebookController

```

```php

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\User;
use Illuminate\Support\Facades\Hash;

class FacebookLoginController extends Controller
{
    public function redirectToProvider($provider){

        return Socialite::driver($provider)->redirect();
    }

    public function handelRedirectCallback($provider){

        $getInfo = Socialite::driver($provider)->user();
     
        $user = $this->createUser($getInfo,$provider);
     
        auth()->login($user);
     
        return redirect()->to('/home');
    }

    function createUser($getInfo,$provider){
 
        $user = User::where('provider_id', $getInfo->id)->first();
        
        if (!$user) {
            $user = User::create([
               'name'     => $getInfo->name,
               'email'    => $getInfo->email,
               'password' => encrypt('user@123'),
               'provider' => $provider,
               'provider_id' => $getInfo->id
           ]);
        }
        return $user;
    }
}
```

## Now Create web route:

```php

Route::get('/auth/redirect/{provider}', 'GoogleLoginController@redirect');
Route::get('/callback/{provider}', 'GoogleLoginController@callback');

Route::get('/auth/redirect/{provider}', 'FacebookLoginController@redirectToProvider');
Route::get('/login/callback/{provider}', 'FacebookLoginController@handelRedirectCallback');

```


<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>





