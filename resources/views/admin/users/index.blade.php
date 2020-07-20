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
                            <h3>{{ trans('admin.users')}} {{$type}}</h3>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item">{{ trans('admin.users')}}</li>
                                <li class="breadcrumb-item active">{{$type}}</li>
                            </ol>
                        </div>
                        @if(admin()->hasPermissionTo('Add user'))
                            <div style="float:{{Session::get("lang") == "ar" ? 'left' : 'right'}}">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="icon-plus"></i> {{trans('admin.addUser')}} </button>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="card-body">
                    <form class="form-horizontal col-md-8" action="{{asset(Session::get('lang') .'/admin/user/search')}}" method="get">
                        <div class="form-row">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" value="{{isset($search) ? $search : ''}}" placeholder="{{ trans('admin.searchByUserName')}}" />
                                <button class="btn btn-primary">{{ trans('admin.searchNow')}}</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <!-- Container-fluid starts-->
        @include('admin.layouts.message')
        <div class="container-fluid">
            <div class="row">
                @foreach($users as $user)
                    <div class="col-md-6 col-lg-6 col-xl-4">
                        <div class="card custom-card">
                            <div class="card-header"><img class="img-fluid" src="{{asset('/admin/assets/images/user-card/9.jpg')}}" alt=""></div>
                            <div class="card-profile"><img class="rounded-circle" src="{{$user->image}}" alt=""></div>

                            <div class="text-center profile-details">
                                <h4>{{$user->name}}</h4>
                                <h6>{{$user->role}}</h6>
                            </div>
                            <div class="col-md-12 col-lg-12 col-xl-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="ttl-info justify-center ">
                                            <h6><i class="fa fa-phone"></i>&nbsp;&nbsp;&nbsp;{{ trans('admin.phone')}}</h6><span>{{$user->phone}}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="ttl-info justify-center">
                                            <h6><i class="fa fa-envelope"></i>&nbsp;&nbsp;&nbsp;{{ trans('admin.email')}}</h6><span>{{$user->email}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br/>
                            <div class="col-md-12 col-lg-12 col-xl-12  ">
                                <div class="row">
                                    <a class="btn btn-warning btn-lg justify-center" href="{{route('users.show',$user->id)}}" data-original-title="" title=""><span class="fa fa-info"></span> {{ __('admin.getMoreInformation')}}</a>
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
                    <h5 class="modal-title" id="exampleModalLabel">{{ trans('admin.addUser')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form-horizontal" method="post" action="{{route('users.store')}}">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <select class="form-control field" data-type="select" id="type" name="role">
                            <option value="user">{{ trans('admin.user')}}</option>
                            <option value="company">{{ trans('admin.company')}}</option>
                        </select><br>

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
                            <label class="col-lg-12 control-label {{Session::get("lang") =="ar" ? 'text-lg-right' : 'text-lg-left'}}" for="textinput">{{ __('admin.dashboard.')}}{{ trans('admin.uploadImage')}}</label>
                            <div class="col-lg-12">
                                <input id="inputImage" type="file" name="file" accept=".jpg,.jpeg,.png,.gif,.bmp,.tiff">
                            </div>
                        </div>

                        <div class="form-group row" id="commercial_register">
                            <label class="col-lg-12 control-label {{Session::get("lang") =="ar" ? 'text-lg-right' : 'text-lg-left'}}" for="textinput">Commercial register</label>
                            <div class="col-lg-12">
                                <input type="file" name="commercial_register" accept=".jpg,.jpeg,.png,.gif,.bmp,.tiff">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-12 control-label {{Session::get("lang") =="ar" ? 'text-lg-right' : 'text-lg-left'}}" for="textinput">{{ trans('admin.location')}}</label>
                            <div class="col-lg-12">
                                <span class="input-group-addon"><span class="fa fa-map-marker"></span></span>
                                <div id="maps" style="width: 100%; height: 400px;"></div>
                                <!--<input type="hidden" id="lat" name="lat" />-->
                                <!--<input type="hidden" id="lng" name="lng" />-->
                            </div>
                        </div>

                        {{--maps--}}
                        <div class="col-md-6 mb-3" style="display: none">
                            <label for="validationCustom04">Latitude</label>
                            <input class="form-control" {{ old('lat') }} name="lat" id="lat"
                                   id="validationCustom04" type="text"
                                   placeholder="Enter lat"
                                   required="">
                            <div class="invalid-feedback">{{ $errors->first('lat') }}.</div>
                        </div>
                        <div class="col-md-6 mb-3" style="display: none">
                            <label for="validationCustom04">Longitude</label>
                            <input class="form-control" {{ old('lng') }} name="lng" id="lng"
                                   id="validationCustom04" type="text"
                                   placeholder="Enter lng"
                                   required="">
                            <div class="invalid-feedback">{{ $errors->first('lng') }}.</div>
                        </div>
                        {{--end maps--}}

                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-dark" data-dismiss="modal">{{ trans('admin.close')}}</button>
                        <input type='submit' class="btn btn-primary" value='{{ trans('admin.saveChanges')}}'>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>-->

    <script>
        /*$(function() {
            $('#commercial_register').hide();
            $('#type').change(function(){
                if($('#type').val() == 'company') {
                    $('#commercial_register').show();
                } else {
                    $('#commercial_register').hide();
                }
            });
        });
*/
        /*var map = new google.maps.Map(document.getElementById('maps'),{
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
        })*/

    </script>
@endsection

@section('map')
    <script>
        var latt;
        var lngg;
        var marker = null;

        function initMap(latt,lngg) {
            var map = new google.maps.Map(document.getElementById('maps'), {
                zoom: 7,
                center: {
                    lat: latt,
                    lng: lngg
                }
            });
            var MaekerPos = new google.maps.LatLng(parseFloat(latt), parseFloat(lngg));
            marker = new google.maps.Marker({
                position: MaekerPos,
                map: map,
                draggable: true
            });
            google.maps.event.addListener(marker, 'position_changed', function () {
                var lat = marker.getPosition().lat();
                var lng = marker.getPosition().lng();
                $('#lat').val(lat);
                $('#lng').val(lng);
            });
        }
        /*map.setOptions({draggable: true});*/
    </script>


    <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDPN_XufKy-QTSCB68xFJlqtUjHQ8m6uUY&libraries=places&callback=initMap">
    </script>
    <script>
        $(document).ready(function() {
            $('.count').prop('disabled', true);
            $(document).on('click', '.plus', function() {
                $('.count').val(parseInt($('.count').val()) + 1);
            });
            $(document).on('click', '.minus', function() {
                $('.count').val(parseInt($('.count').val()) - 1);
                if ($('.count').val() == 0) {
                    $('.count').val(1);
                }
            });
        });
    </script>



    {{--map--}}

    <script>
        //var x = document.getElementById("demo");
        $(document).ready(function() {
            console.log( "ready!" );
            getLocation();
            //showPosition();
        });
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } /*else {
                x.innerHTML = "Geolocation is not supported by this browser.";
            }*/
        }

        function showPosition(position) {
            /*x.innerHTML = "Latitude: " + position.coords.latitude +
                "<br>Longitude: " + position.coords.longitude;*/
            console.log(position.coords.latitude);
            console.log(position.coords.longitude);
            $('#lat').val(position.coords.latitude);
            $('#lng').val(position.coords.longitude);
            latt = parseFloat(position.coords.latitude);
            lngg = parseFloat(position.coords.longitude);
            initMap(latt,lngg);
        }


    </script>
@endsection
