<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderHistoryProduct extends Pivot
{
    protected $primaryKey = 'id';

    protected $fillable =[
        'quantity',
    ];
}
