<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    protected $fillable = [
        'order_id','worker_id','worker_third_cat_id','salary','user_status','payment'
    ];
}
