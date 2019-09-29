<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function showListForm()
    {
        $suppliers = Supplier::withTrashed()->get();
        return view('backend.supplier.list', ['suppliers' => $suppliers]);
    }

    public function showAddForm()
    {
        return view('backend.supplier.add');
    }

    public function showEditForm()
    {
        if (Supplier::withoutTrashed()->exists()){
            $suppliers = Supplier::all();
            return view('backend.supplier.edit', ['suppliers' => $suppliers]);
        } else {
            return redirect()->to('Admin/Supplier/List')->with('error','Non ci sono Fornitori da Modificare!!');
        }
    }

    public function showRestoreForm()
    {
        if (Supplier::onlyTrashed()->exists()){
            $suppliers = Supplier::onlyTrashed()->get();
            return view('backend.supplier.restore', ['suppliers' => $suppliers]);
        } else {
            return redirect()->to('Admin/Supplier/List')->with('error','Non ci sono Fornitori da Ripristinare!!');
        }
    }

    public function showDeleteForm()
    {
        if (Supplier::withoutTrashed()->exists()){
            $suppliers = Supplier::all();
            return view('backend.supplier.delete', ['suppliers' => $suppliers]);
        } else {
            return redirect()->to('Admin/Supplier/List')->with('error','Non ci sono Fornitori da Eliminare!!');
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
        if (Supplier::where('email', $request->email)->first()) {
            return redirect()->to('Admin/Supplier/List')->with('error', 'Il fornitore già esiste!!');
        }
        $input = $request->all();

        $supplier = new Supplier();
        $supplier->name = $input['name'];
        $supplier->email = $input['email'];
        $supplier->phone = $input['phone'];
        $supplier->city = $input['city'];
        $supplier->address = $input['address'];
        $supplier->zip = $input['zip'];
        $supplier->iban = $input['iban'];
        if($supplier->save()){
            return redirect()->to('Admin/Supplier/List')->with('success', 'Caricamento avvenuto con successo!!');
        }else{
            return redirect()->to('Admin/Supplier/List')->with('error', 'Errore durante il caricamento. Riprovare!!!!');
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
        $supplier = Supplier::where('id', $request->supplier)->first();
        if ($supplier->email == $request->email) {
            if ($this->updatebool($request,$supplier)){
                return redirect()->to('Admin/Supplier/List')->with('success', 'Modifiche avvenute con successo!!');
            } else {
                return redirect()->to('Admin/Supplier/List')->with('error', 'Errore durante il caricamento. Riprovare!!');
            }
        } else {
            if (Supplier::where('email', $request->email)->first()) {
                return redirect()->to('Admin/Supplier/List')->with('error', 'Il Fornitore già esiste!!');
            }
            if ($this->updatebool($request,$supplier)){
                return redirect()->to('Admin/Supplier/List')->with('success', 'Modifiche avvenute con successo!!');
            } else {
                return redirect()->to('Admin/Supplier/List')->with('error', 'Errore durante il caricamento. Riprovare!!');
            }
        }
    }
    public function updatebool(Request $request, $supplier){
        $input = $request->all();

        $supplier->name = $input['name'];
        $supplier->email = $input['email'];
        $supplier->phone = $input['phone'];
        $supplier->city = $input['city'];
        $supplier->address = $input['address'];
        $supplier->zip = $input['zip'];
        $supplier->iban = $input['iban'];

        if ($supplier->update()){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function restore(Request $request)   //query senza nome
    {
        if (Supplier::onlyTrashed()->where('id',$request->supplier)->restore()) {
            return redirect()->to('Admin/Supplier/List')->with('success', 'Ripristino avvenuto con successo!!');
        } else {
            return redirect()->to('Admin/Supplier/List')->with('error', 'Errore durante il Ripristino. Riprovare!!');
        }
    }

    public function destroy(Request $request)
    {
        if (Supplier::withTrashed()->find($request->supplier)->delete()) {
            return redirect()->to('Admin/Supplier/List')->with('success', 'Eliminazione avvenuta con successo!!');
        } else {
            return redirect()->to('Admin/Supplier/List')->with('error', 'Errore durante l\'Eliminazione, Riprovare!!');
        }
    }

}

