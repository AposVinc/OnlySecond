<?php

namespace App\Providers;

use App\Brand;
use App\Product;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
       //
    }
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //https://laracasts.com/series/laravel-5-fundamentals/episodes/25
        view()->composer('frontend.partials.nav', 'App\Http\Composers\NavigationComposer@compose');
        view()->composer('frontend.partials.filter', 'App\Http\Composers\FilterComposer@compose');
        view()->composer('frontend.index', 'App\Http\Composers\HomeComposer@compose');
        view()->composer('frontend.shop', 'App\Http\Composers\ShopComposer@compose');

    }
}
