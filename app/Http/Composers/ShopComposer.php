<?php


namespace App\Http\Composers;

use App\Brand;
use Illuminate\View\View;

class ShopComposer
{
    public  function compose(View $view){
        $brands = Brand::withoutTrashed()->orderBy('name')->get();

        $view->with('brands', $brands);
    }
}
