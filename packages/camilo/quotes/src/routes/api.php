<?php

use Camilo\Quotes\Entities\Quotes\Controller as QuoteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application.
|
*/

// API v1 Routes
Route::prefix('api')->group(function () {
    Route::prefix('v1')->group(function () {
        // Get all quotes
        Route::get('/quotes', [QuoteController::class, 'index']);
        
        // Get a random quote
        Route::get('/quotes/random', [QuoteController::class, 'random']);
        
        // Get a specific quote by ID
        Route::get('/quotes/{id}', [QuoteController::class, 'show']);
    });
});