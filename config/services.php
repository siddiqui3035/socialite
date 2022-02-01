<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'google' => [
        'client_id' => '731298131735-bn71b5r1r2g48tiljtegvshumen3el0q.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://127.0.0.1:8000/callback/google',
      ],

      'facebook' => [
        'client_id' => '3053216444893975',
        'client_secret' => '7dd5094bf2aae19eb7160d240c276652',
        'redirect' => 'http://localhost:8000/login/callback/facebook',
      ],

    // 'facebook' => [
    //     'client_id' => env('FACEBOOK_CLIENT_ID'),
    //     'client_secret' => env('FACEBOOK_CLIENT_SECRET'),
    //     'redirect' => 'http://localhost:8000/login/callback/facebook',
    // ],

];
