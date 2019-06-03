<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Collection;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    public function showListForm()
    {
       // $brands = Brand::withTrashed()->with('products')->get();
        //echo $brands;
        /*
        foreach ($brands as $brand => $collections){
            foreach ($collections as $collection ){echo $collection;
        }}
        */
        //return view('backend.product.listProduct', ['brands' => $brands]);
        $products= Product::withTrashed()->with('collection')->get();
        $collections=Collection::withTrashed()->with('brand')->get();
        return view('backend.product.list', ['products' => $products], ['collections'=>$collections]);
    }

    public function showAddForm()
    {
        $brands = Brand::withTrashed()->get();
        return view('backend.product.add',['brands' => $brands]);
    }

    public function showEditForm()
    {
        return view('backend.product.edit');
    }

    public function showDeleteForm()
    {
        return view('backend.product.delete');
    }

    public function showRestoreForm()
    {
        return view('backend.product.restore');
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
    public function show($cod)
    {
        $product = Product::where('cod', $cod)->firstOrFail();
        return view('product')->with(['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        Product::where('id',$id)->delete();

        return redirect()->to('Admin/Product/List');
    }
}
