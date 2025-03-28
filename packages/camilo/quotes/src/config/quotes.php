<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Quotes Configuration
    |--------------------------------------------------------------------------
    |
    | This file stores basic data required for the quotes package to work correctly,  
    | such as 'base_url', 'request_per_time', and 'duration_time'.
    |
    */

    'base_url' => env('QUOTES_BASE_URL', 'https://dummyjson.com/quotes'),
    'request_per_time' => env('QUOTES_REQUEST_PER_TIME', 60),
    'duration_time' => env('QUOTES_DURATION_TIME', 60),
];