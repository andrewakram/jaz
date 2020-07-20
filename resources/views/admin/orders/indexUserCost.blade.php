@extends('admin.layouts.app')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <div class=" {{Session::get("lang") =="ar" ? 'page-header-right' : 'page-header-left'}}">
                            <h3>{{trans('admin.orders')}} </h3>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item active">{{ trans('admin.orders')}}</li>
                            </ol>
                        </div>
                        <br>
                        {{--<a href="orders/export" class="btn btn-success" style="margin:5px; float:{{Session::get("lang") =="ar" ? 'left' : 'right'}}"> {{ trans('admin.export')}}<i class="fa fa-file-excel-o"></i></a>--}}

                        <a href="costsUser/export" class="btn btn-warning" style="float:{{Session::get("lang") =="ar" ? 'left' : 'right'}}"> {{ trans('admin.exportUserOrders')}}<i class="fa fa-file-excel-o"></i></a>

                        {{--@include('admin.layouts.search')--}}

                        <div class="card-body" dir="{{Session::get("lang") =="ar" ? 'rtl' : 'ltr'}}">
                            <form class="form-horizontal" action="{{asset(Session::get("lang").'/admin/searchUserCost')}}" method="get">
                                <div class="form-row">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="search3" value="{{isset($search3) ? $search3 : ''}}" placeholder="{{ trans('admin.searchByUserName')}}" />
                                        <button class="btn btn-primary">{{ trans('admin.searchNow')}}</button>
                                    </div>
                                </div><br>
                                <div class="form-row">
                                    <div class="col-md-6 mb-3" >
                                        <label for="validationCustom01">{{ trans('admin.from')}}</label>
                                        <input type="date" class="form-control" name="from" value="{{request('from')}}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom02">{{ trans('admin.to')}}</label>
                                        <input type="date" class="form-control" name="to" value="{{request('to')}}">
                                    </div>
                                </div>

                            </form>
                        </div>

                        {{--@include('admin.layouts.search')--}}

                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-lg-12 col-xl-12">
                    <h4># {{ trans('admin.orders')}} : {{sizeof($orders)}}</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>{{trans('admin.type')}}</th>
                                        <th>{{trans('admin.category')}}</th>
                                        <th>{{trans('admin.user')}}</th>
                                        <th>{{trans('admin.worker')}}</th>
                                        <th>{{trans('admin.status')}}</th>
                                        <th>{{trans('admin.total')}}</th>
                                        <th>{{trans('admin.paid')}}</th>
                                        <th>{{trans('admin.orderChoice')}}</th>
                                        <th>{{trans('admin.operations')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($orders) > 0 )
                                        @foreach($orders as $order)
                                            <tr>
                                                <td>{{$order->id}}</td>
                                                <td>{{$order->type}}</td>
                                                <td>{{$order->category->en_name}}</td>
                                                <td>{{$order->user->name}}</td>
                                                <td>{{isset($order->worker->name)?
                                                $order->worker->name: ''}}</td>
                                                @if(/*$order->action == 0 OR*/ $order->order_status == "" OR $order->order_status == "accept_order" OR $order->order_status == "on_way" OR $order->order_status == "worker_arrived")
                                                    <td class="font-primary">{{trans('admin.open')}}</td>
                                                @elseif(/*$order->action == 1 OR*/ $order->order_status == "finish_order")
                                                    <td class="font-success">{{trans('admin.completed')}}</td>
                                                @elseif($order->action == 2 OR $order->order_status == "user_cancelling")
                                                    <td class="font-danger">{{trans('admin.cancelled')}}</td>
                                                @elseif($order->order_status == "admin_finishing")
                                                    <td class="font-warning">{{trans('admin.admin_finishing')}}</td>
                                                @endif
                                                <td>{{$order->order_total}}</td>
                                                <td>{{$order->finish_price}}</td>
                                                <td>{{$order->order_choice == 1 ? trans('admin.userss') : ($order->order_choice == 2 ? trans('admin.companiess') : "-")}}</td>
                                                <td>
                                                    <a title="{{trans('admin.view')}}" href="{{route('orders_view',$order->id)}}"><button class="btn btn-info btn-condensed"><i class="fa fa-eye"></i></button></a>
                                                </td>
                                            </tr>
                                         @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        <!-- Container-fluid Ends-->
{{$orders->links()}}
    </div>
    {{--<script type="text/javascript">--}}

        {{--setTimeout(function(){--}}

            {{--location.reload();--}}

        {{--},60000);--}}

    {{--</script>--}}

@endsection
