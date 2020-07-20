@extends('web.index')


@section("styleForm")
    {{--in register--}}
    @if(Session::get("lang") == 'en')
        <link rel="stylesheet" type="text/css" href="{{asset('jaz/css/style-form.css')}}">
    @else
        <link rel="stylesheet" type="text/css" href="{{asset('jaz/css/style-form-rtl.css')}}">
    @endif
@endsection


@section('content')

    <!-- CONTENT START -->
    <div class="page-content login-form">

        <!-- Section content -->
        <div class="wt-contact-wrap row equal-wraper">

            <!-- MAP BLOCK START -->

            <!-- MAP BLOCK END -->

            <!-- RIGHT PART START -->
            <div class="section-full p-t80 p-b50">

                <!-- CONTACT DETAIL -->


                <!-- CONTACT FORM -->

                <div class="m-a30 wt-box border-2">

                    <form class=" wow zoomIn" method="post" enctype="multipart/form-data" action="{{url('/update-profile')}}">
                        {{csrf_field()}}

                        <div class="wrapper fadeInDown">
                            <h4 class="text-uppercase login-text">{{__('web.editProfile')}}  </h4>
                            <div id="formContent">
                                <!-- Tabs Titles -->

                                <!-- Icon -->
                                <div class="fadeIn first">


                                    <div class="avatar-upload">
                                        <div class="avatar-edit">
                                            <input type='file' name="u_image" id="imageUpload" accept=".png, .jpg, .jpeg" />
                                            <label for="imageUpload"></label>
                                        </div>
                                        <div class="avatar-preview">
                                            <!--asset('jaz/images/man.png')-->
                                            <div id="imagePreview" style="background-image: url({{asset(Session::get("u_image"))}})">
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <!-- Login Form -->
                                {{--<form>--}}
                                    <input type="hidden" id="login1" class="fadeIn second" name="u_id" value="{{Session::get('u_id')}}" placeholder="">
                                    <input type="text" id="login2" class="fadeIn second" name="u_name" value="{{Session::get('u_name')}}" placeholder="{{__('web.name')}}">
                                    <input type="text" id="password2" class="fadeIn third" name="u_email" value="{{Session::get('u_email')}}"  placeholder="{{__('web.email')}}">
                                    <input type="password" id="password4" class="fadeIn third" name="u_password" value=""  placeholder="{{__('web.password')}}">
                                    <input type="text" id="password5" class="fadeIn third" name="u_phone" value="{{Session::get('u_phone')}}"  placeholder="{{__('web.phone')}}">

                                    {{--maps--}}
                                    <div class="col-md-6 mb-3" style="display: none">
                                        <label for="validationCustom04">Latitude</label>
                                        <input class="form-control" {{ old('lat') }} name="lat" id="lat"
                                               id="validationCustom04" type="text"
                                               placeholder="Enter lat"
                                               required="" value="{{Session::get("lat")}}">
                                        <div class="invalid-feedback">{{ $errors->first('lat') }}.</div>
                                    </div>
                                    <div class="col-md-6 mb-3" style="display: none">
                                        <label for="validationCustom04">Longitude</label>
                                        <input class="form-control" {{ old('lng') }} name="lng" id="lng"
                                               id="validationCustom04" type="text"
                                               placeholder="Enter lng"
                                               required="" value="{{Session::get("lng")}}">
                                        <div class="invalid-feedback">{{ $errors->first('lng') }}.</div>
                                    </div>
                                    {{--end maps--}}


                                    <input  type="button" class="fadeIn fourth ref2 map-btn"  value="{{__('web.editLocation')}} " data-toggle="modal" data-target="#exampleModalCenter">
                                    <input type="submit" class="fadeIn fourth" value="{{__('web.edit')}}">
                                {{--</form>--}}

                            </div>
                        </div>


                    </form>

                </div>

            </div>
            <!-- RIGHT PART END -->

        </div>
        <!-- Section content END -->

    </div>
    <!-- CONTENT END -->


    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title rtl" id="exampleModalLongTitle">{{__('web.companyLocation')}}  </h5>

                </div>
                <div class="modal-body">
                    <div   id="oneordermap"></div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('web.close')}}</button>

                </div>
            </div>
        </div>
    </div>
@endsection


@section('mapLocation')


    <!--++++++++++++++++++++++++++++++++++-->
    <script>
        var marker = null;
        function initMap() {
            var map = new google.maps.Map(document.getElementById('oneordermap'), {
                zoom: 7,
                center: {lat: 16.931487392912537, lng: 42.5562098622322 }
            });
            var MaekerPos = new google.maps.LatLng(16.931487392912537 , 42.5562098622322);
            marker = new google.maps.Marker({
                position: MaekerPos,
                map: map
            });
        }
    </script>
    {{--<script async  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDPN_XufKy-QTSCB68xFJlqtUjHQ8m6uUY&libraries=places&callback=initMap">
    </script>--}}
    {{--<script>
        $(document).ready(function(){
            $('.count').prop('disabled', true);
            $(document).on('click','.plus',function(){
                $('.count').val(parseInt($('.count').val()) + 1 );
            });
            $(document).on('click','.minus',function(){
                $('.count').val(parseInt($('.count').val()) - 1 );
                if ($('.count').val() == 0) {
                    $('.count').val(1);
                }
            });
        });
    </script>--}}


    {{--map--}}
    <script>
        $('#myModal').on('shown.bs.modal', function() {
            $('#myInput').trigger('focus')
        })
    </script>

    <script>
        var marker = null;

        function initMap() {
            var map = new google.maps.Map(document.getElementById('oneordermap'), {
                zoom: 7,
                center: {
                    lat: 16.931487392912537,
                    lng: 42.5562098622322
                }
            });
            var MaekerPos = new google.maps.LatLng(16.931487392912537, 42.5562098622322);
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

    @yield("mapLocation")
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


@endsection
