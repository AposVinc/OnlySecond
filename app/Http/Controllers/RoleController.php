<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function showListForm()
    {
        $roles = Role::all();
        return view('backend.role.list', ['roles' => $roles]);
    }

    public function showAddForm()
    {
        return view('backend.role.add');
    }

    public function showEditForm()
    {
        $roles = Role::all();
        return view('backend.role.edit', ['roles' => $roles]);
    }

    public function showDeleteForm()
    {
        $roles = Role::all(); //all() non mostrare brand gia eliminati
        return view('backend.role.delete', ['roles' => $roles]);
    }



    public function create(Request $request)  //
    {
        $input = $request->except('_token','name');
        $role = new Role();
        $role->name = $request['name'];
        foreach ($input as $i){
            $role->givePermissionTo($i);
        }
        $role->save();
        return redirect()->route('Admin.Role.List');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $role = Role::findById($request['role']);

        //if($request->has('name')){ //da errore
            $role->update(['name' => $request['name']]);
        //};

        if($request->has('gest_utenti')){
            $role->givePermissionTo('gest_utenti');
        }else{
            $role->revokePermissionTo('gest_utenti');
        };
        if($request->has('gest_prodotti')){
            $role->givePermissionTo('gest_prodotti');
        }else{
            $role->revokePermissionTo('gest_prodotti');
        };
        if($request->has('gest_offerte')){
            $role->givePermissionTo('gest_offerte');
        }else{
            $role->revokePermissionTo('gest_offerte');
        };
        if($request->has('gest_banner')){
            $role->givePermissionTo('gest_banner');
        }else{
            $role->revokePermissionTo('gest_banner');
        };
        if($request->has('gest_imgprod')){
            $role->givePermissionTo('gest_imgprod');
        }else{
            $role->revokePermissionTo('gest_imgprod');
        };
        if($request->has('gest_fornitori')){
            $role->givePermissionTo('gest_fornitori');
        }else{
            $role->revokePermissionTo('gest_fornitori');
        };
        if($request->has('gest_newsletter')){
            $role->givePermissionTo('gest_newsletter');
        }else{
            $role->revokePermissionTo('gest_newsletter');
        };

        return redirect()->route('Admin.Role.List');
    }

    public function destroy(Request $request)
    {
        Role::findById($request['role'])->delete();

        return redirect()->route('Admin.Role.List');
    }
}
