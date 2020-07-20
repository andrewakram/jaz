@extends('web.index')
@section('content')

    <!-- CONTENT START -->
    <div class="page-content">

        <!-- INNER PAGE BANNER -->
        <div class="wt-bnr-inr overlay-wraper" style="background-image:url({{URL::to('jaz/images/banner/product-banner.jpg')}})">
            <div class="overlay-main bg-black opacity-07"></div>
            <div class="container">
                <div class="wt-bnr-inr-entry">
                    <h1 class="text-white">{{__('web.aboutJaz')}}</h1>
                </div>
            </div>
        </div>
        <!-- INNER PAGE BANNER END -->

        <!-- BREADCRUMB ROW -->

        <!-- BREADCRUMB ROW END -->

        <div class="section-full p-t80">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-sm-7">
                        <!--Fade slider-->
                        <div class="owl-carousel about-us-carousel owl-btn-vertical-center owl-dots-bottom-center">

                            <div class="item">
                                <div class="aon-thum-bx">
                                    <img src="{{asset('jaz/images/our-work/pic1.jpg')}}" alt="">
                                </div>
                            </div>

                            <div class="item">
                                <div class="aon-thum-bx">
                                    <img src="{{asset('jaz/images/our-work/pic2.jpg')}}" alt="">
                                </div>
                            </div>

                            <div class="item">
                                <div class="aon-thum-bx">
                                    <img src="{{asset('jaz/images/our-work/pic3.jpg')}}" alt="">
                                </div>
                            </div>

                        </div>
                        <!--fade slider END-->
                    </div>
                    <div class="col-md-5 col-sm-5">
                        <div class="text-justify">
                            <h2 class="text-uppercase text-right2"> {{__('web.aboutJaz')}}</h2>
                            <p class="text-right2">
                                {{$abouts->name}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section-full text-center p-t80 p-b50 bg-gray">
            <div class="container">

                <!-- TITLE START -->
                <div class="section-head text-center">
                    <h2 class="text-uppercase">{{__('web.bestFeature')}}</h2>
                    <div class="wt-separator-outer">
                        <div class="wt-separator style-square">
                            <span class="separator-left bg-primary"></span>
                            <span class="separator-right bg-primary"></span>
                        </div>
                    </div>
                    <p>{{__('web.bestMaintenance')}}</p>
                </div>
                <!-- TITLE END -->

                <!-- OUR BEST SERVICES BLOCKS START -->
                <div class="section-content no-col-gap">
                    <div class="row">

                        <!-- COLUMNS 1 -->
                        <div class="col-md-4 col-sm-6 animate_line">
                            <div class="wt-icon-box-wraper  p-a30 center bg-white m-a5">
                                <div class="icon-sm text-primary m-b20">
                                    <a href="#" class="icon-cell"><i class="fa fa-life-ring" aria-hidden="true"></i></a>
                                </div>
                                <div class="icon-content">
                                    <h5 class="wt-tilte text-uppercase">{{__('web.quality')}}</h5>
                                    <p>{{$abouts->name}}.</p>
                                </div>
                            </div>
                        </div>
                        <!-- COLUMNS 2 -->
                        <div class="col-md-4 col-sm-6 animate_line">
                            <div class="wt-icon-box-wraper  p-a30 center bg-white m-a5">
                                <div class="icon-sm text-primary m-b20">
                                    <a href="#" class="icon-cell"><i class="fa fa-trophy" aria-hidden="true"></i></a>
                                </div>
                                <div class="icon-content ">
                                    <h5 class="wt-tilte text-uppercase">{{__('web.integrity')}}</h5>
                                    <p>{{$abouts->name}}.</p>
                                </div>
                            </div>
                        </div>
                        <!-- COLUMNS 3 -->
                        <div class="col-md-4 col-sm-6 animate_line">
                            <div class="wt-icon-box-wraper  p-a30 center bg-white m-a5">
                                <div class="icon-sm text-primary m-b20">
                                    <a href="#" class="icon-cell"><i class="fa fa-thumbs-up" aria-hidden="true"></i></a>
                                </div>
                                <div class="icon-content">
                                    <h5 class="wt-tilte text-uppercase">{{__('web.strategy')}}</h5>
                                    <p>{{$abouts->name}} .</p>
                                </div>
                            </div>
                        </div>
                        <!-- COLUMNS 4 -->
                        <div class="col-md-4 col-sm-6 animate_line">
                            <div class="wt-icon-box-wraper  p-a30 center bg-white m-a5">
                                <div class="icon-sm text-primary m-b20">
                                    <a href="#" class="icon-cell"><i class="fa fa-users" aria-hidden="true"></i></a>
                                </div>
                                <div class="icon-content">
                                    <h5 class="wt-tilte text-uppercase">{{__('web.safety')}}</h5>
                                    <p>{{$abouts->name}} .</p>
                                </div>
                            </div>
                        </div>
                        <!-- COLUMNS 5 -->
                        <div class="col-md-4 col-sm-6 animate_line">
                            <div class="wt-icon-box-wraper  p-a30 center bg-white m-a5">
                                <div class="icon-sm text-primary m-b20">
                                    <a href="#" class="icon-cell"><i class="fa fa-area-chart" aria-hidden="true"></i></a>
                                </div>
                                <div class="icon-content">
                                    <h5 class="wt-tilte text-uppercase">{{__('web.community')}}</h5>
                                    <p>{{$abouts->name}} .</p>
                                </div>
                            </div>
                        </div>
                        <!-- COLUMNS 6 -->
                        <div class="col-md-4 col-sm-6 animate_line">
                            <div class="wt-icon-box-wraper  p-a30 center bg-white m-a5">
                                <div class="icon-sm text-primary m-b20">
                                    <a href="#" class="icon-cell"><i class="fa fa-cogs" aria-hidden="true"></i></a>
                                </div>
                                <div class="icon-content">
                                    <h5 class="wt-tilte text-uppercase">{{__('web.sustainability')}}</h5>
                                    <p>{{$abouts->name}} .</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- OUR BEST SERVICES BLOCKS END -->

            </div>
        </div>

        <!-- SECTION CONTENT START -->

        <!-- SECTION CONTENT END -->
    </div>
    <!-- CONTENT END -->

@endsection
