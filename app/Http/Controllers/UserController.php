<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function showListForm()
    {
        $users = User::with('roles')->get();
        //non devono esserci i clienti
        return view('backend.user.list', ['users' => $users]);
    }

    public function showAddForm()
    {
        $roles = Role::all();
        return view('backend.user.add',['roles' => $roles]);
    }

    public function showEditForm()
    {
        $users = User::withTrashed()->get();
        $roles = Role::all();
        return view('backend.user.edit', ['users' => $users, 'roles' => $roles]);
    }

    public function showDeleteForm()
    {
        $suppliers = User::all(); //all() non mostrare brand gia eliminati
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
        User::where('id', $request['user'])->first()->syncRoles([$request['role']]);
//MANCA LA MODIFICA DEL NOME, PASSWORD E AMAIL
        return redirect()->route('Admin.User.List');
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
