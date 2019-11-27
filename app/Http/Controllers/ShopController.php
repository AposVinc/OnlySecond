<?php

namespace App\Http\Controllers;


use App\Brand;
use App\Product;

class ShopController extends Controller
{
    public function shopBrand($nameBrand)
    {
        $products = Brand::where('name', $nameBrand)->first()->products;
        return redirect('Shop')->with('products', $products);

    }
}