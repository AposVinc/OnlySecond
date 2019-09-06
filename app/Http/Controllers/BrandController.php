<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use File;

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
        return view('backend.brand.image', ['brand' => $brand]);
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
        $brands = Brand::onlyTrashed()->get();
        return view('backend.brand.restore', ['brands' => $brands]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)  //
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
                        $brand->save();
                        return redirect()->to('Admin/Brand/List')->with('success', 'Caricamento avvenuto con successo!!');
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
    public function update1(Request $request)
    {
        $id = $request->get('brand');
        $nameold = Brand::where('id', $id)->first()->name;
        $path = "public/Logo/Logo_" . $nameold;
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
                    Brand::where('id', $id)
                        ->update(['name' => $nameBrand, 'path_logo' => $path_logo]);
                    return redirect()->to('Admin/Brand/List')->with('success', 'Modifiche avvenute con successo!!');
                }
            } else {
                return redirect()->to('Admin/Brand/List')->with('error', 'Errore durante il caricamento. Riprovare!!');
            }
        } else {
            return redirect()->to('Admin/Brand/List')->with('error', 'File non trovato. Riprovare!!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Brand $brand
     * @return \Illuminate\Http\Response
     */
    public function update2(Request $request)
    {
        if ($request->has('newname')) {
            if (Brand::where('name', $request->newname)->first()) {
                return redirect()->to('Admin/Brand/List')->with('error', 'Esiste gia un Brand con il nome inserito!!');
            }
        }

        $id = $request->brand;
        $b = Brand::where('id', $id)->first();
        $oldname = $b->name;

        if ($request->hasFile('logo')) { //  se il file è presente nella request
            if ($request->file('logo')->isValid()) { // verificare che non si siano verificati problemi durante il caricamento del file

                $path = 'public/Logo/Logo_'. $oldname;
                Storage::delete($path);

                $path = 'public/Logo';
                if (!(Storage::exists($path))) {
                    Storage::makeDirectory($path);
                }
                if ($request->has('newname')) {
                    $nameBrand = $request->newname;
                } else {
                    $nameBrand = $oldname;
                }
                $filename = 'Logo_'. $nameBrand. '.png';
                $path_logo = 'storage/Logo/'. $filename;
                $pathnew = $request->file('logo')->storeAs($path, $filename);
                if ($pathnew != "") {
                    $b->name = $nameBrand;
                    $b->path_logo = $path_logo;
                    if ($b->update()) {
                        return redirect()->to('Admin/Brand/List')->with('success', 'Modifiche avvenute con successo!!');
                    }
                }
            } else {
                return redirect()->to('Admin/Brand/List')->with('error', 'Errore durante il caricamento. Riprovare!!');
            }
        } else {
            if ($b->update(['name' => $request->newname])) {
                Storage::move('public/Logo/Logo_'. $oldname. '.png', 'public/Logo/Logo_'. $request->newname. '.png');
                return redirect()->to('Admin/Brand/List')->with('success', 'Modifiche avvenute con successo!!');
            }
        }
    }

    public function update(Request $request)
    {
        if ($request->has('newname')) {
            if (Brand::where('name', $request->newname)->first()) {
                return redirect()->to('Admin/Brand/List')->with('error', 'Esiste gia un Brand con il nome inserito!!');
            }
        }

        $bool_name = false;
        $bool_file = false;

        $id = $request->brand;
        $b = Brand::where('id', $id)->first();
        $oldname = $b->name;

        if ($request->has('newname')){
            $b->name = $request->newname;
            if ($b->update()) {
                Storage::move('public/Logo/Logo_'. $oldname. '.png', 'public/Logo/Logo_'. $request->newname. '.png');
                $bool_name = true;
                //return redirect()->to('Admin/Brand/List')->with('success', 'Modifiche avvenute con successo!!');
            }
        }

        if ($request->hasFile('logo')) { //  se il file è presente nella request
            if ($request->file('logo')->isValid()) { // verificare che non si siano verificati problemi durante il caricamento del file

                if ($request->has('newname')) {
                    $path = 'public/Logo/Logo_'. $request->newname;
                    Storage::delete($path);
                } else {
                    $path = 'public/Logo/Logo_'. $oldname;
                    Storage::delete($path);
                }

                $path = 'public/Logo';
                if (!(Storage::exists($path))) {
                    Storage::makeDirectory($path);
                }
                if ($request->has('newname')) {
                    $nameBrand = $request->newname;
                } else {
                    $nameBrand = $oldname;
                }
                $filename = 'Logo_'. $nameBrand. '.png';
                $path_logo = 'storage/Logo/'. $filename;
                $pathnew = $request->file('logo')->storeAs($path, $filename);
                if ($pathnew != "") {
                    $b->name = $nameBrand;
                    $b->path_logo = $path_logo;
                    if ($b->update()) {
                        $bool_file = true;
                        //return redirect()->to('Admin/Brand/List')->with('success', 'Modifiche avvenute con successo!!');
                    }
                }
            } else {
                return redirect()->to('Admin/Brand/List')->with('error', 'Errore durante il caricamento. Riprovare!!');
            }
        }
        if ($bool_file or $bool_name){
            return redirect()->to('Admin/Brand/List')->with('success', 'Modifiche avvenute con successo!!');
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
        //$id = $request->get('brand');
        //Brand::where('id',$id)->restore();
        //Brand::onlyTrashed()->find($request->brand)->restore()
        if (Brand::onlyTrashed()->find($request->brand)->restore()) {
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
            return redirect()->to('Admin/Brand/List')->with('error', 'Errore durante l\'eliminazione, Riprovare!!');
        }
    }
}
