<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ThirdCatOrder extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'parent_id','order_id','cat_id','hours','worker_id','worker_third_cat_id'
    ];
}
