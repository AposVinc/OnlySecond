<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function showListForm()  //non devono esserci i clienti
    {
        $users = Admin::withTrashed()->with('roles')->get();
        return view('backend.user.list', ['users' => $users]);
    }

    public function showAddForm()
    {
        if (Role::all()->isNotEmpty()) {
            $roles = Role::all();
            return view('backend.user.add',['roles' => $roles]);
        }else{
            return redirect()->to('Admin/User/List')->with('error','Impossibile inserire un nuovo Utente. Inserire prima un Ruolo!!');
        }
    }

    public function showEditForm()
    {
        if (Admin::all()->isNotEmpty()) {
            $users = Admin::withTrashed()->get();
            $roles = Role::all();
            return view('backend.user.edit', ['users' => $users, 'roles' => $roles]);
        }else{
            return redirect()->to('Admin/User/List')->with('error','Non ci sono Utenti da Modificare!!');
        }
    }

    public function showRestoreForm()
    {
        if (Admin::onlyTrashed()->exists()){
            $users = Admin::onlyTrashed()->get();
            return view('backend.user.restore', ['users' => $users]);
        } else {
            return redirect()->to('Admin/User/List')->with('error','Non ci sono Utenti da Ripristinare!!');
        }
    }

    public function showDeleteForm()
    {
        if (Admin::withoutTrashed()->exists()){
            $users = Admin::all();
            return view('backend.user.delete', ['users' => $users]);
        } else {
            return redirect()->to('Admin/User/List')->with('error','Non ci sono Utenti da Eliminare!!');
        }
    }


    public function create(Request $request)  //
    {
        if (Admin::where('email', $request->email)->first()) {
            return redirect()->to('Admin/User/List')->with('error', 'Esiste già un Utente con l\'email inserita!!');
        }

        $user = new Admin();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->assignRole(Role::findById($request->role,'admin'));

        if($user->save()){
            return redirect()->route('Admin.User.List')->with('success', 'Caricamento avvenuto con successo!!');
        } else {
            return redirect()->route('Admin.User.List')->with('error', 'Errore durante il caricamento. Riprovare!!!!');
        }
    }

    public function update(Request $request)
    {
        $user = Admin::where('id', $request['user'])->first();
        if ($user->email == $request->email) {
            if ($user->update(['name' => $request['name'], 'email' => $request['email'], 'password' => $request['password']])){
                $user->syncRoles([$request['role']]);
                return redirect()->to('Admin/User/List')->with('success', 'Modifiche avvenute con successo!!');
            } else {
                return redirect()->to('Admin/User/List')->with('error', 'Errore durante il caricamento. Riprovare!!');
            }
        } else {
            if (Admin::where('email', $request->email)->first()) {
                return redirect()->to('Admin/User/List')->with('error', 'Esiste già un Utente con il nome inserito!!');
            }
            if ($user->update(['name' => $request['name'], 'email' => $request['email'], 'password' => $request['password']]) ){
                $user->syncRoles([$request['role']]);
                return redirect()->to('Admin/User/List')->with('success', 'Modifiche avvenute con successo!!');
            } else {
                return redirect()->to('Admin/User/List')->with('error', 'Errore durante il caricamento. Riprovare!!');
            }
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
        if (Admin::onlyTrashed()->find($request->user)->restore()) {
            return redirect()->to('Admin/User/List')->with('success', 'Ripristino avvenuto con successo!!');
        } else {
            return redirect()->to('Admin/User/List')->with('error', 'Errore durante il Ripristino. Riprovare!!');
        }
    }

    public function destroy(Request $request)
    {
        if (Admin::withTrashed()->find($request->user)->hasPermissionTo('gest_utenti','admin')){
            if (Permission::findByName('gest_utenti','admin')->roles()->count() == 1) {
                return redirect()->to('Admin/User/List')->with('error', 'Errore!!! Deve esistere almeno un Utente che è abilitato alla Gestione Degli Utenti!!');
            }
            if (Admin::withTrashed()->find($request->user)->delete()) {
                return redirect()->to('Admin/User/List')->with('success', 'Eliminazione avvenuta con successo!!');
            } else {
                return redirect()->to('Admin/User/List')->with('error', 'Errore durante l\'Eliminazione, Riprovare!!');
            }
        } else {
            if (Admin::withTrashed()->find($request->user)->delete()) {
                return redirect()->to('Admin/User/List')->with('success', 'Eliminazione avvenuta con successo!!');
            } else {
                return redirect()->to('Admin/User/List')->with('error', 'Errore durante l\'Eliminazione, Riprovare!!');
            }
        }
    }

    /*

    */
}
