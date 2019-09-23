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

    public function showImage($id)
    {
        $brand = Brand::where('id', $id)->first();
        return view('backend.brand.showimage', ['brand' => $brand]);
    }

    public function showAddForm()
    {
        return view('backend.brand.add');
    }

    public function showEditForm()
    {
        if (Brand::withoutTrashed()->exists()){
            $brands = Brand::all();
            return view('backend.brand.edit',['brands' => $brands]);
        } else {
            return redirect()->to('Admin/Brand/List')->with('error','Non ci sono Brand da Modificare!!');
        }
    }

    public function showRestoreForm()
    {
        if (Brand::onlyTrashed()->exists()){
            $brands = Brand::onlyTrashed()->get();
            return view('backend.brand.restore',['brands' => $brands]);
        } else {
            return redirect()->to('Admin/Brand/List')->with('error','Non ci sono Brand da Ripristinare!!');
        }
    }

    public function showDeleteForm()
    {
        if (Brand::withoutTrashed()->exists()){
            $brands = Brand::all();
            return view('backend.brand.delete', ['brands' => $brands]);
        } else {
            return redirect()->to('Admin/Brand/List')->with('error','Non ci sono Brand da Eliminare!!');
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (Brand::where('name', $request->newbrand)->first()) {
            return redirect()->to('Admin/Brand/List')->with('error', 'Il Brand già esiste!!');
        } else {
            if ($request->hasFile('logo')) { //  se il file è presente nella request
                if ($request->file('logo')->isValid()) { // verificare che non si siano verificati problemi durante il caricamento del file
                    $path = 'public/Logo';
                    if (!(Storage::exists($path))) {
                        Storage::makeDirectory($path);
                    }
                    $nameBrand = $request->get('newbrand');
                    $filename = 'Logo_' . $nameBrand . '.png';
                    $path_logo = 'storage/Logo/' . $filename;
                    $pathnew = $request->file('logo')->storeAs($path, $filename);
                    if ($pathnew != "") {
                        $brand = new Brand();
                        $brand->name = $nameBrand;
                        $brand->path_logo = $path_logo;
                        if($brand->save()){
                            return redirect()->to('Admin/Brand/List')->with('success', 'Caricamento avvenuto con successo!!');
                        }else{
                            return redirect()->to('Admin/Brand/List')->with('error', 'Errore durante il caricamento. Riprovare!!!!');
                        }
                    }else{
                        return redirect()->to('Admin/Brand/List')->with('error', 'Errore durante il caricamento. Riprovare!!');
                    }
                } else {
                    return redirect()->to('Admin/Brand/List')->with('error', 'Errore durante il caricamento. Riprovare!!');
                }
            } else {
                return redirect()->to('Admin/Brand/List')->with('error', 'File non trovato. Riprovare!!');
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Brand $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //se brand e newname sono uguali ->effettua mod // altrimenti se new name gia esiste errore ma se non esite ok
        if (Brand::where('id', $request->brand)->first()->name == $request->newname) {
            //effettua mod
            if ($this->saveFile($request)){
                return redirect()->to('Admin/Brand/List')->with('success', 'Modifiche avvenute con successo!!');
            } else {
                return redirect()->to('Admin/Brand/List')->with('error', 'Errore durante il caricamento. Riprovare!!');
            }
        } else {
            if (Brand::where('name', $request->newname)->first()) {
                return redirect()->to('Admin/Brand/List')->with('error', 'Esiste già un Brand con il nome inserito!!');
            }
            if ($this->saveFile($request)){
                return redirect()->to('Admin/Brand/List')->with('success', 'Modifiche avvenute con successo!!');
            } else {
                return redirect()->to('Admin/Brand/List')->with('error', 'Errore durante il caricamento. Riprovare!!');
            }
        }
    }

    public function saveFile(Request $request)
    {
        $id = $request->brand;
        $b = Brand::where('id', $id)->first();
        $oldname = $b->name;
        $path = 'public/Logo/Logo_'. $oldname. '.png';
        Storage::delete($path);

        if ($request->hasFile('logo')) { //  se il file è presente nella request
            if ($request->file('logo')->isValid()) { // verificare che non si siano verificati problemi durante il caricamento del file
                $path = 'public/Logo';
                if (!(Storage::exists($path))) {
                    Storage::makeDirectory($path);
                }
                $nameBrand = $request->get('newname');
                $filename = 'Logo_' . $nameBrand . '.png';
                $path_logo = 'storage/Logo/' . $filename;
                $pathnew = $request->file('logo')->storeAs($path, $filename);
                if ($pathnew != "") {
                    if (Brand::where('id', $id)->update(['name' => $nameBrand, 'path_logo' => $path_logo])){
                        return true;
                    }else{
                        return false;
                    }
                }else{
                    return false;
                }
            } else {
                return false;
            }
        }
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param \App\Brand $brand
     * @return \Illuminate\Http\Response
     */

    public function restore(Request $request)   //query senza nome
    {
        if (Brand::where('id',$request->brand)->restore()) {
            return redirect()->to('Admin/Brand/List')->with('success', 'Ripristino avvenuto con successo!!');
        } else {
            return redirect()->to('Admin/Brand/List')->with('error', 'Errore durante il Ripristino. Riprovare!!');
        }
    }

    public function destroy(Request $request)
    {
        if (Brand::withTrashed()->find($request->brand)->delete()) {
            return redirect()->to('Admin/Brand/List')->with('success', 'Eliminazione avvenuta con successo!!');
        } else {
            return redirect()->to('Admin/Brand/List')->with('error', 'Errore durante l\'Eliminazione, Riprovare!!');
        }
    }
}
