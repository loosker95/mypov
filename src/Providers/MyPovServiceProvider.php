<?php

namespace fabienlk\mypov\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;


class MyPovServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Route::prefix('comments')->group(function () {
            $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        });
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'comments');

        if ($this->app->runningInConsole()) {
            $this->publishes(...); // assets and config
            $this->publishes([
                __DIR__ . '/../resources/views/comments' => public_path('/../resources/views/comments'),            ]);
            $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
            $this->publishes([__DIR__ . '/../resources/assets' => public_path('style/comments'),], 'comments-assets');
        }
    }
}
