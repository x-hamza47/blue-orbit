<?php

namespace App\Providers;

use App\Models\Service;
use Illuminate\Support\Facades\Cache;
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
        View::composer('*', function ($view) {

            $navServices = Cache::remember('nav_services', 3600, function () {
                return Service::with(['children' => function ($q) {
                    $q->active()
                        ->showOnHome()
                        ->select('id', 'parent_id', 'title', 'slug')
                        ->orderBy('id');
                }])
                    ->parents()
                    ->active()
                    ->showOnHome()
                    ->orderBy('home_order')
                    ->get(['id', 'title', 'slug', 'icon', 'color']);
            });

            $view->with('navServices', $navServices);
        });
    }
}
