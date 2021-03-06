<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderHistory extends Model
{
    protected $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function creditCard()
    {
        return $this->belongsTo('App\CreditCard');
    }

    public function courier()
    {
        return $this->belongsTo('App\Courier');
    }

    public function address()
    {
        return $this->belongsTo('App\Address');
    }

    public function mailingAddress()
    {
        return $this->belongsTo('App\Address','mailing_address_id');
    }

    public function billingAddress()
    {
        return $this->belongsTo('App\Address','billing_address_id');
    }

    public function products(){
        return $this->belongsToMany('App\Product')->withTrashed()->using('App\OrderHistoryProduct')->withPivot('quantity')->withPivot('price');
    }

    public function calculateTotalPrice(){
        $totalprice = 0.00;
        foreach ($this->products as $product){
            $totalprice += ($product->pivot->price * $product->pivot->quantity);
        }
        return number_format($totalprice, 2);
    }

}
