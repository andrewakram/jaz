<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Worker extends Model
{
    protected $softDelete = true;
    protected $fillable = [
        'role','jwt','active','name','email','phone','password','cat_id','provider_id','address','lat','lng','city_id',
        'accept','busy','online','token','id_image','contract','image','rate','description','commercial_register'
    ];

    protected $hidden = [
        'password',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'worker_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function setImageAttribute($value)
    {
        $img_name = time().uniqid().'.'.$value->getClientOriginalExtension();
        $value->move(public_path('/public/workers/images/'),$img_name);
        $this->attributes['image'] = $img_name ;
    }
    ///////////////
     public function setCommercialRegisterAttribute($value)
    {
        $img_name = time().uniqid().'.'.$value->getClientOriginalExtension();
        $value->move(public_path('/public/workers/commercial_register/'),$img_name);
        $this->attributes['commercial_register'] = $img_name ;
    }
      public function getCommercialRegisterAttribute($value)
    {
        if($value)
        {
            return asset('public/public/workers/commercial_register/'.$value);
        }else{
            return asset('public/public/workers/images/worker.jpg');
        }
    }


    public function getImageAttribute($value)
    {
        if($value)
        {
            return asset('public/public/workers/images/'.$value);
        }else{
            return asset('public/public/workers/images/worker.jpg');
        }
    }

    public function setIdImageAttribute($value)
    {
        $img_name = time().uniqid().'.'.$value->getClientOriginalExtension();
        $value->move(public_path('/public/workers/id_image/'),$img_name);
        $this->attributes['id_image'] = $img_name ;
    }

    public function getIdImageAttribute($value)
    {
        if($value)
        {
            return asset('public/public/workers/id_image/'.$value);
        }else{
            return "";
        }
    }

    public function setContractAttribute($value)
    {
        $contract = time().uniqid().'.'.$value->getClientOriginalExtension();
        $value->move(public_path('/public/workers/contract/'),$contract);
        $this->attributes['contract'] = $contract ;
    }

    public function getContractAttribute($value)
    {
        if($value)
        {
            return asset('public/public/workers/contract/'.$value);
        }else{
            return "";
        }
    }

    public function get_category_list($worker_id)
    {
        $worker= Worker::whereId($worker_id)->select('cat_id as categories')->first();
        $cats = explode(',' , $worker->categories);

        /*dd($cats);*/

        return Category::whereIn('id',$cats)->select('id','ar_name','en_name')->get();
    }

    public function get_category_parent($name)
    {
        $parent_id = Category::where('en_name',$name)->select('parent_id')->first()->parent_id;
        $category = Category::where('id', $parent_id)->select('en_name as name')->first();

        return $category->name;
    }

    public function getDescriptionAttribute($value)
   {
       if ($value == "") {
           return "";
       } else {
           return $value;
       }
   }

   public function getCatIdAttribute($value)
    {
        if($value)
        {
            return (int)$value;
        }
    }

    public function getCityIdAttribute($value)
    {
        if($value)
        {
            return (int)$value;
        }
    }

}
