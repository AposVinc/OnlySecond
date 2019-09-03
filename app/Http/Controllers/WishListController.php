<?php
/**
 * Created by PhpStorm.
 * User: UTENTE
 * Date: 03/09/2019
 * Time: 13:31
 */

namespace App\Http\Controllers;


use App\Product;

class WishListController extends Controller {
    public function EchoMessage($msg)
    {
        echo '<script type="text/javascript">
            alert("', $msg, '")
                </script>';
    }

    public function showListForm()
    {
        $products = Product::withTrashed()->get();
        return view('frontend.favorite', ['products' => $products]);
    }

}