<?php

namespace Camilo\Quotes\Providers;

use Illuminate\Support\ServiceProvider;

class PackageServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Register configurations
        $this->mergeConfigFrom(__DIR__ . '/../config/quotes.php', 'quotes');
    }

    public function boot()
    {
        // Publish configurations
        $this->publishes([
            __DIR__ . '/../config/quotes.php' => config_path('quotes.php'),
        ], 'config');

        // Load routes
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        $this->loadRoutesFrom(__DIR__ . '/../routes/api.php');

        // Load views
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'quotes');
    }
}