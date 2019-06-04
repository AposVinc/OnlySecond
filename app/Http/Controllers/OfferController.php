<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Collection;
use App\Offer;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;

class OfferController extends Controller
{
    public function showListForm()
    {
        $offers= Offer::withTrashed()->with('collection')->get();
        $collections=Collection::withTrashed()->with('brand')->get();
        return view('backend.Offers.list', ['offers' => $offers], ['collections'=>$collections]);
    }

    public function showAddForm()
    {
        $offers = Offer::withTrashed()->get();//
        return view('backend.Offers.add', ['offers' => $offers]);
    }
    public function showEditForm()
    {
        return view('backend.Offers.edit');
    }

    public function showDeleteForm()
    {
        return view('backend.Offers.delete');
    }

    public function showRestoreForm()
    {
        return view('backend.Offers.restore');
    }

    public function create(Request $request)  //
    {
        $offer = new Offer();
        $offer->name=$request->nome;
        $offer->save();

        return redirect()->to('Admin/Offer/List');
    }
    public function show($cod)
    {
        $offer = Product::where('cod', $cod)->firstOrFail();
        return view('Offers')->with(['Offers' => $offer]);
    }

}
