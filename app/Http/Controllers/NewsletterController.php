<?php

namespace App\Http\Controllers;

use App\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NewsletterController extends Controller
{

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
}
