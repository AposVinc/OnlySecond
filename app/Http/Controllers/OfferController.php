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
        if(Product::withoutTrashed()->exists()){
            $brands = Brand::all();
            return view('backend.offer.add',['brands' => $brands]);
        }else{
            return redirect()->to('Admin/Offer/List')->with('error','Impossibile inserire una nuova Offerta. Inserire prima un Prodotto!!');
        }
    }

    public function showEditForm()
    {
        if(Offer::all()->isNotEmpty()){
            $brands = Brand::all();
            return view('backend.offer.edit', ['brands' => $brands]);
        }else{
            return redirect()->to('Admin/Offer/List')->with('error','Non ci sono Offerte da Modificare!!');
        }
    }

    public function showDeleteForm()
    {
        if (Offer::all()->isNotEmpty()){
            $brands = Brand::all();
            return view('backend.offer.delete', ['brands' => $brands]);
        } else {
            return redirect()->to('Admin/Offer/List')->with('error','Non ci sono Offerte da Eliminare!!');
        }
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
            return redirect()->to('Admin/Offer/List')->with('error', 'Esiste già un Offerta per il prodotto inserito!!');
        }

        $offer = new Offer();
        $offer->rate = $request->rate;
        $offer->end = date('Y-m-d', strtotime($request->datepicker)). ' 23:59:59';
        $offer->product_id = $request->product;
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
        if (Product::find($request->product)->offer->delete()){
            return redirect()->to('Admin/Offer/List')->with('success', 'Eliminazione avvenuta con successo!!');
        }else{
            return redirect()->to('Admin/Offer/List')->with('error', 'Errore durante l\'eliminazione, Riprovare!!');
        }
    }
}
