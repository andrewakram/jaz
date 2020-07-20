@extends('admin.layouts.app')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <div class="{{Session::get("lang") =="ar" ? 'page-header-right' : 'page-header-left'}}">
                            <h3>{{ trans('admin.showProfile')}}</h3>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item">{{ trans('admin.users')}}</li>
                                <li class="breadcrumb-item active">{{ trans('admin.showProfile')}}</li>
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
                                        <div class="col-auto"><img class="img-fluid image-radius " src="{{$admin->image}}"></div>
                                    </div>
                                    <br>
                                    {{--<div class="form-group">--}}
                                    {{--<h6 class="form-label">Bio</h6>--}}
                                    {{--<textarea class="form-control" rows="5">On the other hand, we denounce with righteous indignation</textarea>--}}
                                    {{--</div>--}}
                                    <div class="form-group">
                                        <label class="form-label">#</label>
                                        <span class="form-control">{{$admin->id}}</span>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">{{ trans('admin.email')}}</label>
                                        <span class="form-control col-md-12">{{$admin->email}}</span>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">{{ trans('admin.phone')}}</label>
                                        <span class="form-control">{{$admin->phone}}</span>
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
                                    <span class="form-control">{{$admin->name}}</span>
                                </div>
                                @if(count($admin->permissions) > 0)
                                    <div class="form-group">
                                        <label class="form-label">{{ trans('admin.roles')}}</label>
                                        @foreach($admin->permissions as $permission)
                                        <span class="form-control">{{$permission->name}}</span>
                                        @endforeach
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
                                    <label class="form-label">{{ trans('admin.registration')}}</label>
                                    <span class="form-control text-center">{{$admin->created_at}}</span>
                                    <span class="form-control text-center">{{$admin->created_at->diffForHumans()}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">{{ trans('admin.settings')}}</h4>
                            </div>
                            <div class="card-body">
                                @if(admin()->hasPermissionTo('Edit admins'))
                                <div class="form-group">
                                    <label class="col-md-6 col-xs-6 control-label">{{ trans('admin.edit')}}</label>
                                    <div class="col-md-6 col-xs-6">
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal"> {{ trans('admin.edit')}} </button>
                                    </div>
                                </div>
                                @endif
                                @if($admin->active == 1)
                                    @if(admin()->hasPermissionTo('Suspend admins'))
                                    <div class="form-group">
                                        <label class="col-md-6 col-xs-6 control-label">{{ trans('admin.suspended')}}</label>
                                        <div class="col-md-6 col-xs-6">
                                            <button class="btn btn-primary mb-control" data-toggle="modal" data-target="#message-box-suspend" title="suspend">{{ trans('admin.suspended')}}</button>
                                        </div>
                                    </div>
                                    @endif
                                @elseif($admin->active == 0)
                                    @if(admin()->hasPermissionTo('Active admins'))
                                    <div class="form-group">
                                        <label class="col-md-6 col-xs-6 control-label">{{ trans('admin.active')}}</label>
                                        <div class="col-md-6 col-xs-6">
                                            <button class="btn btn-success mb-control" data-toggle="modal" data-target="#message-box-active" title="Activate">{{ trans('admin.active')}}</button>
                                        </div>
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
                        <input type="hidden" name="user_id" value="{{$admin->id}}">
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
                    <h5 class="modal-title" id="exampleModalLabel">{{trans('admin.accept')}}</h5>
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
                        <input type="hidden" name="user_id" value="{{$admin->id}}">
                        <button class="btn btn-dark" type="button" data-dismiss="modal">{{ trans('admin.close')}}</button>
                        <button type="submit" class="btn btn-success">{{ trans('admin.confirm')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ trans('admin.edit')}} {{ trans('admin.admin')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="form-group">
                    <label class="col-lg-12 control-label {{Session::get("lang") =="ar" ? 'text-lg-right' : 'text-lg-left'}}" for="textinput">Permissions</label>
                    <div class="col-lg-12">
                        @foreach($admin->permissions as $permission)
                            <span class="form-control">{{$permission->name}}</span>
                        @endforeach
                    </div>
                </div>
                <form class="form-horizontal" method="post" action="{{route('admins.update',$admin->id)}}" enctype="multipart/form-data">
                    @method('patch')
                    {{csrf_field()}}
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-lg-12 control-label {{Session::get("lang") =="ar" ? 'text-lg-right' : 'text-lg-left'}}" for="textinput">{{ trans('admin.name')}}</label>
                            <div class="col-lg-12">
                                <input id="name" name="name" type="text" value="{{$admin->name}}" class="form-control btn-square" required>
                            </div>
                            @include('admin.layouts.error', ['input' => 'name'])
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-12 control-label {{Session::get("lang") =="ar" ? 'text-lg-right' : 'text-lg-left'}}" for="textinput">{{ trans('admin.email')}}</label>
                            <div class="col-lg-12">
                                <input id="email" name="email" type="email" value="{{$admin->email}}" class="form-control btn-square" required>
                            </div>
                            @include('admin.layouts.error', ['input' => 'email'])
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-12 control-label {{Session::get("lang") =="ar" ? 'text-lg-right' : 'text-lg-left'}}" for="textinput">{{ trans('admin.phone')}}</label>
                            <div class="col-lg-12">
                                <input id="phone" name="phone" type="number" value="{{$admin->phone}}" class="form-control btn-square" required>
                            </div>
                            @include('admin.layouts.error', ['input' => 'phone'])
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-12 control-label {{Session::get("lang") =="ar" ? 'text-lg-right' : 'text-lg-left'}}" for="passwordinput">{{ trans('admin.password')}}</label>
                            <div class="col-lg-12">
                                <input id="password" name="password" type="password" placeholder="password" class="form-control btn-square">
                                <span class="label label-warning">Leave it there if no changes</span>
                            </div>
                            @include('admin.layouts.error', ['input' => 'password'])
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-12 control-label {{Session::get("lang") =="ar" ? 'text-lg-right' : 'text-lg-left'}}" for="textinput">{{ trans('admin.uploadImage')}}</label>
                            <div class="col-lg-12">
                                <input id="inputImage" type="file" name="image" accept=".jpg,.jpeg,.png,.gif,.bmp,.tiff">
                            </div>
                            @include('admin.layouts.error', ['input' => 'image'])
                            <br><br>
                            <div class="col-md-8">
                                <img src="{{$admin->image}}" width="100" height="100"/>
                                <span class="label label-warning">Leave it there if no changes</span>
                            </div>
                        </div>

                        <label class="col-lg-12 control-label {{Session::get("lang") =="ar" ? 'text-lg-right' : 'text-lg-left'}}" for="textinput">{{ trans('admin.permission')}}</label>
                        @foreach($data as $key => $permission)
                            <h4 style="color: #1d75b3">{{$key}}</h4>
                            <div class="row">
                                <div class="col-lg-12">
                                    @foreach($permission as $single_permission)
                                        <label class="control-label" style="padding: 4px" for="check{{$single_permission->id}}">{{$single_permission->name}}</label>
                                        <input type="checkbox" id="check{{$single_permission->id}}" name="check_list[]" value="{{ $single_permission->name }}"
                                        @if($admin->hasPermissionTo($single_permission->name)) checked @endif>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach

                        {{--@foreach($data['all_permissions'] as $key => $permission)--}}
                            {{--<h5>{{$key}}</h5>--}}
                            {{--<div class="row">--}}
                                {{--@foreach($permission as $single_permission)--}}
                                    {{--<div class="col-lg-12">--}}
                                        {{--<label class="control-label" for="check{{$single_permission->id}}">{{$single_permission->name}}</label>--}}
                                        {{--<input type="checkbox" id="check{{$single_permission->id}}" name="check_list[]" value="{{ $single_permission->name }}"--}}
                                               {{--@if($admin->can($single_permission->name)) checked @endif>--}}
                                    {{--</div>--}}
                                {{--@endforeach--}}
                            {{--</div>--}}
                        {{--@endforeach--}}

                        {{--<div class="form-group row">--}}
                            {{--<label class="col-lg-12 control-label text-lg-left" for="textinput">Permissions</label>--}}
                            {{--<div class="col-lg-12">--}}
                                {{--<label class="col-lg-12 control-label text-left" for="textinput">Users</label>--}}
                                {{--<input type="checkbox" name="check_list[]" value="user_add"> Add--}}
                                {{--<input type="checkbox" name="check_list[]" value="user_suspend"> Suspend--}}
                                {{--<br><br>--}}
                                {{--<label class="col-lg-12 control-label text-left" for="textinput">Workers</label>--}}
                                {{--<input type="checkbox" name="check_list[]" value="worker_add"> Add--}}
                                {{--<input type="checkbox" name="check_list[]" value="worker_edit"> Edit--}}
                                {{--<input type="checkbox" name="check_list[]" value="worker_suspend"> Suspend--}}
                                {{--<br><br>--}}
                                {{--<label class="col-lg-12 control-label text-left" for="textinput"> Order</label>--}}
                                {{--<input type="checkbox" name="check_list[]" value="order_accept"> Accept--}}
                                {{--<input type="checkbox" name="check_list[]" value="order_decline"> Decline--}}
                                {{--<br><br>--}}
                                {{--<label class="col-lg-12 control-label text-left" for="textinput">Categories</label>--}}
                                {{--<input type="checkbox" name="check_list[]" value="category_add"> Add--}}
                                {{--<input type="checkbox" name="check_list[]" value="category_edit"> Edit--}}
                                {{--<input type="checkbox" name="check_list[]" value="category_show"> Delete--}}
                                {{--<br><br>--}}
                                {{--<label class="col-lg-12 control-label text-left" for="textinput">Settings</label>--}}
                                {{--<input type="checkbox" name="check_list[]" value="setting_edit"> Edit--}}
                                {{--<input type="checkbox" name="check_list[]" value="setting_delete"> Delete--}}
                                {{--<br><br>--}}
                                {{--<label class="col-lg-12 control-label text-left" for="textinput">Dashboard</label>--}}
                                {{--<input type="checkbox" name="check_list[]" value="dashboard_show"> Show--}}
                                {{--<br><br>--}}
                                {{--<label class="col-lg-12 control-label text-left" for="textinput">Admin</label>--}}
                                {{--<input type="checkbox" name="check_list[]" value="admin_show"> Show--}}
                                {{--<input type="checkbox" name="check_list[]" value="admin_add"> Add--}}
                                {{--<input type="checkbox" name="check_list[]" value="admin_edit"> Edit--}}
                                {{--<input type="checkbox" name="check_list[]" value="admin_suspend"> Suspend--}}
                            {{--</div>--}}
                        {{--</div>--}}


                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-dark" data-dismiss="modal">{{ trans('admin.close')}}</button>
                        <button class="btn btn-primary">{{ trans('admin.saveChanges')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
