<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
    public function boot(): void
    {
        // Sharing data with a specific view
        View::composer('includes.nav', function ($view) {
            $view->with('categories', Category::where('visible', true)
            ->orderBy('position', 'asc')
            ->get());
        });
    }
}
