<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        /*
        $products = Product::all();
        return view('frontend.shop')->with('products', $products);
        */
        return view('frontend.shop');
    }
}
