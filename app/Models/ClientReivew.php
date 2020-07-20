<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientReivew extends Model
{
    //client_reviews
    protected $table = 'client_reviews';

    public function setImageAttribute($value)
    {
        $img_name = time().uniqid().'.'.$value->getClientOriginalExtension();
        $value->move(public_path('/public/client_reviews/'),$img_name);
        $this->attributes['image'] = $img_name ;
    }

    public function getImageAttribute($value)
    {
        if($value)
        {
            return asset('public/public/client_reviews/'.$value);
        }
    }
}
