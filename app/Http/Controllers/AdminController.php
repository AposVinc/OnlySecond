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
}
