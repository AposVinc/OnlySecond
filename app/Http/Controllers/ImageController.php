<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use App\Brand;
use App\Collection;
use App\Product;
use App\Color;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function showListForm()
    {
        $images = Image::withTrashed()->get();
        return view('backend.image.list', ['images' => $images ]);
    }

    public function showAddForm()
    {
        if(Product::withoutTrashed()->exists()){
            $brands = Brand::all();
            return view('backend.image.add',['brands' => $brands]);
        }else{
            return redirect()->to('Admin/Image/List')->with('error', 'Impossibile inserire una nuova Immagine. Inserire prima un Prodotto!!');
        }
    }

    public function showImage($id)
    {
        $image = Image::where('id',$id)->withTrashed()->first();
        return view('backend.image.showimage', ['image' => $image]);
    }

    public function showEditMainForm()
    {
        if(Image::withoutTrashed()->where('main',1)->exists()){
            $brands = Brand::all();
            return view('backend.image.editmain',['brands' => $brands]);
        }else{
            return redirect()->to('Admin/Image/List')->with('error','Non ci sono Immagini Principali da Modificare!!');
        }
    }

    public function showDeleteForm()
    {
        if(Image::withoutTrashed()->where('main',0)->exists()){
            $brands = Brand::all();
            return view('backend.image.delete',['brands' => $brands]);
        }else{
            return redirect()->to('Admin/Image/List')->with('error','Non ci sono Immagini da Eliminare!!');
        }
    }

    public function getImage(Request $request)
    {
        $value = $request->get('value');
        $images = Image::withoutTrashed()->where('product_id', $value)->where('main',0)->get();
        return $images;
    }

    public function create(Request $request)
    {
        if ($request->hasFile('file')) { //  se il file è presente nella request
            if ($request->file('file')->isValid()) { // verificare che non si siano verificati problemi durante il caricamento del file
                $path = 'public/Orologi';
                if (!(Storage::exists($path))) {
                    Storage::makeDirectory($path);
                }
                $nameBrand = Brand::where('id', $request->get('brand'))->first()->name;
                $path .= '/' . $nameBrand;
                if (!(Storage::exists($path))) {
                    Storage::makeDirectory($path);
                }
                $idCollection = $request->get('collection');
                $nameCollection = Collection::where('id', $idCollection)->first()->name;
                $path .= '/' . $nameCollection;
                if (!(Storage::exists($path))) {
                    Storage::makeDirectory($path);
                }
                $idproduct = $request->get('product');
                $product = Product::where('id', $idproduct)->first();
                $cod = $product->cod;
                $color_id = $product->color_id;
                $color = Color::where('id',$color_id)->first()->name;
                $counter = Image::where('product_id', $idproduct)->max('counter');
                $counter += 1;
                $filename = $nameBrand. '_'. $nameCollection. '_'. $cod. '_'. $color. '_'. $counter. '.jpg';
                $path_image = 'storage/Orologi/'. $nameBrand. '/'. $nameCollection. '/'. $filename;
                $path = $request->file('file')->storeAs($path, $filename);
                if ($path != "") {
                    $image = new Image();
                    $image->path_image = $path_image;
                    $image->product_id = $idproduct;
                    $image->main = 0;
                    $image->counter = $counter;
                    if ($image->save()) {
                        return redirect()->to('Admin/Image/List')->with('success', 'Caricamento avvenuto con successo!!');
                    } else {
                        return redirect()->to('Admin/Image/List')->with('error', 'Errore durante il caricamento. Riprovare!!');
                    }
                }else{
                    return redirect()->to('Admin/Image/List')->with('error', 'Errore durante il caricamento. Riprovare!!');
                }
            } else {
                return redirect()->to('Admin/Image/List')->with('error', 'Errore durante il caricamento. Riprovare!!');
            }
        } else {
            return redirect()->to('Admin/Image/List')->with('error', 'File non trovato. Riprovare!!');
        }
    }

    public function updateMain(Request $request)
    {
        $image = Image::where('product_id', $request->get('product'))->where('main',1)->first();
        $oldpath = $image->path_image;
        $imageId = $image->id;
        $path = str_replace('storage', 'public', $oldpath);

        if(Storage::delete($path)){
            if ($request->hasFile('file')) { //  se il file è presente nella request
                if ($request->file('file')->isValid()) { // verificare che non si siano verificati problemi durante il caricamento del file
                    $path = 'public/Orologi';
                    if (!(Storage::exists($path))) {
                        Storage::makeDirectory($path);
                    }
                    $nameBrand = Brand::where('id', $request->get('brand'))->first()->name;
                    $path .= '/' . $nameBrand;
                    if (!(Storage::exists($path))) {
                        Storage::makeDirectory($path);
                    }
                    $idCollection = $request->get('collection');
                    $nameCollection = Collection::where('id', $idCollection)->first()->name;
                    $path .= '/' . $nameCollection;
                    if (!(Storage::exists($path))) {
                        Storage::makeDirectory($path);
                    }
                    $idproduct = $request->get('product');
                    $product = Product::where('id', $idproduct)->first();
                    $cod = $product->cod;
                    $color_id = $product->color_id;
                    $color = Color::where('id',$color_id)->first()->name;
                    $filename = $nameBrand. '_'. $nameCollection. '_'. $cod. '_'. $color. '.jpg';
                    $path_image = 'storage/Orologi/'. $nameBrand. '/'. $nameCollection. '/'. $filename;
                    $path = $request->file('file')->storeAs($path, $filename);
                    if ($path != "") {
                        if (Image::where('id',$imageId)->update(['path_image' => $path_image])) {
                            return redirect()->to('Admin/Image/List')->with('success', 'Modifiche avvenute con successo!!');
                        } else {
                            return redirect()->to('Admin/Image/List')->with('error', 'Errore durante il caricamento. Riprovare!!');
                        }
                    }else{
                        return redirect()->to('Admin/Image/List')->with('error', 'Errore durante il caricamento. Riprovare!!');
                    }
                } else {
                    return redirect()->to('Admin/Image/List')->with('error', 'Errore durante il caricamento. Riprovare!!');
                }
            } else {
                return redirect()->to('Admin/Image/List')->with('error', 'File non trovato. Riprovare!!');
            }
        }else{
            return redirect()->to('Admin/Image/List')->with('error', 'Errore durante il caricamento. Riprovare!!');
        }
    }

    public function destroy(Request $request)
    {
        $image = Image::where('id', $request->get('image'))->first();
        $oldpath = $image->path_image;
        $path = str_replace('storage', 'public', $oldpath);

        if(Storage::delete($path)){
            if(Image::where('id', $request->get('image'))->forceDelete()){
                return redirect()->to('Admin/Image/List')->with('success', 'Eliminazione avvenuta con successo!!');
            }else{
                return redirect()->to('Admin/Image/List')->with('error', 'Errore durante l\'Eliminazione, Riprovare!!');
            }
        }else{
            return redirect()->to('Admin/Image/List')->with('error', 'Errore durante l\'Eliminazione, Riprovare!!');
        }
    }
}
