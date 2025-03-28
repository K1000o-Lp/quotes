<?php

namespace Camilo\Quotes\Providers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
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
        // HTTP Macros
        Http::macro('quotes', function () {
            return Http::baseUrl(config('quotes.base_url'))->beforeSending(function ($request) {
                $rateLimitKey = 'quotes_api_rate_limit';
                $maxRequests = config('quotes.request_per_time');
                $timeWindow = config('quotes.duration_time');

                // Obtain the number of requests made
                $requestCount = Cache::get($rateLimitKey, 0);

                if ($requestCount >= $maxRequests) {
                    // if the limit is reached, wait until the time window is over
                    $resetTime = Cache::get($rateLimitKey . '_reset', now()->addSeconds($timeWindow));
                    $waitTime = $resetTime->diffInSeconds(now());

                    if ($waitTime > 0) {
                        sleep($waitTime); // pause the execution
                    }

                    // reboot the counter
                    Cache::put($rateLimitKey, 0, $timeWindow);
                }

                // increment the counter
                Cache::increment($rateLimitKey);

                // Set the reset time
                if (!Cache::has($rateLimitKey . '_reset')) {
                    Cache::put($rateLimitKey . '_reset', now()->addSeconds($timeWindow), $timeWindow);
                }
            });
        });

        // Publish configurations
        $this->publishes([
            __DIR__ . '/../config/quotes.php' => config_path('quotes.php'),
        ], 'config');

        // Load routes
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        $this->loadRoutesFrom(__DIR__ . '/../routes/api.php');

        // Load views
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'quotes');

        $this->publishes([
            __DIR__.'/../resources/js' => public_path('vendor/quotes/js'),
            __DIR__.'/../resources/css' => public_path('vendor/quotes/css'),
        ], 'quotes.assets');
    }
}