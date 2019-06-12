<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Banner;
use App\Collection;
use Illuminate\Support\Facades\Input;
use function Sodium\add;

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

    public function create()
    {
        $input = Input::all();
        $banner = new Banner();
        $banner->image = $input['file-input'];
        $banner->collection_id = $input['collection'];
        $banner->save();
        return redirect()->to('Admin/Banner/List');
    }
}
