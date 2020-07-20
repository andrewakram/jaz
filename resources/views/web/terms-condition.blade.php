@extends('web.index')
@section('content')

    <!-- CONTENT START -->
    <div class="page-content  bg-white">

        <!-- INNER PAGE BANNER -->
        <div class="wt-bnr-inr overlay-wraper" style="background-image:url({{asset('jaz/images/banner/services.jpg')}});">
            <div class="overlay-main bg-black opacity-07"></div>
            <div class="container">
                <div class="wt-bnr-inr-entry">
                    <h1 class="text-white">{{__('web.terms')}}</h1>
                </div>
            </div>
        </div>
        <!-- INNER PAGE BANNER END -->

        <!-- BREADCRUMB ROW -->

        <!-- BREADCRUMB ROW END -->

        <!-- SECTION CONTENT -->
        <div class="section-full  p-t50 p-b50  ">
            <div class="container  bg-white ">
                <div class="row">
                    <!-- LEFT PART -->

                    <!-- LEFT PART -->

                    <!-- RIGHT PART -->
                    <div class="col-md-12 col-sm-12 p-tb10">
                        <!-- BLOG POST CAROUSEL -->
                        <div class="section-content ">
                            <div class="owl-carousel service-detail-carousel owl-btn-vertical-center owl-dots-bottom-center">

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
                            <div class="wt-box">
                                <h2>{{__('web.terms')}}</h2>


                                <div class="col-md-12 col-sm-12 col-xs-12 col-xs-100pc">
                                    <ol class="list-num-count upper-alpha">
                                        @foreach($terms as $term)
                                            <li class=" wow fadeIn  " data-wow-duration="1s" data-wow-delay="0s">{{ Session::get('lang') == "en" ? $term->en_name : $term->ar_name}}.</li>
                                        @endforeach
                                        {{--<li class=" wow fadeIn  " data-wow-duration="1s" data-wow-delay="0s">Terms and Conditions agreements act as a legal contract between you (the company) who has the website or mobile app and the user who access your website and mobile app Terms and Conditions agreements act as a legal contract between you (the company) who has the website or mobile app and the user who access your website and mobile app and the user who access your website and mobile appand the user who access your website and mobile app.</li>
                                        <li class=" wow fadeIn" data-wow-duration="2s">Terms and Conditions agreements act as a legal contract between you (the company) who has the website or mobile app and the user who access your website and mobile app .</li>
                                        <li class=" wow fadeIn" data-wow-duration="3s">Terms and Conditions agreements act as a legal contract between you (the company) who has the website or mobile app and the user who access your website and mobile app Terms and Conditions agreements act as a legal contract between you (the company) who has the website or mobile app and the user who access your website and mobile app.</li>
                                        <li class=" wow fadeIn" data-wow-duration="4s">Terms and Conditions agreements act as a legal contract between you (the company) who has the website or mobile app and the user who access your website and mobile app.</li>
                                        <li class="wow fadeIn" data-wow-duration="4s">Terms and Conditions agreements act as a legal contract between you (the company) who has the website or mobile app and the user who access your website and mobile app.</li>
                                        <li class=" wow fadeIn" data-wow-duration="4s">Terms and Conditions agreements act as a legal contract between you (the company) who has the website or mobile app and the user who access your website and mobile app.</li>
                                        <li class=" wow fadeIn" data-wow-duration="4s">Terms and Conditions agreements act as a legal contract between you (the company) who has the website or mobile app and the user who access your website and mobile app.</li>--}}
                                    </ol>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- RIGHT PART -->
                </div>
            </div>
        </div>
        <!-- SECTION CONTENT END -->

        <!-- CONTENT END -->
    </div>
    <!-- CONTENT END -->

@endsection
