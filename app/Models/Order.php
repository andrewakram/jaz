<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Order extends Model
{
    protected $softDelete = true;

    protected $fillable = [
        'type','cat_id','user_id','worker_id','order_action','cancel_reason','address','lat','lng',
        'description','date','time','order_status','rate','order_total','finish_price','order_choice'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')
            ->select('id','name','phone','address','lat','lng','image');
    }

    public function worker()
    {
        return $this->belongsTo(Worker::class, 'worker_id')
            ->select('id','name','phone','lat','lng','image','role');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id')->select('id','type','parent_id','en_name');
    }

    public function orderImage()
    {
        return $this->hasMany(OrderImage::class, 'order_id');
    }

    public function activeRequest()
    {
        return $this->hasMany(ActiveRequest::class, 'order_id');
    }

    public function getCreatedAtAttribute()
    {
        /*$date = Carbon::parse($this->attributes['created_at'])->format('d F Y');
        $time = Carbon::parse($this->attributes['created_at'])->format('H:m a');
        return ['date'=>$date,'time'=>$time];*/
        $date = Carbon::parse($this->attributes['created_at'])->format('d F Y');
        $time = Carbon::parse($this->attributes['created_at'])->format('H:i a');
        return ['date'=>$date,'time'=>$time];
    }

    public function getDateAttribute()
    {
        if($this->attributes['type'] == 'scheduled')
            return Carbon::parse($this->attributes['date'])->format('d F Y');
        else
            return "";
    }

    public function getTimeAttribute($value)
    {
        /*if($value){
            return $value;
        }else{
            return "";
        }
        return Carbon::parse($this->attributes['time'])->format('H:m a');
        if($this->attributes['type'] == 'scheduled')
            return Carbon::parse($this->attributes['time'])->format('H:m a');
        else
            return "";*/
        if($value){
            return $value;
        }else{
            return "";
        }
        return Carbon::parse($this->attributes['time'])->format('H:i a');
        if($this->attributes['type'] == 'scheduled')
            return Carbon::parse($this->attributes['time'])->format('H:i a');
        else
            return "";
    }

    public static function filterbylatlng($mylat,$mylng,$radius,$model,$cat_id,$flag=null,$conditionarray=null)
    {
        $haversine = "(6371 * acos(cos(radians($mylat))
                           * cos(radians($model.lat))
                           * cos(radians($model.lng)
                           - radians($mylng))
                           + sin(radians($mylat))
                           * sin(radians($model.lat))))";
        $datainradiusrange = DB::table($model)->select('*')
            ->selectRaw("{$haversine} AS distance")
            ->whereRaw("{$haversine} < ?", [$radius])->where('cat_id','like','%'.$cat_id.'%')
            ->where('active', 1)
            ->where('accept',1)
            ->where('busy', 0)
            ->where('online',1)
            ->select('id', 'lat', 'lng')->get();


        return $datainradiusrange;
    }

    public static function filterbylatlng2($mylat,$mylng,$radius,$model,$cat_id,$order_choice)
    {
        /*dd($cat_id);*/
        global $choice;
        if($order_choice == 1){
            $choice="individual";
        }elseif($order_choice == 2){
            $choice="company";
        }

        $haversine = "(6371 * acos(cos(radians($mylat))
                           * cos(radians($model.lat))
                           * cos(radians($model.lng)
                           - radians($mylng))
                           + sin(radians($mylat))
                           * sin(radians($model.lat))))";

        $datainradiusrange = DB::table($model)->select('*')
            ->selectRaw("{$haversine} AS distance")
            ->whereRaw("{$haversine} < ?", [$radius])->where('cat_id','like','%'.$cat_id.'%')
            ->where('active', 1)
            ->where('accept',1)
            ->where('busy', 0)
            ->where('online',1)
            ->where('role',"individual")
            ->select('id', 'lat', 'lng')->get();


        return $datainradiusrange;
    }

    public function search($search)
    {
        $builder = Order::where('id', '>', 0);
        if ($search['search']){
//            $trips
            $builder->whereHas('user',function ($query) use($search){
                $query->where('name','like', '%'.$search['search'].'%');
            })->orWhereHas('worker',function ($query) use($search){
                $query->where('name','like', '%'.$search['search'].'%');
            });
        }

        if($search['select_main_cats'])
        {
            $sub_cat = Category::where('parent_id', $search['select_main_cats'])->pluck('id');
            $builder->whereIn('cat_id', $sub_cat);
        }

        if($search['select_sub_cats'])
        {
            $builder->where('cat_id', $search['select_sub_cats']);
        }

        if($search['select_service_type'])
        {
            $builder->where('order_status', $search['select_service_type']);
        }

        if($search['select_from'] ) {
            $builder->where('created_at','>=',$search['select_from']);
        }

        if($search['select_to'] ) {
            $builder->where('created_at','<=',$search['select_to']);
        }


        $orders = $builder->paginate(50);
        return $orders;

    }

    public function searchOld($search)
    {
        $orders = new Order();

        $user = User::where(function($q) use($search)
        {
            $q->where('name','like','%'.$search['search'].'%');
        }
        )->first();

        $worker = Worker::where(function($q) use($search)
        {
            $q->where('name','like','%'.$search['search'].'%');
        }
        )->first();

        if($user)
        {
            $orders->where('user_id',$user->id);
        }

        if($worker)
        {
            $orders->where('worker_id',$worker->id);
        }

        if($search['select_from'] && $search['select_to'])
        {
            $orders = $orders->where('created_at','>=',$search['select_from'])->where('created_at','<=',Carbon::parse($search['select_to'])->addDays(1));
        }

        if($search['select_main_cats'])
        {
            $sub_cat = Category::where('parent_id', $search['select_main_cats'])->pluck('id');
            $orders = $orders->whereIn('cat_id', $sub_cat);
        }

        if($search['select_sub_cats'])
        {
            $orders = $orders->where('cat_id', $search['select_sub_cats']);
        }

        if($search['select_service_type'])
        {
            $orders = $orders->where('order_action', $search['select_service_type']);
        }

        $orders = $orders->latest()->paginate(50);

        return $orders;

    }

    public function search2($search2)
    {//search for costs
        global $orders;
        $orders = new Order();

        $worker = Worker::where(function($q) use($search2)
        {
            $q->where('name','like', '%' . $search2['search2'] . '%');
        }
        )->pluck('id');

        if(sizeof($worker)>0)
        {


            if($search2['select_from'])
            {
                return $orders->whereIn('worker_id',$worker)
                    ->where("order_status","finish_order")
                    ->where('created_at','>=',$search2['select_from'])
                    ->latest()->paginate(50);
            }

            if($search2['select_to'])
            {
                return $orders->whereIn('worker_id',$worker)
                    ->where("order_status","finish_order")
                    ->where('created_at','<=',Carbon::parse($search2['select_to'])
                        ->addDays(1))
                    ->latest()->paginate(50);
            }

            if($search2['select_from'] && $search2['select_to'])
            {
                return $orders->whereIn('worker_id',$worker)
                    ->where("order_status","finish_order")
                    ->where('created_at','>=',$search2['select_from'])
                    ->where('created_at','<=',Carbon::parse($search2['select_to'])
                        ->addDays(1))
                    ->latest()->paginate(50);
            }

            return $orders->whereIn('worker_id',$worker)
                ->where("order_status","finish_order")
                ->latest()->paginate(50);

        }else{

            ////////////////////////////////////
            if($search2['select_from'])
            {
                return $orders->where("order_status","finish_order")
                    ->where('created_at','>=',$search2['select_from'])
                    ->latest()->paginate(50);
            }

            if($search2['select_to'])
            {
                return $orders->where("order_status","finish_order")
                    ->where('created_at','<=',Carbon::parse($search2['select_to'])
                        ->addDays(1))
                    ->latest()->paginate(50);
            }

            if($search2['select_from'] && $search2['select_to'])
            {
                return $orders->where("order_status","finish_order")
                    ->where('created_at','>=',$search2['select_from'])
                    ->where('created_at','<=',Carbon::parse($search2['select_to'])
                        ->addDays(1))
                    ->latest()->paginate(50);
            }
            //////////////////////////////
        }

        return $orders->where("order_status","finish_order")->latest()->paginate(50);


        /*if($search2['select_from'])
        {
            $orders = $orders->where('created_at','>=',$search2['select_from']);
        }

        if($search2['select_to'])
        {
            $orders = $orders->where('created_at','<=',Carbon::parse($search2['select_to'])
                ->addDays(1));
        }

        if($search2['select_from'] && $search2['select_to'])
        {
            $orders = $orders->where('created_at','>=',$search2['select_from'])
                ->where('created_at','<=',Carbon::parse($search2['select_to'])
                    ->addDays(1));
        }*/

        /*$orders = $orders->latest()->paginate(50);

        return $orders;*/

    }

    public function search3($search3)
    {//search for costs
        global $orders;
        $orders = new Order();

        $user = User::where(function($q) use($search3)
        {
            $q->where('name','like', '%' . $search3['search3'] . '%');
        }
        )->pluck('id');

        if(sizeof($user)>0)
        {


            if($search3['select_from'])
            {
                return $orders->whereIn('user_id',$user)
                    ->where("order_status","finish_order")
                    ->where('created_at','>=',$search3['select_from'])
                    ->latest()->paginate(50);
            }

            if($search3['select_to'])
            {
                return $orders->whereIn('user_id',$user)
                    ->where("order_status","finish_order")
                    ->where('created_at','<=',Carbon::parse($search3['select_to'])
                        ->addDays(1))
                    ->latest()->paginate(50);
            }

            if($search3['select_from'] && $search3['select_to'])
            {
                return $orders->whereIn('user_id',$user)
                    ->where("order_status","finish_order")
                    ->where('created_at','>=',$search3['select_from'])
                    ->where('created_at','<=',Carbon::parse($search3['select_to'])
                        ->addDays(1))
                    ->latest()->paginate(50);
            }

            return $orders->whereIn('user_id',$user)
                ->where("order_status","finish_order")
                ->latest()->paginate(50);

        }else{

            ////////////////////////////////////
            if($search3['select_from'])
            {
                return $orders->where("order_status","finish_order")
                    ->where('created_at','>=',$search3['select_from'])
                    ->latest()->paginate(50);
            }

            if($search3['select_to'])
            {
                return $orders->where("order_status","finish_order")
                    ->where('created_at','<=',Carbon::parse($search3['select_to'])
                        ->addDays(1))
                    ->latest()->paginate(50);
            }

            if($search3['select_from'] && $search3['select_to'])
            {
                return $orders->where("order_status","finish_order")
                    ->where('created_at','>=',$search3['select_from'])
                    ->where('created_at','<=',Carbon::parse($search3['select_to'])
                        ->addDays(1))
                    ->latest()->paginate(50);
            }
            //////////////////////////////
        }

        return $orders->where("order_status","finish_order")->latest()->paginate(50);


        /*if($search2['select_from'])
        {
            $orders = $orders->where('created_at','>=',$search2['select_from']);
        }

        if($search2['select_to'])
        {
            $orders = $orders->where('created_at','<=',Carbon::parse($search2['select_to'])
                ->addDays(1));
        }

        if($search2['select_from'] && $search2['select_to'])
        {
            $orders = $orders->where('created_at','>=',$search2['select_from'])
                ->where('created_at','<=',Carbon::parse($search2['select_to'])
                    ->addDays(1));
        }*/

        /*$orders = $orders->latest()->paginate(50);

        return $orders;*/

    }

}
