<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{

    protected $primaryKey = 'id';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */


    protected $fillable =[
        'path_image','collection_id',
    ];

    function collection()
    {
        return $this->belongsTo('App\Collection')->withTrashed();
    }
}
