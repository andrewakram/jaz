@extends('admin.layouts.app')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <div class="{{Session::get("lang") =="ar" ? 'page-header-right' : 'page-header-left'}}">
                            <h3>{{trans('admin.showProfile')}}</h3>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item">{{ trans('admin.users')}}</li>
                                <li class="breadcrumb-item active">{{trans('admin.showProfile')}}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.layouts.message')
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="edit-profile">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">{{ trans('admin.myProfile')}}</h4>
                                <div class="card-options"><a class="card-options-collapse" href="edit-profile.html#" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="edit-profile.html#" data-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="row mb-2">
                                        <div class="col-auto"><img class="img-fluid image-radius " src="{{$user->image}}"></div>
                                    </div>
                                    <br>
                                    {{--<div class="form-group">--}}
                                    {{--<h6 class="form-label">Bio</h6>--}}
                                    {{--<textarea class="form-control" rows="5">On the other hand, we denounce with righteous indignation</textarea>--}}
                                    {{--</div>--}}
                                    <div class="form-group">
                                        <label class="form-label">#</label>
                                        <span class="form-control">{{$user->id}}</span>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">{{trans("admin.email")}}</label>
                                        <span class="form-control col-md-12">{{$user->email}}</span>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">{{trans("admin.phone")}}</label>
                                        <span class="form-control">{{$user->phone}}</span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">{{ trans('admin.profile')}}</h4>
                                <div class="card-options"><a class="card-options-collapse" href="edit-profile.html#" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="edit-profile.html#" data-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">{{ trans('admin.name')}}</label>
                                    <span class="form-control">{{$user->name}}</span>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">{{ trans('admin.type')}}</label>
                                    <span class="form-control">{{$user->role}}</span>
                                </div>
                                @if($user->commercial_register != "")
                                    <div class="form-group">
                                        <label class="form-label">Commercial register</label>
                                        <form action="" method="get">
                                            <button class="btn btn-primary">
                                                <i class="fa fa-download"></i> {{ trans('admin.download')}}</button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">{{ trans('admin.moreInfo')}}</h4>
                                <div class="card-options"><a class="card-options-collapse" href="edit-profile.html#" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="edit-profile.html#" data-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">{{ trans('admin.registeration')}}</label>
                                    <span class="form-control text-center">{{$user->created_at}}</span>
                                    <span class="form-control text-center">{{$user->created_at->diffForHumans()}}</span>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">{{ trans('admin.orders')}}</label>
                                    <span class="btn btn-dark">{{isset($user->orders)?$user->orders->count():0}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">{{ trans('admin.settings')}}</h4>
                                <div class="card-options"><a class="card-options-collapse" href="edit-profile.html#" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="edit-profile.html#" data-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                            </div>
                            <div class="card-body">
                                {{--<div class="form-group">--}}
                                    {{--<label class="col-md-6 col-xs-6 control-label">Edit</label>--}}
                                    {{--<div class="col-md-6 col-xs-6">--}}
                                        {{--<a href="/provider/technician/{{$user->id}}/edit"><button class="btn btn-warning">Edit</button></a>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                @if($user->active == 1)
                                    @if(admin()->hasPermissionTo('Suspend user'))
                                    <div class="form-group">
                                        <label class="col-md-6 col-xs-6 control-label">{{ trans('admin.suspended')}}</label>
                                        <div class="col-md-6 col-xs-6">
                                            <button class="btn btn-primary mb-control" data-toggle="modal" data-target="#message-box-suspend" title="suspend">{{trans('admin.suspended')}}</button>
                                        </div>
                                    </div>
                                    @endif
                                @elseif($user->active == 0)
                                    @if(admin()->hasPermissionTo('Active user'))
                                    <div class="form-group">
                                        <label class="col-md-6 col-xs-6 control-label">{{ trans('admin.active')}}</label>
                                        <div class="col-md-6 col-xs-6">
                                            <button class="btn btn-success mb-control" data-toggle="modal" data-target="#message-box-active" title="Activate">{{ trans('admin.active')}}</button>                                </div>
                                    </div>
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
                    <h5 class="modal-title" id="exampleModalLabel">{{ trans('admin.suspended')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{route('userChangeStatus')}}" class="buttons">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <h4>{{ trans('admin.areYouSure')}}</h4>
                        <h6>{{ trans('admin.youSuspendUser')}}</h6>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="user_id" value="{{$user->id}}">
                        <button class="btn btn-dark" type="button" data-dismiss="modal">{{ trans('admin.close')}}</button>
                        <button type="submit" class="btn btn-primary">{{ trans('admin.confirm')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal animated fadeIn" id="message-box-active" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header btn-success">
                    <h5 class="modal-title" id="exampleModalLabel">{{ trans('admin.accept')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{route('userChangeStatus')}}" class="buttons">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <h4>{{ trans('admin.areYouSure')}}</h4>
                        <h6>{{ trans('admin.youActiveUser')}}</h6>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="user_id" value="{{$user->id}}">
                        <button class="btn btn-dark" type="button" data-dismiss="modal">{{ trans('admin.close')}}</button>
                        <button type="submit" class="btn btn-success">{{ trans('admin.confirm')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
