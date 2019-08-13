<?php

namespace App\Providers;

use App\Brand;
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
/*
        DB::listen(function ($event) {
            dump($event->sql);
            dump($event->bindings);
        });
*/

        view()->composer('frontend.partials.nav',function ($view){
            $view->with('brands', Brand::withoutTrashed()->orderBy('name')->get());
        });
        view()->composer('frontend.partials.nav',function ($view){
            $view->with('a', Brand::withoutTrashed()->orderBy('name')->get());
        });
    }
}
