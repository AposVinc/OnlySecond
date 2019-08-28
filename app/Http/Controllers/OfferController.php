<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Collection;
use App\Offer;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;

class OfferController extends Controller{

    public function showListForm()
    {
        $offers= Offer::withTrashed()->with('product')->get();
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

    public function showRestoreForm()   //solo offerte da reispristnare?
    {
        /*
        $brands = Brand::onlyTrashed()->get();

        if (sizeof($offers) == 0) {
            $this->EchoMessage("Non ci sono Offerte da ripristinare");
            return view('backend.index');
        } else {
            return view('backend.offer.restore', ['offers' => $offers]);
        }
        */
        $brands = Brand::all();
        return view('backend.offer.restore', ['brands' => $brands]);
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
        $product = Product::withoutTrashed()->find($id);
        $offer = new Offer();
        $offer->rate = $request->rate;
        $product->offer()->save($offer);
        $offer->save();
        return redirect()->to('Admin/Offer/List');
    }

    public function show($cod)
    {
        $offer = Product::where('cod', $cod)->firstOrFail();
        return view('offer')->with(['offer' => $offer]);
    }

    public function restore(Request $request)
    {
        $id = $request->get('offer');
        Offer::find($id)->restore();

        return redirect()->to('Admin/Offer/List');

    }

    public function update(Request $request)
    {
        $id = $request->get('offer');

        Offer::where('id', $id)
            ->update(['rate' => $request['rate']]);

        return redirect()->to('Admin/Offer/List');
    }

    public function destroy(Request $request)
    {
        $id = $request->get('product');
        Product::withoutTrashed()->find($id)->offer->delete();

        return redirect()->to('Admin/Offer/List');
    }
}
