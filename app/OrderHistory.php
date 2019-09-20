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

    public function billingAddress()
    {
        return $this->belongsTo('App\BillingAddress');
    }

    public function products(){
//ATTENZIONE:i modelli Pivot potrebbero non utilizzare la caratteristica SoftDeletes. Se è necessario eliminare i record di pivot,
// prendere in considerazione la possibilità di convertire il modello pivot in un modello Eloquent effettivo.
        return $this->belongsToMany('App\Product')->using('App\OrderHistoryProduct')->withPivot('quantity');
    }

}
