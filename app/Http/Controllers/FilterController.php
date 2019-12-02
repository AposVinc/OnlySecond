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
        if ($request->has('price-range')){
            //se prod è in offerte
            preg_match_all('/[0-9]+/',$request->get('price-range'),$pricerange);
            $minprice = (float)number_format($pricerange[0][0],2);
            $maxprice = (float)number_format($pricerange[0][1],2);
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

        if ($request->has('rates_checked')){
            $all_products_by_single_group_filter = new Collection();
            foreach ($request->get('rates_checked') as $rate){
                foreach (Offer::all() as $offer){
                    if ($offer->rate >= (int)$rate){
                        $all_products_by_single_group_filter->push($offer->product);
                    }
                }
            }
            $products = $products->unique('id');
            $products = $products->intersect($all_products_by_single_group_filter);
        }

        if ($request->has('genres_checked')){
            $all_products_by_single_group_filter = new Collection();
            foreach ($request->get('genres_checked') as $genre){
                foreach (Product::where('genre',$genre)->get() as $product){
                    $all_products_by_single_group_filter->push($product);
                }
            }
            $products = $products->intersect($all_products_by_single_group_filter);
        }

        if ($request->has('brands_checked')){
            $all_products_by_single_group_filter = new Collection();
            foreach ($request->get('brands_checked') as $brand){
                foreach ( Brand::where("id",$brand)->first()->products as $product){
                    $all_products_by_single_group_filter->push($product);
                }
            }
            $products = $products->intersect($all_products_by_single_group_filter);
        }

        if ($request->has('collections_checked')){
            $all_products_by_single_group_filter = new Collection();
            foreach ($request->get('collections_checked') as $collection){
                foreach ( \App\Collection::where("id",$collection)->first()->products as $product){
                    $all_products_by_single_group_filter->push($product);
                }
            }
            $products = $products->intersect($all_products_by_single_group_filter);
        }

        if ($request->has('categories_checked')){
            $all_products_by_single_group_filter = new Collection();
            foreach ($request->get('categories_checked') as $category){
                foreach ( Category::where("id",$category)->first()->products as $product){
                    $all_products_by_single_group_filter->push($product);
                }
            }
            $products = $products->unique('id');
            $products = $products->intersect($all_products_by_single_group_filter);
        }

        if ($request->has('colors_checked')){
            $all_products_by_single_group_filter = new Collection();
            foreach ($request->get('colors_checked') as $color){
                foreach ( Color::where("hex",$color)->first()->products as $product){
                    $all_products_by_single_group_filter->push($product);
                }
            }
            $products = $products->intersect($all_products_by_single_group_filter);
        }

        if ($request->has('materials_checked')){
            $all_products_by_single_group_filter = new Collection();
            foreach ($request->get('materials_checked') as $material){
                foreach (Specification::where('material',$material)->get() as $spec){
                    $all_products_by_single_group_filter->push($spec->product);
                }
            }
            $products = $products->intersect($all_products_by_single_group_filter);
        }
        $products = $products->paginate(18);
        return back()->with('products',$products);
    }
}
