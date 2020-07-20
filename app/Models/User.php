<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role', 'jwt', 'active', 'name', 'email', 'phone', 'password', 'lat', 'lng', 'address', 'city_id', 'commercial_register', 'token', 'image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

//    protected  $primaryKey = 'jwt';
//    public $incrementing = false;

    public function scopeActivated($query)
    {
        return $query->where('active', 1);
    }

    public function scopeSuspended($query)
    {
        return $query->where('active', 0);
    }

    public function setImageAttribute($value)
    {
        $img_name = time().uniqid().'.'.$value->getClientOriginalExtension();
        $value->move(public_path('/public/users/images/'),$img_name);
        $this->attributes['image'] = $img_name ;
    }

    public function getImageAttribute($value)
    {
        if($value)
        {
            return asset('public/public/users/images/'.$value);
        }else{
            return asset('public/public/users/images/default.png');
        }
    }

    public function setCommercialRegisterAttribute($value)
    {
        /*$img_name = time().uniqid().'.'.$value->getClientOriginalExtension();
        $value->move(public_path('/public/users/commercial_register/'),$img_name);
        $this->attributes['image'] = $img_name ;*/
    }

    public function getCommercialRegisterAttribute($value)
    {
        if($value)
        {
            return asset('public/users/commercial_register/'.$value);
        }else{
            return "";
        }
    }
}
