<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
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

    protected $primaryKey = 'id';

    function collections() {
        return $this->hasMany('App\Collection');
    }

    public function products()
    {
        return $this->hasManyThrough('App\Product', 'App\Collection');
    }
}
