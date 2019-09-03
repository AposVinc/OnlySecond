<?php


namespace App\Http\Composers;

use App\Brand;
use App\Product;
use Illuminate\View\View;

class HomeComposer
{
    public  function compose(View $view){
        $products = Product::withoutTrashed()->with('collection')->with('images')->get();
        $brands = Brand::withoutTrashed()->orderBy('name')->get();

        $view->with('products', $products)->with('brands',$brands);
    }
}
