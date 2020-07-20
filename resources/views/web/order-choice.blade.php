@extends('web.index')
@section('content')

    <!-- CONTENT START -->
    <div class="page-content login-form">
        <div class="wt-bnr-inr overlay-wraper" style="background-image:url({{URL::to('jaz/images/banner/cat.jpg')}})">
            <div class="overlay-main bg-black opacity-07"></div>
            <div class="container">
                <div class="wt-bnr-inr-entry">
                    <h1 class="text-white text-right2 mainCatTitle">{{__('web.yourChoice')}}</h1>
                </div>
            </div>
        </div>
        <!-- Section content -->
        <div class="wt-contact-wrap row equal-wraper">

            <!-- MAP BLOCK START -->

            <!-- MAP BLOCK END -->

            <!-- RIGHT PART START -->
            <div class="section-full bg-gray p-t80 p-b120 bg-no-repeat bg-left-center" style="background-image:url({{URL::to('jaz/images/background/why-choose-pic-2.png')}})">
                <div class="container">
                    <!-- TITLE END-->
                    <div class="section-content no-col-gap">
                        <div class="row ">


                            <div class="col-md-6 col-sm-6 animate_line " >
                                <div class="wt-icon-box-wraper  p-a30 center bg-white m-a5 wow slideInUp">
                                    <div class="icon-lg text-primary m-b20">
                                        <a href="{{asset('/order-choice')}}/{{$cat_id}}/1">
                                            {{--<img src="{{asset('public/category/images/'.$category->image)}}" alt="">--}}
                                        </a>
                                    </div>
                                    <div class="icon-content">
                                        <a href="{{asset('/order-choice')}}/{{$cat_id}}/1">
                                            <h3 class="wt-tilte text-uppercase">{{__('web.userChoice')}}</h3>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6 animate_line " >
                                <div class="wt-icon-box-wraper  p-a30 center bg-white m-a5 wow slideInUp">
                                    <div class="icon-lg text-primary m-b20">
                                        <a href="{{asset('/order-choice')}}/{{$cat_id}}/2">
                                            {{--<img src="{{asset('public/category/images/'.$category->image)}}" alt="">--}}
                                        </a>
                                    </div>
                                    <div class="icon-content">
                                        <a href="{{asset('/order-choice')}}/{{$cat_id}}/2">
                                            <h3 class="wt-tilte text-uppercase">{{__('web.companyChoice')}}</h3>
                                        </a>
                                    </div>
                                </div>
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

@endsection

