<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderhistoryProduct extends Pivot
{
    protected $primaryKey = 'id';

    protected $fillable =[
        'quantity',
    ];
}
