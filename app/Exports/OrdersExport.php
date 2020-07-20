<?php

namespace App\Exports;

use App\Models\Category;
use App\Models\User;
use App\Models\Worker;
use App\Models\Order;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Input;
use Session;

class OrdersExport implements FromView
{
    use Exportable;


    public function view(): View
    {
        $get_orders = new Order;

        $orders = $get_orders->search(Session::get("arr_search"));
        //////////

        //$orders = \App\Models\Order::all();

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
        return view('admin.exports.orders', [
            'orders' => $orders
        ]);
    }
}
