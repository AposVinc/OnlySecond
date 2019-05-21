<?php

namespace App\Http\Controllers;

use App\Category;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function EchoMessage($msg)
    {
        echo '<script type="text/javascript">
            alert("' , $msg , '")
                </script>';
    }

    public function showListForm(){
        $categories = Category::withTrashed()->get();
        return view('backend.category.listCategory', ['categories' => $categories]);
    }

    public function showAddForm(){
        return view('backend.category.addCategory');
    }

    public function create(Request $request){
        $input = $request->all();
        $category = new Category();
        $category->name = $input('text-input');
        $category->save();

        return redirect()->to('admin/listCategory');
    }

    public function restore(Request $request){
        $id = $request->get('category');
        Category::where(id,$id)->restore();

        return redirect()->to('admin/index');

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
