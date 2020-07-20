@extends('admin.layouts.app')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <div class="{{Session::get("lang") =="ar" ? 'page-header-right' : 'page-header-left'}}">
                            <h3>{{trans("admin.showProfile")}}</h3>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item">{{trans("admin.worker")}}</li>
                                <li class="breadcrumb-item active">{{trans("admin.showProfile")}}</li>
                            </ol>
                        </div>
                    </div>
                    <!-- Bookmark Start-->
                {{--<div class="col">--}}
                {{--<div class="bookmark pull-right">--}}
                {{--<ul>--}}
                {{--<li><a href="edit-profile.html#" data-container="body" data-toggle="popover" data-placement="top" title="" data-original-title="Calendar"><i data-feather="calendar"></i></a></li>--}}
                {{--<li><a href="edit-profile.html#" data-container="body" data-toggle="popover" data-placement="top" title="" data-original-title="Mail"><i data-feather="mail"></i></a></li>--}}
                {{--<li><a href="edit-profile.html#" data-container="body" data-toggle="popover" data-placement="top" title="" data-original-title="Chat"><i data-feather="message-square"></i></a></li>--}}
                {{--<li><a href="edit-profile.html#"><i class="bookmark-search" data-feather="star"></i></a>--}}
                {{--<form class="form-inline search-form">--}}
                {{--<div class="form-group form-control-search">--}}
                {{--<input type="text" placeholder="Search..">--}}
                {{--</div>--}}
                {{--</form>--}}
                {{--</li>--}}
                {{--</ul>--}}
                {{--</div>asd--}}
                {{--</div>--}}
                <!-- Bookmark Ends-->
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        @include('admin.layouts.message')
        <div class="container-fluid">
            <div class="edit-profile">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">{{trans("admin.myProfile")}}</h4>
                                <div class="card-options"><a class="card-options-collapse" href="edit-profile.html#" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="edit-profile.html#" data-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="row mb-2">
                                        <div class="col-auto"><img class="img-fluid image-radius " src="{{$worker->image}}"></div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label class="form-label">#</label>
                                        <span class="form-control">{{$worker->id}}</span>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">{{trans("admin.email")}}</label>
                                        <span class="form-control" style="font-size: 15px">{{$worker->email}}</span>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">{{trans("admin.phone")}}</label>
                                        <span class="form-control">{{$worker->phone}}</span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">{{trans("admin.profile")}}</h4>
                                <div class="card-options"><a class="card-options-collapse" href="edit-profile.html#" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="edit-profile.html#" data-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">{{trans("admin.name")}}</label>
                                    <span class="form-control">{{$worker->name}}</span>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">{{trans("admin.type")}}</label>
                                    <span class="form-control">{{$worker->role}}</span>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">{{trans("admin.services")}}</label>


                                    @foreach($worker->get_category_list($worker->id) as $cat)
                                        <span class="form-control">{{$cat->ar_name}} - {{$cat->en_name}}</span>
                                    @endforeach
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Rate</label>
                                    <div class="placeholder" style="color: lightgray;">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <span class="small">({{ $worker->rate }})</span>
                                    </div>

                                    <div class="overlay" style="position: relative;top: -22px;">

                                        @while($worker->rate>0)
                                            @if($worker->rate >0.5)
                                                <i class="fa fa-star" style="color: #ffa800"></i>
                                            @else
                                                <i class="fa fa-star-half" style="color: #ffa800"></i>
                                            @endif
                                            @php $worker->rate--; @endphp
                                        @endwhile

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">{{trans("admin.description")}}</label>
                                    <textarea rows="5" class="form-control">{{$worker->description}}</textarea>
                                </div>
                                @if($worker->contract != "")
                                    <div class="form-group">
                                        <label class="form-label">Contract</label>
                                        <form action="" method="get">
                                            <button class="btn btn-primary">
                                                <i class="fa fa-download"></i> Download</button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">{{trans("admin.moreInfo")}}</h4>
                                <div class="card-options"><a class="card-options-collapse" href="edit-profile.html#" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="edit-profile.html#" data-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">{{trans("admin.status")}}</label>
                                    @if($worker->busy == 1)
                                        <span class="form-control font font-danger">Busy</span>
                                    @else
                                        <span class="form-control font font-success">Not busy</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="form-label">{{trans("admin.availability")}}</label>
                                    @if($worker->online == 1)
                                        <span class="form-control font font-success">Online</span>
                                    @else
                                        <span class="form-control font font-danger">Offline</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="form-label">{{trans("admin.registeration")}}</label>
                                    <span class="form-control text-center">{{$worker->created_at}}</span>
                                    <span class="form-control text-center">{{$worker->created_at->diffForHumans()}}</span>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">{{trans("admin.orders")}}</label>
                                    <span class="btn btn-dark">{{$worker->orders->count()}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">{{trans("admin.settings")}}</h4>
                                <div class="card-options"><a class="card-options-collapse" href="edit-profile.html#" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="edit-profile.html#" data-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                            </div>
                            <div class="card-body">
                                @if($worker->provider_id == 1)
                                    @if(admin()->hasPermissionTo('Edit company worker'))
                                        <div class="form-group">
                                            <label class="col-md-6 col-xs-6 control-label">{{trans("admin.edit")}}</label>
                                            <div class="col-md-6 col-xs-6">
                                                <a href="{{route('workers_company.edit',$worker->id)}}"><button class="btn btn-warning">{{trans("admin.edit")}}</button></a>
                                            </div>
                                        </div>
                                    @endif
                                @endif
                                @if($worker->active == 1)
                                    @if(admin()->hasPermissionTo('Suspend company worker') || admin()->hasPermissionTo('Suspend app worker'))
                                        <div class="form-group">
                                            <label class="col-md-6 col-xs-6 control-label">{{trans("admin.suspended")}}</label>
                                            <div class="col-md-6 col-xs-6">
                                                <button class="btn btn-primary mb-control" data-toggle="modal" data-target="#message-box-suspend" title="suspend">{{trans("admin.suspended")}}</button>
                                            </div>
                                        </div>
                                    @endif
                                    @if($worker->accept == 0)
                                        @if(admin()->hasPermissionTo('Active company worker'))
                                            <div class="form-group">
                                                <label class="col-md-6 col-xs-6 control-label">Contract {{trans("admin.active")}}</label>
                                                <div class="col-md-6 col-xs-6">
                                                    <button class="btn btn-success mb-control" data-toggle="modal" data-target="#message-box-contract" title="Contract Activate">{{trans("admin.active")}}</button>
                                                </div>
                                            </div>
                                        @endif
                                    @endif
                                @elseif($worker->active == 0)
                                    @if(admin()->hasPermissionTo('Active company worker') || admin()->hasPermissionTo('Active app worker'))
                                        <div class="form-group">
                                            <label class="col-md-6 col-xs-6 control-label">{{trans("admin.active")}}</label>
                                            <div class="col-md-6 col-xs-6">
                                                <button class="btn btn-success mb-control" data-toggle="modal" data-target="#message-box-active" title="Activate">{{trans("admin.active")}}</button>
                                            </div>
                                        </div>
                                    @endif
                                    @if($worker->accept == 0)
                                        @if(admin()->hasPermissionTo('Active company worker'))
                                            <div class="form-group">
                                                <label class="col-md-6 col-xs-6 control-label">Contract {{trans("admin.active")}}</label>
                                                <div class="col-md-6 col-xs-6">
                                                    <button class="btn btn-success mb-control" data-toggle="modal" data-target="#message-box-contract" title="Contract Activate">{{trans("admin.active")}}</button>
                                                </div>
                                            </div>
                                        @endif
                                    @endif
                                @endif
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>

    <div class="modal animated fadeIn" id="message-box-suspend" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header btn-primary">
                    <h5 class="modal-title" id="exampleModalLabel">{{trans("admin.suspended")}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{route('worker_change_status')}}" class="buttons">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <h4>{{trans("admin.areYouSure")}}</h4>
                        <h6>{{trans("admin.youSuspendUser")}}</h6>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="worker_id" value="{{$worker->id}}">
                        <button class="btn btn-dark" type="button" data-dismiss="modal">{{trans("admin.close")}}</button>
                        <button type="submit" class="btn btn-primary">{{trans("admin.confirm")}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal animated fadeIn" id="message-box-active" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header btn-success">
                    <h5 class="modal-title" id="exampleModalLabel">{{trans("admin.accept")}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{route('worker_change_status')}}" class="buttons">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <h4>{{trans("admin.areYouSure")}}</h4>
                        <h6>{{trans("admin.youActiveUser")}}</h6>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="worker_id" value="{{$worker->id}}">
                        <button class="btn btn-dark" type="button" data-dismiss="modal">{{trans("admin.close")}}<</button>
                        <button type="submit" class="btn btn-success">{{trans("admin.confirm")}}<</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal animated fadeIn" id="message-box-contract" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header btn-success">
                    <h5 class="modal-title" id="exampleModalLabel">{{trans("admin.accept")}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{route('worker_active_contract')}}" class="buttons">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <h4>{{trans("admin.areYouSure")}}</h4>
                        <h6>{{trans("admin.youActiveUser")}}</h6>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="worker_id" value="{{$worker->id}}">
                        <button class="btn btn-dark" type="button" data-dismiss="modal">{{trans("admin.close")}}</button>
                        <button type="submit" class="btn btn-success">{{trans("admin.confirm")}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
