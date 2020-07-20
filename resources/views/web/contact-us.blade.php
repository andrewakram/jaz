@extends('web.index')
@section('content')

    <!-- CONTENT START -->
    <div class="page-content">


        <!-- SECTION CONTENT -->
        <div class="section-full p-t80 p-b50">
            <div class="container-fluid">
                <div class="wt-box col-md-6 wow bounceInLeft" data-wow-duration="2s">
                    <h4 class="text-uppercase rtl">{{__('web.contactDetail')}} </h4>
                    <div class="wt-separator-outer m-b30 rtl">
                        <div class="wt-separator style-square">
                            <span class="separator-left bg-primary"></span>
                            <span class="separator-right bg-primary"></span>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-6 col-sm-6 m-b30">
                            <div class="wt-icon-box-wraper bx-style-1 p-a15 left clearfix">
                                <div class="wt-icon-box-sm bg-primary">
                                        <span class="icon-cell text-white">
                                            <i class="fa fa-phone"></i>
                                        </span>
                                </div>
                                <div class="icon-content text-right2">
                                    <h5 class="wt-tilte text-uppercase">{{__('web.phone')}}</h5>
                                    <p>+966 500 599 167</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-6 m-b30">
                            <div class="wt-icon-box-wraper bx-style-1 p-a15 left clearfix">
                                <div class="wt-icon-box-sm bg-primary">
                                        <span class="icon-cell text-white">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                </div>
                                <div class="icon-content text-right2">
                                    <h5 class="wt-tilte text-uppercase">{{__('web.email')}}</h5>
                                    <p>Info@jaz.com.sa</p>
                                </div>
                            </div>
                        </div>

                        {{--<div class="col-md-6 col-sm-6 m-b30">
                            <div class="wt-icon-box-wraper bx-style-1 p-a15 left clearfix">
                                <div class="wt-icon-box-sm bg-primary">
                                        <span class="icon-cell text-white">
                                            <i class="fa fa-fax"></i>
                                        </span>
                                </div>
                                <div class="icon-content text-right2">
                                    <h5 class="wt-tilte text-uppercase">Fax</h5>
                                    <p>+91 564 548 4854</p>
                                </div>
                            </div>
                        </div>--}}

                        <div class="col-md-6 col-sm-6 m-b30">
                            <div class="wt-icon-box-wraper bx-style-1 p-a15 left clearfix">
                                <div class="wt-icon-box-sm bg-primary">
                                        <span class="icon-cell text-white">
                                            <i class="fa fa-map-marker"></i>
                                        </span>
                                </div>
                                <div class="icon-content text-right2">
                                    <h5 class="wt-tilte text-uppercase">{{__('web.address')}}</h5>
                                    <p>3101 شارع الأمير محمد بن عبد العزيز</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="wt-box col-md-6 wow bounceInRight" data-wow-duration="2s">
                    <h4 class="text-uppercase rtl">{{trans('web.contactForm')}} </h4>
                    <div class="wt-separator-outer m-b30 rtl">
                        <div class="wt-separator style-square">
                            <span class="separator-left bg-primary"></span>
                            <span class="separator-right bg-primary"></span>
                        </div>
                    </div>

                    <form class="" method="post" enctype="multipart/form-data" action="{{url('/contact-uss')}}">
                        {{csrf_field()}}
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="input-group rtl">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input name="name" type="text" required class="form-control" placeholder="{{trans('web.name')}}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group ">
                                    <div class="input-group rtl">
                                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                        <input name="email" type="email" class="form-control" required placeholder="{{trans('web.yourEmail')}}">
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="input-group rtl">
                                        <span class="input-group-addon v-align-m"><i class="fa fa-pencil"></i></span>
                                        <textarea name="body" rows="9" class="form-control Message" required></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 text-right">
                                <button name="submit" type="submit" value="Submit" class="site-button  m-r15">{{trans('web.submit')}}  <i class="fa fa-angle-double-right"></i></button>

                            </div>

                        </div>

                    </form>

                </div>



                {{--<div class="wt-box col-md-6 wow bounceInRight" data-wow-duration="2s">
                    <h4 class="text-uppercase rtl">--}}{{--Contact Form--}}{{-- {{__('web.ourLocation')}} </h4>
                    <div class="wt-separator-outer m-b30 rtl">
                        <div class="wt-separator style-square">
                            <span class="separator-left bg-primary"></span>
                            <span class="separator-right bg-primary"></span>
                        </div>
                    </div>--}}

                    {{--<form class="cons-contact-form" method="post" action="http://thewebmax.com/build/form-handler.php">

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="input-group rtl">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input name="username" type="text" required class="form-control" placeholder="Name">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group ">
                                    <div class="input-group rtl">
                                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                        <input name="email" type="text" class="form-control" required placeholder="Email">
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="input-group rtl">
                                        <span class="input-group-addon v-align-m"><i class="fa fa-pencil"></i></span>
                                        <textarea name="message" rows="9" class="form-control Message" required></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 text-right">
                                <button name="submit" type="submit" value="Submit" class="site-button  m-r15">Submit  <i class="fa fa-angle-double-right"></i></button>

                            </div>

                        </div>

                    </form>--}}
                    {{--<div class="mapouter">
                        <div class="gmap_canvas"><iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=%D9%85%D8%B1%D9%83%D8%B2%20%D8%A7%D9%84%D8%A5%D8%AD%D8%B3%D8%A7%D9%86%20%D9%84%D9%84%D8%A3%D8%B9%D9%85%D8%A7%D9%84%203101%20%D8%B4%D8%A7%D8%B1%D8%B9%20%D8%A7%D9%84%D8%A3%D9%85%D9%8A%D8%B1%20%D9%85%D8%AD%D9%85%D8%AF%20%D8%A8%D9%86%20%D8%B9%D8%A8%D8%AF%20%D8%A7%D9%84%D8%B9%D8%B2%D9%8A%D8%B2%D8%8C%20%D8%AC%D8%A7%D8%B2%D8%A7%D9%86%2082812%C2%A07013&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>Google Maps Generator by <a href="https://www.embedgooglemap.net">embedgooglemap.net</a></div>
                        <style>
                            .mapouter {
                                position: relative;
                                text-align: right;
                                height: 500px;
                                width: 600px;
                            }

                            .gmap_canvas {
                                overflow: hidden;
                                background: none !important;
                                height: 500px;
                                width: 600px;
                            }

                        </style>
                    </div>--}}

                </div>
            </div>

        <!-- MAP BLOCK START -->
        <div class="section-full">
            <div class="equal-col">
                <div class="gmap-outline">
                    <div id="oneordermap" class="google-map"></div>
                </div>
            </div>
        </div>
        <!-- MAP BLOCK END -->

        </div>
        <!-- SECTION CONTENT END -->



    {{--</div>--}}
    <!-- CONTENT END -->



@endsection
@section('mapLocation')
    {{--<script>
        var lato;
        var lngo;

        $(document).on('click', '.mapBtnClick', function () {
            lato = $(this).attr('lato');
            lngo = $(this).attr('lngo');
            console.log(lato);
            console.log(lngo);
            initMap(parseFloat(lato),parseFloat(lngo));
        });
    </script>--}}


    <!--++++++++++++++++++++++++++++++++++-->
    <script>
        var marker = null;
        function initMap() {
            var map = new google.maps.Map(document.getElementById('oneordermap'), {
                zoom: 7,
                center: {lat: 16.929321722764413, lng: 42.55486708134413 }
            });
            var MaekerPos = new google.maps.LatLng(16.929321722764413 , 42.55486708134413);
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
