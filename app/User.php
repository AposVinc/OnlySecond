<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'id';
    protected $guard = 'user';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','surname', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Add a mutator to ensure hashed passwords
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function addresses()
    {
        return $this->hasMany('App\Address');
    }

    public function reviews()
    {
        return $this->hasMany('App\Review')->withTrashed();
    }

    public function productsWishlist()
    {
        return $this->belongsToMany('App\Product', 'wishlists');
    }

    public function orderHistories()
    {
        return $this->hasMany('App\OrderHistory');
    }

    public function products(){
//ATTENZIONE:i modelli Pivot potrebbero non utilizzare la caratteristica SoftDeletes. Se è necessario eliminare i record di pivot,
// prendere in considerazione la possibilità di convertire il modello pivot in un modello Eloquent effettivo.
        return $this->belongsToMany('App\Product','carts')->withPivot('quantity');
    }

    public function calculateTotalPrice(){
        $totalprice = 0.00;
        foreach ($this->products as $product){
            $totalprice += ($product->price * $product->pivot->quantity);
        }
        return number_format($totalprice, 2);
    }

}
