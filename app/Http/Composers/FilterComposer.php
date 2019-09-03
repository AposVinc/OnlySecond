<?php


namespace App\Http\Composers;


use App\Brand;
use App\Category;
use App\Collection;
use App\Color;
use App\Offer;
use App\Product;
use App\Review;
use App\Specification;
use Illuminate\View\View;

class FilterComposer
{
    public  function compose(View $view){
        $brands = Brand::withoutTrashed()->orderBy('name')->get();
        $collections = Collection::withoutTrashed()->orderBy('name')->get();
        $categories = Category::withoutTrashed()->orderBy('name')->get();
        $all_materials = Specification::withoutTrashed()->orderBy('material')->get('material');
        $materials = $all_materials->unique('material');
        $colors = Color::all();         //https://en.wikipedia.org/wiki/Web_colors

        //offerte satici
        //voti statici
        //$view->with('brands', $brands)->with('collections',$collections)->with('categories', $categories)->with('colors', $colors);
        $view->with('brands', $brands)->with('collections', $collections)->with('categories', $categories)->with('colors', $colors)->with('materials',$materials);

    }
}
