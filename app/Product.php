<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $fillable =[
        'cod', 'name', 'price', 'producer_id', 'category_id','specification_id'
    ];

    function collection() {
        return $this->belongsTo('App\Collection');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function specification()
    {
        return $this->hasOne('App\Specification');
    }

    public function images()
    {
        return $this->hasMany('App\Image');
    }

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    public function suppliers()
    {
        return $this->hasMany('App\Supplier');
    }

    public function discount()
    {
        return $this->hasOne('App\Discount');
    }

    public function usersWishlist()
    {
        return $this->belongsToMany('App\User', 'wishlists');
    }
}
