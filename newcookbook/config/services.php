<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */
    'facebook' => [
    'client_id' => '1288629824547339',
    'client_secret' => '7129fd5d5410f39ead714f68877925cf',
    'redirect' => 'http://newcookbook.app/login/facebook/callback',
    ],

    'mailgun' => [
    'domain' => env('MAILGUN_DOMAIN'),
    'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
    'key' => env('SES_KEY'),
    'secret' => env('SES_SECRET'),
    'region' => 'us-east-1',
    ],

    'sparkpost' => [
    'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
    'model' => App\User::class,
    'key' => env('STRIPE_KEY'),
    'secret' => env('STRIPE_SECRET'),
    ],

    ];
