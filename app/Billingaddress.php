<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Billingaddress extends Model
{
    protected $fillable =[
        'via','numerocivico','citta','provincia','cap',
    ];

    public function orderhistory()
    {
        return $this->belongsTo('App\Orderhistory');
    }
}
