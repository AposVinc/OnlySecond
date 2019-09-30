<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specification extends Model
{

    protected $primaryKey = 'id';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */

    protected $fillable =[

    ];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function dialColor()
    {
        return $this->belongsTo('App\Color','dial_color');
    }

    public function strapColor()
    {
        return $this->belongsTo('App\Color','strap_color');
    }
}
