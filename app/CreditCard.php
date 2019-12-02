<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreditCard extends Model
{
    protected $primaryKey = 'id';

    protected $fillable =[
    ];

    public function orderHistories()
    {
        return $this->hasMany('App\OrderHistory');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
