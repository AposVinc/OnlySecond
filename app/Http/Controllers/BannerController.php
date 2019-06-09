<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Banner;
use Illuminate\Support\Facades\Input;

class BannerController extends Controller
{
    public function showListForm()
    {
        $banners = Banner::withTrashed()->with('collection')->get();
        return view('backend.banner.list', ['banners' => $banners]);
    }

    public function showAddForm()
    {
        $brands = Brand::all();
        return view('backend.banner.add',['brands' => $brands]);
    }

    public function create(){
        $input = Input::all();
        $banner = new Banner();
        $banner->image = $input['file-input'];
        $banner->collection_id = $input['collection'];
        $banner->save();
        return redirect()->to('Admin/Banner/List');
    }
}
