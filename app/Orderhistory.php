<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orderhistory extends Model
{
    protected $primaryKey = 'id';

    protected $dates = ['date'];

    public function payment()
    {
        return $this->hasOne('App\Payment');
    }

    public function courier()
    {
        return $this->hasOne('App\Courier');
    }

    public function address()
    {
        return $this->hasOne('App\Address');
    }

    public function billingaddress()
    {
        return $this->hasOne('App\Billingaddress');
    }

    public function products(){
        return $this->belongsToMany('App\Product');
    }
}
