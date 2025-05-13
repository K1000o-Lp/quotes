<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes for Quotes UI
|--------------------------------------------------------------------------
*/

Route::prefix('quotes-ui')->group(function () {
    Route::prefix('v1')->name('quotes-ui.v1.')->group(function () {
        Route::prefix('quotes')->name('quotes.')->group(function () {
            Route::get('/', function () {
                return view('quotes::index');
            })->name('index');
    
            Route::get('/random', function () {
                return view('quotes::random');
            })->name('random');
    
            Route::get('/search', function () {
                return view('quotes::search');
            })->name('search');
        });
    });
});