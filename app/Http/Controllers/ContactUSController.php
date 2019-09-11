<?php

namespace App\Http\Controllers;

use App\ContactUs;
use Illuminate\Http\Request;

class ContactUSController extends Controller
{
    public function showListForm()
    {
        $mails = ContactUs::all();
        return view('backend.contactus.list', ['mails' => $mails]);
    }

    public function showMail()
    {
        $mails = ContactUs::all();
        return view('backend.contactus.showmail', ['mails' => $mails]);
    }
}
