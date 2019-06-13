<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Banner;
use App\Collection;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

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

    public function showAddForm()
    {
        $brands = Brand::all();
        return view('backend.banner.add',['brands' => $brands]);
    }

    public function showEditForm()
    {
        $banners = Banner::withTrashed()->with('collection')->get();
        $brands=new \Illuminate\Database\Eloquent\Collection();
        foreach ($banners as $banner){
            $b=Brand::withTrashed()->where('id',$banner->collection->brand_id)->get();
            foreach ($b as $b1){
                if(!($brands->contains($b1))){
                    $brands->add($b1);
                }
            }
        }
        return view('backend.banner.edit',['brands' => $brands]);
    }

    function getBanner(Request $request)
    {
        $value = $request->get('value');    //id della collection
        $data=Banner::withTrashed()->where('collection_id',$value)->get();
        $output ='<option value="0">Seleziona il banner</option>';
        foreach($data as $row)
        {
            //$url="http://localhost/OnlySecond/public/../images/". $row->image; <img src="'.$url.'"/>
            $output .= '<option value="'.$row->id.'">'.$row->image.'</option>';
        }
        return $output;
    }

    public function create()
    {
        $input = Input::all();
        $banner = new Banner();
        $banner->image = $input['file-input'];
        $banner->collection_id = $input['collection'];
        $banner->save();
        return redirect()->to('Admin/Banner/List');
    }

    public function update(Request $request)
    {
        $collection= $request->get('collection');
        $banner=$request->get('banner');
        $newcollection=$request->get('newcollection');
        $newbanner=$request->get('newbanner');

        Banner::where('id',$banner)->restore();

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
}
