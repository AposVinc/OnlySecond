<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Product;
use Illuminate\Http\Request;

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
        $brands = Brand::withTrashed()->with('products')->get();
        /*
        foreach ($brands as $brand => $collections){
            foreach ($collections as $collection ){echo $collection;
        }}
        */
        return view('backend.product.listProduct', ['brands' => $brands]);
    }

    public function showAddForm()
    {
        $brands = Brand::withTrashed()->get();
        return view('backend.product.addProduct',['brands' => $brands]);
    }

    public function showEditForm()
    {
        return view('backend.product.editProduct');
    }

    public function showDeleteForm()
    {
        return view('backend.product.deleteProduct');
    }

    public function showRestoreForm()
    {
        return view('backend.product.restoreProduct');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
