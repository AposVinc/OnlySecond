<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Offer;
use App\Product;
use Illuminate\Http\Request;


class OfferController extends Controller{

    public function showListForm()
    {
        $offers= Offer::with('product')->get();
        return view('backend.offer.list', ['offers' => $offers]);
    }

    public function showAddForm()
    {
        $brands = Brand::all();
        return view('backend.offer.add',['brands' => $brands]);
    }

    public function showEditForm()
    {
       // $offers = Offer::withTrashed()->get();
        $brands = Brand::all();
        return view('backend.offer.edit', ['brands' => $brands]);
    }

    public function showDeleteForm()
    {
        $brands = Brand::all();
        return view('backend.offer.delete', ['brands' => $brands]);
    }


    function getPrice(Request $request)
    {
        $value = $request->get('value');
        $price = Product::withoutTrashed()->find($value)->price;
        return $price;
    }

    function getRate(Request $request)
    {
        $value = $request->get('value');
        $rate = Product::withoutTrashed()->find($value)->offer->rate;
        return $rate;
    }


    public function create(Request $request)
    {
        $id = $request->product;
        $product = Product::all()->find($id);
        $offer = new Offer();
        $offer->rate = $request->rate;
        $offer->end = date('Y-m-d', strtotime($request->datepicker)). ' 23:59:59';
        $product->offer()->save($offer);
        $offer->save();
        return redirect()->to('Admin/Offer/List');
    }

    public function show($cod)
    {
        $offer = Product::where('cod', $cod)->firstOrFail();
        return view('offer')->with(['offer' => $offer]);
    }


    public function update(Request $request)
    {
        $id = $request->product;
        $newdata = date('Y-m-d', strtotime($request->datepicker)). ' 23:59:59';

        Product::find($id)->offer()->update(['rate' => $request->rate , 'end' => $newdata]);

        return redirect()->to('Admin/Offer/List');
    }

    public function destroy(Request $request)
    {
        $id = $request->get('product');
        Product::find($id)->offer->delete();

        return redirect()->to('Admin/Offer/List');
    }
}
