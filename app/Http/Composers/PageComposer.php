<?php


namespace App\Http\Composers;

use App\Banner;
use DB;
use Illuminate\View\View;

class PageComposer
{
    public  function composeIndex(View $view){
        $banners = Banner::where('visible',1)->get();
        $view->with('banners', $banners);
    }

    public  function composeAbout(View $view){
        $fields = DB::table('pages')->where('about',1)->first();
        $view->with('fields', $fields);
    }

    public  function composeContactUS(View $view){
        $fields = DB::table('pages')->where('contactus',1)->first();
        $view->with('fields', $fields);
    }
}
