<?php


namespace App\Http\Composers;

use App\Banner;
use DB;
use Illuminate\View\View;

class PageComposer
{
    public  function composeIndex(View $view){
        $banners = Banner::where('visible',1)->where('type','Main')->get();
        $sub_banners = Banner::where('visible',1)->where('type','Sub')->get();
        $view->with('banners', $banners)->with('sub_banners', $sub_banners);
    }

    public  function composeAbout(View $view){
        $fields = DB::table('pages')->where('about',1)->first();
        $view->with('fields', $fields);
    }

    public  function composeContactUS(View $view){
        $fields = DB::table('pages')->where('contactus',1)->first();
        $view->with('fields', $fields);
    }

    public  function composeCheckout(View $view){
        $fields = DB::table('couriers')->where('deleted_at', null)->get();
        $view->with('fields', $fields);
    }

    public  function composeBEIndex(View $view){
        $brands = DB::table('brands')->where('deleted_at', null)->count();
        $collections = DB::table('collections')->where('deleted_at', null)->count();
        $categories = DB::table('categories')->where('deleted_at', null)->count();
        $products = DB::table('products')->where('deleted_at', null)->count();
        $users = DB::table('users')->count();
        $suppliers = DB::table('suppliers')->where('deleted_at', null)->count();
        $fields = ['brands' => $brands, 'collections' => $collections, 'categories' => $categories, 'products' => $products,
                    'users' => $users, 'suppliers' => $suppliers];
        $view->with('fields', $fields);
    }
}
