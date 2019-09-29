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
        if (Role::all()->isNotEmpty()) {
            $roles = Role::all();
            return view('backend.role.edit', ['roles' => $roles]);
        }else{
            return redirect()->to('Admin/Role/List')->with('error','Non ci sono Ruoli da Modificare!!');
        }
    }

    public function showDeleteForm()
    {
        if (Role::all()->isNotEmpty()){
            $roles = Role::all();
            return view('backend.role.delete', ['roles' => $roles]);
        } else {
            return redirect()->to('Admin/Role/List')->with('error','Non ci sono Ruoli da Eliminare!!');
        }
    }


    public function create(Request $request)
    {
        if (Role::where('name', $request->name)->first()) {
            return redirect()->to('Admin/Role/List')->with('error', 'Esiste già un Ruolo con il nome inserito!!');
        }
        $input = $request->except('_token','name');
        if($role = Role::create(['guard_name' => 'admin','name'=>$request->name])->givePermissionTo($input)){
            return redirect()->route('Admin.Role.List')->with('success', 'Caricamento avvenuto con successo!!');
        }else{
            return redirect()->route('Admin.Role.List')->with('error', 'Errore durante il caricamento. Riprovare!!!!');
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
        $role = Role::findById($request->role ,'admin');

        if (Role::findById($request->role,'admin')->name == $request->name) {
            $this->changePermission($request);
            return redirect()->to('Admin/Role/List')->with('success', 'Modifiche avvenute con successo!!');
        } else {
            if (Role::where('name', $request->name)->first()) {
                return redirect()->to('Admin/Role/List')->with('error', 'Esiste già un Ruolo con il nome inserito!!');
            }
            $this->changePermission($request);
            if ($role->update(['name' => $request->name])) {
                return redirect()->to('Admin/Role/List')->with('success', 'Modifiche avvenute con successo!!');
            } else {
                return redirect()->to('Admin/Role/List')->with('error', 'Errore durante il caricamento. Riprovare!!');
            }
        }
    }

    public function changePermission(Request $request)
    {
        $role = Role::findById($request->role ,'admin');

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
        if($request->has('gest_assistenza')){
            $role->givePermissionTo('gest_assistenza');
        }else{
            $role->revokePermissionTo('gest_assistenza');
        };
    }

    public function destroy(Request $request)
    {
        $role = Role::findById(strval( $request->role ),'admin');
        if ($role->delete()) {
            return redirect()->to('Admin/Role/List')->with('success', 'Eliminazione avvenuta con successo!!');
        } else {
            return redirect()->to('Admin/Role/List')->with('error', 'Errore durante l\'Eliminazione, Riprovare!!');
        }
    }
}
