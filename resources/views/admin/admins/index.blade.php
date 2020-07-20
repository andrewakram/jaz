@extends('admin.layouts.app')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <div class="{{Session::get("lang") =="ar" ? 'page-header-right' : 'page-header-left'}}">
                            <h3>{{ trans('admin.admins')}}</h3>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item active">{{ trans('admin.admins')}}</li>
                            </ol>
                        </div>
                        @if(admin()->hasPermissionTo('Add admins'))
                        <div style="float:{{Session::get("lang") =="ar" ? 'left' : 'right'}}">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                <i class="icon-plus"></i> {{ trans('admin.addAdmin')}}
                            </button>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        @include('admin.layouts.message')
        <div class="container-fluid">
            <div class="row">
                @foreach($admins as $admin)
                    <div class="col-md-6 col-lg-6 col-xl-4">
                        <div class="card custom-card">
                            <div class="card-header"><img class="img-fluid" src="{{asset('/admin/assets/images/user-card/9.jpg')}}" alt=""></div>
                            <div class="card-profile"><img class="rounded-circle" src="{{$admin->image}}" alt=""></div>

                            <div class="text-center profile-details">
                                <h4>{{$admin->name}}</h4>
                                {{--<h6>{{$user->role}}</h6>--}}
                            </div>
                            <div class="col-md-12 col-lg-12 col-xl-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="ttl-info justify-center ">
                                            <h6><i class="fa fa-phone"></i>&nbsp;&nbsp;&nbsp;{{ trans('admin.phone')}}</h6><span>{{$admin->phone}}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="ttl-info justify-center">
                                            <h6><i class="fa fa-envelope"></i>&nbsp;&nbsp;&nbsp;{{ trans('admin.email')}}</h6><span>{{$admin->email}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br/>
                            <div class="col-md-12 col-lg-12 col-xl-12  ">
                                <div class="row">
                                    <a class="btn btn-warning btn-lg justify-center" href="{{route('admins.show',$admin->id)}}" data-original-title="" title=""><span class="fa fa-info"></span> {{trans('admin.getMoreInformation')}}</a>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ trans('admin.addAdmin')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form-horizontal" method="post" action="{{route('admins.store')}}" enctype="multipart/form-data" dir="{{Session::get("lang") =="ar" ? 'rtl' : 'ltr'}}">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-lg-12 control-label {{Session::get("lang") =="ar" ? 'text-lg-right' : 'text-lg-left'}}" for="textinput">{{ trans('admin.name')}}</label>
                            <div class="col-lg-12">
                                <input id="name" name="name" type="text" placeholder="{{ trans('admin.name')}}" class="form-control btn-square" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-12 control-label {{Session::get("lang") =="ar" ? 'text-lg-right' : 'text-lg-left'}}" for="textinput">{{ trans('admin.email')}}</label>
                            <div class="col-lg-12">
                                <input id="email" name="email" type="email" placeholder="{{ trans('admin.email')}}" class="form-control btn-square" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-12 control-label {{Session::get("lang") =="ar" ? 'text-lg-right' : 'text-lg-left'}}" for="textinput">{{ trans('admin.phone')}}</label>
                            <div class="col-lg-12">
                                <input id="phone" name="phone" type="number" placeholder="{{ trans('admin.phone')}}" class="form-control btn-square" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-12 control-label {{Session::get("lang") =="ar" ? 'text-lg-right' : 'text-lg-left'}}" for="passwordinput">{{ trans('admin.password')}}</label>
                            <div class="col-lg-12">
                                <input id="password" name="password" type="password" placeholder="{{ trans('admin.password')}}" class="form-control btn-square" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-12 control-label {{Session::get("lang") =="ar" ? 'text-lg-right' : 'text-lg-left'}}" for="textinput">{{ trans('admin.uploadImage')}}</label>
                            <div class="col-lg-12">
                                <input id="inputImage" type="file" name="image" accept=".jpg,.jpeg,.png,.gif,.bmp,.tiff" required>
                            </div>
                        </div>

                        <label class="col-lg-12 control-label {{Session::get("lang") =="ar" ? 'text-lg-right' : 'text-lg-left'}}" for="textinput">{{ trans('admin.permission')}}</label>
                        @foreach($data as $key => $permission)
                            <h4 style="color: #1d75b3">{{$key}}</h4>
                            <div class="row">
                                <div class="col-lg-12">
                                    @foreach($permission as $single_permission)
                                        <label class="control-label" style="padding: 4px" for="check{{$single_permission->id}}">{{$single_permission->name}}</label>
                                        <input type="checkbox" id="check{{$single_permission->id}}" name="check_list[]" value="{{ $single_permission->name }}">
                                    @endforeach
                                </div>
                            </div>
                        @endforeach


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
