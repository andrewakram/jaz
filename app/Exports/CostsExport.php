<?php

namespace App\Exports;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Order;
use App\Models\User;
use App\Models\Worker;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Session;

class CostsExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    use Exportable;


    public function view(): View
    {
        $get_orders = new Order;

        $orders = $get_orders->search2(Session::get("arr_search2"));
        //////////
        /*if(Session::get("to") && Session::get("from") ){
            $orders = \App\Models\Order::where("order_status","finish_order")
                ->where("created_at","<",Session::get("to"))
                ->where("created_at",">",Session::get("from"))
                ->get();
        }elseif(Session::get("to")){
            $orders = \App\Models\Order::where("order_status","finish_order")
                ->where("created_at","<",Session::get("to"))
                ->get();
        }elseif(Session::get("from") ){
            $orders = \App\Models\Order::where("order_status","finish_order")
                ->where("created_at",">",Session::get("from"))
                ->get();
        }
        else{
            $orders = \App\Models\Order::where("order_status","finish_order")
                ->get();
        }*/

        global $jazTotalMoney;
        global $govMoney;

        foreach ($orders as $order)
        {
            if($order->order_status == "" OR $order->order_status == "accept_order" OR $order->order_status == "on_way"){
                $order_action = 'Open';
            }
            if($order->order_status == "finish_order"){
                $order_action = 'Completed';
            }
            if($order->action == 2 OR $order->order_status == "user_cancelling"){
                $order_action = 'Canceled';
            }
            if($order->order_status == "admin_finishing"){
                $order_action = 'admin finish';
            }

            /*if($order->order_status==0) $order_action = 'Open';
            elseif($order->order_action==1) $order_action = 'Completed';
            elseif($order->order_action==2) $order_action = 'Canceled';
            elseif($order->order_action==3) $order_action = 'Rejected';*/

            if($order->order_choice == 1){
                $order['order_choice'] = "أفراد";
            } elseif($order->order_choice == 2){
                $order['order_choice'] = "شركات";
            }else{
                $order['order_choice'] = "-";
            }

            ///////////////////////////
            if($order->payment_way==1){
                $order['payment_way'] = "cash";
            }elseif($order->payment_way==2){
                $order['payment_way'] = "online";
            }

            if($order->paid_status==0){
                $order['paid_status'] = "Un Paid";
            }elseif($order->paid_status==1){
                $order['paid_status'] = "Paid";
            }
            //-----------
            $fee = Admin::whereId(1)->select('id','interest_fee','gov_fee')
                ->first();
            //$gov_fee = Admin::whereId(1)->select('id','interest_fee')->first()->gov_fee;

            $provider = Worker::where('id',$order->worker_id)
                ->select('provider_id')
                ->first()
                ->provider_id;
            if($provider == 1){
                $order['worker_money'] = 0;
                $order['jaz_money'] = $order->finish_price;
                $jazTotalMoney += $order->finish_price;
            }else{
                if($order->paid_status==0){
                    $order['worker_money'] = ($order->finish_price * (100-($fee->interest_fee + $fee->gov_fee)) ) / 100;
                    $order['jaz_money'] = ($order->finish_price * $fee->interest_fee) / 100;
                    $jazTotalMoney += ($order->finish_price * $fee->interest_fee) / 100;
                }elseif($order->paid_status==1){
                    $order['worker_money'] = ($order->finish_price * (100-($fee->interest_fee + $fee->gov_fee)) ) / 100;
                    $order['jaz_money'] = ($order->finish_price * $fee->interest_fee) / 100;
                }
            }
            //
            //gov fee
            $govfee = Admin::whereId(1)->select('id','gov_fee')
                ->first()->gov_fee;
            $order['gov_money'] = ($order->finish_price * $fee->gov_fee) / 100;
            $govMoney += ($order->finish_price * $fee->gov_fee) / 100;
            //
            $order['order_action'] = $order_action;
            $order['created_date'] = $order->created_at['date'];
            $order['created_time'] = $order->created_at['time'];
            $order['category'] = Category::where('id',$order->cat_id)->select('en_name')->first()->en_name;
            $order['user_name'] = User::where('id',$order->user_id)->select('name')->first()->name;
            $order['worker_name'] = isset($order->worker_id) ?
                Worker::where('id',$order->worker_id)->select('name')->first()->name : '';


            unset($order->cat_id,$order->user_id,$order->worker_id,$order->lat,$order->lng,$order->deleted_at,$order->created_at,$order->updated_at);
        }
        /*
        if($orders->count() > 0) {
            $orders = $orders->toArray();
        }*/
        return view('admin.exports.costs', [
            'orders' => $orders,
            'jazTotalMoney' => $jazTotalMoney,
            'govMoney' => $govMoney,
        ]);
    }
}
