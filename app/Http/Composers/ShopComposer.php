<?php


namespace App\Http\Composers;

use App\Brand;
use App\Offer;
use App\Product;
use Illuminate\View\View;

class ShopComposer
{
    public  function composeShop(View $view){
        $products = Product::withoutTrashed()->with('collection')->with('images')->get();

        $view->with('products', $products);
    }

    public  function composeDiscount(View $view){
        $today =  date('Y-m-d H:i:s', strtotime('now'));
        $offers = Offer::where('end','>=',$today)->with('product')->get();

        $view->with('offers', $offers);
    }

}
