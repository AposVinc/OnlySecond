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
        if (Collection::withoutTrashed()->exists()){
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

    public function showRestoreForm()
    {
        if (Collection::onlyTrashed()->exists()){
            $brands = Brand::all();
            return view('backend.collection.restore',['brands' => $brands]);
        } else {
            return redirect()->to('Admin/Collection/List')->with('error','Non ci sono Collezioni da Ripristinare!!');
        }
    }

    public function showDeleteForm()
    {
        if (Collection::withoutTrashed()->exists()){
            $brands = Brand::all();
            return view('backend.collection.delete',['brands' => $brands]);
        } else {
            return redirect()->to('Admin/Collection/List')->with('error','Non ci sono Collezioni da Eliminare!!');
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

        $collection = Collection::withTrashed()->where('id',$idcollection)->first();

        if ($collection->restore()) {
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
        $idcollection = $request->get('collection');

        $collection = Collection::withTrashed()->where('id',$idcollection)->first();

        if(Banner::withoutTrashed()->where('collection_id', $idcollection)->exists()){
            $visible = false;
            $banners = Banner::withoutTrashed()->where('collection_id', $idcollection)->get();
            foreach ($banners as $banner){
                if($banner->visible){
                    $visible = true;
                }
            }
            if($visible){
                $countVisibleTot = Banner::withoutTrashed()->where('visible', true)->count('visible');
                $coutnVisibleCollection = Banner::withoutTrashed()->where('visible', true)->where('collection_id',$idcollection)->count('visible');
                $countVisible = $countVisibleTot - $coutnVisibleCollection;
                if($countVisible>=1) {
                    if(Banner::withTrashed()->where('collection_id',$idcollection)->update(['visible' => false])) {
                        if ($collection->delete()) {
                            return redirect()->to('Admin/Collection/List')->with('success', 'Eliminazione avvenuta con successo!!');
                        } else {
                            return redirect()->to('Admin/Collection/List')->with('error', 'Errore durante l\'Eliminazione, Riprovare!!');
                        }
                    }else{
                        return redirect()->to('Admin/Collection/List')->with('error', 'Errore durante l\'Eliminazione, Riprovare!!');
                    }
                }else{
                    return redirect()->to('Admin/Collection/List')->with('error', 'Attenzione!! Rendere visibile un altro Banner per effettuare questa Eliminazione');
                }
            }else{
                if ($collection->delete()) {
                    return redirect()->to('Admin/Collection/List')->with('success', 'Eliminazione avvenuta con successo!!');
                } else {
                    return redirect()->to('Admin/Collection/List')->with('error', 'Errore durante l\'Eliminazione, Riprovare!!');
                }
            }
        }else{
            if ($collection->delete()) {
                return redirect()->to('Admin/Collection/List')->with('success', 'Eliminazione avvenuta con successo!!');
            } else {
                return redirect()->to('Admin/Collection/List')->with('error', 'Errore durante l\'Eliminazione, Riprovare!!');
            }
        }
    }

}
