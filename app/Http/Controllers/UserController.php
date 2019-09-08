<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function showListForm()  //non devono esserci i clienti
    {
        $users = User::withTrashed()->with('roles')->get();
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

    public function showRestoreForm()
    {
        if (User::onlyTrashed()->exists()){
            $users = User::onlyTrashed()->get();
            return view('backend.user.restore', ['users' => $users]);
        } else {
            return redirect()->to('Admin/Brand/List')->with('error','Non ci sono elementi da ripristinare!!');
        }
    }

    public function showDeleteForm()
    {
        if (User::withoutTrashed()->exists()){
            $users = User::all();
            return view('backend.user.delete', ['users' => $users]);
        } else {
            return redirect()->to('Admin/Brand/List')->with('error','Non ci sono elementi da Eliminare!!');
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
        if (User::where('name', $request->name)->first()) {
            return redirect()->to('Admin/User/List')->with('error', 'Esiste già un Utente con il nome inserito!!');
        }
        $input = $request->all();

        $user = new User();
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->password = $input['password'];
        $user->assignRole(Role::findById($input['role']));
        $user->save();

        return redirect()->route('Admin.User.List');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = User::where('id', $request['user'])->first();
        if ($user->name == $request->name) {
            if ($user->update(['name' => $request['name'], 'email' => $request['email'], 'password' => $request['password']])){
                $user->syncRoles([$request['role']]);
                return redirect()->to('Admin/User/List')->with('success', 'Modifiche avvenute con successo!!');
            } else {
                return redirect()->to('Admin/User/List')->with('error', 'Errore durante il caricamento. Riprovare!!');
            }
        } else {
            if (User::where('name', $request->name)->first()) {
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
        if (User::onlyTrashed()->find($request->user)->restore()) {
            return redirect()->to('Admin/User/List')->with('success', 'Ripristino avvenuto con successo!!');
        } else {
            return redirect()->to('Admin/User/List')->with('error', 'Errore durante il Ripristino. Riprovare!!');
        }
    }

    public function destroy(Request $request)
    {
        if (User::withTrashed()->find($request->user)->delete()) {
            return redirect()->to('Admin/User/List')->with('success', 'Eliminazione avvenuta con successo!!');
        } else {
            return redirect()->to('Admin/User/List')->with('error', 'Errore durante l\'eliminazione, Riprovare!!');
        }
    }

}
