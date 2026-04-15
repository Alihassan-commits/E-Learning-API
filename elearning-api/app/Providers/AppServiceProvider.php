<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

// 👉 import your services
use App\Services\CourseService;
use App\Services\CommentService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // 👉 Bind CourseService into Laravel container
        $this->app->singleton(CourseService::class, function ($app) {
            return new CourseService();
        });

        // 👉 Bind CommentService into Laravel container
        $this->app->singleton(CommentService::class, function ($app) {
            return new CommentService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // 👉 used for things like routes, events, etc.
    }
}
