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
        'name', 'email', 'password',
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

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    public function productsWishlist()
    {
        return $this->belongsToMany('App\Product', 'wishlists');
    }

    public function orderHistories(){
//ATTENZIONE:i modelli Pivot potrebbero non utilizzare la caratteristica SoftDeletes. Se è necessario eliminare i record di pivot,
// prendere in considerazione la possibilità di convertire il modello pivot in un modello Eloquent effettivo.
        return $this->belongsToMany('App\Orderhistory')->using('App\OrderhistoryProduct')->withPivot('quantity');
    }

}
