<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function showAboutForm()
    {
        $fields = DB::table('pages')->where('about',1)->first();
        return view('backend.page.about')->with('fields', $fields);
    }

    public function showContactUSForm()
    {
        $fields = DB::table('pages')->where('contactus',1)->first();
        return view('backend.page.contactus')->with('fields', $fields);
    }

    public function editAbout(Request $request){

    }
    public function editContactUS(Request $request){

    }
}
