<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();
// Auth::routes(['verify' => true]);

Route::get('/verify', 'Auth\RegisterController@verifyUser')->name('verify.user');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/auth/redirect/{provider}', 'GoogleLoginController@redirect');
Route::get('/callback/{provider}', 'GoogleLoginController@callback');

Route::get('/auth/redirect/{provider}', 'FacebookLoginController@redirectToProvider');
Route::get('/login/callback/{provider}', 'FacebookLoginController@handelRedirectCallback');