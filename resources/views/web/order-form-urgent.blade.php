@extends("web.index")
@section("content")

    <!-- CONTENT START -->
    <div class="page-content">

        <!-- INNER PAGE BANNER -->
        <div class="wt-bnr-inr overlay-wraper" style="background-image:url({{asset('/jaz/images/banner/about-banner.jpg')}})">
            <div class="overlay-main bg-black opacity-05"></div>
            <div class="container">
                <div class="wt-bnr-inr-entry">
                    <h1 class="text-white">{{__('web.createOrder')}}</h1>
                </div>
            </div>
        </div>
        <!-- INNER PAGE BANNER END -->


        <!-- BREADCRUMB  ROW END -->

        <!-- SECTION CONTENT START -->
        <div class="section-full p-t80 p-b50">

            <!-- PRODUCT DETAILS -->
            <div class="container woo-entry">


                <!-- SECTION CONTENT START -->
                <div class="section-content">

                    <!-- FROM STYEL 1 -->
                    <div class="col-md-12 m-b30">
                        <div class="section-head">
                            <h2 class="text-uppercase rtl">{{__('web.orderForm')}}</h2>
                            <div class="wt-separator-outer rtl">
                                <div class="wt-separator style-square">
                                    <span class="separator-left bg-primary"></span>
                                    <span class="separator-right bg-primary"></span>
                                </div>
                            </div>
                        </div>

                        <div class="wt-box">
                            <form role="form" id="" method="post"  action="{{URL::to('/make-order')}}" >
                                @csrf

                                <div class="row">
                                    <div class="col-md-12 col-sm-12">

                                        <input type="file" name="image" multiple class="wow bounceInDown" data-wow-duration="2s">
                                        <script>
                                            // Get a reference to the file input element
                                            const inputElement = document.querySelector('input[type="file"]');

                                            // Create the FilePond instance
                                            const pond = FilePond.create(inputElement);
                                        </script>



                                    </div>



                                </div>


                                {{--<div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group wow bounceInLeft rtl" data-wow-duration="2s">
                                            <label>Country</label>
                                            <select class="form-control selectpicker">
                                                <option>Usa</option>
                                                <option>China</option>
                                                <option>india</option>
                                                <option>australia</option>
                                                <option>japan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group wow bounceInRight rtl" data-wow-duration="2s">
                                            <label>State / City</label>
                                            <select class="form-control selectpicker">
                                                <option>Los Angeles</option>
                                                <option>Chicago</option>
                                                <option>Phoenix</option>
                                                <option>San Diego</option>
                                                <option>Dallas</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>--}}

                                <div class="row">
                                    {{--<div class="col-md-6 col-sm-6">
                                        <div class="form-group wow bounceInLeft rtl" data-wow-duration="2s">
                                            <label>Town</label>
                                            <select class="form-control selectpicker">
                                                <option>Columbia</option>
                                                <option>Berkeley</option>
                                                <option>The Woodlands</option>
                                                <option>Plano</option>
                                                <option>Boulder</option>
                                            </select>
                                        </div>
                                    </div>--}}


                                    <div class="col-md-11 col-sm-11">
                                        <div class="form-group wow bounceInRight rtl" data-wow-duration="2s">
                                            <label>{{__('web.address')}} </label>
                                            <br>
                                            <input type="text" name="address" class="form-control m-b30" placeholder="{{__('web.address')}}  ">

                                        </div>

                                    </div>

                                    <div class="col-md-1 col-sm-1">
                                        {{--<div class="form-group wow bounceInRight rtl" data-wow-duration="2s">
                                            <img src="{{asset("jaz/images/map.png")}}"  class="fadeIn fourth ref2 map-btn map-detect" value="Detect your location " data-toggle="modal" data-target="#exampleModalCenter">
                                        </div>--}}

                                        <div class="form-group wow bounceInRight" data-wow-duration="2s">
                                            <img src="{{asset('jaz/images/map.png')}}" class="fadeIn fourth map-btn map-detect" value="Detect your location " data-toggle="modal" data-target="#exampleModalCenter">

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



                                    {{--<div class="col-md-12 col-sm-12">
                                        <div class="form-group wow bounceInUp rtl" data-wow-duration="2s">
                                            <label>Payment Method</label>
                                            <select class="form-control selectpicker">
                                                <option>Cash on Delivery</option>
                                                <option>Online Payment</option>

                                            </select>
                                        </div>
                                    </div>--}}

                                    <div class="col-md-12 col-sm-12 wow bounceInUp rtl" data-wow-duration="2s">
                                        <label>{{__('web.description')}}</label>
                                        <textarea rows="8" name="description" class="textarea1"></textarea>
                                    </div>

                                </div>



                                {{--<div class="form-group form-inline">
                                    <div class="radio">
                                        <input id="checkmeout1" name="Public" value="checkmeout" type="checkbox">
                                        <label for="checkmeout1">Ship to the same address</label>
                                    </div>
                                </div>--}}

                                <button type="submit" value="submit" class="site-button">{{__('web.saveDeliver')}}</button>

                            </form>
                        </div>
                    </div>

                    <!-- FROM STYEL 1 WITH ICON -->


                </div>
                <!-- SECTION CONTENT END -->

            </div>
            <!-- PRODUCT DETAILS -->

        </div>
        <!-- CONTENT CONTENT END -->
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('web.confirm')}}</button>

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
