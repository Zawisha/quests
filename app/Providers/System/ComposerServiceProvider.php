<?php

namespace App\Providers\System;

use App\Http\View\Composers\System\StatusesComposer;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
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
        view()->composer('system.bookings.index', StatusesComposer::class);
    }
}
