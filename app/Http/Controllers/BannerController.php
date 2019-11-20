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
        $banners = Banner::withTrashed()->get();
        return view('backend.banner.list', ['banners' => $banners]);
    }

    public function showImage($id)
    {
        $banner = Banner::where('id',$id)->first();
        return view('backend.banner.showimage', ['banner' => $banner]);
    }

    public function showAddForm()
    {
        if (Collection::withoutTrashed()->exists()){
            $brands = Brand::all();
            return view('backend.banner.add',['brands' => $brands]);
        } else {
            return redirect()->to('Admin/Banner/List')->with('error','Impossibile inserire una nuovo Banner. Inserire prima una Collezione!!');
        }
    }

    public function showEditForm()
    {
        if (Banner::withoutTrashed()->exists()){
            $brands = Brand::all();
            return view('backend.banner.edit',['brands' => $brands]);
        } else {
            return redirect()->to('Admin/Banner/List')->with('error','Non ci sono Banner da Modificare!!');
        }
    }

    public function showDeleteForm()
    {
        if (Banner::withoutTrashed()->exists()){
            $brands = Brand::all();
            return view('backend.banner.delete', ['brands' => $brands]);
        } else {
            return redirect()->to('Admin/Banner/List')->with('error','Non ci sono Banner da Eliminare!!');
        }
    }

    public function showRestoreForm()
    {
        if (Banner::onlyTrashed()->exists()){
            $brands = Brand::all();
            return view('backend.banner.restore', ['brands' => $brands]);
        } else {
            return redirect()->to('Admin/Banner/List')->with('error','Non ci sono Banner da Ripristinare!!');
        }
    }

    function getBanner(Request $request)
    {
        $value = $request->get('value');
        $banners = Banner::withoutTrashed()->where('collection_id', $value)->get();
        return $banners;
    }

    function getBannerRestore(Request $request)
    {
        $value = $request->get('value');
        $banners = Banner::onlyTrashed()->where('collection_id', $value)->get();
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
                $type=$request->type;
                $counter=Banner::where('collection_id', $idCollection)->max('counter');
                $counter +=1;
                $filename= $nameBrand. '_'. $nameCollection. '_'. $type. '_'. $counter. '.jpg';
                $path_image = 'storage/Banner/'. $nameBrand. '/'. $nameCollection. '/'. $filename;
                $path = $request->file('file')->storeAs($path, $filename);
                if($path!=""){
                    $banner = new Banner();
                    $banner->path_image = $path_image;
                    $banner->collection_id = $idCollection;
                    $banner->type = $type;
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
                }else{
                    return redirect()->to('Admin/Banner/List')->with('error','Errore durante il caricamento. Riprovare!!');
                }
            }else{
                return redirect()->to('Admin/Banner/List')->with('error','Errore durante il caricamento. Riprovare!!');
            }
         }else{
             return redirect()->to('Admin/Banner/List')->with('error','Errore durante il caricamento. Riprovare!!');
         }
    }

    public function update(Request $request)
    {
        $id=$request->get('banner');
        $banner = Banner::where('id', $id)->first();
        $type = $banner->type;
        if($request->get('visible')){
            $banner->visible = true;
        }else{
            $countVisible = Banner::withoutTrashed()->where('type',$type)->where('visible', true)->count('visible');
            if($countVisible>=2) {
                $banner->visible = false;
            }else{
                return redirect()->to('Admin/Banner/List')->with('error', 'Attenzione!! Rendere visibile un altro banner per effettuare questa Modifica');
            }
        }
        if ($banner->update()){
            return redirect()->to('Admin/Banner/List')->with('success','Modifiche avvenute con successo!!');
        }else {
            return redirect()->to('Admin/Banner/List')->with('error', 'Errore durante il caricamento. Riprovare!!');
        }
    }

    public function destroy(Request $request)
    {
        $banner=$request->get('banner');
        $type = Banner::where('id', $banner)->first()->type;
        if(Banner::where('id', $banner)->first()->visible){
            $countVisible = Banner::withoutTrashed()->where('type',$type)->where('visible', true)->count('visible');
            if($countVisible>=2){
                $result = $this->removeBanner($banner);
                if($result == "Success"){
                    return redirect()->to('Admin/Banner/List')->with('success', 'Eliminazione avvenuta con successo!!');
                }else{
                    return redirect()->to('Admin/Banner/List')->with('error', 'Errore durante l\'Eliminazione, Riprovare!!');
                }
            }else{
                return redirect()->to('Admin/Banner/List')->with('error', 'Attenzione!! Rendere visibile un altro banner (dello stesso tipo) per effettuare questa Eliminazione');
            }
        }else{
            $result = $this->removeBanner($banner);
            if($result == "Success"){
                return redirect()->to('Admin/Banner/List')->with('success', 'Eliminazione avvenuta con successo!!');
            }else{
                return redirect()->to('Admin/Banner/List')->with('error', 'Errore durante l\'Eliminazione, Riprovare!!');
            }
        }
    }

    function removeBanner($banner){
        $oldpath = Banner::where('id', $banner)->first()->path_image;
        $path = str_replace('storage', 'public', $oldpath);

        if (Storage::delete($path) and Banner::where('id', $banner)->forceDelete()){
            return "Success";
        } else {
            return "Error";
        }
    }

    public function restore(Request $request){

        if(Banner::where('id', $request->get('banner'))->restore()){
            return redirect()->to('Admin/Banner/List')->with('success', 'Ripristino avvenuto con successo!!');
        }else{
            return redirect()->to('Admin/Banner/List')->with('error', 'Errore durante il Ripristino. Riprovare!!');
        }
    }

}
