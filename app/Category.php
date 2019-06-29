<?php

namespace App;

use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes, SoftCascadeTrait;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    protected $softCascade = ['productsRel'];

    protected $fillable =[
        'name',
    ];

    public function products()
    {
        return $this->belongsToMany('App\Product');
    }

    public function productsRel()
    {
        return $this->hasMany('App\CategoryProduct');
    }
}
