<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class JazPartener extends Model
{
    protected $table = 'jaz_parteners';

    public function setImageAttribute($value)
    {
        $img_name = time().uniqid().'.'.$value->getClientOriginalExtension();
        $value->move(public_path('/public/parteners/'),$img_name);
        $this->attributes['image'] = $img_name ;
    }

    public function getImageAttribute($value)
    {
        if($value)
        {
            return asset('public/public/parteners/'.$value);
        }
    }
}
