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
    protected $softCascade = ['categoriesRel','images'];

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
        return $this->hasMany('App\Image')->withTrashed();
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
        return $this->hasMany('App\Review')->withTrashed();
    }

    public function CalculateAverageVote(){
        $reviews = $this->reviews()->get();
        $total_vote = 0;
        foreach ($reviews as $review){
            $total_vote = $total_vote + $review->vote;
        }
        $count = $reviews->count();
        if ($count == 0){
            return $count;
        }else{
            return $total_vote/$count;
        }

    }

    public function offer(){
        return $this->hasOne('App\Offer');
    }

    public function color()
    {
        return $this->belongsTo('App\Color');
    }

    public function orderHistories(){
//ATTENZIONE:i modelli Pivot potrebbero non utilizzare la caratteristica SoftDeletes. Se è necessario eliminare i record di pivot,
// prendere in considerazione la possibilità di convertire il modello pivot in un modello Eloquent effettivo.
        return $this->belongsToMany('App\OrderHistory')->using('App\OrderHistoryProduct')->withPivot('quantity');
    }

    public function users(){
//ATTENZIONE:i modelli Pivot potrebbero non utilizzare la caratteristica SoftDeletes. Se è necessario eliminare i record di pivot,
// prendere in considerazione la possibilità di convertire il modello pivot in un modello Eloquent effettivo.
        return $this->belongsToMany('App\User')->using('App\Cart')->withPivot('quantity');
    }

}
