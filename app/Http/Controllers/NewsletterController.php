<?php

namespace App\Http\Controllers;

use App\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NewsletterController extends Controller
{
    /*-------------------   BACKEND   -------------------*/

    public function showListForm()
    {
        $newsletters = Newsletter::all();
        return view('backend.newsletter.list', ['newsletters' => $newsletters]);
    }

    public function showSendMailForm()
    {
        return view('backend.newsletter.sendmail');
    }

    public function SendMail(Request $request)  //
    {
        $input = $request->only('oggetto','testo');

        $newsletters = Newsletter::all();
        foreach ($newsletters as $newsletter){
            Mail::to($newsletter->email)->send(new \App\Mail\Newsletter($input));
        }

        return redirect()->to('Admin/Newsletter/List');
    }

    /*-------------------   FRONTEND   -------------------*/

    public function create(Request $request)
    {
        if (Newsletter::where('email', $request->email)->first()) {
            return back()->with('error', 'Esiste già un Offerta per il prodotto inserito!!');
        }

        $n = new Newsletter();
        $n->email = $request->email;

        if($n->save()){
            return back()->with('success', 'Caricamento avvenuto con successo!!');
        }else{
            return back()->with('error', 'Errore durante il caricamento. Riprovare!!!!');
        }
    }



}
