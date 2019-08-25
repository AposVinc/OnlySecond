<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CartProduct extends Pivot
{

    protected $primaryKey = 'id';

    protected $fillable =[
        'quantity',
    ];
}
