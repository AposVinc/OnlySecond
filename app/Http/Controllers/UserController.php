<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function update(Request $request)
    {

    }


    public function destroy(Request $request)
    {
        if (User::all()->find($request->user)->delete()) {
            return redirect()->to('Admin/User/List')->with('success', 'Eliminazione avvenuta con successo!!');
        } else {
            return redirect()->to('Admin/User/List')->with('error', 'Errore durante l\'eliminazione, Riprovare!!');
        }
    }

}
