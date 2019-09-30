<?php

namespace App\Http\Controllers;

use App\Address;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Sodium\add;

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

    public function addAddress(Request $request)
    {
        //non c'è il bisogno del controllo di doppioni
        $address = new Address();
        $address->name = $request->name;
        $address->surname = $request->surname;
        $address->address = $request->address;
        $address->civic_number = $request->get('civic-number');
        $address->city = $request->city;
        $address->region = $request->region;
        $address->zip = $request->zip;

        Auth::user()->addresses()->save($address);

        if ($address->save()){
            return back()->with('success', 'Caricamento avvenuto con successo!!');
        } else {
            return back()->with('error','Errore durante il caricamento. Riprovare!!');
        }
    }

    public function deleteAddress(Request $request)
    {
        //non c'è il bisogno del controllo di doppioni
        $address = new Address();
        $address->name = $request->name;
        $address->surname = $request->surname;
        $address->address = $request->address;
        $address->civic_number = $request->get('civic-number');
        $address->city = $request->city;
        $address->region = $request->region;
        $address->zip = $request->zip;

        Auth::user()->addresses()->save($address);

        if ($address->save()){
            return back()->with('success', 'Caricamento avvenuto con successo!!');
        } else {
            return back()->with('error','Errore durante il caricamento. Riprovare!!');
        }
    }

}
