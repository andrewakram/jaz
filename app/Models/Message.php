<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'user_id', 'worker_id', 'order_id', 'body', 'send'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id')->select('id','name','image');
    }

    public function worker()
    {
        return $this->belongsTo(Worker::class,'worker_id')->select('id','name','image');
    }
    public function getWorkerIdAttribute($value){
        if($value){
            return (int) $value;
        }
    }

    public function getUserIdAttribute($value){
        if($value){
            return (int) $value;
        }
    }

    public function getOrderIdAttribute($value){
        if($value){
            return (int) $value;
        }
    }
}
