<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Banner;
use App\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function showListForm()
    {
        $banners = Banner::all();
        return view('backend.banner.list', ['banners' => $banners]);
    }

    public function showImage($id)
    {
        $banner = Banner::where('id',$id)->first();
        return view('backend.banner.showimage', ['banner' => $banner]);
    }

    public function showAddForm()
    {
        $brands = Brand::all();
        return view('backend.banner.add',['brands' => $brands]);
    }

    public function showEditForm()
    {
        $brands = Brand::all();
        return view('backend.banner.edit',['brands' => $brands]);
    }

    public function showDeleteForm()
    {
        if (Banner::all()->isNotEmpty()){
            $brands = Brand::all();
            return view('backend.banner.delete', ['brands' => $brands]);
        } else {
            return redirect()->to('Admin/Banner/List')->with('error','Non ci sono elementi da eliminare!!');
        }
    }

    function getBanner(Request $request)
    {
        $value = $request->get('value');
        $banners = Banner::where('collection_id', $value)->get();
        return $banners;
    }

    function getVisible(Request $request)
    {
        $value = $request->get('value'); //id banner
        $bool = Banner::where('id', $value)->first()->visible;
        return $bool; //restiruisce 0 o 1
    }


    public function create(Request $request)
    {
         if ($request->hasFile('file')) { //  se il file è presente nella request
             if ($request->file('file')->isValid()) { // verificare che non si siano verificati problemi durante il caricamento del file
                $path='public/Banner';
                if(!(Storage::exists($path))){
                    Storage::makeDirectory($path);
                }
                $nameBrand=Brand::where('id', $request->get('brand'))->first()->name;
                $path.= '/'. $nameBrand;
                if(!(Storage::exists($path))){
                    Storage::makeDirectory($path);
                }
                $idCollection=$request->get('collection');
                $nameCollection=Collection::where('id', $idCollection)->first()->name;
                $path.= '/'. $nameCollection;
                if(!(Storage::exists($path))){
                    Storage::makeDirectory($path);
                }
                $counter=Banner::where('collection_id', $idCollection)->max('counter');
                $counter +=1;
                $filename= $nameBrand. '_'. $nameCollection. '_'. $counter. '.jpg';
                $path_image = 'storage/Banner/'. $nameBrand. '/'. $nameCollection. '/'. $filename;
                $path = $request->file('file')->storeAs($path, $filename);
                if($path!=""){
                    $banner = new Banner();
                    $banner->path_image = $path_image;
                    $banner->collection_id = $idCollection;
                    $banner->counter = $counter;
                    if($request->get('visible')){
                        $banner->visible = true;
                    }else{
                        $banner->visible = false;
                    }
                    if ($banner->save()){
                        return redirect()->to('Admin/Banner/List')->with('success','Caricamento avvenuto con successo!!');
                    }else{
                        return redirect()->to('Admin/Banner/List')->with('error','Errore durante il caricamento. Riprovare!!');
                    }
                }
            }else{
                return redirect()->to('Admin/Banner/List')->with('error','Errore durante il caricamento. Riprovare!!');
            }
        }
    }

    public function update(Request $request)
    {
        echo $request->visible;
        /*
        $id=$request->get('banner');
        $banner = Banner::where('id', $id)->first();
        if($request->get('visible')){
            $banner->visible = true;
        }else{
            $banner->visible = false;
        }
        if ($banner->update()){
            return redirect()->to('Admin/Banner/List')->with('success','Modifiche avvenute con successo!!');
        }else{
            return redirect()->to('Admin/Banner/List')->with('error','Errore durante il caricamento. Riprovare!!');
        }*/
    }

    public function destroy(Request $request)
    {
        $banner=$request->get('banner');

        $b = Banner::where('id', $banner)->first();
        $oldpath = $b->path_image;
        $path = str_replace('storage', 'public', $oldpath);
        if (Storage::delete($path) and $b->delete()){
            return redirect()->to('Admin/Banner/List')->with('success', 'Eliminazione avvenuta con successo!!');
        } else {
            return redirect()->to('Admin/Banner/List')->with('error', 'Errore durante l\'eliminazione, Riprovare!!');
        }
    }

}
