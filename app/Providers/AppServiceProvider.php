<?php

namespace App\Providers;

use App\Models\Menu;
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
//        $menu = Menu::all();
//        View::share('menu', $menu);

        $sort = collect([
            ['name'=>'Sort by description A-Z', 'value'=>'asc'],
            ['name'=>'Sort by description Z-A', 'value'=>'desc']
        ]);

        View::share('sort', $sort);
    }
}
