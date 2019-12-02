<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreditCard extends Model
{
    protected $primaryKey = 'id';

    protected $fillable =[
        'name',
    ];

    public function orderHistories()
    {
        return $this->hasMany('App\OrderHistory');
    }
}
