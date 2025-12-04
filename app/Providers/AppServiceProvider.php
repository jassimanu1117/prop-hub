<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap(); // <-- enables Bootstrap pagination globally

        // Share authenticated admin and profile with all admin layout partials
        View::composer('layouts.partials.admin.*', function ($view) {
            $admin = Auth::guard('admin')->user();
            $profile = $admin ? $admin->profile : null;
            $view->with('admin', $admin)->with('profile', $profile);
        });
    }
}
