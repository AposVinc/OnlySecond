<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function EchoMessage($msg)
    {
        echo '<script type="text/javascript">
            alert("' . $msg . '")
            </script>';
    }

    public function showListForm()
    {
        $brands = Brand::withTrashed()->get();
        return view('backend.brand.list', ['brands' => $brands]);
    }

    public function showAddForm()
    {
        return view('backend.brand.add');
    }

    public function showEditForm()
    {
        $brands = Brand::withTrashed()->get();
        return view('backend.brand.edit', ['brands' => $brands]);
    }

    public function showDeleteForm()
    {
        $brands = Brand::all(); //all() non mostrare brand gia eliminati
        return view('backend.brand.delete', ['brands' => $brands]);
    }

    public function showRestoreForm()
    {
        $brands = Brand::onlyTrashed('brands')->get();
        if(sizeof($brands)==0) {
            $this->EchoMessage("Non ci sono Brand da ripristinare");
            return view('backend.index');
        }else {
            return view('backend.brand.restore', ['brands' => $brands]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)  //
    {
        $input = $request->all();
        $brand = new Brand();
        $brand->name = $input['text-input'];
        $brand->save();

        return redirect()->to('Admin/Brand/List');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->get('brand');
        $newname = $request->get('newname');

        Brand::where('id',$id)->restore(); //se era stato eliminato viene ripristinato

        Brand::where('id',$id)
            ->update(['name' => $newname]);

        return redirect()->to('Admin/Brand/List');
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function restore(Request $request)   //query senza nome
    {
        $id = $request->get('brand');
        Brand::where('id',$id)->restore();

        return redirect()->to('Admin/Brand/List');
    }

    public function destroy(Request $request)
    {
        $id = $request->get('brand');

        $brand = Brand::find($id);
        $brand->delete();

        return redirect()->to('Admin/Brand/List');
    }

}
