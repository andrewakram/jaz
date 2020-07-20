@extends('web.index')


@section("styleForm")
    {{--in register--}}
    <link rel="stylesheet" type="text/css" href="{{asset('jaz/css/style-form.css')}}">
@endsection


@section('content')

    <!-- CONTENT START -->
    <div class="page-content">

        <!-- INNER PAGE BANNER -->
        <div class="wt-bnr-inr overlay-wraper" style="background-image:url({{URL::to('/jaz/images/banner/services.jpg')}})">
            <div class="overlay-main bg-black opacity-07"></div>
            <div class="container">
                <div class="wt-bnr-inr-entry">
                    <h1 class="text-white text-right2">{{__('web.acceptedCompanies')}}</h1>
                </div>
            </div>
        </div>


        <!-- SECTION CONTENT START -->
        <div class="section-full p-t80 p-b50">
            <div class="container">

                <!-- BLOG POST START -->

                <!-- COLUMNS 1 -->

                <!-- COLUMNS 2 -->

                <!-- COLUMNS 3 -->

                <!-- COLUMNS 4 -->
                @foreach($companies as $company)
                    <div class="blog-post blog-md date-style-3 clearfix wow fadeInLeft" data-wow-duration="2s">

                    <div class="wt-post-media wt-post-media2 wt-img-effect " style="width:100px; height:100px; margin:0px 10px 10px 10px; padding:0px 10px 10px 10px">
                        <a href="javascript:void(0);">
                            <img src="{{URL::to('/public/public/workers/images/'.$company->image)}}" alt="{{$company->image}}" >
                        </a>
                    </div>
                    <div class="wt-post-info">

                        <div class="wt-post-title ">
                            <h3 class="post-title text-right2"><a href="{{asset('/company/'.$company->id)}}">{{$company->name}}</a></h3>
                        </div>
                        <div class="rating-bx text-right2">
                            @if($company->rate <1)
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                {{--<p>No rate found</p>--}}
                            @else
                                @for($i=0; $i<$company->rate; $i++)
                                    <i class="fa fa-star"></i>
                                @endfor
                            @endif
                        </div>

                        <div class="wt-post-text text-right2">
                            <p>{{$company->description == "" ? trans('web.noDes') : $company->description}} </p>
                        </div>
                        <div class="clearfix">

                            <div class="widget_social_inks pull-right">
                                <ul class="social-icons social-radius social-dark m-b0">




                                    <li lato="{{$company->lat}}" lngo="{{$company->lng}}" class="mapBtnClick">
                                        <a href="javascript:void(0);" class="fas fa-map-marker-alt" class="fadeIn fourth ref2 map-btn" value="Detect your location " data-toggle="modal" data-target="#exampleModalCenter"></a>
                                    </li>

                                    {{--@if(Session::get("u_phone"))
                                    <li><a href="{{asset("/chat")}}" class="fas fa-comments" ></a></li>
                                    @endif--}}


                                </ul>
                            </div>
                        </div>


                    </div>

                </div>
                @endforeach

                <div class="pagination-bx clearfix ">
                    {{ $companies->links() }}
                </div>


                {{--<div class="blog-post blog-md date-style-3 clearfix wow fadeInLeft" data-wow-duration="2s">

                    <div class="wt-post-media wt-post-media2 wt-img-effect ">
                        <a href="javascript:void(0);"><img src="{{URL::to('jaz/images/blog/grid/pic4.jpg')}}" alt=""></a>
                    </div>
                    <div class="wt-post-info">

                        <div class="wt-post-title ">
                            <h3 class="post-title text-right2"><a href="company.html">Company Name</a></h3>
                        </div>
                        <div class="rating-bx text-right2">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>

                        <div class="wt-post-text text-right2">
                            <p>Asperiores, tenetur, blanditiis, quaerat odit ex exercitationem pariatur quibusdam veritatis quisquam laboriosam esse beatae hic perferendis velit deserunt soluta iste repellendus officia in neque veniam debitis Asperiores, tenetur, blanditiis, quaerat odit ex exercitationem pariatur quibusdam veritatis quisquam laboriosam esse beatae hic perferendis velit deserunt soluta iste repellendus officia in neque veniam debitis
                                Asperiores, </p>
                        </div>
                        <div class="clearfix">

                            <div class="widget_social_inks pull-right">
                                <ul class="social-icons social-radius social-dark m-b0">




                                    <li><a href="javascript:void(0);" class="fas fa-map-marker-alt" class="fadeIn fourth ref2 map-btn" value="Detect your location " data-toggle="modal" data-target="#exampleModalCenter"></a></li>
                                    <li><a href="chat.html" class="fas fa-comments" ></a></li>


                                </ul>
                            </div>
                        </div>


                    </div>

                </div>
                <div class="blog-post blog-md date-style-3 clearfix wow fadeInLeft" data-wow-duration="2s">

                    <div class="wt-post-media wt-post-media2 wt-img-effect  wow fadeIn">
                        <a href="javascript:void(0);"><img src="{{URL::to('jaz/images/blog/grid/5.jpg')}}" alt=""></a>
                    </div>
                    <div class="wt-post-info">

                        <div class="wt-post-title text-right2 ">
                            <h3 class="post-title"><a href="company%20-%20trucks.html">Company Name</a></h3>
                        </div>
                        <div class="rating-bx text-right2">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="wt-post-text text-right2">
                            <p>Asperiores, tenetur, blanditiis, quaerat odit ex exercitationem pariatur quibusdam veritatis quisquam laboriosam esse beatae hic perferendis velit deserunt soluta iste repellendus officia in neque veniam debitis Asperiores, tenetur, blanditiis, quaerat odit ex exercitationem pariatur quibusdam veritatis quisquam laboriosam esse beatae hic perferendis velit deserunt soluta iste repellendus officia in neque veniam debitis
                                Asperiores, tenetur,  </p>
                        </div>
                        <div class="clearfix">

                            <div class="widget_social_inks pull-right">
                                <ul class="social-icons social-radius social-dark m-b0">




                                    <li><a href="javascript:void(0);" class="fas fa-map-marker-alt" class="fadeIn fourth ref2 map-btn" value="Detect your location " data-toggle="modal" data-target="#exampleModalCenter"></a></li>
                                    <li><a href="chat.html" class="fas fa-comments" ></a></li>
                                </ul>
                            </div>
                        </div>


                    </div>

                </div>
                <div class="blog-post blog-md date-style-3 clearfix wow fadeInLeft" data-wow-duration="2s">

                    <div class="wt-post-media wt-post-media2 wt-img-effect ">
                        <a href="javascript:void(0);"><img src="{{asset('jaz/images/blog/grid/6.jpg')}}" alt=""></a>
                    </div>
                    <div class="wt-post-info">

                        <div class="wt-post-title ">
                            <h3 class="post-title text-right2"><a href="company.html">Company Name</a></h3>
                        </div>
                        <div class="rating-bx text-right2">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>

                        <div class="wt-post-text text-right2">
                            <p>Asperiores, tenetur, blanditiis, quaerat odit ex exercitationem pariatur quibusdam veritatis quisquam laboriosam esse beatae hic perferendis velit deserunt soluta iste repellendus officia in neque veniam debitis Asperiores, tenetur, blanditiis, quaerat odit ex exercitationem pariatur quibusdam veritatis quisquam laboriosam esse beatae hic perferendis velit deserunt soluta iste repellendus officia in neque veniam debitis
                                Asperiores, tenetur, </p>
                        </div>
                        <div class="clearfix">

                            <div class="widget_social_inks pull-right">
                                <ul class="social-icons social-radius social-dark m-b0">




                                    <li><a href="javascript:void(0);" class="fas fa-map-marker-alt" class="fadeIn fourth ref2 map-btn" value="Detect your location " data-toggle="modal" data-target="#exampleModalCenter"></a></li>
                                    <li><a href="chat.html" class="fas fa-comments" ></a></li>
                                </ul>
                            </div>
                        </div>


                    </div>

                </div>
                <div class="blog-post blog-md date-style-3 clearfix wow fadeInLeft" data-wow-duration="2s">

                    <div class="wt-post-media wt-post-media2 wt-img-effect ">
                        <a href="javascript:void(0);"><img src="{{asset('jaz/images/blog/grid/7.jpg')}}" alt=""></a>
                    </div>
                    <div class="wt-post-info">

                        <div class="wt-post-title text-right2 ">
                            <h3 class="post-title"><a href="company.html">Company Name</a></h3>
                        </div>
                        <div class="rating-bx text-right2">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>

                        <div class="wt-post-text text-right2">
                            <p>Asperiores, tenetur, blanditiis, quaerat odit ex exercitationem pariatur quibusdam veritatis quisquam laboriosam esse beatae hic perferendis velit deserunt soluta iste repellendus officia in neque veniam debitis Asperiores, tenetur, blanditiis, quaerat odit ex exercitationem pariatur quibusdam veritatis quisquam laboriosam esse beatae hic perferendis velit deserunt soluta iste repellendus officia in neque veniam debitis
                                Asperiores, tenetur,  </p>
                        </div>
                        <div class="clearfix">

                            <div class="widget_social_inks pull-right">
                                <ul class="social-icons social-radius social-dark m-b0">




                                    <li><a href="javascript:void(0);" class="fas fa-map-marker-alt" class="fadeIn fourth ref2 map-btn" value="Detect your location " data-toggle="modal" data-target="#exampleModalCenter"></a></li>
                                    <li><a href="chat.html" class="fas fa-comments" ></a></li>
                                </ul>
                            </div>
                        </div>


                    </div>

                </div>--}}
                <!-- BLOG POST END -->

                <!-- PAGINATION START -->
                {{--<div class="pagination-bx clearfix ">
                    <ul class="custom-pagination pagination">
                        <li><a href="#">&laquo;</a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">&raquo;</a></li>
                    </ul>
                </div>--}}
                <!-- PAGINATION END -->

            </div>
        </div>
        <!-- SECTION CONTENT END -->

    </div>
    <!-- CONTENT END -->





    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title rtl" id="exampleModalLongTitle">{{__('web.companyLocation')}}</h5>

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



@endsection

@section('mapLocation')
    <script>
        var lato;
        var lngo;

        $(document).on('click', '.mapBtnClick', function () {
            lato = $(this).attr('lato');
            lngo = $(this).attr('lngo');
            console.log(lato);
            console.log(lngo);
            initMap(parseFloat(lato),parseFloat(lngo));
        });
    </script>


    <!--++++++++++++++++++++++++++++++++++-->
    <script>
        var marker = null;
        function initMap(lato,lngo) {
            var map = new google.maps.Map(document.getElementById('oneordermap'), {
                zoom: 7,
                center: {lat: lato, lng: lngo }
            });
            var MaekerPos = new google.maps.LatLng(lato , lngo);
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
