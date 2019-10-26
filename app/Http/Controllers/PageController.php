<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function showAboutForm()
    {
        return view('backend.page.about');
    }

    public function showContactUSForm()
    {
        return view('backend.page.contactus');
    }

    public function editAbout(Request $request){

    }
    public function editContactUS(Request $request){

    }
}
