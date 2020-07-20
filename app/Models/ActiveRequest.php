<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActiveRequest extends Model
{
    protected $fillable = [
      'order_id','worker_id','sent_worker_id','user_status'
    ];

    public function worker()
    {
        return $this->belongsTo(Worker::class,'worker_id')->select('id','name','image','rate','lat','lng');
    }
    
    public function order()
    {
        return $this->belongsTo(Order::class,'order_id')->select('id','description', 'user_id','created_at','cat_id');
    }
}
