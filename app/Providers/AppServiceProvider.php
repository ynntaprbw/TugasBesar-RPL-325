<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Scout\ScoutServiceProvider;
use TeamTNT\Scout\TNTSearchScoutServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->register(ScoutServiceProvider::class);
        $this->app->register(TNTSearchScoutServiceProvider::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
