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
        $cF = collect(['id','name']);
        $cM = collect(['id','name']);
        $cU = collect(['id','name']);

        //        $cU = Category::all()->first();

        //https://laracasts.com/discuss/channels/eloquent/removing-duplicates-from-collection?page=1

        //non ne mostra più di 1, non capisco perchè
        $productsF = Product::where('genre','F')->get();
        foreach ($productsF as $product) {
            $cF = collect($product->categories);
        }
        $categoriesF = $cF->unique()->values()->all();

        $productsM = Product::where('genre','M')->get();
        foreach ($productsM as $product) {
            $cM = collect($product->categories);
        }
        $categoriesM = $cM->unique()->values()->all();

        $productsU = Product::where('genre','U')->get();
        foreach ($productsU as $product) {
            $cU = collect($product->categories);
        }
        $categoriesU = $cU->unique()->values()->all();

        /*
        $view->with('brands', $brands);
        $view->with('categoriesF', $categoriesF);
        $view->with('categoriesM', $categoriesM);
        $view->with('categoriesU', $categoriesU);
        */
        //$view->with(compact('brands', 'categoriesF','categoriesM','categoriesU'));
        $view->with('brands', $brands)->with('categoriesF', $categoriesF)->with('categoriesM', $categoriesM)->with('categoriesU', $categoriesU);
    }
}
