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

    public function payment()
    {
        return $this->belongsTo('App\Payment');
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
//ATTENZIONE:i modelli Pivot potrebbero non utilizzare la caratteristica SoftDeletes. Se è necessario eliminare i record di pivot,
// prendere in considerazione la possibilità di convertire il modello pivot in un modello Eloquent effettivo.
        return $this->belongsToMany('App\Product')->using('App\OrderHistoryProduct')->withPivot('quantity')->withPivot('price');
    }

    public function calculateTotalPrice(){
        $totalprice = 0.00;
        foreach ($this->products as $product){
            $totalprice += $product->pivot->price;
        }
        return number_format($totalprice, 2);
    }

}
