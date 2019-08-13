<?php


namespace App\Http\Composers;


use App\Brand;
use App\Product;
use Illuminate\View\View;

class NavigationComposer
{
    public function __construct()
    {
        $brands = Brand::withoutTrashed()->orderBy('name')->get();
    }

    public  function compose(View $view){
        $brands = Brand::withoutTrashed()->orderBy('name')->get();

        //https://laracasts.com/discuss/channels/eloquent/removing-duplicates-from-collection?page=1
        $products = Product::where('genre','F')->get();
        $uni = 'a';
        foreach ($products as $product) {
            $uni = $product->categories->unique()->values()->all();
        }
        $view->with('brands', $brands);
        $view->with('categoriesF', $uni);
    }
}
