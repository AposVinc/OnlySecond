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

    public function EchoMessage($msg)
    {
        echo '<script type="text/javascript">
                alert("', $msg, '")
                    </script>';
    }
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
       // $offers = Offer::withTrashed()->get();
        $offers = Product::with('offers')->get();
        return view('backend.offer.edit', ['offers' => $offers]);
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
        $offers = Offer::all();
        return view('backend.offer.delete', ['offers' => $offers]);
    }

    public function showRestoreForm()
    {
        $offers = Offer::onlyTrashed('offers')->get();
        if (sizeof($offers) == 0) {
            $this->EchoMessage("Non ci sono Offerte da ripristinare");
            return view('backend.index');
        } else {
            return view('backend.offer.restore', ['offers' => $offers]);
        }
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
    public function restore(Request $request)
    {
        $id = $request->get('category');
        Category::where(id, $id)->restore();

        return redirect()->to('Admin/Category/List');

    }

    public function destroy(Request $request)
    {
        $id = $request->get('offer');
        Offer::where('id', $id)->delete();

        return redirect()->to('Admin/Offer/List');
    }

    public function update(Request $request)
    {
        $id = $request->get('offer');
        $newname = $request->get('newname');


        Offer::where('id', $id)->restore();
        Offer::where('id', $id)
            ->update(['name' => $newname]);

        return redirect()->to('Admin/Offer/List');
    }

}
