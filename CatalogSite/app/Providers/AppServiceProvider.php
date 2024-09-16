<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Page;
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
        View::composer('includes.nav', function ($view) {
            // Perform the query and get the result first
            $categories = Category::where('visible', true)
                ->orderBy('position', 'asc')
                ->get();
        
            // Pass the retrieved categories to the view
            $view->with('categories', $categories);
        });

        View::composer('includes.footer', function ($view) {
            $view->with('pages', Page::All());
        });
    }
}
