<?php

namespace App\Http\Controllers;

use App\Brand;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

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
        $brand = Brand::withTrashed()->get();
        return view('backend.brand.listbrand', ['brand' => $brand]);
    }

    public function showAddForm()
    {
        return view('backend.brand.addbrand');
    }

    public function showEditForm()
    {
        $brand = Brand::withTrashed()->get();
        return view('backend.brand.editbrand', ['brand' => $brand]);
    }

    public function showDeleteForm()
    {
        $brand = Brand::all(); //all() non mostrare brand gia eliminati
        return view('backend.brand.deletebrand', ['brand' => $brand]);
    }

    public function showRestoreForm()
    {
        $brand = Brand::onlyTrashed('brands')->get();
        if(sizeof($brand)==0) {
            $this->EchoMessage("Non ci sono Brand da ripristinare");
            return view('backend.index');
        }else {
            return view('backend.brand.restorebrand', ['brand' => $brand]);
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

        return redirect()->to('admin/index');
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

        /*
                //prima versione, poi modificata. non serve più.        PUO SERVIRE COME AIUTO
                DB::table('brands')
                    ->where('id', $input['brand'])
                    ->update(['name' => $input['newname']]);
        */

        Brand::where('id',$id)->restore(); //se era stato eliminato viene ripristinato

        Brand::where('id',$id)
            ->update(['name' => $newname]);

        return redirect()->to('admin/index');
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

        return redirect()->to('admin/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->get('brand');
        Brand::where('id',$id)->delete();

        return redirect()->to('admin/index');
    }

}
