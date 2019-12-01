<?php

namespace App\Http\Controllers;

use App\Category;
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

        if ($request->has('arrGenresChecked') and $request->get('arrGenresChecked')){
            foreach ($request->get('arrGenresChecked') as $genre){
                foreach ($products as $key => $product){
                    if ($product->genre !== $genre){
                        $products->forget($key);
                    }
                }
            }
        }

        if ($request->has('arrBrandsChecked') and $request->get('arrBrandsChecked')){
            foreach ($request->get('arrBrandsChecked') as $brand){
                foreach ($products as $key => $product){
                    if ($product->collection->brand->id !== (int)$brand){
                        $products->forget($key);
                    }
                }
            }
        }

        if ($request->has('arrCollectionsChecked') and $request->get('arrCollectionsChecked')){
            foreach ($request->get('arrCollectionsChecked') as $collection){
                foreach ($products as $key => $product){
                    if ($product->collection->id !== (int)$collection){
                        $products->forget($key);
                    }
                }
            }
        }
//backup di products, mi ritorno tutti i prod degli array checkati, confronto le due liste ed elimino le differenze da  products
        if ($request->has('arrCategoriesChecked') and $request->get('arrCategoriesChecked')){
            foreach ($request->get('arrCategoriesChecked') as $category_checked){
                foreach ($products as $key => $product){
                    foreach ($product->categories as $category){
                        if ($category->id !== (int)$category){
                            $products->forget($key);
                        }
                    }
                }
            }
        }

        /*
                if ($request->has('arrMaterialsChecked') and $request->get('arrMaterialsChecked')){
                    foreach ($request->get('arrMaterialsChecked') as $material){
        foreach ($products as $key => $product){
                            if ($product->brand !== $brand){
                                $products->forget($key);
                            }
                        }            }
                }
                */

        return $products;
    }
}
