<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Load the nav/footer categories once per request (the layout used to
        // query them twice). The query only runs if the layout is rendered.
        View::composer('layouts.storefront', function ($view) {
            static $categories = null;
            $categories ??= Category::all();
            $view->with('navCategories', $categories);
        });
    }
}
