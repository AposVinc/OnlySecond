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

    public function showDeleteForm()
    {
        $users = User::all();
        return view('backend.user.delete', ['users' => $users]);
    }

    public function showRestoreForm()
    {
        $users = User::onlyTrashed()->get();
        return view('backend.user.restore', ['users' => $users]);
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
        $id = $request->get('user');
        User::where('id', $id)->restore();

        return redirect()->route('Admin.User.List');
    }

    public function destroy(Request $request)
    {
        $id = $request->get('user');
        User::withTrashed()->find($id)->delete();

        return redirect()->route('Admin.User.List');
    }

}
