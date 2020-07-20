@extends("web.index")
@section("content")

    <!-- CONTENT START -->
    <div class="page-content">

        <!-- INNER PAGE BANNER -->
        <div class="wt-bnr-inr overlay-wraper" style="background-image:url({{asset('jaz/images/banner/gallery-banner.jpg')}})">
            <div class="overlay-main bg-black opacity-07"></div>
            <div class="container">
                <div class="wt-bnr-inr-entry">
                    <h1 class="text-white">{{__('web.serviceType')}}</h1>
                </div>
            </div>
        </div>
        <!-- INNER PAGE BANNER END -->

        <!-- BREADCRUMB ROW -->

        <!-- BREADCRUMB ROW END -->

        <!-- CONTENT SECTION START -->
        <div class="section-full p-t80 p-b50">
            <div class="container">

                <!-- PAGINATION TOP START -->


                <!-- GALLERY CONTENT START -->
                <div class="row">

                    <div class="masonry-item cat-3 col-lg-6 col-md-6 col-sm-6 col-xs-6 m-b30">
                        <div class="wt-gallery-bx p-lr15">
                            <div class="wt-thum-bx wt-img-effect img-reflection">
                                <a href="{{asset('/order-form/urgent')}}">
                                    <img src="{{asset('jaz/images/latest-projects/55.jpg')}}" alt="">
                                </a>

                            </div>
                        </div>
                    </div>
                    <!-- COLUMNS 8 -->
                    <div class="masonry-item cat-3 col-lg-6 col-md-6 col-sm-6 col-xs-6 m-b30">
                        <div class="wt-gallery-bx p-lr15">
                            <div class="wt-thum-bx wt-img-effect img-reflection">
                                <a href="{{asset('/order-form/schedule')}}">
                                    <img src="{{asset('jaz/images/latest-projects/56.jpg')}}" alt="">
                                </a>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <!-- CONTENT SECTION END  -->

    </div>
    <!-- CONTENT END -->

@endsection
