<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Collection;
use App\Product;
use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;

class ProductController extends Controller
{

    function getProduct(Request $request)
    {
        $value = $request->get('value');    //id della collection
        $data=Product::withoutTrashed()->where('collection_id',$value)->get();
        $output ='<option value="0">Seleziona il prodotto</option>';
        foreach($data as $row)
        {
            $output .= '<option value="'.$row->id.'">'.$row->name.'</option>';
        }
        return $output;
    }

    public function showListForm()
    {
        $brands = Brand::withTrashed()->get();
        return view('backend.product.list', ['brands' => $brands]);
    }

    public function showAddForm()
    {
        $brands = Brand::withTrashed()->get();
        $categories = Category::all();
        $suppliers = Supplier::all();
        return view('backend.product.add',['brands' => $brands,'categories' => $categories, 'suppliers' => $suppliers]);
    }

    public function showEditForm()
    {
        $brands = Brand::withTrashed()->get();
        $categories = Category::all();
        $suppliers = Supplier::all();
        return view('backend.product.edit',['brands' => $brands,'categories' => $categories, 'suppliers' => $suppliers]);
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

    public function restore(Request $request)   //query senza nome
    {
        $id = $request->get('collection');
        Collection::where('id',$id)->restore();

        return redirect()->to('Admin/Collection/List');
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
