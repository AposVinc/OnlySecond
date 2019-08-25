<?php

namespace App;

use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class OfferProduct extends Pivot
{
    use SoftDeletes, SoftCascadeTrait;

    protected $primaryKey = 'id';

    protected $dates = ['deleted_at'];
    protected $softCascade = [];
}
