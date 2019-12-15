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
        if (Category::withoutTrashed()->exists()){
            $categories = Category::all();
            return view('backend.category.edit', ['categories' => $categories]);
        } else {
            return redirect()->to('Admin/Category/List')->with('error','Non ci sono Categorie da Modificare!!');
        }
    }

    public function showEditFormButton($id)
    {
        if (Category::withoutTrashed()->exists()){
            $selected_category = Category::where('id',$id)->first();

            $categories = Category::all();
            return view('backend.category.edit', ['categories' => $categories, 'selected_category' => $selected_category]);
        } else {
            return redirect()->to('Admin/Category/List')->with('error','Non ci sono Categorie da Modificare!!');
        }
    }

    public function showRestoreForm()
    {
        if (Category::onlyTrashed()->exists()){
            $categories = Category::onlyTrashed()->get();
            return view('backend.category.restore', ['categories' => $categories]);
        } else {
            return redirect()->to('Admin/Category/List')->with('error','Non ci sono Categorie da Ripristinare!!');
        }
    }

    public function showDeleteForm()
    {
        if (Category::withoutTrashed()->exists()){
            $categories = Category::all();
            return view('backend.category.delete', ['categories' => $categories]);
        } else {
            return redirect()->to('Admin/Category/List')->with('error','Non ci sono Categorie da Eliminare!!');
        }
    }


    public function create(Request $request)
    {
        if (Category::where('name',$request->name)->first()){
            return redirect()->to('Admin/Category/List')->with('error', 'La Categoria già esiste!!');
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
            return redirect()->to('Admin/Category/List')->with('error', 'La Categoria già esiste!!');
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
        $category = Category::withTrashed()->where('id', $id)->first();

        if ($category->restore()) {
            return redirect()->to('Admin/Category/List')->with('success','Ripristino avvenuto con successo!!');
        }else{
            return redirect()->to('Admin/Category/List')->with('error', 'Errore durante il Ripristino. Riprovare!!');
        }
    }

    public function restoreButton($id)
    {
        $category = Category::withTrashed()->where('id', $id)->first();

        if ($category->restore()) {
            return redirect()->back()->with('success','Ripristino avvenuto con successo!!');
        }else{
            return redirect()->back()->with('error', 'Errore durante il Ripristino. Riprovare!!');
        }
    }

    public function destroy(Request $request)
    {
        $id = $request->get('category');

        if (Category::withTrashed()->find($id)->delete()) {
            return redirect()->to('Admin/Category/List')->with('success', 'Eliminazione avvenuta con successo!!');
        } else {
            return redirect()->to('Admin/Category/List')->with('error', 'Errore durante l\'Eliminazione, Riprovare!!');
        }
    }

    public function destroyButton($id)
    {
        if (Category::withTrashed()->find($id)->delete()) {
            return redirect()->back()->with('success', 'Eliminazione avvenuta con successo!!');
        } else {
            return redirect()->back()->with('error', 'Errore durante l\'Eliminazione, Riprovare!!');
        }
    }

}
