<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Collection extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $fillable =[
        'name','brand_id',
    ];

    protected $primaryKey = 'id';

    function brand(){
        return $this->hasOne('App\Brand');
    }

    function products() {
        return $this->hasMany('App\Product');
    }

}
