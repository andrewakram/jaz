<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkerThirdCat extends Model
{
    protected $fillable = [
        'cat_id','worker_id','ar_name','en_name','price','description','image'
    ];

    /*public function setImageAttribute($value)
    {
        if(isset($value)){
            $img_name = time().uniqid().'.'.$value->getClientOriginalExtension();
            $value->move(public_path('/public/category/image/'),$img_name);
            $this->attributes['image'] = $img_name ;
        }
    }*/

    public function getImageAttribute($value)
    {
        if($value)
        {
            return asset('public/public/category/images/'.$value);
        }else{
            return "";
        }
    }
    
    public function getMediaAttribute($value)
    {
        if($value)
        {
            return asset('public/public/category/images/'.$value);
        }else{
            return "";
        }
    }

    public function worker()
    {
        return $this->belongsTo(Worker::class, 'worker_id')->select('id','name','description','image');
    }
}
