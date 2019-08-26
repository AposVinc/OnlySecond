<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

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
        $brands = Brand::all();
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
        if ($request->hasFile('logo')) { //  se il file è presente nella request
            if ($request->file('logo')->isValid()) { // verificare che non si siano verificati problemi durante il caricamento del file
                $path='public/Logo';
                if(!(Storage::exists($path))){
                    Storage::makeDirectory($path);
                }
                $nameBrand=$request->get('newbrand');
                $path.= '/'. $nameBrand;
                if(!(Storage::exists($path))){
                    Storage::makeDirectory($path);
                }
                $filename= 'Logo_'. $nameBrand;
                $path = $request->file('logo')->storeAs($path, $filename);
                if($path!=""){
                    $brand = new Brand();
                    $brand->name = $nameBrand;
                    $brand->path_logo = $path;
                    $brand->save();
                    return redirect()->to('Admin/Brand/List')->with('status','Caricamento avvenuto con successo!!');
                }
            }else{
                return redirect()->to('Admin/Brand/List')->with('error','Errore durante il caricamento. Riprovare!!');
            }
        }else{
            return redirect()->to('Admin/Brand/List')->with('error','File non trovato. Riprovare!!');
        }
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

        $brand = Brand::withTrashed()->find($id)->delete();

        return redirect()->to('Admin/Brand/List');
    }

}
