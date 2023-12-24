<?php

use Illuminate\Support\Facades\Facade;
use Illuminate\Support\ServiceProvider;

return [

    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application. This value is used when the
    | framework needs to place the application's name in a notification or
    | any other location as required by the application or its packages.
    |
    */

    'name' => env('APP_NAME', 'Laravel'),

    /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services the application utilizes. Set this in your ".env" file.
    |
    */

    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | When your application is in debug mode, detailed error messages with
    | stack traces will be shown on every error that occurs within your
    | application. If disabled, a simple generic error page is shown.
    |
    */

    'debug' => (bool) env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    |
    | This URL is used by the console to properly generate URLs when using
    | the Artisan command line tool. You should set this to the root of
    | your application so that it is used when running Artisan tasks.
    |
    */

    'url'               => env('APP_URL', 'http://localhost'),
    'UPS_CLIENT_ID'     => env('USP_KEY', 'dgN5H2yismUK8qDfeptlkAcqgwbUjT8IRA6WSelVLXdv8Mq2'),
    'UPS_CLIENT_SECRET' => env('UPS_CLIENT_SECRET', 'ohLHYknrAjkyoNGypKvGGMfM8b6AZvbRrO1Mgmu2uUPSG6ySyCGLz9miM3A8gvoq'),
    'USP_ACCESS_TOKEN'  => env('USP_ACCESS_TOKEN', 'eyJraWQiOiI2NGM0YjYyMC0yZmFhLTQzNTYtYjA0MS1mM2EwZjM2Y2MxZmEiLCJ0eXAiOiJKV1QiLCJhbGciOiJSUzM4NCJ9.eyJzdWIiOiJsYXdpdHpAdHhsaXZlci5jb20iLCJjbGllbnRpZCI6ImRnTjVIMnlpc21VSzhxRGZlcHRsa0FjcWd3YlVqVDhJUkE2V1NlbFZMWGR2OE1xMiIsIm1lcl9pZCI6InN0cmluZyIsImlzcyI6Imh0dHBzOi8vYXBpcy51cHMuY29tIiwidXVpZCI6IkEyMTU4NzQwLTExRDgtMUU1Ni04RURFLTI3N0Q0RjQ2NEVGQiIsInNpZCI6IjY0YzRiNjIwLTJmYWEtNDM1Ni1iMDQxLWYzYTBmMzZjYzFmYSIsImF1ZCI6IlBhbiBhbmQgY29mZmVlIiwiYXQiOiI0U1pvaG9IT2FIdjIwOG04RmZ0WGFmemY1Y2o3IiwibmJmIjoxNzAzMzgzOTMyLCJEaXNwbGF5TmFtZSI6IlBhbiBhbmQgY29mZmVlIiwiZXhwIjoxNzAzMzk4MzMyLCJpYXQiOjE3MDMzODM5MzIsImp0aSI6IjQwN2FmMTNjLTZhNmQtNDYwNC05OWNkLTIxY2QxOWZiNzA2MSJ9.WE-26YwNUFZ4lqmQITZD4DSF1Xz7iW1UQxmpwqBQPAUs1TW8mDMykmcoLHxTlGJv9ODt1WnS53xSL-cH9F0h6AQmENlBs4K_HBmfd229Dg_fZp4Zd5Z8rLPd_DSHILm0_67jiVDEH6pjNoGbVQJEXufMOxj4t2difd-MHu06ywFULzYM2NEYniWm7blmDHMebrrWiEdptjcRg5tl3-UrX5iY0_cRyng2iY4f_WTmYliUJai0ok3hTWSsjztb8gEQzPotbQg_zYcdH3Mvh633oVurlbO3jaFykPzDWRsy7mrSLud74QHTVY5WTasYrZG7luOTbTWZGoPIQ1AzWeqZuXdmc4kLa9byXoS6jhbCmBNyVAkJquzzERV4zqt97Y2U0hJlOh43VUNitgRTPBS-Uz5unKfzONgLPlOesEM4EFyE_vCmNBDhSmEEXZG2NqGuDdMMMsa9Z4EzPtMF1i0k_zN6glPFk5809jKRdBY18uLbB7GNss8ktF_dCGN8iZU7KjI52vPTqZNO4g7ARRPSwAjh-tpfdzwAqYBQeqaZi73uSyHN2qtE4gGCXjcKQtsCm_L5GsIy5ME31HR7OKOdMHHfkWamU46EBJgRrGOZcrcgNXREs3Iy-NsyqH2Oz_zOQok0xF1Zfb6QD77Vh8OIGHvb2VZPbv7l0oqLIKuOWAI'),

    'asset_url' => env('ASSET_URL'),

    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default timezone for your application, which
    | will be used by the PHP date and date-time functions. We have gone
    | ahead and set this to a sensible default for you out of the box.
    |
    */

    'timezone' => 'UTC',

    /*
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    |
    | The application locale determines the default locale that will be used
    | by the translation service provider. You are free to set this value
    | to any of the locales which will be supported by the application.
    |
    */

    'locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Application Fallback Locale
    |--------------------------------------------------------------------------
    |
    | The fallback locale determines the locale to use when the current one
    | is not available. You may change the value to correspond to any of
    | the language folders that are provided through your application.
    |
    */

    'fallback_locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Faker Locale
    |--------------------------------------------------------------------------
    |
    | This locale will be used by the Faker PHP library when generating fake
    | data for your database seeds. For example, this will be used to get
    | localized telephone numbers, street address information and more.
    |
    */

    'faker_locale' => 'en_US',

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
    | This key is used by the Illuminate encrypter service and should be set
    | to a random, 32 character string, otherwise these encrypted strings
    | will not be safe. Please do this before deploying an application!
    |
    */

    'key' => env('APP_KEY'),

    'cipher' => 'AES-256-CBC',

    /*
    |--------------------------------------------------------------------------
    | Maintenance Mode Driver
    |--------------------------------------------------------------------------
    |
    | These configuration options determine the driver used to determine and
    | manage Laravel's "maintenance mode" status. The "cache" driver will
    | allow maintenance mode to be controlled across multiple machines.
    |
    | Supported drivers: "file", "cache"
    |
    */

    'maintenance' => [
        'driver' => 'file',
        // 'store' => 'redis',
    ],

    /*
    |--------------------------------------------------------------------------
    | Autoloaded Service Providers
    |--------------------------------------------------------------------------
    |
    | The service providers listed here will be automatically loaded on the
    | request to your application. Feel free to add your own services to
    | this array to grant expanded functionality to your applications.
    |
    */

    'providers' => ServiceProvider::defaultProviders()->merge([
        /*
         * Package Service Providers...
         */

        /*
         * Application Service Providers...
         */
        App\Providers\AppServiceProvider::class,
        App\Providers\AuthServiceProvider::class,
        // App\Providers\BroadcastServiceProvider::class,
        App\Providers\EventServiceProvider::class,
        App\Providers\RouteServiceProvider::class,
    ])->toArray(),

    /*
    |--------------------------------------------------------------------------
    | Class Aliases
    |--------------------------------------------------------------------------
    |
    | This array of class aliases will be registered when this application
    | is started. However, feel free to register as many as you wish as
    | the aliases are "lazy" loaded so they don't hinder performance.
    |
    */

    'aliases' => Facade::defaultAliases()->merge([
        // 'Example' => App\Facades\Example::class,
    ])->toArray(),

];
