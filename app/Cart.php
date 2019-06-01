<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
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

    public function products(){
        return $this->belongsToMany('App\Product');
    }
}
