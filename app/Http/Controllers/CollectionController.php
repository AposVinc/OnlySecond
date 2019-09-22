<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Brand;
use App\Collection;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function showListForm()
    {
        $collections = Collection::withTrashed()->get();
        return view('backend.collection.list', ['collections' => $collections]);
    }

    public function showAddForm()
    {
        if (Brand::withoutTrashed()->exists()){
            $brands = Brand::all();
            return view('backend.collection.add',['brands' => $brands]);
        } else {
            return redirect()->to('Admin/Collection/List')->with('error','Impossibile inserire una nuova Collezione. Inserire prima un Brand!!');
        }
    }

    public function showEditForm()
    {
        if (Brand::withoutTrashed()->exists()){
            $brands = Brand::all();
            return view('backend.collection.edit',['brands' => $brands]);
        } else {
            return redirect()->to('Admin/Collection/List')->with('error','Non ci sono Collezioni da Modificare!!');
        }
    }

    function getCollection(Request $request)
    {
        $value = $request->get('value');
        $collections = Collection::withoutTrashed()->where('brand_id', $value)->get();
        return $collections;
    }

    function getCollectionRestore(Request $request)
    {
        $value = $request->get('value');
        $collections = Collection::onlyTrashed()->where('brand_id', $value)->get();
        return $collections;
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

    public function showRestoreForm()
    {
        if (Collection::onlyTrashed()->exists()){
            $brands = Brand::all();
            return view('backend.collection.restore',['brands' => $brands]);
        } else {
            return redirect()->to('Admin/Collection/List')->with('error','Non ci sono elementi da ripristinare!!');
        }
    }

    public function showDeleteForm()
    {
        if (Collection::withoutTrashed()->exists()){
            $brands = Brand::all();
            return view('backend.collection.delete',['brands' => $brands]);
        } else {
            return redirect()->to('Admin/Collection/List')->with('error','Non ci sono elementi da Eliminare!!');
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (Collection::where('name',$request->name)->first()){
            return redirect()->to('Admin/Collection/List')->with('error', 'La Collezione già esiste!!');
        }else {
            $collection = new Collection();
            $collection->name = $request->name;
            $collection->brand_id = $request->get('brand');
            if ($collection->save()){
                return redirect()->to('Admin/Collection/List')->with('success', 'Caricamento avvenuto con successo!!');
            } else {
                return redirect()->to('Admin/Collection/List')->with('error','Errore durante il caricamento. Riprovare!!');
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if (Collection::where('name',$request->newcollectionname)->first()){
            return redirect()->to('Admin/Collection/List')->with('error', 'La Collezione già esiste!!');
        }else{
            $collection = $request->get('collection');
            $newbrand = $request->get('newbrand');
            $newcollectionname = $request->get('newcollectionname');

            if (Collection::where('id',$collection)->update(['name' => $newcollectionname, 'brand_id' => $newbrand])){
                return redirect()->to('Admin/Collection/List')->with('success','Modifiche avvenute con successo!!');
            }else{
                return redirect()->to('Admin/Collection/List')->with('error','Errore durante il caricamento. Riprovare!!');
            }
        }
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

        if (Collection::where('id',$idcollection)->restore()) {
            return redirect()->to('Admin/Collection/List')->with('success','Ripristino avvenuto con successo!!');
        }else{
            return redirect()->to('Admin/Collection/List')->with('error', 'Errore durante il Ripristino. Riprovare!!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $collection = $request->get('collection');

        if (Collection::withTrashed()->find($collection)->delete()) {
            return redirect()->to('Admin/Collection/List')->with('success', 'Eliminazione avvenuta con successo!!');
        } else {
            return redirect()->to('Admin/Collection/List')->with('error', 'Errore durante l\'eliminazione, Riprovare!!');
        }
    }
}
