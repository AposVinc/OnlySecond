<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Brand;
use App\Category;
use App\CategoryProduct;
use App\Color;
use App\Offer;
use App\Product;
use App\Supplier;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /*-------------------   BACKEND   -------------------*/

    public function showListForm()
    {
        $products = Product::withTrashed()->get();
        return view('backend.product.list', ['products' => $products]);
    }

    public function showAddForm()
    {
        $brands = Brand::all();
        $categories = Category::all();
        $suppliers = Supplier::all();
        $colors = Color::all();
        return view('backend.product.add',['brands' => $brands,'categories' => $categories, 'suppliers' => $suppliers, 'colors' => $colors]);
    }

    public function showEditForm()
    {
        $brands = Brand::all();
        $categories = Category::all();
        $suppliers = Supplier::all();
        $colors = Color::all();
        return view('backend.product.edit',['brands' => $brands,'categories' => $categories, 'suppliers' => $suppliers, 'colors' => $colors]);
    }

    public function showDeleteForm()
    {
        if (Product::withoutTrashed()->exists()){
            $brands = Brand::all();
            return view('backend.product.delete', ['brands' => $brands]);
        } else {
            return redirect()->to('Admin/Product/List')->with('error','Non ci sono elementi da Eliminare!!');
        }
    }

    public function showRestoreForm()
    {
        if (Product::onlyTrashed()->exists()){
            $brands = Brand::all();
            return view('backend.product.restore', ['brands' => $brands]);
        } else {
            return redirect()->to('Admin/Product/List')->with('error','Non ci sono elementi da ripristinare!!!!');
        }
    }


    function getProduct(Request $request)
    {
        $value = $request->get('value');
        $products = Product::withoutTrashed()->where('collection_id', $value)->get();
        return $products;
    }

    function getProductRestore(Request $request)
    {
        $value = $request->get('value');
        $products = Product::onlyTrashed()->where('collection_id', $value)->get();
        return $products;
    }

    function getProductWithOffer(Request $request)
    {
        $value = $request->get('value');
        //$products = Product::withoutTrashed()->where('collection_id', $value)->has('offer')->get();
        $products = new Collection();
        $offers = Offer::all();
        foreach ($offers as $offer){
            $product = $offer->product;
            if ($product->collection_id == $value){
                $products->push($product);
            }
        }
        return $products;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)  //
    {
        //Save product
        $product = new Product();
        $product->cod=$request->get('cod');
        $product->collection_id= $request->get('collection');
        $product->price= $request->get('price');
        $product->stock_availability= $request->get('quantity');
        $product->genre= $request->get('inline-radios');
        $product->long_desc= $request->get('desc');
        $product->supplier_id= $request->get('supplier');
        $product->color_id= $request->get('color');
        $product->save();

        $idProduct= $product->id;

        //Save main image
        $this->saveMainImage($request,$idProduct);

        //Save category - product rel
        $categories = Category::withoutTrashed()->get();
        foreach ($categories as $category){
            if($request->get($category->id)) {
                $category_product = new CategoryProduct();
                $category_product->category_id = $request->get($category->id);
                $category_product->product_id = $idProduct;
                $category_product->save();
            }
        }

        //Save other image
        if ($request->hasFile('other-photo')) { //  se il file è presente nella request
            $images = $request->file('other-photo');
            foreach ($images as $image) {
                $this->saveOtherImage($image, $request, $idProduct);
            }
        }else{
            return redirect()->to('Admin/Product/List'); // Aggiungere errore
        }

        //Save specification

        return redirect()->to('Admin/Product/List');
    }

    function saveOtherImage($image,$request,$idProduct){
        if ($image->isValid()) { // verificare che non si siano verificati problemi durante il caricamento del file
            $path='public/Orologi';
            if(!(Storage::exists($path))){
                Storage::makeDirectory($path);
            }
            $nameBrand=Brand::where('id', $request->get('brand'))->first()->name;
            $path.= '/'. $nameBrand;
            if(!(Storage::exists($path))){
                Storage::makeDirectory($path);
            }
            $idCollection=$request->get('collection');
            $nameCollection=\App\Collection::where('id', $idCollection)->first()->name;
            $path.= '/'. $nameCollection;
            if(!(Storage::exists($path))){
                Storage::makeDirectory($path);
            }
            $cod = $request->get('cod');
            $color_id = $request->get('color');
            $color = Color::where('id',$color_id)->first()->name;
            $counter = Image::where('product_id',$idProduct)->max('counter');
            $counter +=1;
            $filename= $nameBrand. '_'. $nameCollection. '_'. $cod. '_'. $color. '_'. $counter. '.jpg';
            $path_image = 'storage/Orologi/'. $nameBrand. '/'. $nameCollection. '/'. $filename;
            $path = $image->storeAs($path, $filename);
            if($path!=""){
                $image = new Image();
                $image->path_image = $path_image;
                $image->product_id = $idProduct;
                $image->main = 0;
                $image->counter = $counter;
                $image->save();
                echo "successo";
            }
        }else{
            echo "Error";
        }
    }

    function saveMainImage($request,$idProduct)
    {
        if ($request->hasFile('main-photo')) { //  se il file è presente nella request
            if ($request->file('main-photo')->isValid()) { // verificare che non si siano verificati problemi durante il caricamento del file
                $path='public/Orologi';
                if(!(Storage::exists($path))){
                    Storage::makeDirectory($path);
                }
                $nameBrand=Brand::where('id', $request->get('brand'))->first()->name;
                $path.= '/'. $nameBrand;
                if(!(Storage::exists($path))){
                    Storage::makeDirectory($path);
                }
                $idCollection=$request->get('collection');
                $nameCollection=\App\Collection::where('id', $idCollection)->first()->name;
                $path.= '/'. $nameCollection;
                if(!(Storage::exists($path))){
                    Storage::makeDirectory($path);
                }
                $cod = $request->get('cod');
                $color_id = $request->get('color');
                $color = Color::where('id',$color_id)->first()->name;
                $filename= $nameBrand. '_'. $nameCollection. '_'. $cod. '_'. $color. '.jpg';
                $path_image = 'storage/Orologi/'. $nameBrand. '/'. $nameCollection. '/'. $filename;
                $path = $request->file('main-photo')->storeAs($path, $filename);
                if($path!=""){
                    $image = new Image();
                    $image->path_image = $path_image;
                    $image->main = 1;
                    $image->counter = 0;
                    $image->product_id = $idProduct;
                    $image->save();
                    echo "successo";
                }
            }else{
                echo "Error";
            }
        }else{
            echo "Error";
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id = $request->get('product');
        $newname = $request->get('newname');

        Product::where('id',$id)->restore();
        Product::where('id',$id)
            ->update(['name' => $newname]);

        //AGGIUìORNA IL PREZZO NELLE OFFERTE

        return redirect()->to('Admin/Product/List');
    }

    public function restore(Request $request)   //query senza nome
    {
        $id = $request->get('product');
        Product::where('id',$id)->restore();

        return redirect()->to('Admin/Product/List');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->get('product');
        $product = Product::find($id)->first();
        $product->delete();
        $product->offer->delete();

        return redirect()->to('Admin/Product/List');
    }


    /*-------------------   FRONTEND   -------------------*/

    public function showProduct($cod)
    {
        if ($product = Product::where('cod', $cod)->first()) {
            return view('frontend.product')->with('product', $product);
        } else {
            return view('frontend.404');
        }
    }

}


