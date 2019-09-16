<?php


namespace App\Http\Composers;

use App\Brand;
use App\Product;
use Illuminate\View\View;

class ShopComposer
{
    public  function compose(View $view){
        $products = Product::withoutTrashed()->with('collection')->with('images')->get();

        $view->with('products', $products);
    }
}
