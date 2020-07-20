@extends('admin.layouts.app')
@section('content')
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDhnmMC23noePz6DA8iEvO9_yNDGGlEaeM&callback=initMap">
    </script>
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <div class="{{Session::get("lang") =="ar" ? 'page-header-right' : 'page-header-left'}}">
                            <h3>{{trans("admin.workers")}} </h3>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item">{{trans('admin.worker')}}</li>
                                @if(Request::is('admin/workers_company'))
                                <li class="breadcrumb-item active">{{trans('admin.companyWorkers')}}</li>
                                @else
                                    <li class="breadcrumb-item active">{{--{{$type}}--}}</li>
                                @endif
                            </ol>
                        </div>
                        @if(Request::is('admin/workers_company'))
                        <div style="float: {{Session::get("lang") =="ar" ? 'left' : 'right'}}">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="icon-plus"></i> {{trans('admin.addWorker')}} </button>
                        </div>
                        @endif
                    </div>
                </div>


                <div class="card-body">
                    <form class="form-horizontal col-md-8" action="{{asset(Session::get('lang').'/admin/worker/search')}}" method="get">
                        <div class="form-row">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" value="{{isset($search) ? $search : ''}}" placeholder="{{trans("admin.searchByWorkerName")}}" />
                                <button class="btn btn-primary">{{trans('admin.searchNow')}}</button>
                            </div>
                        </div>
                    </form>
                </div>

                <a href="{{asset(Session::get("lang").'/admin/worker/admin_contract_pdf')}}" class="btn btn-primary">{{trans('admin.uploadContract')}}</a>
            </div>
        </div>
        <!-- Container-fluid starts-->
        @include('admin.layouts.message')
        <div class="container-fluid">
            <div class="row">
                @foreach($workers as $worker)
                    <div class="col-md-6 col-lg-6 col-xl-4">
                        <div class="card custom-card">
                            <div class="card-header"><img class="img-fluid" src="{{asset('/admin/assets/images/user-card/8.jpg')}}" alt=""></div>
                            <div class="card-profile"><img class="rounded-circle" src="{{$worker->image}}" alt=""></div>

                            <div class="text-center profile-details">
                                <h4>{{$worker->name}}</h4>
                                <h6>{{$worker->role}}</h6>
                            </div>
                            <div class="col-md-12 col-lg-12 col-xl-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="ttl-info justify-center ">
                                            <h6><i class="fa fa-phone"></i>&nbsp;&nbsp;&nbsp;{{trans('admin.phone')}}</h6><span>{{$worker->phone}}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="ttl-info justify-center">
                                            <h6><i class="fa fa-envelope"></i>&nbsp;&nbsp;&nbsp;{{trans('admin.email')}}</h6><span>{{substr($worker->email, 0, 15)}}....</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br/>
                            <div class="col-md-12 col-lg-12 col-xl-12  ">
                                <div class="row">
                                    <a class="btn btn-warning btn-lg justify-center" href="{{route('workers_company.show',$worker->id)}}" data-original-title="" title=""><span class="fa fa-info"></span> {{trans('admin.getMoreInformation')}}</a>
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
                @if(admin()->hasPermissionTo('View company worker'))
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{trans('admin.addWorker')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <form class="form-horizontal" method="post" action="{{route('workers_company.store')}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="modal-body">

                        <div class="form-group row">
                            <label class="col-lg-12 control-label {{Session::get("lang") =="ar" ? 'text-lg-right' : 'text-lg-left'}}" for="textinput">{{trans('admin.name')}}</label>
                            <div class="col-lg-12">
                                <input id="name" name="name" type="text" placeholder="{{trans('admin.name')}}" class="form-control btn-square" required>
                            </div>
                        </div>
                            @include('admin.layouts.error', ['input' => 'name'])

                        <div class="form-group row">
                            <label class="col-lg-12 control-label text-lg-left" for="textinput">{{trans('admin.email')}}</label>
                            <div class="col-lg-12">
                                <input id="email" name="email" type="email" placeholder="{{trans('admin.email')}}" class="form-control btn-square" required>
                            </div>
                        </div>
                            @include('admin.layouts.error', ['input' => 'email'])

                        <div class="form-group row">
                            <label class="col-lg-12 control-label {{Session::get("lang") =="ar" ? 'text-lg-right' : 'text-lg-left'}}" for="textinput">{{trans('admin.phone')}}</label>
                            <div class="col-lg-12">
                                <input id="phone" name="phone" type="number" placeholder="{{trans('admin.phone')}}" class="form-control btn-square" required>
                            </div>
                        </div>
                            @include('admin.layouts.error', ['input' => 'phone'])

                        <div class="form-group row">
                            <label class="col-lg-12 control-label {{Session::get("lang") =="ar" ? 'text-lg-right' : 'text-lg-left'}}" for="passwordinput">{{trans('admin.password')}}</label>
                            <div class="col-lg-12">
                                <input id="password" name="password" type="password" placeholder="{{trans('admin.password')}}" class="form-control btn-square" required>
                            </div>
                        </div>
                            @include('admin.layouts.error', ['input' => 'password'])

                        <div class="form-group row">
                            <label class="col-lg-12 control-label {{Session::get("lang") =="ar" ? 'text-lg-right' : 'text-lg-left'}}">{{trans('admin.category')}}</label>
                            <div class="col-lg-12">
                                <select class="form-control field" data-type="select" id="main_cats" required>
                                    <option selected disabled>{{trans('admin.selectCategory')}}</option>
                                    @if(isset($categories))
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->en_name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-12 control-label {{Session::get("lang") =="ar" ? 'text-lg-right' : 'text-lg-left'}}" >Sub Category</label>
                            <div class="col-lg-12">
                                <select class="form-control field" name="cat_id[]" id="sub_cats" multiple style="height: 100px" select2>
                                    <option selected disabled>{{trans('admin.selectCategory')}}</option>
                                </select>
                            </div>
                        </div>
                            @include('admin.layouts.error', ['input' => 'cat_id'])

                        <div class="form-group row">
                            <label class="col-lg-12 control-label text-lg-left" >{{trans('admin.city')}}</label>
                            <div class="col-lg-12">
                                <select class="form-control field" data-type="select" name="city_id" id="cities" required>
                                    @if(isset($cities))
                                        @foreach($cities as $city)
                                            <option value="{{$city->id}}">{{$city->en_name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                            @include('admin.layouts.error', ['input' => 'city_id'])

                        <div class="form-group row">
                            <label class="col-lg-12 control-label {{Session::get("lang") =="ar" ? 'text-lg-right' : 'text-lg-left'}}" for="textinput">{{trans('admin.uploadImage')}}</label>
                            <div class="col-lg-12">
                                <input id="inputImage" type="file" name="image" accept=".jpg,.jpeg,.png,.gif,.bmp,.tiff">
                            </div>
                        </div>
                            @include('admin.layouts.error', ['input' => 'image'])

                        <div class="form-group row" id="commercial_register">
                            <label class="col-lg-12 control-label {{Session::get("lang") =="ar" ? 'text-lg-right' : 'text-lg-left'}}" for="textinput">Id {{trans("admin.image")}}</label>
                            <div class="col-lg-12">
                                <input type="file" name="id_image" accept=".jpg,.jpeg,.png,.gif,.bmp,.tiff">
                            </div>
                        </div>
                            @include('admin.layouts.error', ['input' => 'id_image'])

                        <div class="form-group row" id="description">
                            <label class="col-lg-12 control-label {{Session::get("lang") =="ar" ? 'text-lg-right' : 'text-lg-left'}}" for="textinput">{{trans("admin.description")}}</label>
                            <div class="col-lg-12">
                                <textarea class="form-control z-depth-1" id="exampleFormControlTextarea6" name="description" rows="3" placeholder="{{trans("admin.description")}}" required></textarea>
                            </div>
                        </div>
                            @include('admin.layouts.error', ['input' => 'description'])

                        <div class="form-group row">
                            <label class="col-lg-12 control-label {{Session::get("lang") =="ar" ? 'text-lg-right' : 'text-lg-left'}}" for="textinput">{{trans("admin.location")}}</label>
                            <div class="col-lg-12">
                                <span class="input-group-addon"><span class="fa fa-map-marker"></span></span>
                                <div id="maps" style="width: 100%; height: 400px;"></div>
                                <input type="hidden" id="lat" name="lat" value="" required/>
                                <input type="hidden" id="lng" name="lng" value="" required/>
                            </div>
                        </div>
                            @include('admin.layouts.error', ['input' => 'lat'])
                            @include('admin.layouts.error', ['input' => 'lng'])

                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-dark" data-dismiss="modal">{{trans("admin.close")}}</button>
                        <button class="btn btn-primary">{{trans("admin.saveChanges")}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

    <script>

        $('#main_cats').on('change', function (e) {
            var parent_id = e.target.value;
            if (parent_id) {
                $.ajax({
                    url: '/admin/get_sub_cats/'+parent_id,
                    type: "GET",

                    dataType: "json",

                    success: function (data) {
                        $('#sub_cats').empty();
                        $.each(data, function (i, sub_cat) {
                            $('#sub_cats').append('<option value="' + sub_cat.id + '">' + sub_cat.en_name + '</option>');
                        });
                    }
                });
            }
        });

        var map = new google.maps.Map(document.getElementById('maps'),{
            center:{
                lat: 30.03372600393917,
                lng: 31.23868690490724
            },
            zoom:15
        });
        var marker = new google.maps.Marker({
            position:{
                lat: 30.03372600393917,
                lng: 31.23868690490724
            },
            map: map,
            draggable: true
        })

        google.maps.event.addListener(marker, 'position_changed', function(){
            var lat = marker.getPosition().lat();
            var lng = marker.getPosition().lng();

            $('#lat').val(lat);
            $('#lng').val(lng);
        })

    </script>
@endsection
