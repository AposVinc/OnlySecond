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
        $banners = Banner::get();
        return view('backend.banner.list', ['banners' => $banners]);
    }

    public function showImage($id)
    {
        $banner = Banner::where('id',$id)->first();
        return view('backend.banner.image', ['banner' => $banner]);
    }

    public function showAddForm()
    {
        $brands = Brand::all();
        return view('backend.banner.add',['brands' => $brands]);
    }

    public function showEditForm()
    {
        $brands = Brand::withTrashed()->get();
        return view('backend.banner.edit',['brands' => $brands]);
    }

    public function showDeleteForm()
    {
        $brands = Brand::withTrashed()->get();
        return view('backend.banner.delete',['brands' => $brands]);
    }

    function getBanner(Request $request)
    {
        $value = $request->get('value');
        $banners = Banner::where('collection_id', $value)->get();
        return $banners;
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
        }else{
            return redirect()->to('Admin/Banner/List')->with('error','File non trovato. Riprovare!!');
        }
    }

    public function update(Request $request)
    {
        $banner=$request->get('banner');
        $newcollection=$request->get('newcollection');

        $b = Banner::where('id', $banner)->first();
        $pathold = $b->path_image;
        $path = str_replace('storage', 'public', $pathold);
        Storage::delete($path);

        if ($request->hasFile('newbanner')) { //  se il file è presente nella request
            if ($request->file('newbanner')->isValid()) { // verificare che non si siano verificati problemi durante il caricamento del file
                $path='public/Banner';
                if(!(Storage::exists($path))){
                    Storage::makeDirectory($path);
                }
                $nameBrand=Brand::where('id', $request->get('newbrand'))->first()->name;
                $path.= '/'. $nameBrand;
                if(!(Storage::exists($path))){
                    Storage::makeDirectory($path);
                }
                $nameCollection=Collection::where('id', $newcollection)->first()->name;
                $path.= '/'. $nameCollection;
                if(!(Storage::exists($path))){
                    Storage::makeDirectory($path);
                }
                $counter=Banner::where('collection_id', $newcollection)->max('counter');
                $counter +=1;
                $filename= $nameBrand. '_'. $nameCollection. '_'. $counter. '.jpg';
                $path_image = 'storage/Banner/'. $nameBrand. '/'. $nameCollection. '/'. $filename;
                $path = $request->file('newbanner')->storeAs($path, $filename);
                if($path!=""){
                    if($request->get('visible')){
                        $visible = true;
                    }else{
                        $visible = false;
                    }
                    if (Banner::where('id', $banner)->update(['collection_id' => $newcollection, 'path_image' => $path_image, 'visible' => $visible, 'counter' => $counter])){
                        return redirect()->to('Admin/Banner/List')->with('success','Modifiche avvenute con successo!!');
                    }else{
                        return redirect()->to('Admin/Banner/List')->with('error','Errore durante il caricamento. Riprovare!!');
                    }
                }
            }else{
                return redirect()->to('Admin/Banner/List')->with('error','Errore durante il caricamento. Riprovare!!');
            }
        }else{
            return redirect()->to('Admin/Banner/List')->with('error','File non trovato. Riprovare!!');
        }

        /*if ($newcollection == ""){
            Banner::where('id',$banner)
                ->update(['path_image' => $newbanner]);
        } else if($newbanner=="") {
            Banner::where('id',$banner)
                ->update(['collection_id' => $newcollection]);
        }else{
            Banner::where('id',$banner)
                ->update(['path_image' => $newbanner,'collection_id' => $newcollection]);
        }

        return redirect()->to('Admin/Banner/List');*/
    }

    public function destroy(Request $request)
    {
        $banner=$request->get('banner');

        $b = Banner::where('id', $banner)->first();
        $pathold = $b->path_image;
        $path = str_replace('storage', 'public', $pathold);
        Storage::delete($path);

        Banner::where('id',$banner)->delete();

        return redirect()->to('Admin/Banner/List');
    }

}
