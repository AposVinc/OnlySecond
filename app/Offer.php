<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $primaryKey = 'id';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */

    protected $fillable =[
        'rate','product_id',
    ];

    public function product(){
        return $this->belongsTo('App\Product')->withTrashed();
    }

    public function calculateDiscount(){
        $price = $this->product->price;
        $rate = $this->rate;

        $discount_value =  ($price / 100) * $rate;
        $final_price = $price - $discount_value;

        return number_format($final_price, 2);
    }

}
