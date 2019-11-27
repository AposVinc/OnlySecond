<?php


namespace App\Http\Composers;

use App\Brand;
use App\Category;
use App\Collection;
use App\Offer;
use App\Product;
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
            $products = Brand::where('name', \URL::getRequest()->route()->parameter('brandName'))->first()->products->paginate(18);
        }
        if(strpos(Route::currentRouteName(),'Collection')!== false){
            $products = Collection::where('name', \URL::getRequest()->route()->parameter('collectionName'))->first()->products->paginate(18);
        }
        if(strpos(Route::currentRouteName(),'Category')!== false){
            $products = Category::where('name', \URL::getRequest()->route()->parameter('categoryName'))->first()->products->where('genre',\URL::getRequest()->route()->parameter('genre'))->paginate(18);
        }
        $view->with('products', $products);
    }

    public  function composeDiscount(View $view){
        $today =  date('Y-m-d H:i:s', strtotime('now'));
        $offers = Offer::where('end','>=',$today)->with('product')->get();

        $view->with('offers', $offers);
    }

}
