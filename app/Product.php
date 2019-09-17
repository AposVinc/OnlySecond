<?php

namespace App;

use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes, SoftCascadeTrait;

    protected $primaryKey = 'id';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    protected $softCascade = ['images','specification','reviews','categoriesRel'];

    protected $fillable =[
        'cod', 'collection_id', 'price', 'producer_id', 'category_id',
    ];


    function collection() {
        return $this->belongsTo('App\Collection')->withTrashed();
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    public function categoriesRel()
    {
        return $this->hasMany('App\CategoryProduct');
    }

    public function images()
    {
        return $this->hasMany('App\Image');
    }

    public function supplier()
    {
        return $this->belongsTo('App\Supplier');
    }

    public function specification()
    {
        return $this->hasOne('App\Specification');
    }

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    public function offer(){
        return $this->hasOne('App\Offer');
    }

    public function color()
    {
        return $this->belongsTo('App\Color');
    }


}
