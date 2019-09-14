<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
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
        $roles = Role::all();
        return view('backend.user.add',['roles' => $roles]);
    }

    public function showEditForm()
    {
        $users = Admin::withTrashed()->get();
        $roles = Role::all();
        return view('backend.user.edit', ['users' => $users, 'roles' => $roles]);
    }

    public function showRestoreForm()
    {
        if (Admin::onlyTrashed()->exists()){
            $users = Admin::onlyTrashed()->get();
            return view('backend.user.restore', ['users' => $users]);
        } else {
            return redirect()->to('Admin/Brand/List')->with('error','Non ci sono elementi da ripristinare!!');
        }
    }

    public function showDeleteForm()
    {
        if (Admin::withoutTrashed()->exists()){
            $users = Admin::all();
            return view('backend.user.delete', ['users' => $users]);
        } else {
            return redirect()->to('Admin/Brand/List')->with('error','Non ci sono elementi da Eliminare!!');
        }
    }

    public function create(Request $request)  //
    {
        if (Admin::where('name', $request->name)->first()) {
            return redirect()->to('Admin/User/List')->with('error', 'Esiste già un Utente con il nome inserito!!');
        }

        $user = new Admin();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->assignRole(Role::findById($request->role,'admin'));

        if($user->save()){
            return redirect()->route('Admin.User.List');
        } else {
            return redirect()->route('Admin.User.List');
        }
    }

    public function update(Request $request)
    {
        $user = Admin::where('id', $request['user'])->first();
        if ($user->name == $request->name) {
            if ($user->update(['name' => $request['name'], 'email' => $request['email'], 'password' => $request['password']])){
                $user->syncRoles([$request['role']]);
                return redirect()->to('Admin/User/List')->with('success', 'Modifiche avvenute con successo!!');
            } else {
                return redirect()->to('Admin/User/List')->with('error', 'Errore durante il caricamento. Riprovare!!');
            }
        } else {
            if (Admin::where('name', $request->name)->first()) {
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
        if (Admin::withTrashed()->find($request->user)->delete()) {
            return redirect()->to('Admin/User/List')->with('success', 'Eliminazione avvenuta con successo!!');
        } else {
            return redirect()->to('Admin/User/List')->with('error', 'Errore durante l\'eliminazione, Riprovare!!');
        }
    }
}
