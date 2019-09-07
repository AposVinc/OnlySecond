<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'id';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */


    protected $fillable =[
        'image','collection_id',
    ];

    function collection()
    {
        return $this->belongsTo('App\Collection');
    }
}
