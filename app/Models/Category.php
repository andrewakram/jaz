<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'type','parent_id','ar_name','en_name','image','price','description','main_cat','has_period'
    ];

    public function sub_cats()
    {
        $this->hasMany(Category::class,'parent_id');
    }

    public function setImageAttribute($value)
    {
        $img_name = time().uniqid().'.'.$value->getClientOriginalExtension();
        $value->move(public_path('/public/category/images/'),$img_name);
        $this->attributes['image'] = $img_name ;
    }

    public function getImageAttribute($value)
    {
        if($value)
        {
            return asset('public/public/category/images/'.$value);
        }else{
            return asset('public/public/category/images/1.png');
        }
    }

    public function getHasPeriodAttribute($value)
    {
        if($value == 1)
        {
            return true;
        }else{
            return false;
        }
    }
}
