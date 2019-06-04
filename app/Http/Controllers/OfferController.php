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
        return view('backend.offer.list', ['offer' => $offers], ['collections'=>$collections]);
    }

    public function showAddForm()
    {
        $brands = Brand::withTrashed()->get();
        return view('backend.offer.add',['brands' => $brands]);
    }

    public function showEditForm()
    {
        return view('backend.offer.edit');
    }

    function getOffer(Request $request)
    {
        $value = $request->get('value');
        $data = Collection::withTrashed()->where('brand_id', $value)->get();
        $output = '<option value="0">Seleziona la collezione</option>';
        foreach($data as $row)
        {
            $output .= '<option value="'.$row->id.'">'.$row->name.'</option>';
        }
        return $output;
    }

    public function showDeleteForm()
    {
        return view('backend.offer.delete');
    }

    public function showRestoreForm()
    {
        return view('backend.offer.restore');
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
        return view('offer')->with(['offer' => $offer]);
    }

}
