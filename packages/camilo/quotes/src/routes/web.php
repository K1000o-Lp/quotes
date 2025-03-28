<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes for Quotes UI
|--------------------------------------------------------------------------
*/

Route::prefix('quotes-ui')->group(function () {
    Route::prefix('v1')->name('quotes-ui.v1.')->group(function () {
        Route::get('/', function () {
            return view('quotes::index');
        })->name('index');
    });
});