<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable =[
        'name',
    ];

    public function orderhistory()
    {
        return $this->belongsTo('App\Orderhistory');
    }
}
