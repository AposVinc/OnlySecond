<?php


namespace App\Http\Composers;


use App\Brand;
use App\Category;
use App\Collection;
use App\Offer;
use App\Product;
use App\Review;
use Illuminate\View\View;

class FilterComposer
{
    public  function compose(View $view){
        $brands = Brand::withoutTrashed()->orderBy('name')->get();
        $collections = Collection::withoutTrashed()->orderBy('name')->get();
        $categories = Category::withoutTrashed()->orderBy('name')->get();
        $colors = Product::withoutTrashed()->orderBy('color')->get('color');        //https://en.wikipedia.org/wiki/Web_colors

        //offerte satici
        //voti statici
        $view->with('brands', $brands)->with('collections',$collections)->with('categories', $categories)->with('colors', $colors);
    }
}
