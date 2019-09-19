<?php

namespace App;

use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Specification extends Model
{
    use SoftDeletes, SoftCascadeTrait;

    protected $primaryKey = 'id';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    protected $softCascade = [];

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
