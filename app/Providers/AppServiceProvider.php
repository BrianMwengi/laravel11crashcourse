<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void {
        RateLimiter::for('test-rate-limit', function (Request $request) {
            return Limit::perSecond(1)->by('second')
                ->by($request->ip())
                ->response(function () {
                    return response()->json([
                        'message' => 'Too Many Requests. Please try again in 1 second.'
                    ], 429);
                });
        });
    }
}