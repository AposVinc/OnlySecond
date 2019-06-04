<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Offer extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $fillable =[
        'name', 'price', 'producer_id', 'category_id',
    ];
    function collection() {
        return $this->belongsTo('App\Collection');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    public function image()
    {
        return $this->hasOne('App\Image');
    }

}
