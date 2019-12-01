<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Color;
use App\Offer;
use App\Product;
use App\Specification;
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
            $products = $products->where('price','>=',$minprice)->where('price','<=',$maxprice);
            $all_products_by_single_group_filter = new Collection();
            foreach (Offer::all() as $offer){
                if ($offer->calculateDiscount() >= $minprice and $offer->calculateDiscount() <= $maxprice){
                    $all_products_by_single_group_filter->push($offer->product);
                }
            }
            $merged = $products->merge($all_products_by_single_group_filter);
            $products = $merged->unique('id')->sortBy('id');
        }

        if ($request->has('arrRatesChecked') and $request->get('arrRatesChecked')){
            $all_products_by_single_group_filter = new Collection();
            foreach ($request->get('arrRatesChecked') as $rate){
                foreach (Offer::all() as $offer){
                    if ($offer->rate >= $rate){
                        $all_products_by_single_group_filter->push($offer->product);
                    }
                }
            }
            $products = $products->intersect($all_products_by_single_group_filter);
        }

        if ($request->has('arrGenresChecked') and $request->get('arrGenresChecked')){
            $all_products_by_single_group_filter = new Collection();
            foreach ($request->get('arrGenresChecked') as $genre){
                foreach (Product::where('genre',$genre)->get() as $product){
                    $all_products_by_single_group_filter->push($product);
                }
            }
            $products = $products->intersect($all_products_by_single_group_filter);
        }

        if ($request->has('arrBrandsChecked') and $request->get('arrBrandsChecked')){
            $all_products_by_single_group_filter = new Collection();
            foreach ($request->get('arrBrandsChecked') as $brand){
                foreach ( Brand::where("id",$brand)->first()->products as $product){
                    $all_products_by_single_group_filter->push($product);
                }
            }
            $products = $products->intersect($all_products_by_single_group_filter);
        }

        if ($request->has('arrCollectionsChecked') and $request->get('arrCollectionsChecked')){
            $all_products_by_single_group_filter = new Collection();
            foreach ($request->get('arrCollectionsChecked') as $collection){
                foreach ( \App\Collection::where("id",$collection)->first()->products as $product){
                    $all_products_by_single_group_filter->push($product);
                }
            }
            $products = $products->intersect($all_products_by_single_group_filter);
        }

        if ($request->has('arrCategoriesChecked') and $request->get('arrCategoriesChecked')){
            $all_products_by_single_group_filter = new Collection();
            foreach ($request->get('arrCategoriesChecked') as $category){
                foreach ( Category::where("id",$category)->first()->products as $product){
                    $all_products_by_single_group_filter->push($product);
                }
            }
            $products = $products->unique('id');
            $products = $products->intersect($all_products_by_single_group_filter);
        }

        if ($request->has('arrColorsChecked') and $request->get('arrColorsChecked')){
            $all_products_by_single_group_filter = new Collection();
            foreach ($request->get('arrColorsChecked') as $color){
                foreach ( Color::where("hex",$color)->first()->products as $product){
                    $all_products_by_single_group_filter->push($product);
                }
            }
            $products = $products->intersect($all_products_by_single_group_filter);
        }

        if ($request->has('arrMaterialsChecked') and $request->get('arrMaterialsChecked')){
            $all_products_by_single_group_filter = new Collection();
            foreach ($request->get('arrMaterialsChecked') as $material){
                foreach (Specification::where('material',$material)->get() as $spec){
                    $all_products_by_single_group_filter->push($spec->product);
                }
            }
            $products = $products->intersect($all_products_by_single_group_filter);
        }

        return $products;
    }
}
