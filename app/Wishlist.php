<?php
/**
 * Created by PhpStorm.
 * User: UTENTE
 * Date: 10/09/2019
 * Time: 17:45
 */

namespace App;

use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Wishlist extends Model
{
    use SoftDeletes, SoftCascadeTrait;

    public function product(){
        return $this->hasMany('App\Product');
    }

    public function user(){
        return $this->hasOne('App\User');
    }

}