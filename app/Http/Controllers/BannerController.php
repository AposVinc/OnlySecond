<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Banner;
use App\Collection;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function showListForm()
    {
        $banners = Banner::withTrashed()->with('collection')->get();
        $collections=new \Illuminate\Database\Eloquent\Collection();
        foreach ($banners as $banner){
            $c=Collection::withTrashed()->where('name',$banner->collection->name)->with('brand')->get();
            foreach ($c as $collection){
                if(!($collections->contains($collection))){
                    $collections->add($collection);
                }
            }
        }
        return view('backend.banner.list', ['banners' => $banners , 'collections'=> $collections]);
    }

    public function showImage($id)
    {
        $banner = Banner::find($id)->get();
        return view('backend.banner.image', ['banner' => $banner]);
    }

    public function showAddForm()
    {
        $brands = Brand::all();
        return view('backend.banner.add',['brands' => $brands]);
    }

    public function showEditForm()
    {
        $banners = Banner::withoutTrashed()->with('collection')->get();
        $brandsBanner=new \Illuminate\Database\Eloquent\Collection();
        foreach ($banners as $banner){
            $b=Brand::withTrashed()->where('id',$banner->collection->brand_id)->get();
            foreach ($b as $b1){
                if(!($brandsBanner->contains($b1))){
                    $brandsBanner->add($b1);
                }
            }
        }
        $brands=Brand::all();
        return view('backend.banner.edit',['brandsBanner' => $brandsBanner, 'brands'=> $brands]);
    }

    public function showDeleteForm()
    {
        $banners = Banner::withoutTrashed()->with('collection')->get();
        $brands = new \Illuminate\Database\Eloquent\Collection();
        foreach ($banners as $banner){
            $b=Brand::withTrashed()->where('id',$banner->collection->brand_id)->get();
            foreach ($b as $b1){
                if(!($brands->contains($b1))){
                    $brands->add($b1);
                }
            }
        }
        return view('backend.banner.delete',['brands' => $brands]);
    }

    public function showRestoreForm()
    {
        $banners = Banner::onlyTrashed()->with('collection')->get();
        $brands=new \Illuminate\Database\Eloquent\Collection();
        foreach ($banners as $banner){
            $b=Brand::withTrashed()->where('id',$banner->collection->brand_id)->get();
            foreach ($b as $b1){
                if(!($brands->contains($b1))){
                    $brands->add($b1);
                }
            }
        }
        return view('backend.banner.restore',['brands' => $brands]);
    }


    function getBanner(Request $request)
    {
        $value = $request->get('value');    //id della collection
        $data=Banner::withoutTrashed()->where('collection_id',$value)->get();
        $output ='<option value="0">Seleziona il banner</option>';
        foreach($data as $row)
        {
            $output .= '<option value="'.$row->id.'">'.$row->image.'</option>';
        }
        return $output;
    }

    function getBannerRestore(Request $request)
    {
        $value = $request->get('value');    //id della collection
        $data=Banner::onlyTrashed()->where('collection_id',$value)->get();
        $output ='<option value="0">Seleziona il banner</option>';
        foreach($data as $row)
        {
            $output .= '<option value="'.$row->id.'">'.$row->image.'</option>';
        }
        return $output;
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
                $filename= $nameBrand. '_'. $nameCollection. '_'. $counter;
                $path = $request->file('file')->storeAs($path, $filename);
                if($path!=""){
                    $banner = new Banner();
                    $banner->path_image = $path;
                    $banner->collection_id = $idCollection;
                    $banner->counter = $counter;
                    if($request->get('inline-radios')){
                        $banner->visible = true;
                    }else{
                        $banner->visible = false;
                    }
                    $banner->save();
                    return redirect()->to('Admin/Banner/List')->with('status','Caricamento avvenuto con successo!!');
                }
            }else{
                return redirect()->to('Admin/Banner/List')->with('status','Errore durante il caricamento. Riprovare!!');
            }
        }else{
            return redirect()->to('Admin/Banner/List')->with('status','File non trovato. Riprovare!!');
        }

    }

    public function update(Request $request)
    {
        $banner=$request->get('banner');
        $newcollection=$request->get('newcollection');
        $newbanner=$request->get('newbanner');

        if ($newcollection == "0"){
            Banner::where('id',$banner)
                ->update(['image' => $newbanner]);
        } else if($newbanner=="") {
            Banner::where('id',$banner)
                ->update(['collection_id' => $newcollection]);
        }else{
            Banner::where('id',$banner)
                ->update(['image' => $newbanner,'collection_id' => $newcollection]);
        }

        return redirect()->to('Admin/Banner/List');
    }

    public function restore(Request $request)   //query senza nome
    {
        $id = $request->get('banner');
        Banner::where('id',$id)->restore();

        return redirect()->to('Admin/Banner/List');
    }

    public function destroy(Request $request)
    {
        $banner=$request->get('banner');
        Banner::where('id',$banner)->delete();

        return redirect()->to('Admin/Banner/List');
    }

}
