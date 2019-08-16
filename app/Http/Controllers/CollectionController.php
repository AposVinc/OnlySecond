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
    public function EchoMessage($msg)
    {
        echo '<script type="text/javascript">
            alert("' . $msg . '")
            </script>';
    }

    public function showListForm()
    {
        $collections = Collection::withTrashed()->get();
        $brands = Brand::withTrashed()->get();
        return view('backend.collection.list', ['collections' => $collections, 'brands' => $brands]);
    }

    public function showAddForm()
    {
        $brands = Brand::all();
        return view('backend.collection.add',['brands' => $brands]);
    }

    public function showEditForm()
    {
        $brands = Brand::withoutTrashed()->with('collections')->get();
        return view('backend.collection.edit')->with('brands',$brands);
    }

    function getCollection(Request $request)
    {
        $value = $request->get('value');
        $collections = Collection::withoutTrashed()->where('brand_id', $value)->get();
        return $collections;
    }

    function getCollectionRestore(Request $request)
    {
        $value = $request->get('value');    //id del brand
        $data = Collection::onlyTrashed('collections')->where('brand_id', $value)->get();
        $output = '<option value="">Seleziona la collezione</option>';
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
        $collections = Collection::onlyTrashed('collections')->get();
        $brands = Brand::withTrashed()->get();
        if(sizeof($collections)==0) {
            $this->EchoMessage("Non ci sono Collezioni da ripristinare");
            return view('backend.index');
        }else {
            return view('backend.collection.restore',['brands' => $brands,'collections' => $collections]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $collection = new Collection();
        $collection->name =  $request->get('text-input');
        $collection->brand_id =  $request->get('brand');
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
        $collection= $request->get('collection');
        $newbrand= $request->get('newbrand');
        $newcollectionname=$request->get('newcollectionname');

        Collection::where('id',$collection)->update(['name' => $newcollectionname, 'brand_id' => $newbrand]);

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
        $idcollection = $request->get('collection');
        $idbrand= $request->get('brand');

        Brand::where('id',$idbrand)->restore();
        Collection::where('id',$idcollection)->restore();

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
        Collection::withTrashed()->find($collection)->delete();

        return redirect()->to('Admin/Collection/List');
    }
}
