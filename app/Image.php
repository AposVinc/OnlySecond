<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    protected $primaryKey = 'id';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */

    protected $fillable =[
        'image', 'product_id',
    ];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
