<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table = 'albums';

    public function setSmallimageAttribute($value)
    {
        $img_name = time().uniqid().'.'.$value->getClientOriginalExtension();
        $value->move(public_path('/public/albums_sm/'),$img_name);
        $this->attributes['smallimage'] = $img_name ;
    }

    public function getSmallimageAttribute($value)
    {
        if($value)
        {
            return asset('public/public/albums_sm/'.$value);
        }
    }

    public function setLargeimageAttribute($value)
    {
        $img_name = time().uniqid().'.'.$value->getClientOriginalExtension();
        $value->move(public_path('/public/albums_lg/'),$img_name);
        $this->attributes['largeimage'] = $img_name ;
    }

    public function getLargeimageAttribute($value)
    {
        if($value)
        {
            return asset('public/public/albums_lg/'.$value);
        }
    }
}
