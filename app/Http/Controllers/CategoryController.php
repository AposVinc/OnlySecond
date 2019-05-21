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
            alert("', $msg, '")
                </script>';
    }

    public function showListForm()
    {
        $categories = Category::withTrashed()->get();
        return view('backend.category.listCategory', ['categories' => $categories]);
    }

    public function showAddForm()
    {
        return view('backend.category.addCategory');
    }

    public function showRestoreForm()
    {
        $categories = Category::onlyTrashed('categories')->get();
        if (sizeof($categories) == 0) {
            $this->EchoMessage("Non ci sono Categorie da ripristinare");
            return view('backend.index');
        } else {
            return view('backend.category.restoreCategory', ['categories' => $categories]);
        }
    }

    public function showDeleteForm()
    {
        $categories = Category::all();
        return view('backend.category.deleteCategory', ['categories' => $categories]);
    }


    public function create(Request $request)
    {
        $input = $request->all();
        $category = new Category();
        $category->name = $input('text-input');
        $category->save();

        return redirect()->to('admin/listCategory');
    }

    public function restore(Request $request)
    {
        $id = $request->get('category');
        Category::where(id, $id)->restore();

        return redirect()->to('admin/index');

    }

    public function destroy(Request $request)
    {
        $id = $request->get('category');
        Category::where('id', $id)->delete();

        return redirect()->to('admin/index');
    }

    public function update(Request $request)
    {
        $id = $request->get('category');
        $newname = $request->get('newname');


        Category::where('id', $id)->restore();
        Category::where('id', $id)
            ->update(['name' => $newname]);

        return redirect()->to('admin/index');
    }



}
