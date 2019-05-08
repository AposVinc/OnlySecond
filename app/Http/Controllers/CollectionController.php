<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Collection;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function showListForm()
    {
        $collection = Collection::withTrashed()->get();
        return view('backend.collection.listcollection', ['collection' => $collection]);
    }

    public function showAddForm()
    {
        $brand = Brand::all();
        return view('backend.collection.addcollection',['brand' => $brand]);
    }

    public function showEditForm()
    {
        $brands = Brand::withTrashed()->get();
        #$collections = Collection::withTrashed()->get();

        return view('backend.collection.editcollection')->with('brands',$brands);
        #return view('backend.collection.editcollection')->with('collections',$collections)->with('brands',$brands);

        /*altra soluzione sarebbe:
            restituire join tra brand e collection, fare for each per brand e per collection nel blade.
            con javascript alla scelta del brand prendi id, e tutte le collezioni con brand_id diverso vengono impostati ad hidden
        */
    }

    function getCollection(Request $request)
    {
        $value = $request->get('value');    //id del brand
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
        $brand = \App\Brand::all(); //all() non mostrare brand gia eliminati
        return view('backend.collection.deletecollection', ['brand' => $brand]);
    }

    public function showRestoreForm()
    {
        $brand = \App\Brand::onlyTrashed('brands')->get();
        return view('backend.collection.restorecollection',['brand' => $brand]);
    }

    public function showAddCollectionForm()
    {
        $brand = DB::table('brands')->get();
        return view('backend.collection.addcollection',['brand' => $brand]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $input = Input::all();
        $collection = new \App\Collection();
        $collection->name = $input['text-input'];
        $collection->brand_id = $input['brand'];
        $collection->save();

        return redirect()->to('admin/index');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function show(Collection $collection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function edit(Collection $collection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Collection $collection)
    {
        echo old('brand');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function destroy(Collection $collection)
    {

    }
}
