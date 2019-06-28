<?php

namespace App;

use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes, SoftCascadeTrait;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    protected $softCascade = ['images'];

    protected $fillable =[
        'cod', 'name', 'price', 'producer_id', 'category_id',
    ];

    function collection() {
        return $this->belongsTo('App\Collection');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    public function images()
    {
        return $this->hasMany('App\Image');
    }

    public function supplier()
    {
        return $this->belongsTo('App\Supplier');
    }

    public function offers(){
        return $this->belongsTo('App\Offer');
    }

    public function orderhistories(){
//ATTENZIONE:i modelli Pivot potrebbero non utilizzare la caratteristica SoftDeletes. Se è necessario eliminare i record di pivot, prendere in considerazione la possibilità di convertire il modello pivot in un modello Eloquent effettivo.
        return $this->belongsToMany('App\Orderhistory')->using('App\OrderhistoryProduct')->withPivot('quantity');
    }

}
