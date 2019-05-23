<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Orderhistory extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];


    protected $fillable =[
        'name',
    ];

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
