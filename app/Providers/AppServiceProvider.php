<?php

namespace App\Providers;

use App\Models\Course;
use App\Policies\ApiCoursePolicy;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
   
    /**
     * Register any application services.
     */
    public function register(): void
    {
        
    }
   

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        RateLimiter::for('course', function (Request $request) {
            return Limit::perHour(20)->by($request->user()?->id ?: $request->ip());
        });
    }
}
