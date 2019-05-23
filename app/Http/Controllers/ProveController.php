<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProveController extends Controller
{
    public function prova(){
        $categories=Category::withTrashed()->with('products')->get();
        echo $categories;
    }

    public function prova1(){
        $storico=Product::withTrashed()->with('orderhistories')->get();
        echo $storico;
    }
}
