@extends('admin.layouts.app')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <div class="{{Session::get("lang") =="ar" ? 'page-header-right' : 'page-header-left'}}">
                            <h3>{{trans('admin.orders')}} </h3>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item active">{{trans('admin.orders')}}</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        @include('admin.layouts.message')
        <!-- Container-fluid starts-->
        <div class="col-sm-14 col-xl-5">
            <div class="  card">
                <div class="card-body">



                    <div class="ribbon ribbon-secondary  {{Session::get("lang") =="ar" ? 'ribbon-vertical-right' : 'ribbon-vertical-left'}}" style="background-color: #ff9f40 !important;"><i class="icon-shopping-cart"></i></div>
                    <h6>{{trans('admin.order')}}: <strong>#{{$order->id}}</strong></h6>
                    <h6>{{trans('admin.category')}}: <strong>{{$order->category->en_name}} ({{$order->created_at['date'].' '.$order->created_at['time']}})</strong></h6>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 col-xl-4">
                    <div class="card card-absolute">
                        <div class="card-header bg-warning">
                            <h5 class="text-white">{{trans('admin.user')}}</h5>
                        </div>
                        <div class="card-body">
                            <p>#: <strong>{{$order->user->id}}</strong></p>
                            <p>{{trans('admin.name')}}: <strong>{{$order->user->name}}</strong></p>
                            <p>{{trans('admin.phone')}}: <strong>{{$order->user->phone}}</strong></p>
                            <p>{{trans('admin.address')}}: <strong>{{$order->user->address}}</strong></p>
                        </div>
                    </div>
                </div>

                @if(isset($order->worker))
                <div class="col-sm-12 col-xl-4">
                    <div class="card card-absolute">
                        <div class="card-header bg-warning">
                            <h5 class="text-white">{{trans('admin.technician')}}</h5>
                        </div>
                        <div class="card-body">
                            <p>#: <strong>{{$order->worker->id}}</strong></p>
                            <p>{{trans('admin.name')}}: <strong>{{$order->worker->name}}</strong></p>
                            <p>{{trans('admin.phone')}}: <strong>{{$order->worker->phone}}</strong></p>
                            <h4> <strong>{{$order->worker->role == "individual" ? trans('admin.individual') : trans('admin.company')}}</strong></h4>
                        </div>
                    </div>
                </div>
                @endif

                <div class="col-sm-12 col-xl-4">
                    <div class="card card-absolute">
                        <div class="card-header bg-warning">
                            <h5 class="text-white">{{trans('admin.tracking')}}</h5>
                        </div>
                        <div class="card-body">
                            @if($order->order_status == 'accept_order')
                                <p><strong>accept_order</strong> <i class="font-success show icon-check"></i></p>
                                <p><strong>on_way</strong> <i class="font-danger show icon-close"></i></p>
                                <p><strong>finish_order</strong> <i class="font-danger show icon-close"></i></p>
                            @elseif($order->order_status == 'on_way')
                                <p><strong>accept_order</strong> <i class="font-success show icon-check"></i></p>
                                <p><strong>on_way</strong> <i class="font-success show icon-check"></i></p>
                                <p><strong>finish_order</strong> <i class="font-danger show icon-close"></i></p>
                            @elseif($order->order_status == 'finish_order')
                                <p><strong>accept_order</strong> <i class="font-success show icon-check"></i></p>
                                <p><strong>on_way</strong> <i class="font-success show icon-check"></i></p>
                                <p><strong>finish_order</strong> <i class="font-success show icon-check"></i></p>
                            @else
                                <p><strong>Waiting accept</strong></p>
                            @endif
                        </div>
                        
                        <div class="card-body">
                            <b>Rate : {{$order->rate > 0 ? : "-"}}</b>
                        </div>
                    </div>
                </div>

                @if(count($order->orderImage))
                    <div class="col-xl-9 offset-2">
                        <div class="card card-absolute">
                            <div class="card-header bg-warning">
                                <h5 class="text-white">{{trans('admin.image')}}</h5>
                            </div>
                            <div class="card-body">
                                @foreach($order->orderImage as $image)
                                    @if($image->type == 'image')
                                        <a target="_blank" href="{{$image->media}}" itemprop="contentUrl" data-size="1600x950">
                                            <img class="grid-item col-md-3 col-6 wow rollIn center" src="{{$image->media}}" itemprop="thumbnail" alt="Image description">
                                        </a>
                                    @else
                                        <video width="120" class="grid-item col-md-3 col-6 wow rollIn center"  controls>
                                            <source src="{{$image->media}}" type="video/mp4">
                                            Your browser does not support HTML5 video.
                                        </video>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif

                <div class="clearfix">
                <div class="{{Session::get('lang') == "ar" ? 'pull-left' : 'pull-right'}}">
                @if($order->order_action == 0 && $order->order_status != "finish_order" )
                    @if($order->order_status != "admin_finishing" )
                        <span class="col-xl-3 " style="padding: 20px">
                            @if(admin()->hasPermissionTo('Reject orders'))
                            <button class="btn btn-danger btn-condensed mb-control" data-toggle="modal" data-target="#message-box-warning2" title="{{trans("admin.finishOrder")}}">
                            <i class="fa fa-minus-circle"></i> {{trans("admin.finishOrder")}}
                            </button>
                            @endif
                        </span>
                    @endif
                @endif


                @if($order->order_action == 0 && $order->activeRequest[0]->sent_worker_id == null && $order->order_status != "admin_finishing" )
                    <span class="col-xl-3" style="padding: 20px">
                        @if(admin()->hasPermissionTo('Accept orders'))
                        <button class="btn btn-success btn-condensed mb-control" data-toggle="modal" data-target="#message-box-success" title="{{trans("admin.confirm")}}">
                            <i class="fa fa-check-circle"></i> {{trans("admin.confirm")}}
                        </button>
                        @endif
                    </span>

                    <span class="col-xl-3" style="padding: 20px">
                        @if(admin()->hasPermissionTo('Reject orders') && $order->order_status != "admin_finishing")
                        <button class="btn btn-warning btn-condensed mb-control" data-toggle="modal" data-target="#message-box-warning" title="{{trans("admin.decline")}}">
                            <i class="fa fa-minus-circle"></i> {{trans("admin.decline")}}
                        </button>
                        @endif
                    </span>
                @endif
                </div>
                <div class="clearfix">

            </div>
        </div>
        <!-- Container-fluid Ends-->

    </div>

    <div class="modal animated fadeIn" id="message-box-success" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header btn-success">
                    <h5 class="modal-title" id="exampleModalLabel">{{trans('admin.accept')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <form method="post" action="{{route('acceptOrder')}}" class="buttons">
                        <div class="modal-body">
                            <h4>{{trans('admin.areYouSure')}}</h4>
                            <h6>{{trans('admin.youAcceotOrder')}}</h6>

                            <div class="form-group row">
                                <label class="col-lg-12 control-label text-lg-left {{Session::get("lang") =="ar" ? 'text-lg-right' : 'text-lg-left'}}">Workers</label>
                                <div class="col-lg-12">
                                    <select class="form-control field" data-type="select" name="worker_id" required>
                                        <option selected disabled>{{trans('admin.selectWorker')}}</option>
                                        @if(isset($workers))
                                            @foreach($workers as $worker)
                                                <option value="{{$worker->id}}">{{$worker->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            @include('admin.layouts.error', ['input' => 'worker_id'])
                        </div>
                        <div class="modal-footer">
                                {{csrf_field()}}
                                <input type="hidden" name="order_id" value="{{$order->id}}">
                                <button class="btn btn-dark" type="button" data-dismiss="modal">{{trans('admin.close')}}</button>
                                <button type="submit" class="btn btn-success">{{trans('admin.confirm')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    <div class="modal animated tada" id="message-box-warning" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header btn-warning">
                    <h5 class="modal-title" id="exampleModalLabel">{{trans('admin.decline')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4>{{trans('admin.areYouSure')}}</h4>
                    <h6>{{trans('admin.youDeclineOrder')}}</h6>
                </div>
                <div class="modal-footer">
                    <form method="post" action="{{route('rejectOrder')}}" class="buttons">
                        {{csrf_field()}}
                        <input type="hidden" name="order_id" value="{{$order->id}}">
                        <button class="btn btn-dark" type="button" data-dismiss="modal">{{trans('admin.close')}}</button>
                        <button type="submit" class="btn btn-warning">{{trans('admin.confirm')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal animated tada" id="message-box-warning2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header btn-danger">
                    <h5 class="modal-title" id="exampleModalLabel">{{trans("admin.finishOrder")}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4>{{trans('admin.areYouSure')}}</h4>
                    <h6>{{trans('admin.youFinishOrder')}}</h6>
                </div>
                <div class="modal-footer">
                    <form method="post" action="{{route('finishOrder')}}" class="buttons">
                        {{csrf_field()}}
                        <input type="hidden" name="order_id" value="{{$order->id}}">
                        <button class="btn btn-dark" type="button" data-dismiss="modal">{{trans('admin.close')}}</button>
                        <button type="submit" class="btn btn-danger">{{trans("admin.finishOrder")}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
