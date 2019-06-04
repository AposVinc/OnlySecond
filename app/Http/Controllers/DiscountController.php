<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Collection;
use App\Discount;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;

class DiscountController extends Controller
{
    public function showListForm()
    {
        $discounts= Discount::withTrashed()->with('collection')->get();
        $collections=Collection::withTrashed()->with('brand')->get();
        return view('backend.discount.list', ['discounts' => $discounts], ['collections'=>$collections]);
    }

    public function showAddForm()
    {
        $discounts = Discount::withTrashed()->get();//
        return view('backend.discount.add', ['discounts' => $discounts]);
    }
    public function showEditForm()
    {
        return view('backend.discount.edit');
    }

    public function showDeleteForm()
    {
        return view('backend.discount.delete');
    }

    public function showRestoreForm()
    {
        return view('backend.discount.restore');
    }

    public function create(Request $request)  //
    {
        $discount = new Discount();
        $discount->name=$request->nome;
        $discount->save();

        return redirect()->to('Admin/Discount/List');
    }
    public function show($cod)
    {
        $discount = Product::where('cod', $cod)->firstOrFail();
        return view('discount')->with(['discount' => $discount]);
    }

}
