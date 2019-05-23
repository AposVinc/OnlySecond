<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Billingaddress extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];


    protected $fillable =[
        'via','numerocivico','citta','provincia','cap',
    ];

    public function orderhistory()
    {
        return $this->belongsTo('App\Orderhistory');
    }
}
