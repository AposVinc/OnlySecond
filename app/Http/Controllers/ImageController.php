<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Brand;
use App\Image;
use App\Product;

class ImageController extends Controller
{
    public function showListForm()
    {
        $images = Image::withTrashed()->with('product')->get();
        $products = new Collection();
        $collections = new Collection();
        foreach ($images as $image){
            $p=Product::withTrashed()->where('name',$image->product->name)->with('collection')->get();
            foreach ($p as $product){
                if(!($products->contains($product))){
                    $products->add($product);
                }
                $c=\App\Collection::withoutTrashed()->where('name',$product->collection->name)->with('brand')->get();
                foreach ($c as $collection){
                    if(!($collections->contains($collection))){
                        $collections->add($collection);
                    }
                }
            }
        }
        return view('backend.image.list', ['images' => $images , 'products'=> $products, 'collections'=> $collections]);
    }

    public function showAddForm()
    {
        $brands = Brand::all();
        return view('backend.image.add',['brands' => $brands]);
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
