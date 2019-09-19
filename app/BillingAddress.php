<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillingAddress extends Model
{

    protected $primaryKey = 'id';

    protected $fillable =[
        'address','civic_number','city','region','zip',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function orderHistories()
    {
        return $this->hasMany('App\OrderHistory');
    }
}
