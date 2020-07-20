@extends('admin.layouts.app')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <div class="{{Session::get("lang") =="ar" ? 'page-header-right' : 'page-header-left'}}">
                            <h3>{{trans("admin.editWorker")}}</h3>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item">{{trans("admin.users")}}</li>
                                <li class="breadcrumb-item active">{{trans("admin.editWorker")}}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="edit-profile">
                <div class="row">
                    <div class="col-md-12">
                        @include('admin.layouts.message')
                        <form class="form-horizontal" method="post" action="{{route('updateWorker')}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">{{trans("admin.categories")}}</label>
                                        <div class="col-md-6 col-xs-12">
                                            @foreach($worker->get_category_list($worker->cat_id) as $cat)
                                                <div class="input-group">
                                                    <p class="form-control">{{$worker->get_category_parent($cat->en_name)}} - {{$cat->en_name}}</p>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="form-group {{ $errors->has('parent_id') ? ' has-error' : '' }}">
                                            <label class="col-md-3 col-xs-12 control-label">{{trans("admin.selectMainCategory")}}</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="input-group">
                                                    <select class="form-control select" id="category">
                                                        <option disabled selected >{{trans("admin.selectMainCategory")}}</option>
                                                        @foreach($cats as $cat)
                                                            <option value="{{$cat->id}}" >{{$cat->en_name}} - {{$cat->ar_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @if(isset($worker))
                                                    <span class="label label-warning">Leave it there if no changes</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group {{ $errors->has('cat_ids') ? ' has-error' : '' }}">
                                            <label class="col-md-3 col-xs-12 control-label">{{trans('admin.subCategory')}}</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="input-group">
                                                    <select class="form-control" id="sub_cats" name="cat_id[]" multiple style="height: 150px;">
                                                        <option disabled selected>{{trans('admin.selectCategory')}}</option>
                                                        <option value=""></option>
                                                    </select>
                                                </div>
                                                @if(isset($worker))
                                                    <span class="label label-warning">Leave it there if no changes</span>
                                                @endif
                                                @include('admin.layouts.error', ['input' => 'cat_ids'])
                                            </div>
                                        </div>

                                        <div class="form-group {{ $errors->has('en_name') ? ' has-error' : '' }}">
                                            <label class="col-md-3 col-xs-12 control-label">{{trans('admin.name')}}</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="name" value="{{$worker->name}}" required/>
                                                </div>
                                                @include('admin.layouts.error', ['input' => 'name'])
                                            </div>
                                        </div>

                                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label class="col-md-3 col-xs-12 control-label">{{trans('admin.email')}}</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="email"  value="{{$worker->email}}" required/>
                                                </div>
                                                @include('admin.layouts.error', ['input' => 'email'])
                                            </div>
                                        </div>

                                        <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                                            <label class="col-md-3 col-xs-12 control-label">{{trans('admin.phone')}}</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="phone" value="{{$worker->phone}}" required/>
                                                </div>
                                                @include('admin.layouts.error', ['input' => 'phone'])
                                            </div>
                                        </div>

                                        <div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
                                            <label class="col-md-3 col-xs-12 control-label">{{trans('admin.image')}}</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="input-group">
                                                    <input type="file" name="image"  title="Select Image"/>
                                                </div>
                                                @if(isset($worker))
                                                    <span class="label label-warning">Leave it there if no changes</span>
                                                @endif
                                                @include('admin.layouts.error', ['input' => 'image'])
                                            </div>
                                        </div>

                                        <div class="form-group {{ $errors->has('id_image') ? ' has-error' : '' }}">
                                            <label class="col-md-3 col-xs-12 control-label">Id {{trans('admin.image')}}</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="input-group">
                                                    <input type="file" name="id_image"  title="Select Id image"/>
                                                </div>
                                                @if(isset($worker))
                                                    <span class="label label-warning">Leave it there if no changes</span>
                                                @endif
                                                @include('admin.layouts.error', ['input' => 'id_image'])
                                            </div>
                                        </div>

                                        <input type="hidden" id="worker_id" name="worker_id" value="{{$worker->id}}">

                                    </div>

                                    <div class="panel-footer">
                                        <button class="btn btn-primary {{Session::get("lang") =="ar" ? 'pull-left' : 'pull-right'}}"> {{trans('admin.update')}} </button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>

    <script>
        window.onload = function(){
            $('#category').on('change', function (e) {
                var parent_id = e.target.value;
                var worker_id = $('#worker_id').val();

                if (parent_id) {
                    $.ajax({
                        url:"{{url('en/admin/get_sub_cats/')}}?parent_id="+parent_id+"&worker_id="+worker_id,
                        type: "GET",
                        dataType: "json",

                        success: function (data) {
                            /*console.log(data);*/
                            $('#sub_cats').empty();
                            $.each(data, function (i, sub_cat) {
                                $('#sub_cats').append('<option value="' + sub_cat.id + '">'+ sub_cat.id + sub_cat.en_name + ' - ' + sub_cat.ar_name + '</option>');
                            });
                        }
                    });
                }
            });

        }
    </script>

@endsection
