<?php

namespace App\Http\Controllers;

use App\Address;
use App\Review;
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


    /*-------------------   ADDRESS   -------------------*/


    public function favoriteAddress(Request $request)
    {
        $addresses = Auth::user()->addresses()->get();

        $old_mailing = $addresses->where('mailing','1')->first();
        $old_billing = $addresses->where('billing','1')->first();
        $new_mailing = $addresses->where('id',$request->mailing_address)->first();
        $new_billing = $addresses->where('id',$request->billing_address)->first();

        if ($request->has('mailing_address')){
            $old_mailing->mailing = 0;
            $new_mailing->mailing = 1;
        }
        if ($request->has('billing_address')){
            $old_billing->billing = 0;
            $new_billing->billing = 1;
        }

        if ($old_mailing->save() and $old_billing->save() and $new_mailing->save() and $new_billing->save()){
            return back()->with('success', 'Caricamento avvenuto con successo!!');
        }
        return back()->with('error','Errore durante il caricamento. Riprovare!!');
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
        $addresses = Auth::user()->addresses()->get();
        if ($addresses->count() > 1){
            $old_mailing = $addresses->where('mailing','1')->first();
            $old_billing = $addresses->where('billing','1')->first();
            $delete_address = $addresses->where('id',$request->delete_address)->first();
            if ($delete_address == $old_mailing){
                $new_m_address = $addresses->where('id','<>',$request->delete_address)->first();
                $new_m_address->mailing = 1;
            }
            if ($delete_address == $old_billing){
                $new_b_address = $addresses->where('id','<>',$request->delete_address)->first();
                $new_b_address->billing = 1;
            }

            if (isset($new_m_address)) {
                if (!($new_m_address->save())){
                    return back()->with('error','Errore durante il caricamento. Riprovare!!');
                }
            }
            if (isset($new_b_address)) {
                if (!($new_b_address->save())){
                    return back()->with('error','Errore durante il caricamento. Riprovare!!');
                }
            }
            if ($delete_address->delete()){
                return back()->with('success', 'Caricamento avvenuto con successo!!');
            } else{
                return back()->with('error','Errore durante il caricamento. Riprovare!!');
            }
        }else{
            return back()->with('error','Prima di eliminare questo indirizzo aggiungine un altro');
        }
    }


    /*-------------------   REVIEW   -------------------*/

    public function addReview(Request $request)
    {
        $review = new Review();
        $review->title = $request->title;
        $review->review = $request->review;

        Auth::user()->reviews()->save($review);

        if ($review->save()){
            return back()->with('success', 'Caricamento avvenuto con successo!!');
        } else {
            return back()->with('error','Errore durante il caricamento. Riprovare!!');
        }
    }

}
