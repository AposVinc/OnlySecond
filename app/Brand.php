<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

class Brand extends Model
{
    use SoftDeletes, SoftCascadeTrait;

    protected $primaryKey = 'id';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $softCascade = ['collections'];

    protected $fillable =[
        'name',
    ];

    function collections() {
        return $this->hasMany('App\Collection');
    }

    public function products()  {
        return $this->hasManyThrough('App\Product', 'App\Collection');
    }

}
