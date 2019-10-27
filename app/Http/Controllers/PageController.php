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
        if(DB::table('pages')->where('about',1)->update([
            'ab_desc_storia' => $request->desc,
            'ab_why_tit_1'=> $request->title1,
            'ab_why_txt_1'=> $request->desc1,
            'ab_why_tit_2'=> $request->title2,
            'ab_why_txt_2'=> $request->desc2,
            'ab_why_tit_3'=> $request->title3,
            'ab_why_txt_3'=> $request->desc3,
            'ab_why_tit_4'=> $request->title4,
            'ab_why_txt_4'=> $request->desc4,
            'ab_why_tit_5'=> $request->title5,
            'ab_why_txt_5'=> $request->desc5,
            'ab_why_tit_6'=> $request->title6,
            'ab_why_txt_6'=> $request->desc6,
            'ab_team_name_1'=> $request->get('first-member-name'),
            'ab_team_desc_1'=> $request->get('first-member-desc'),
            'ab_team_name_2'=> $request->get('second-member-name'),
            'ab_team_desc_2'=> $request->get('second-member-desc'),
            'ab_team_name_3'=> $request->get('third-member-name'),
            'ab_team_desc_3'=> $request->get('third-member-desc')])){

            return redirect()->to('Admin/Page/About')->with('success', 'Caricamento avvenuto con successo!!');
        }else{
            return redirect()->to('Admin/Page/About')->with('error', 'Errore durante il caricamento. Riprovare!!!!');
        }

    }
    public function editContactUS(Request $request){
        if(DB::table('pages')->where('contactus',1)->update([
                'cus_tel_1' => $request->phone1,
                'cus_tel_2' => $request->phone2,
                'cus_email_contatti' => $request->email1,
                'cus_email_aiuto' => $request->email2,
                'cus_indirizzo' => $request->address])){

            return redirect()->to('Admin/Page/ContactUS')->with('success', 'Caricamento avvenuto con successo!!');
        }else{
            return redirect()->to('Admin/Page/ContactUS')->with('error', 'Errore durante il caricamento. Riprovare!!!!');
        }
    }
}
