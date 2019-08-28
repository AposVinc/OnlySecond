<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Offer;
use App\Product;
use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;


class ProductController extends Controller
{
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
        return view('backend.product.add',['brands' => $brands,'categories' => $categories, 'suppliers' => $suppliers]);
    }

    public function showEditForm()
    {
        $brands = Brand::all();
        $categories = Category::all();
        $suppliers = Supplier::all();
        return view('backend.product.edit',['brands' => $brands,'categories' => $categories, 'suppliers' => $suppliers]);
    }

    public function showDeleteForm()
    {
        $brands = Brand::all();
        return view('backend.product.delete',['brands' => $brands]);
    }

    public function showRestoreForm()
    {
        $brands = Brand::all();
        return view('backend.product.restore',['brands' => $brands]);
    }

    public function show($cod)
    {
        $product = Product::where('cod', $cod)->firstOrFail();
        return view('product')->with(['product' => $product]);
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
        $offers = Offer::withoutTrashed()->get();
        foreach ($offers as $offer){
            $product = $offer->product;
            if ($product->collection_id == $value){
                $products->push($product);
            }
        }
        return $products;
    }

    function getProductRestoreWithOffer(Request $request)
    {
        $value = $request->get('value'); //id product
        //$products = Product::withoutTrashed()->with('offer')->where('collection_id', $value)->get();
        $products = new Collection();
        $offers = Offer::onlyTrashed()->get();
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
        //$input = $request->all();
        $product = new Product();
        $product->name=$request->nome;
        //$product->name = $input['text-input'];
        $product->save();

        return redirect()->to('Admin/Product/List');
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
        Product::withTrashed()->find($id)->delete();

        return redirect()->to('Admin/Product/List');
    }
}
