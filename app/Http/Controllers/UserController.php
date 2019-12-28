<?php

namespace App\Http\Controllers;

use App\Address;
use App\Product;
use App\Review;
use App\User;
use App\CreditCard;
use DB;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function edit(Request $request)
    {
        if (Auth::user()->email == $request->email){    //se mail è la stessa del utente loggato allora ok
            $user = User::where('email',$request->email)->first();
            $user->name = $request->name;
            $user->surname = $request->surname;
            $user->phone = $request->phone;

            //tutti e 3 gli input sono stati inseriti    //nuova psw e conf sono uguali
            if($request->has('old-password') and $request->has('new-password') and $request->has('confirm-new-password')
                    and ($request->get('new-password') === $request->get('confirm-new-password'))){
                if (strlen($request->get('new-password')) >= 8) {
                    if (Hash::check($request->get('old-password'), $user->password)) {     //vecchia psw è uguale a quella salvata
                        $user->password = $request->get('new-password');
                    } else {
                        return redirect()->route('EditProfile')->with('error', 'Errore!! La Vecchia Password inserita non è corretta!!');
                    }
                } else {
                    return redirect()->route('EditProfile')->with('error', 'Errore!! La Password deve avere almeno 8 caratteri!!');
                }
            }
            if ($user->save()){ //fare direttamente la login?
                return redirect()->route('EditProfile')->with('success', 'Modifica avvenuta con successo!!');
            } else {
                return redirect()->route('EditProfile')->with('error', 'Errore durante l\'eliminazione, Riprovare!!');
            }
        }else{  //email è diversa da quella dell'utente loggato
            if (User::where('email',$request->email)->first()){ //controlla se gia esiste e se non esiste permetti mod

            }else{

            }
        }
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
        $product = Product::where('cod', $request->get('productCod'))->first();
        $review = new Review();
        $review->title = $request->title;
        $review->text = $request->text;
        $review->vote = $request->reviewRating;
        $review->product_id = $product->id;

        Auth::user()->reviews()->save($review);

        if ($review->save()){
            return back()->with('success', 'Caricamento avvenuto con successo!!');
        } else {
            return back()->with('error','Errore durante il caricamento. Riprovare!!');
        }
    }

    public function editReview(Request $request){
        if(DB::table('reviews')->where('id',$request->get('reviewId'))->update([
            'title' => $request->title,
            'text' => $request->text,
            'vote' => $request->reviewRating])) {
            return back();
        }

    }

    public function deleteReview(Request $request){
        if(DB::table('reviews')->where('id',$request->get('deleteReviewId'))->delete()){
        return redirect()->back();}
    }




    /*-------------------   PAYMENTS   -------------------*/


    public function favoritePayment(Request $request)
    {
        $creditCards = Auth::user()->creditCards()->get();

        $old_favorite = $creditCards->where('favorite','1')->first();
        $new_favorite = $creditCards->where('id',$request->get('creditCard_id'))->first();

        if($old_favorite != null){
            $old_favorite->favorite = 0;
            $new_favorite->favorite = 1;
            if ($old_favorite->save() and $new_favorite->save()){
                return back()->with('success', 'Caricamento avvenuto con successo!!');
            }
        }else{
            $new_favorite->favorite = 1;
            if ($new_favorite->save()){
                return back()->with('success', 'Caricamento avvenuto con successo!!');
            }
        }

        return back()->with('error','Errore durante il caricamento. Riprovare!!');
    }

    public function addPayment(Request $request)
    {
        if(CreditCard::where('numberCard', $request->get('numberCard'))->first()){
            return back()->with('error','La carta di credito già è stata inserita!!');
        }
        $creditCard = new CreditCard();
        $creditCard->numberCard = $request->get('numberCard');
        $creditCard->holderCard = $request->get('holderCard');
        $creditCard->expirationCard = $request->get('month'). "/". $request->get('year');

        Auth::user()->creditCards()->save($creditCard);

        if ($creditCard->save()){
            return back()->with('success', 'Caricamento avvenuto con successo!!');
        } else {
            return back()->with('error','Errore durante il caricamento. Riprovare!!');
        }
    }

    public function deletePayment(Request $request)
    {
        $creditCards = Auth::user()->creditCards()->get();
        $old_favorite = $creditCards->where('favorite','1')->first();
        $delete_address = $creditCards->where('id',$request->get('delete_payment'))->first();
        if ($delete_address == $old_favorite){
            $new_favorite = $creditCards->where('id','<>',$request->get('delete_payment'))->first();
            $new_favorite->favorite = 1;
        }

        if (isset($new_favorite)) {
            if (!($new_favorite->save())){
                return back()->with('error','Errore durante il caricamento. Riprovare!!');
            }
        }
        if ($delete_address->delete()){
            return back()->with('success', 'Caricamento avvenuto con successo!!');
        } else{
            return back()->with('error','Errore durante il caricamento. Riprovare!!');
        }

    }


}
