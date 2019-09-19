<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $primaryKey = 'id';

    public function products()
    {
        return $this->hasMany('App\Product');
    }

    public function dials()
    {
        return $this->hasMany('App\Specification','dial_color');
    }

    public function straps()
    {
        return $this->hasMany('App\Specification','strap_color');
    }
}
