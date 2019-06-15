<?php

namespace App\Http\Controllers;

use App\Banner;
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
        $collections = Collection::withTrashed()->with('brand')->get();
        return view('backend.collection.list', ['collections' => $collections]);
    }

    public function showAddForm()
    {
        $brands = Brand::all();
        return view('backend.collection.add',['brands' => $brands]);
    }

    public function showEditForm()
    {
        $brands = Brand::withTrashed()->get();
        #$collections = Collection::withTrashed()->get();

        return view('backend.collection.edit')->with('brands',$brands);
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

    function getCollectionRestore(Request $request)
    {
        $value = $request->get('value');    //id del brand
        $data = Collection::onlyTrashed('collections')->where('brand_id', $value)->get();
        $output = '<option value="0">Seleziona la collezione</option>';
        foreach($data as $row)
        {
            $output .= '<option value="'.$row->id.'">'.$row->name.'</option>';
        }
        return $output;
    }

    function getCollectionBanner(Request $request)
    {
        $value = $request->get('value');    //id del brand
        $banners=Banner::withoutTrashed()->with('collection')->get();
        $data=new \Illuminate\Database\Eloquent\Collection();
        foreach ($banners as $banner){
            $collections = Collection::withTrashed()->where('name',$banner->collection->name)->where('brand_id',$value)->get();
            foreach ($collections as $collection){
                if(!($data->contains($collection))){
                    $data->add($collection);
                }
            }
        }
        $output = '<option value="0">Seleziona la collezione</option>';
        foreach($data as $row)
        {
            $output .= '<option value="'.$row->id.'">'.$row->name.'</option>';
        }
        return $output;
    }

    function getCollectionBannerRestore(Request $request)
    {
        $value = $request->get('value');    //id del brand
        $banners=Banner::onlyTrashed()->with('collection')->get();
        $data=new \Illuminate\Database\Eloquent\Collection();
        foreach ($banners as $banner){
            $collections = Collection::withTrashed()->where('name',$banner->collection->name)->where('brand_id',$value)->get();
            foreach ($collections as $collection){
                if(!($data->contains($collection))){
                    $data->add($collection);
                }
            }
        }
        $output = '<option value="0">Seleziona la collezione</option>';
        foreach($data as $row)
        {
            $output .= '<option value="'.$row->id.'">'.$row->name.'</option>';
        }
        return $output;
    }

    public function showDeleteForm()
    {
        $brands = Brand::all(); //all() non mostrare brand gia eliminati
        return view('backend.collection.delete', ['brands' => $brands]);
    }

    public function showRestoreForm()
    {
        $brands=Collection::onlyTrashed('collections')->with('brand')->get();
        if(sizeof($brands)==0) {
            $this->EchoMessage("Non ci sono Collezioni da ripristinare");
            return view('backend.index');
        }else {
            return view('backend.collection.restore',['brands' => $brands]);
        }
    }

    public function showAddCollectionForm()
    {
        $brands = DB::table('brands')->get();
        return view('backend.collection.add',['brands' => $brands]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $input = Input::all();
        $collection = new Collection();
        $collection->name = $input['text-input'];
        $collection->brand_id = $input['brand'];
        $collection->save();

        return redirect()->to('Admin/Collection/List');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)//Collection $collection
    {
        $brand= $request->get('brand');
        $collection= $request->get('collection');
        $newbrand= $request->get('newbrand');
        $newcollectionname=$request->get('newcollectionname');

        Collection::where('id',$collection)->restore();

        if ($newcollectionname == ""){
            Collection::where('id',$collection)
                ->update(['brand_id' => $newbrand]);
        } else if($newbrand== "0") {
            Collection::where('id',$collection)
                ->update(['name' => $newcollectionname, 'brand_id' => $brand]);
        }else{
            Collection::where('id',$collection)
                ->update(['name' => $newcollectionname, 'brand_id' => $newbrand]);
        }
        
        return redirect()->to('Admin/Collection/List');
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param  \App\Collection  $collection
     * @return \Illuminate\Http\Response
     */

    public function restore(Request $request)   //query senza nome
    {
        $id = $request->get('collection');
        Collection::where('id',$id)->restore();

        return redirect()->to('Admin/Collection/List');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $collection=$request->get('collection');
        Collection::where('id',$collection)->delete();

        return redirect()->to('Admin/Collection/List');
    }
}
