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
        $categories = Category::onlyTrashed()->get();
        return view('backend.category.restore', ['categories' => $categories]);
    }

    public function showDeleteForm()
    {
        $categories = Category::all();
        return view('backend.category.delete', ['categories' => $categories]);
    }


    public function create(Request $request)
    {
        if (Category::where('name',$request->name)->first()){
            return redirect()->to('Admin/Category/List')->with('error', 'La Collezione già esiste!!');
        }else {
            $category = new Category();
            $category->name=$request->name;
            if ($category->save()){
                return redirect()->to('Admin/Category/List')->with('success', 'Caricamento avvenuto con successo!!');
            }else{
                return redirect()->to('Admin/Category/List')->with('error', 'Errore durante il caricamento. Riprovare!!');
            }
        }
    }

    public function update(Request $request)
    {
        if (Category::where('name',$request->newname)->first()){
            return redirect()->to('Admin/Category/List')->with('error', 'La Collezione già esiste!!');
        }else {
            $id = $request->get('category');
            $newname = $request->get('newname');
            if (Category::where('id', $id)->update(['name' => $newname])){
                return redirect()->to('Admin/Category/List')->with('success', 'Modifiche avvenute con successo!!');
            } else {
                return redirect()->to('Admin/Category/List')->with('error', 'Errore durante il caricamento. Riprovare!!');
            }
        }
    }

    public function restore(Request $request)
    {
        $id = $request->get('category');

        if (Category::where('id', $id)->restore()) {
            return redirect()->to('Admin/Category/List')->with('success','Ripristino avvenuto con successo!!');
        }else{
            return redirect()->to('Admin/Category/List')->with('error', 'Errore durante il Ripristino. Riprovare!!');
        }
    }

    public function destroy(Request $request)
    {
        $id = $request->get('category');

        if (Category::where('id', $id)->delete()) {
            return redirect()->to('Admin/Category/List')->with('success', 'Eliminazione avvenuta con successo!!');
        } else {
            return redirect()->to('Admin/Category/List')->with('error', 'Errore durante l\'eliminazione, Riprovare!!');
        }
    }

}
