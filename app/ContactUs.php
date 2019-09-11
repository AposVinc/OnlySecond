<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{

    protected $primaryKey = 'id';

    protected $fillable =['name','email','phone','subject','message'];

}
