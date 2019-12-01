<?php

namespace App\Http\Controllers;

use App\Offer;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class FilterController extends Controller{
    //un esempio (che non sto usando) https://www.larashout.com/filtering-eloquent-models-in-laravel
    public function getProducts(Request $request)
    {
        $products = Product::all();

        if ($request->has('minprice') and $request->has('maxprice')){
            //se prod è in offerte
            $minprice = number_format($request->get('minprice'),2);
            $maxprice = number_format($request->get('maxprice'),2);
            $products_with_offers = new Collection();
            /*
            foreach ($products as $key => $product){
                if ($product->offer){
                    if ($product->offer->calculateDiscount() >= $minprice and $product->offer->calculateDiscount() <= $maxprice){
                        $products_with_offers->push($product);
                    }
                }
            }
            */
            foreach (Offer::all() as $offer){
                if ($offer->calculateDiscount() >= $minprice and $offer->calculateDiscount() <= $maxprice){
                    $products_with_offers->push($offer->product);
                }
            }
            $products = $products->where('price','>=',$minprice)->where('price','<=',$maxprice);
            $merged = $products->merge($products_with_offers);
            $products = $merged->unique('id')->sortBy('id');
        }

        if ($request->has('arrRatesChecked') and $request->get('arrRatesChecked')){
            foreach ($request->get('arrRatesChecked') as $rate){
                foreach ($products as $key => $product){
                    if ($product->offer){
                        if ($product->offer->rate < $rate){
                            $products->forget($key);
                        }
                    }else{
                        $products->forget($key);
                    }
                }
            }
        }
        /*
        if ($request->has('arrGenresChecked') and !$request->get('arrGenresChecked')){
            foreach ($request->get('arrGenresChecked') as $material){
                echo $material->name;
            }
        }
        if ($request->has('arrBrandsChecked') and !$request->get('arrBrandsChecked')){
            foreach ($request->get('arrBrandsChecked') as $material){
                echo $material->name;
            }
        }
        if ($request->has('arrCollectionsChecked') and !$request->get('arrCollectionsChecked')){
            foreach ($request->get('arrCollectionsChecked') as $material){
                echo $material->name;
            }
        }
        if ($request->has('arrCategoriesChecked') and !$request->get('arrCategoriesChecked')){
            foreach ($request->get('arrCategoriesChecked') as $material){
                echo $material->name;
            }
        }
        if ($request->has('arrMaterialsChecked') and !$request->get('arrMaterialsChecked')){
            foreach ($request->get('arrMaterialsChecked') as $material){
                echo $material->name;
            }
        }
        */

        return $products;
    }
}
