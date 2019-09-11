<?php

namespace App\Http\Controllers;

use App\ContactUs;
use Illuminate\Http\Request;

class ContactUSController extends Controller
{
    /*-------------------   BACKEND   -------------------*/

    public function showListForm()
    {
        $mails = ContactUs::all();
        return view('backend.contactus.list', ['mails' => $mails]);
    }

    public function showMail($id)
    {
        $mail = ContactUs::where('id',$id)->first();
        return view('backend.contactus.showmail', ['mail' => $mail]);
    }

    /*-------------------   FRONTEND   -------------------*/

    public function create(Request $request)
    {
        $m = new ContactUs();
        $m->name = $request->name;
        $m->email = $request->email;
        $m->phone = $request->phone;
        $m->subject = $request->subject;
        $m->message = $request->message;

        if($m->save()){
            return back()->with('success', 'Mail inviata con successo!!');
        }else{
            return back()->with('error', 'Errore durante l\'invio. Riprovare!!!!');
        }
    }
}
