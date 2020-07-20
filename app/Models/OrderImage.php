<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderImage extends Model
{
    protected $fillable = [
        'order_id', 'type', 'media'
    ];

    public $timestamps = false;

    public function setMediaAttribute($value)
    {
        $img_name = time().uniqid().'.'.$value->getClientOriginalExtension();
        $value->move(public_path('/public/orders/media/'),$img_name);
        $this->attributes['media'] = $img_name ;
    }
    public function getMediaAttribute($value)
    {
        if($value)
        {
            return asset('public/public/orders/media/'.$value);
        }else{
            return "";
        }
    }
//
//    public function getImageAttribute($value)
//    {
//        if($value)
//        {
//            dd($value,asset('public/orders/media/'.$value));
//            return asset('public/orders/media/'.$value);
//        }
//    }

}
