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
        $suppliers = Supplier::withTrashed()->get();
        return view('backend.supplier.edit', ['suppliers' => $suppliers]);
    }

    public function showDeleteForm()
    {
        $suppliers = Supplier::all(); //all() non mostrare brand gia eliminati
        return view('backend.supplier.delete', ['suppliers' => $suppliers]);
    }

    public function showRestoreForm()
    {
        $suppliers = Supplier::onlyTrashed('brands')->get();
        if (sizeof($suppliers) == 0) {
            $this->EchoMessage("Non ci sono Supplier da ripristinare");
            return view('backend.index');
        } else {
            return view('backend.supplier.restore', ['suppliers' => $suppliers]);
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

        $supplier = new Supplier();
        $supplier->name = $input['name'];
        $supplier->email = $input['email'];
        $supplier->phone = $input['phone'];
        $supplier->city = $input['city'];
        $supplier->address = $input['address'];
        $supplier->zip = $input['zip'];
        $supplier->iban = $input['iban'];
        $supplier->save();

        return redirect()->to('Admin/Index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        echo $request;
        /*
        $id = $request->get('brand');
        $newname = $request->get('newname');

        /*
                //prima versione, poi modificata. non serve più.        PUO SERVIRE COME AIUTO
                DB::table('brands')
                    ->where('id', $input['brand'])
                    ->update(['name' => $input['newname']]);
        *//*

        Brand::where('id', $id)->restore(); //se era stato eliminato viene ripristinato

        Brand::where('id', $id)
            ->update(['name' => $newname]);

        return redirect()->to('admin/index');
    */
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function restore(Request $request)   //query senza nome
    {
        $id = $request->get('supplier');
        Supplier::where('id', $id)->restore();

        return redirect()->to('Admin/Index');
    }

    public function destroy(Request $request)
    {
        $id = $request->get('supplier');
        Supplier::where('id', $id)->delete();

        return redirect()->to('Admin/Index');
    }

}

