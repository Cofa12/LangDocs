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
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'google'=> [
        'client_id'=>'985783464386-8lr9ne6a6k7ouhj8aan81q3m7thuv15k.apps.googleusercontent.com',
        'client_secret'=>'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',
        'redirect'=> 'http://127.0.0.1:8000/google/responseData'
    ],
    'github'=> [
    'client_id'=>'7d702b7eed52f8e3a021',
    'client_secret'=>'02b750e78e70d4775620d6ef669f142055247b05',
    'redirect'=> 'http://127.0.0.1:8000/github/responseData'
    ],
    'linkedin'=> [
        'client_id'=>'77az1f0yuzjl8n',
        'client_secret'=>'z6SMnTKJG8Pdg4lb',
        'redirect'=> 'http://127.0.0.1:8000/linkedin/responseData'
    ],


];
