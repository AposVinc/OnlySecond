<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use App\Brand;
use App\Collection;
use App\Product;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function showListForm()
    {
        $images = Image::get();
        return view('backend.image.list', ['images' => $images ]);
    }

    public function showAddForm()
    {
        $brands = Brand::all();
        return view('backend.image.add',['brands' => $brands]);
    }

    public function showImage($id)
    {
        $image = Image::where('id',$id)->first();
        return view('backend.image.showimage', ['image' => $image]);
    }

    public function create()
    {
        $input = Input::all();
        $banner = new Image();
        $banner->image = $input['file-input'];
        $banner->product_id = $input['product'];
        if($banner->save()){
            return redirect()->to('Admin/Image/List')->with('success', 'Caricamento avvenuto con successo!!');
        }else{
            return redirect()->to('Admin/Image/List')->with('error', 'Errore durante il caricamento. Riprovare!!!!');
        }
    }
}
