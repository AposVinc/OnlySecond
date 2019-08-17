<?php


namespace App\Http\Composers;

use App\Brand;
use App\Category;
use App\Product;
use Illuminate\Support\Collection;
use Illuminate\View\View;

class NavigationComposer
{
    public function __construct()
    {
        $brands = Brand::withoutTrashed()->orderBy('name')->get();
    }

    public  function compose(View $view){
        $brands = Brand::withoutTrashed()->orderBy('name')->get();
        $cF = new Collection();
        $cM = new Collection();
        $cU = new Collection();

        $productsF = Product::withoutTrashed()->where('genre','F')->with('categories')->get();
        foreach ($productsF as $product) {
            foreach ($product->categories as $category){
                $cF->push($category);
            }
        }
        $categoriesF = $cF->unique('id')->sortBy('name');

        $productsM = Product::withoutTrashed()->where('genre','M')->with('categories')->get();
        foreach ($productsM as $product) {
            foreach ($product->categories as $category){
                $cM->push($category);
            }
        }
        $categoriesM = $cM->unique('id')->sortBy('name');

        $productsU = Product::withoutTrashed()->where('genre','U')->with('categories')->get();
        foreach ($productsU as $product) {
            foreach ($product->categories as $category){
                $cU->push($category);
            }
        }
        $categoriesU = $cU->unique('id')->sortBy('name');

        $view->with('brands', $brands)->with('categoriesF', $categoriesF)->with('categoriesM', $categoriesM)->with('categoriesU', $categoriesU);
    }
}
