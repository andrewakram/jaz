<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class JazTeam extends Model
{
    protected $table = 'jaz_teams';

    public function setImageAttribute($value)
    {
        $img_name = time().uniqid().'.'.$value->getClientOriginalExtension();
        $value->move(public_path('/public/teams/'),$img_name);
        $this->attributes['image'] = $img_name ;
    }

    public function getImageAttribute($value)
    {
        if($value)
        {
            return asset('public/public/teams/'.$value);
        }
    }
}
