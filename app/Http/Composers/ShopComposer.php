<?php


namespace App\Http\Composers;

use App\Brand;
use App\Offer;
use App\Product;
use http\Url;
use Illuminate\View\View;
use Illuminate\Support\Facades\Route;

class ShopComposer
{
    public  function composeShop1(View $view){
        $products = Product::withoutTrashed()->with('collection')->with('images')->paginate(18);
        $view->with('products', $products);
    }

    public  function composeShop(View $view){
        $products = Product::withoutTrashed()->with('collection')->with('images')->paginate(18);
        if(strpos(Route::currentRouteName(),'Brand')!== false){
            $products = Brand::where('name', \URL::getRequest()->route()->parameter('name'))->first()->products->paginate(18);
            //$products = Brand::products()->where('name', \URL::getRequest()->route()->parameter('name'))->paginate(18);
        }
        $view->with('products', $products);
    }

    public  function composeDiscount(View $view){
        $today =  date('Y-m-d H:i:s', strtotime('now'));
        $offers = Offer::where('end','>=',$today)->with('product')->get();

        $view->with('offers', $offers);
    }

   /* public function shopBrand(View $view, $nameBrand)
    {
        $products = Brand::where('name', $nameBrand)->first()->products;
        $view->with('products', $products);

    }*/

}
