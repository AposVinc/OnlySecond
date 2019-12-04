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
use Route;

class ShopController extends Controller{

    public function composeShop(){
        $products = Product::withoutTrashed()->get()->paginate(18);
        return view('frontend.shop')->with('products', $products);
    }

    public function composeShopBrand($brandName){
        $products = Brand::where('name',$brandName)->first()->products->paginate(18);
        return view('frontend.shop')->with('products', $products);
    }

    public function composeShopCollection($collectionName){
        $products = \App\Collection::where('name', $collectionName)->first()->products->paginate(18);
        return view('frontend.shop')->with('products', $products);
    }

    public function composeShopCategory($categoryName, $genre){
        $products = Category::where('name', $categoryName)->first()->products->where('genre',$genre)->paginate(18);
        return view('frontend.shop')->with('products', $products);
    }

    public function composeDiscount(){
        $today =  date('Y-m-d H:i:s', strtotime('now'));
        $offers = Offer::where('end','>=',$today)->with('product')->get()->paginate(18);
        return view('frontend.discount')->with('offers', $offers);
    }

    public function filterProducts(Request $request)
    {
        $products = Product::all();
        if ($request->has('price_range')) {

            preg_match_all('/[0-9]+/', $request->get('price_range'), $pricerange);
            $minprice = (float)number_format($pricerange[0][0], 2);
            $maxprice = (float)number_format($pricerange[0][1], 2);

            $all_products_by_single_group_filter = new Collection();
            foreach (Offer::all() as $offer){
                if ($offer->calculateDiscount() >= $minprice and $offer->calculateDiscount() <= $maxprice){
                    $all_products_by_single_group_filter->push($offer->product);
                }
            }

            if (strpos(route::currentRouteName(),'Shop')!== false){
                $products = Product::where('price','>=',$minprice)->where('price','<=',$maxprice)->get();
                $merged = $products->merge($all_products_by_single_group_filter);
                $products = $merged->unique('id')->sortBy('id');
            }
            elseif (strpos(route::currentRouteName(),'Discount')!== false) {
                $products = $all_products_by_single_group_filter;
            }

            $request->session()->put('minprice', $minprice);
            $request->session()->put('maxprice', $maxprice);
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

            $request->session()->put('rates_checked', $request->get('rates_checked'));
        }

        if ($request->has('genres_checked')){
            $all_products_by_single_group_filter = new Collection();
            foreach ($request->get('genres_checked') as $genre){
                foreach (Product::where('genre',$genre)->get() as $product){
                    $all_products_by_single_group_filter->push($product);
                }
            }
            $products = $products->intersect($all_products_by_single_group_filter);

            $request->session()->put('genres_checked', $request->get('genres_checked'));
        }

        if ($request->has('brands_checked')){
            $all_products_by_single_group_filter = new Collection();
            foreach ($request->get('brands_checked') as $brand){
                foreach ( Brand::where("id",$brand)->first()->products as $product){
                    $all_products_by_single_group_filter->push($product);
                }
            }
            $products = $products->intersect($all_products_by_single_group_filter);

            $request->session()->put('brands_checked', $request->get('brands_checked'));
        }

        if ($request->has('collections_checked')){
            $all_products_by_single_group_filter = new Collection();
            foreach ($request->get('collections_checked') as $collection){
                foreach ( \App\Collection::where("id",$collection)->first()->products as $product){
                    $all_products_by_single_group_filter->push($product);
                }
            }
            $products = $products->intersect($all_products_by_single_group_filter);

            $request->session()->put('collections_checked', $request->get('collections_checked'));
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

            $request->session()->put('categories_checked', $request->get('categories_checked'));
        }

        if ($request->has('colors_checked')){
            $all_products_by_single_group_filter = new Collection();
            foreach ($request->get('colors_checked') as $color){
                foreach ( Color::where("hex",$color)->first()->products as $product){
                    $all_products_by_single_group_filter->push($product);
                }
            }
            $products = $products->intersect($all_products_by_single_group_filter);

            $request->session()->put('colors_checked', $request->get('colors_checked'));
        }

        if ($request->has('materials_checked')){
            $all_products_by_single_group_filter = new Collection();
            foreach ($request->get('materials_checked') as $material){
                foreach (Specification::where('material',$material)->get() as $spec){
                    $all_products_by_single_group_filter->push($spec->product);
                }
            }
            $products = $products->intersect($all_products_by_single_group_filter);

            $request->session()->put('materials_checked', $request->get('materials_checked'));
        }

        if ($request->has('select_sort')) {
            $sort_type = $request->get('select_sort');
            switch ($sort_type){
                case "name_ASC":
                    $products->sortBy(function($product) {
                        return $product->collection->brand->name;});
                    break;
                case "name_DESC":
                    $products->sortByDesc(function($product) {
                        return $product->collection->brand->name;});
                    break;

                case "price_ASC":
                    $products->sortBy('price');
                    break;

                case "price_DESC":
                    $products->sortByDesc('price');
                    break;

                case "vote_DESC":
                    $products->sortBy(function($product) {
                        return $product->CalculateAverageVote();});
                    break;

                case "vote_ASC":
                    $products->sortByDesc(function($product) {
                        return $product->CalculateAverageVote();});
                    break;
            }
            $products = $products->paginate(18);

            return response()->view('frontend.shop',['products' => $products]);
        }

        if (strpos(route::currentRouteName(),'Shop')!== false){
            $products = $products->paginate(18);
            return view('frontend.shop')->with('products', $products);
        } elseif (strpos(route::currentRouteName(),'Discount')!== false) {
            $offers = new Collection();
            foreach ($products as $product){
                $offers->push($product->offer);
            }
            $offers = $offers->paginate(18);
            return view('frontend.discount')->with('offers', $offers);
        }

    }
}
