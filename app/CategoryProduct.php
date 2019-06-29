<?php

namespace App;

use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryProduct extends Pivot
{
    use SoftDeletes, SoftCascadeTrait;

    protected $dates = ['deleted_at'];
    protected $softCascade = [];
}
