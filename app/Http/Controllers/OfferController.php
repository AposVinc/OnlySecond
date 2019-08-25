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
        $brands = Brand::withoutTrashed()->get();
        return view('backend.offer.restore', ['brands' => $brands]);
    }


    function getOffer(Request $request)
    {
        /*
        $value = $request->get('value');
        $data = Collection::withTrashed()->where('brand_id', $value)->get();
        $output = '<option value="0">Seleziona la collezione</option>';
        foreach($data as $row)
        {
            $output .= '<option value="'.$row->id.'">'.$row->name.'</option>';
        }
        return $output;
        */
        $value = $request->get('value');
        $offers = Product::withoutTrashed()->find($value)->offers()->get();
        return $offers;
    }

    function getPrice(Request $request)
    {
        $value = $request->get('value');
        $price = Product::withoutTrashed()->find($value)->price;
        return $price;
    }

    function getOfferRestore(Request $request)
    {
        /*
        $value = $request->get('value');    //id del brand
        $data = Collection::onlyTrashed('collections')->where('brand_id', $value)->get();
        $output = '<option value="">Seleziona la collezione</option>';
        foreach($data as $row)
        {
            $output .= '<option value="'.$row->id.'">'.$row->name.'</option>';
        }
        return $output; */

        $value = $request->get('value');
        $offers = Product::onlyTrashed()->find($value)->offers()->get();
        return $offers;
    }


    public function create(Request $request)
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
        Category::find($id)->restore();

        return redirect()->to('Admin/Category/List');

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

    public function destroy(Request $request)
    {
        $id = $request->get('offer');
        Offer::withTrashed()->find($id)->delete();

        return redirect()->to('Admin/Offer/List');
    }
}
