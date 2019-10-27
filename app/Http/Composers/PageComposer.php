<?php


namespace App\Http\Composers;

use DB;
use Illuminate\View\View;

class PageComposer
{
    public  function composeAbout(View $view){
        $fields = DB::table('pages')->where('about',1)->first();
        $view->with('fields', $fields);
    }

    public  function composeContactUS(View $view){
        $fields = DB::table('pages')->where('contactus',1)->first();
        $view->with('fields', $fields);
    }
}
