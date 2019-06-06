<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];


    protected $fillable =[
        'image',
    ];

    function collection()
    {
        return $this->belongsTo('App\Collection');
    }
}
