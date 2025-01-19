<?php

namespace App\Providers;

use App\Models\Partner;
use App\Models\Journal;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        View::composer('components.footer', function ($view) {
            $partners = Partner::orderBy('created_at', 'desc')->get();
            $journals = Journal::orderBy('created_at', 'desc')->get();
            $view->with('partners', $partners);
            $view->with('journals', $journals);
        });
    }
}
