<?php
/**
 * Created by PhpStorm.
 * User: UTENTE
 * Date: 03/09/2019
 * Time: 13:31
 */

namespace App\Http\Controllers;


use App\Wishlist;

class WishListController extends Controller {

    public function showListForm()
    {
        $list = Wishlist::withTrashed()->get();
        return view('frontend.favorite', ['list' => $list]);
    }


}
