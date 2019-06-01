<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Discount extends Model
{
    //use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    //protected $dates = ['deleted_at'];

    protected $fillable =[

    ];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
