<?php


namespace App\Http\Composers;

use App\Brand;
use App\Offer;
use App\OrderHistory;
use App\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;

class SliderComposer
{
    public  function composeProducts(View $view){
        $newarrivals = Product::all()->sortByDesc('updated_at')->take(8);

        $bestsellers = Product::all()->sortByDesc('quantity_sold')->take(8);

        $view->with('newarrivals', $newarrivals)->with('bestsellers',$bestsellers);
    }

    public  function composeOffers(View $view){
        $end_date =  date('Y-m-d H:i:s', strtotime('sunday this week'));       //https://stackoverflow.com/questions/53041191/get-current-week-start-end-date-with-dst
        $offers = Offer::where('end','<=',$end_date)->with('product')->get();

        $view->with('offers', $offers);
    }

    public  function composeBrands(View $view){
        $brands = Brand::withoutTrashed()->orderBy('name')->get();

        $view->with('brands',$brands);
    }
}
