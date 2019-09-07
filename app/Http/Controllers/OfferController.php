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

    function getDate(Request $request)
    {
        $value = $request->get('value');
        $date1 = Product::withoutTrashed()->find($value)->offer->end;
        $date = date('m/d/Y', strtotime($date1));
        return $date;
    }


    public function create(Request $request)
    {
        if (Offer::where('product_id', $request->product)->first()) {
            return redirect()->to('Admin/Offer/List')->with('error', 'Esiste gia un Offerta per il prodotto inserito!!');
        }

        $product = Product::all()->find($request->product);
        $offer = new Offer();
        $offer->rate = $request->rate;
        $offer->end = date('Y-m-d', strtotime($request->datepicker). ' 23:59:59');
        $product->offer()->save($offer);
        if($offer->save()){
            return redirect()->to('Admin/Offer/List')->with('success', 'Caricamento avvenuto con successo!!');
        }else{
            return redirect()->to('Admin/Offer/List')->with('error', 'Errore durante il caricamento. Riprovare!!!!');
        }
    }

    public function update(Request $request)
    {
        $id = $request->product;
        $newdata = date('Y-m-d', strtotime($request->datepicker)). ' 23:59:59';

        $o = Product::all()->find($id)->offer()->first();
        $o->rate = $request->rate;
        $o->end = $newdata;

        if ($o->update()){
            return redirect()->to('Admin/Offer/List')->with('success', 'Modifiche avvenute con successo!!');
        }else{
            return redirect()->to('Admin/Offer/List')->with('error', 'Errore durante il caricamento. Riprovare!!');
        }
    }

    public function destroy(Request $request)
    {
        $id = $request->get('product');
        Product::find($id)->offer->delete();

        return redirect()->to('Admin/Offer/List');
    }
}
