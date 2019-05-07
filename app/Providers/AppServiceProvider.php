<?php

namespace App\Providers;

use DB;
use Illuminate\Support\ServiceProvider;

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
        //se attivo da problemi nel caricamento dei componenti e della login

        DB::listen(function ($event) {
            dump($event->sql);
            dump($event->bindings);
        });

    }
}
