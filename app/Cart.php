<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Cart extends Pivot
{

    protected $primaryKey = 'id';

    protected $fillable =[
        'quantity', 'product_id', 'user_id',
    ];

    public $table = "carts";

}
