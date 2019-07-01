<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;


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
        return view('backend.category.list', ['categories' => $categories]);
    }

    public function showAddForm()
    {
        return view('backend.category.add');
    }

    public function showEditForm()
    {
        $categories = Category::withoutTrashed()->get();
        return view('backend.category.edit', ['categories' => $categories]);
    }

    public function showRestoreForm()
    {
        $categories = Category::onlyTrashed('categories')->get();
        if (sizeof($categories) == 0) {
            $this->EchoMessage("Non ci sono Categorie da ripristinare");
            return view('backend.index');
        } else {
            return view('backend.category.restore', ['categories' => $categories]);
        }
    }

    public function showDeleteForm()
    {
        $categories = Category::all();
        return view('backend.category.delete', ['categories' => $categories]);
    }


    public function create(Request $request)
    {
        $category = new Category();
        $category->name=$request->nome;
        $category->save();

        return redirect()->to('Admin/Category/List');
    }

    public function restore(Request $request)
    {
        $id = $request->get('category');
        Category::find($id)->restore();

        return redirect()->to('Admin/Category/List');

    }

    public function destroy(Request $request)
    {
        $id = $request->get('category');
        Category::find($id)->delete();

        return redirect()->to('Admin/Category/List');
    }

    public function update(Request $request)
    {
        $id = $request->get('category');
        $newname = $request->get('newname');

        Category::find($id)
            ->update(['name' => $newname]);

        return redirect()->to('Admin/Category/List');
    }
}
