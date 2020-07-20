@extends("web.index")
@section("styleForm")
    {{--in register--}}
    @if(Session::get("lang") == 'en')
        <link rel="stylesheet" type="text/css" href="{{asset('jaz/css/style-form.css')}}">
    @else
        <link rel="stylesheet" type="text/css" href="{{asset('jaz/css/style-form-rtl.css')}}">
    @endif
@endsection

@section("content")

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



                        <div class="wrapper fadeInDown">

                            <div id="formContent">
                                <!-- Tabs Titles -->

                                <form class=" wow zoomIn" method="post" enctype="multipart/form-data" action="{{url('/register/newuser')}}">
                                {{csrf_field()}}

                                <!-- Icon -->
                                <div class="fadeIn first">
                                    <h4 class="text-uppercase login-text login-text2">{{__('web.registerNew')}} </h4>

                                    <div class="avatar-upload">
                                        <div class="avatar-edit">
                                            <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                                            <label for="imageUpload"></label>
                                        </div>
                                        <div class="avatar-preview">
                                            <div id="imagePreview" style="background-image: url({{asset('jaz/images/man.png')}});">
                                            </div>
                                        </div>

                                    </div>
                                </div>


                                {{--<form>--}}

                                    <select name="role" id="myselection" required dir="{{Session::get('lang') == 'en'? 'ltr' : 'rtl'}}">
                                        <option disabled selected>{{__('web.chooseRole')}} </option>
                                        <option value="user" selected>{{__('web.user')}}</option>
                                        <option value="company">{{__('web.company')}}</option>
                                    </select>

                                    <input type="text" required id="login" class="fadeIn third" name="name" placeholder="{{__('web.userName')}}">
                                    <input type="text" required id="password1" class="fadeIn third" name="email" placeholder="{{__('web.email')}}">
                                    <input type="text" required id="password3" class="fadeIn third" name="phone" placeholder="{{__('web.phoneNo')}}">
                                    <input type="password" required id="password2" class="fadeIn third" name="password" placeholder="{{__('web.password')}}">
                                    <input type="text" name="address" class="form-control m-b30" placeholder="{{__('web.address')}} ">

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

                                    <input  type="button" class="fadeIn fourth ref2 map-btn"  value="{{__('web.detectLocation')}}" data-toggle="modal" data-target="#exampleModalCenter">
                                    <br>
                                    <input type="submit" class="fadeIn fourth" value="{{__('web.register')}}">
                                {{--</form>--}}

                                </form>

                                <div id="formFooter">
                                    <a class="underlineHover" target="_blank" href="https://play.google.com/store/apps/details?id=grand.jazzworker&hl=en">{{__('web.registerCo')}}</a>
                                </div>
                            </div>
                        </div>




                </div>

            </div>
            <!-- RIGHT PART END -->

        </div>
        <!-- Section content END -->

    </div>
    <!-- CONTENT END -->


    {{--modal map--}}
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title rtl" id="exampleModalLongTitle">{{__('web.detectLocation')}}</h5>

                </div>
                <div class="modal-body">
                    <div id="oneordermap"></div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('web.close')}}</button>

                </div>
            </div>
        </div>
    </div>
    {{--<p id="demo"></p>--}}




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
        var latt;
        var lngg;
        var marker = null;

        function initMap(latt,lngg) {
            var map = new google.maps.Map(document.getElementById('oneordermap'), {
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
