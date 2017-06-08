<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'mandrill' => [
        'secret' => env('MANDRILL_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'stripe' => [
        'model' => Shoppvel\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    
    'facebook' => [
        'client_id' => '230816087408913',
        'client_secret' => 'c0c85e3f308a4bb810c223aa3b72e76e',
        'redirect' => 'http://localhost:8000/retorno/facebook',

    ],

    'github' => [
        'client_id' => 'ff227d131748f96a58ce',
        'client_secret' => 'b32ca11b3a03d186fa3d00a71155cc03d17173d6',
        'redirect' => 'http://localhost:8000/retorno/github',
    ],

];
