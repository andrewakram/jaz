@extends("web.index")
@section("content")

    <!-- CONTENT START -->
    <div class="page-content">

        <!-- Slider -->
        <div class="main-slider style-two default-banner">
            <div class="tp-banner-container">
                <div class="tp-banner" >
                    <!-- START REVOLUTION SLIDER 5.4.1 -->
                    <div id="rev_slider_1014_1_wrapper" class="rev_slider_wrapper fullscreen-container" data-alias="typewriter-effect" data-source="gallery">
                        <div id="rev_slider_1014_1" class="rev_slider fullscreenbanner" style="display:none;" data-version="5.4.1">
                            <ul>

                                @foreach($slider as $key => $s)
                                <!-- SLIDE 1 -->
                                <li data-index="rs-{{$key+1}}000" data-transition="slidingoverlayhorizontal" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="default"  data-thumb="{{$s->image}}"  data-rotate="0"  data-saveperformance="off"  data-title="Slide{{$key+1}}" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">

                                    <!-- MAIN IMAGE -->
                                    <img src="{{$s->image}}"  alt=""  data-bgposition="center bottom" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina/>
                                    <!-- LAYERS -->

                                    <!-- LAYER NR. 1 [ for overlay ] -->
                                    <div class="tp-caption tp-shape tp-shapewrapper "
                                         id="slide-{{$s->id}}00-layer-1"
                                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                         data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
                                         data-width="full"
                                         data-height="full"
                                         data-whitespace="nowrap"
                                         data-type="shape"
                                         data-basealign="slide"
                                         data-responsive_offset="off"
                                         data-responsive="off"
                                         data-frames='[
                                        {"from":"opacity:0;","speed":1000,"to":"o:1;","delay":0,"ease":"Power4.easeOut"},
                                        {"delay":"wait","speed":1000,"to":"opacity:0;","ease":"Power4.easeOut"}
                                        ]'
                                         data-textAlign="['left','left','left','left']"
                                         data-paddingtop="[0,0,0,0]"
                                         data-paddingright="[0,0,0,0]"
                                         data-paddingbottom="[0,0,0,0]"
                                         data-paddingleft="[0,0,0,0]"

                                         style="z-index: 12;background-color:rgba(0, 0, 0, 0.5);border-color:rgba(0, 0, 0, 0);border-width:0px;">
                                    </div>

                                    <!-- LAYER NR. 2 [ for title ] -->
                                    <div class="tp-caption   tp-resizeme"
                                         id="slide-{{$s->id}}00-layer-2"
                                         data-x="['left','left','left','left']" data-hoffset="['60','60','60','100']"
                                         data-y="['top','top','top','top']" data-voffset="['200','200','200','200']"
                                         data-fontsize="['60','60','60','50']"
                                         data-lineheight="['70','70','70','60']"
                                         data-width="['700','700','700','700']"
                                         data-height="['none','none','none','none']"
                                         data-whitespace="['normal','normal','normal','normal']"

                                         data-type="text"
                                         data-responsive_offset="on"
                                         data-frames='[
                                        {"from":"y:100px(R);opacity:0;","speed":2000,"to":"o:1;","delay":500,"ease":"Power4.easeOut"},
                                        {"delay":"wait","speed":1000,"to":"y:-50px;opacity:0;","ease":"Power2.easeInOut"}
                                        ]'
                                         data-textAlign="['left','left','left','left']"
                                         data-paddingtop="[0,0,0,0]"
                                         data-paddingright="[0,0,0,0]"
                                         data-paddingbottom="[0,0,0,0]"
                                         data-paddingleft="[0,0,0,0]"

                                         style="z-index: 13;
                                        white-space: normal;
                                        font-weight: 700;
                                        color: rgba(255, 255, 255, 1.00);
                                        border-width:0px;">
                                        <span class="text-uppercase" style="font-family:'Roboto' ;"><span class="text-primary">{{$s->title}} </span></span>
                                    </div>

                                    <!-- LAYER NR. 3 [ for paragraph] -->
                                    <div class="tp-caption  tp-resizeme"
                                         id="slide-{{$s->id}}00-layer-3"
                                         data-x="['left','left','left','left']" data-hoffset="['60','60','60','100']"
                                         data-y="['top','top','top','top']" data-voffset="['300','300','300','300']"
                                         data-fontsize="['18','18','18','30']"
                                         data-lineheight="['30','30','30','40']"
                                         data-width="['650','650','650','650']"
                                         data-height="['none','none','none','none']"
                                         data-whitespace="['normal','normal','normal','normal']"

                                         data-type="text"
                                         data-responsive_offset="on"
                                         data-frames='[
                                        {"from":"y:100px(R);opacity:0;","speed":2000,"to":"o:1;","delay":1000,"ease":"Power4.easeOut"},
                                        {"delay":"wait","speed":1000,"to":"y:-50px;opacity:0;","ease":"Power2.easeInOut"}
                                        ]'
                                         data-textAlign="['left','left','left','left']"
                                         data-paddingtop="[0,0,0,0]"
                                         data-paddingright="[0,0,0,0]"
                                         data-paddingbottom="[0,0,0,0]"
                                         data-paddingleft="[0,0,0,0]"

                                         style="z-index: 13;
                                        font-weight: 500;
                                        color: rgba(255, 255, 255, 0.85);
                                        border-width:0px;">
                                        <span >{{$s->body}}.</span>
                                    </div>

                                    <!-- LAYER NR. 4 [ for readmore botton ] -->
                                    <div class="tp-caption tp-resizeme"
                                         id="slide-{{$s->id}}00-layer-4"
                                         data-x="['left','left','left','left']" data-hoffset="['60','60','60','100']"
                                         data-y="['top','top','top','top']" data-voffset="['430','430','450','500']"
                                         data-lineheight="['none','none','none','none']"
                                         data-width="['300','300','300','300']"
                                         data-height="['none','none','none','none']"
                                         data-whitespace="['normal','normal','normal','normal']"

                                         data-type="text"
                                         data-responsive_offset="on"
                                         data-frames='[
                                        {"from":"y:100px(R);opacity:0;","speed":2000,"to":"o:1;","delay":1500,"ease":"Power4.easeOut"},
                                        {"delay":"wait","speed":1000,"to":"y:-50px;opacity:0;","ease":"Power2.easeInOut"}
                                        ]'
                                         data-textAlign="['left','left','left','left']"
                                         data-paddingtop="[0,0,0,0]"
                                         data-paddingright="[0,0,0,0]"
                                         data-paddingbottom="[0,0,0,0]"
                                         data-paddingleft="[0,0,0,0]"

                                         style="z-index:13; text-transform:uppercase; font-weight:700;">
                                        {{--<a href="javascript:;" class="site-button button-lg  m-r15">Read more  <i class="fa fa-angle-double-right"></i></a>--}}
                                    </div>

                                </li>
                                @endforeach
                                </ul>
                            <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
                        </div>
                    </div>
                    <!-- END REVOLUTION SLIDER -->
                </div>
            </div>
        </div>
        <!-- Slider END -->

        <!-- ABOUT COMPANY SECTION START -->
        <div class="section-full p-tb100 bg-gray " id="makeOrderFromHere">
            <div class="container">
                <div class="section-head text-center ">
                    <h2 class="text-uppercase">{{__('web.jazCo')}} </h2>
                    <div class="wt-separator-outer">
                        <div class="wt-separator style-square">
                            <span class="separator-left bg-primary"></span>
                            <span class="separator-right bg-primary"></span>
                        </div>
                    </div>
                    <p>
                        {{$abouts->name}}.
                    </p>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    {{--<div class="col-md-5 col-sm-5 col-xs-6 col-xs-100pc">
                        <div class="about-com-pic-2">
                            <img src="{{asset('jaz/images/about-pic4.jpg')}}" alt=""/>
                        </div>
                    </div>--}}
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="about-types row">

                            @foreach($main_cats as $main_cat)
                            <div class="col-md-4 col-sm-4 m-b30">
                                <div class="wt-icon-box-wraper bx-style-1 p-a30 center bg-white wow bounceIn">
                                    <a href="{{asset('/categories/'.$main_cat->id)}}"> <div class="icon-lg text-primary m-b20">
                                            <span class="icon-cell text-primary"><img src="{{asset('/public/public/category/images/'.$main_cat->image)}}" alt=""></span>
                                        </div></a>
                                    <div class="icon-content">
                                        <a href="{{asset('/categories/'.$main_cat->id)}}"> <h5 class="wt-tilte text-uppercase">{{$main_cat->name}}</h5></a>
                                        <!--<p>{{$main_cat->description == "" ? "No description found" : $main_cat->description }}</p>-->
                                    </div>
                                </div>
                            </div>
                            @endforeach


                            {{--<div class="col-md-6 col-sm-6 m-b30">
                                <div class="wt-icon-box-wraper bx-style-1 p-a30 center bg-white wow bounceIn">
                                    <a href="{{asset('/categories')}}"> <div class="icon-lg text-primary m-b20">
                                            <span class="icon-cell text-primary"><img src="{{asset('jaz/images/icon/home.png')}}" alt=""></span>
                                        </div></a>
                                    <div class="icon-content">
                                        <a href="{{asset('/categories')}}"> <h5 class="wt-tilte text-uppercase">Maintenance</h5></a>
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit,</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 m-b30">
                                <div class="wt-icon-box-wraper bx-style-1 p-a30 center bg-white wow bounceIn">
                                    <a href="{{asset('/categories')}}"> <div class="icon-lg text-primary m-b20">
                                            <span class="icon-cell text-primary"><img src="{{asset('jaz/images/icon/paint-brush.png')}}" alt=""></span>
                                        </div></a>
                                    <div class="icon-content">
                                        <a href="{{asset('/categories')}}"> <h5 class="wt-tilte text-uppercase">Small Contract</h5></a>
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 m-b30">
                                <div class="wt-icon-box-wraper bx-style-1 p-a30 center bg-white wow bounceIn">
                                    <div class="icon-lg text-primary  m-b20">
                                        <a href="{{asset('/categories')}}">	<span class="icon-cell text-primary"><img src="{{asset('jaz/images/icon/jackhammer.png')}}" alt=""></span></a>
                                    </div>
                                    <div class="icon-content">
                                        <a href="{{asset('/categories')}}"> <h5 class="wt-tilte text-uppercase">Heavy Transport</h5></a>
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod .</p>
                                    </div>
                                </div>
                            </div>--}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ABOUT COMPANY SECTION END -->

        <!-- SERVICES START  -->
        <div class="section-full bg-white p-t80 p-b50 scale-bg-top scale-bg-bottom">
            <div class="container">
                <!-- IMAGE CAROUSEL START -->

                <!-- TITLE START -->
                <div class="section-head text-center">
                    <h2 class="text-uppercase">{{trans('web.ourServices')}}</h2>
                    <div class="wt-separator-outer">
                        <div class="wt-separator style-square">
                            <span class="separator-left bg-primary"></span>
                            <span class="separator-right bg-primary"></span>
                        </div>
                    </div>
                    <p>{{$abouts->name}}.</p>
                </div>
                <!-- TITLE END -->

                <!-- CAROUSEL -->
                <div class="section-content wow bounceInUp">

                    <div class="owl-carousel Home-services-carousel owl-btn-vertical-center">









                        @foreach($ourServices as $ourService)
                        <div class="item">
                            <div class="wt-box bg-white">
                                <div class="wt-media">
                                    <a ><img src="{{$ourService->image}}" alt=""></a>
                                </div>
                                <div class="wt-info p-tb30">
                                    <h4 class="wt-title m-t0 m-b5 text-right2"><a >{{$ourService->name}}</a></h4>
                                    <p class="text-right2">{{$ourService->description}}. </p>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>


                </div>
            </div>
        </div>
        <!-- SERVICES CONTENT END -->


        <!-- SECTION CONTENT START -->
        <div class="section-full  p-tb80 bg-no-repeat bg-cover " style="background-image:url({{asset('jaz/images/background/bg5.jpg')}});">

            <div class="container">

                <div class="row">
                    <div class="col-md-6  clearfix">
                        <div class="wt-box graph-tabing wow bounceInLeft">
                            <div class="wt-accordion acc-bg-primary acc-has-bg" id="accordion6">
                                <div class="panel wt-panel">

                                    <div class="acod-head acc-actives">
                                        <h6 class="acod-title text-uppercase">
                                            <a data-toggle="collapse" href="#collapseOne6" data-parent="#accordion6" >
                                                {{$jazBenfits->title1}}.
                                                <span class="indicator"><i class="fa fa-plus"></i></span>
                                            </a>
                                        </h6>
                                    </div>

                                    <div id="collapseOne6" class="acod-body collapse in">
                                        <div class="acod-content p-tb15">{{$jazBenfits->body1}}.</div>
                                    </div>

                                </div>
                                <div class="panel wt-panel">
                                    <div class="acod-head">
                                        <h6 class="acod-title text-uppercase">
                                            <a data-toggle="collapse" href="#collapseTwo6" class="collapsed" data-parent="#accordion6" >
                                                {{$jazBenfits->title2}}.
                                                <span class="indicator"><i class="fa fa-plus"></i></span>
                                            </a>
                                        </h6>
                                    </div>
                                    <div id="collapseTwo6" class="acod-body collapse">
                                        <div class="acod-content p-tb15">{{$jazBenfits->body2}}.</div>
                                    </div>
                                </div>
                                <div class="panel wt-panel">
                                    <div class="acod-head">
                                        <h6 class="acod-title text-uppercase">
                                            <a data-toggle="collapse"  href="#collapseThree6" class="collapsed"  data-parent="#accordion6">
                                                {{$jazBenfits->title3}}.
                                                <span class="indicator"><i class="fa fa-plus"></i></span>
                                            </a>
                                        </h6>
                                    </div>
                                    <div id="collapseThree6" class="acod-body collapse">
                                        <div class="acod-content p-tb15">{{$jazBenfits->body3}}.</div>
                                    </div>
                                </div>

                                <div class="panel wt-panel">
                                    <div class="acod-head">
                                        <h6 class="acod-title text-uppercase">
                                            <a data-toggle="collapse"  href="#collapseFour6" class="collapsed"  data-parent="#accordion6">
                                                {{$jazBenfits->title4}}.
                                                <span class="indicator"><i class="fa fa-plus"></i></span>
                                            </a>
                                        </h6>
                                    </div>
                                    <div id="collapseFour6" class="acod-body collapse">
                                        <div class="acod-content p-tb15">{{$jazBenfits->body4}}.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="wt-box graph-part-right text-white wow bounceInRight">
                            <strong class="text-uppercase title-first display-block">{{__('web.jazCo')}}</strong>
                            <span class="text-uppercase text-primary display-block title-second">{{__('web.jazlookingFor')}}</span>
                            <p class="text-right2"><strong>{{$jazVision->body}}</strong></p>
                            <ul class="list-check-circle primary">
                                <li>{{$jazVision->vision1}}. </li>
                                <li>{{$jazVision->vision2}}</li>
                                <li>{{$jazVision->vision3}} </li>
                                <li>{{$jazVision->vision4}} </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- SECTION CONTENT  END -->
    <!-- CONTENT END -->
        <!-- LATEST PROJECT SECTION START -->
        <div class="section-full bg-white p-tb80 scale-bg-top scale-bg-bottom">

            <div class="container">
                <div class="section-head text-center">

                    <h2 class="text-uppercase ">{{__('web.ourServicesAlbum')}}</h2>

                    <div class="wt-separator-outer">
                        <div class="wt-separator style-square">
                            <span class="separator-left bg-primary"></span>
                            <span class="separator-right bg-primary"></span>
                        </div>
                    </div>
                    <p>{{Session::get("about")}}.</p>

                    <div class="filter-wrap center">
                        <ul class="masonry-filter link-style  text-uppercase">
                            <li class="active"><a data-filter="*" href="#"><span> {{__('web.all')}}</span></a></li>
                            @foreach($main_cats as $main_cat)
                            <li><a data-filter=".cat-{{$main_cat->id}}" href="#">{{$main_cat->name}}</a></li>
                            @endforeach
                            {{--<li><a data-filter=".cat-2" href="#">{{$main_cats[1]->name}}</a></li>--}}
                            {{--<li><a data-filter=".cat-3" href="#">{{$main_cats[2]->name}}</a></li>--}}
                            {{--<li><a data-filter=".cat-4" href="#">Plumbing</a></li>
                            <li><a data-filter=".cat-5" href="#">Carpentry</a></li>--}}
                        </ul>
                    </div>
                </div>
            </div>
            <div class="container" id="jazGallery">
                <div class="row">
                    <div class="portfolio-wrap mfp-gallery no-col-gap wow flipInX">

                    <!-- COLUMNS 1 -->
                        @foreach($albums as $album)
                            <div class="masonry-item cat-{{$album->cat_id}} col-lg-4 col-md-4 col-sm-6 col-xs-6" style="padding: 5px">
                                <div class="wt-gallery-bx">
                                    <div class="wt-thum-bx wt-img-overlay1 wt-img-effect zoom-slow">
                                        <a href="javascript:void(0);">
                                            <img src="{{$album->smallimage}}"  alt="">
                                        </a>
                                        <div class="overlay-bx">
                                            <div class="overlay-icon">

                                                <a href="{{$album->largeimage}}" class="mfp-link">
                                                    <i class="fa fa-arrows-alt wt-icon-box-xs"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    <!-- COLUMNS 4 -->
                        {{--<div class="masonry-item cat-4 col-lg-4 col-md-4 col-sm-6 col-xs-6">
                            <div class="wt-gallery-bx">
                                <div class="wt-thum-bx wt-img-overlay1 wt-img-effect zoom-slow">
                                    <a href="javascript:void(0);">
                                        <img src="{{asset('jaz/images/latest-projects/pic4.jpg')}}"  alt="">
                                    </a>
                                    <div class="overlay-bx">
                                        <div class="overlay-icon">

                                            <a href="{{asset('jaz/images/gallery/pic4.jpg')}}" class="mfp-link">
                                                <i class="fa fa-arrows-alt wt-icon-box-xs"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>--}}
                    <!-- COLUMNS 5 -->
                        {{--<div class="masonry-item cat-5 col-lg-4 col-md-4 col-sm-6 col-xs-6">
                            <div class="wt-gallery-bx">
                                <div class="wt-thum-bx wt-img-overlay1 wt-img-effect zoom-slow">
                                    <a href="javascript:void(0);">
                                        <img src="{{asset('jaz/images/latest-projects/pic5.jpg')}}"  alt="">
                                    </a>
                                    <div class="overlay-bx">
                                        <div class="overlay-icon">

                                            <a href="{{asset('jaz/images/gallery/pic5.jpg')}}" class="mfp-link">
                                                <i class="fa fa-arrows-alt wt-icon-box-xs"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>--}}
                    <!-- COLUMNS 6 -->
                        {{--<div class="masonry-item cat-4 col-lg-4 col-md-4 col-sm-6 col-xs-6">
                            <div class="wt-gallery-bx">
                                <div class="wt-thum-bx wt-img-overlay1 wt-img-effect zoom-slow">
                                    <a href="javascript:void(0);">
                                        <img src="{{asset('jaz/images/latest-projects/pic6.jpg')}}"  alt="">
                                    </a>
                                    <div class="overlay-bx">
                                        <div class="overlay-icon">

                                            <a href="{{asset('jaz/images/gallery/pic6.jpg')}}" class="mfp-link">
                                                <i class="fa fa-arrows-alt wt-icon-box-xs"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>--}}

                    </div>
                </div>
            </div>
        </div>
        <!-- LATEST PROJECT SECTION END -->

        <!-- COMPANY DETAIL SECTION START -->
        <div class="section-full  p-t50 p-b10 overlay-wraper bg-repeat"  data-stellar-background-ratio="0.5"  style="background-image:url({{asset('jaz/images/switcher/switcher-patterns/large/pt2.jpg')}})">
            <div class="overlay-main bg-black opacity-07"></div>
            <div class="container">

                <div class="section-content">
                    <div class="row">

                        <div class="col-md-3 col-sm-6">
                            <div class="m-b30 text-white text-center">
                                <div class="icon-lg m-b20"><i class="fa fa-building"></i></div>
                                <div class="<!--counter--> font-26 font-weight-800 m-b5">2500</div>
                                <span>{{__('web.services')}}</span>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <div class="m-b30 text-white text-center">
                                <div class="icon-lg m-b20"><i class="fa fa-users"></i></div>
                                <div class="font-26 font-weight-800 m-b5"><span class="counter">1500</span><b>+</b></div>
                                <span>{{__('web.happyClients')}}</span>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <div class="m-b30  text-white text-center">
                                <div class="icon-lg m-b20"><i class="fa fa-user-plus"></i></div>
                                <div class="<!--counter--> font-26 font-weight-800 m-b5">4500</div>
                                <span>{{__('web.workersEmployed')}}</span>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <div class="m-b30 text-white text-center">
                                <div class="icon-lg m-b20"><i class="fa fa-trophy"></i></div>
                                <div class="<!--counter--> font-26 font-weight-800 m-b5">260</div>
                                <span>{{__('web.awardsWon')}}</span>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
        <!-- COMPANY DETAIL SECTION End -->

        <!-- WHY CHOOSE US SECTION START  -->
        <div class="section-full bg-gray p-t80 p-b120 bg-no-repeat bg-left-center" style="background-image:url({{asset('jaz/images/background/why-choose-pic-2.png')}});">
            <div class="container">
                <!-- TITLE START-->
                <div class="section-head text-center">
                    <h2 class="text-uppercase">{{__('web.ourServices')}}</h2>
                    <div class="wt-separator-outer">
                        <div class="wt-separator style-square">
                            <span class="separator-left bg-primary"></span>
                            <span class="separator-right bg-primary"></span>
                        </div>
                    </div>
                    <p>{{Session::get("about")}}.</p>
                </div>
                <!-- TITLE END-->
                <div class="section-content no-col-gap">
                    <div class="row">

                        <!-- COLUMNS 1 -->
                        @foreach($services as $service)
                        <div class="col-md-4 col-sm-6 animate_line">
                            <div class="wt-icon-box-wraper  p-a30 center bg-white m-a5 wow slideInUp">
                                <div class="icon-lg text-primary m-b20">
                                    <a href="{{asset('/service-type/'.$service->id)}}" class="icon-cell"><img src="{{$service->image}}" alt=""></a>
                                </div>
                                <div class="icon-content">
                                    <a href="#makeOrderFromHere">  <h5 class="wt-tilte text-uppercase">{{$service->name}}</h5></a>
                                    <p>{{$service->description}} .</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        {{--<a href="{{asset('/categories')}}" class="m-b15 site-button orange m-r15 radius-sm all-services" type="button">All Services</a>--}}
                    </div>

                </div>

            </div>

        </div>
        <!-- WHY CHOOSE US SECTION END  -->

        <!-- TESTIMONIAL SECTION START -->
        <div class="section-full p-t80 p-b50 overlay-wraper bg-parallax"  data-stellar-background-ratio="0.5"  style="background-image:url({{asset('jaz/images/background/bg9.jpg')}})">
            <div class="overlay-main bg-black opacity-07"></div>
            <div class="container">
                <!-- TITLE START -->
                <div class="section-head text-center text-white ">
                    <h2 class="text-uppercase wow zoomIn">{{trans("web.ourClientSay")}}</h2>
                    <div class="wt-separator-outer">
                        <div class="wt-separator style-square has-bg">
                            <span class="separator-left bg-primary"></span>
                            <span class="separator-right bg-primary"></span>
                        </div>
                    </div>

                </div>
                <!-- TITLE END -->

                <!-- TESTIMONIAL 1 START ON BACKGROUND -->
                <div class="section-content wow zoomIn">
                    <div class="owl-carousel testimonial-one wow slideInlRight">
                        @foreach($reviews as $review)
                        <div class="item">
                            <div class="testimonial-1 testimonial-bg">
                                <div class="testimonial-pic  radius shadow"><img src="{{$review->image}}" width="100" height="100" alt=""></div>
                                <div class="testimonial-detail">
                                    <strong class="testimonial-name">{{$review->name}}</strong>
                                    @if($review->job)
                                    <span class="testimonial-position">{{$review->job}}</span>
                                    @endif
                                </div>
                                <div class="testimonial-text">
                                    <p> {{$review->comment}}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- TESTIMONIAL SECTION START -->

        <!-- TESTIMONIAL SECTION START -->
    {{--
    <div class="section-full p-t80 p-b50 overlay-wraper bg-parallax"  data-stellar-background-ratio="0.5"  style="background-image:url({{asset('jaz/images/background/bg9.jpg')}})">
        <div class="overlay-main bg-black opacity-07"></div>
        <div class="container">
            <!-- TITLE START -->
            <div class="section-head text-center text-white ">
                <h2 class="text-uppercase wow zoomIn">What Our Client Say</h2>
                <div class="wt-separator-outer">
                    <div class="wt-separator style-square has-bg">
                        <span class="separator-left bg-primary"></span>
                        <span class="separator-right bg-primary"></span>
                    </div>
                </div>

            </div>
            <!-- TITLE END -->

            <!-- TESTIMONIAL 1 START ON BACKGROUND -->
            <div class="section-content wow zoomIn">
                <div class="owl-carousel testimonial-one wow slideInlRight">
                    <div class="item">
                        <div class="testimonial-1 testimonial-bg">
                            <div class="testimonial-pic  radius shadow"><img src="{{asset('jaz/images/testimonials/pic1.jpg')}}" width="100" height="100" alt=""></div>
                            <div class="testimonial-detail">
                                <strong class="testimonial-name">Steve Jobs</strong>
                                <span class="testimonial-position">Cfo Loop Inc</span>
                            </div>
                            <div class="testimonial-text">
                                <p> Excellent Customer support!.The template itself is very extended. simply dummy text of the printing and industry. Lorem Ipsum has been the industry's standard dummy  simply dummy text. Thanks a lot for such great features, pages, shortcodes and home variations. Incredible Job. And the best of all, great introductions Thanks a lot for such great features, pages, shortcodes and home variations. Incredible Job. And the best of all, great introductions</p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial-1 testimonial-bg">
                            <div class="testimonial-pic  radius shadow"><img src="{{asset('jaz/images/testimonials/pic2.jpg')}}" width="100" height="100" alt=""></div>
                            <div class="testimonial-detail">
                                <strong class="testimonial-name">Steve Jobs</strong>
                                <span class="testimonial-position">Cfo Loop Inc</span>
                            </div>
                            <div class="testimonial-text">
                                <p> Excellent Customer support!.The template itself is very extended. simply dummy text of the printing and industry. Lorem Ipsum has been the industry's standard dummy  simply dummy text. Thanks a lot for such great features, pages, shortcodes and home variations. Incredible Job. And the best of all, great introductions Thanks a lot for such great features, pages, shortcodes and home variations. Incredible Job. And the best of all, great introductions</p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial-1 testimonial-bg">
                            <div class="testimonial-pic  radius shadow"><img src="{{asset('jaz/images/testimonials/pic3.jpg')}}" width="100" height="100" alt=""></div>
                            <div class="testimonial-detail">
                                <strong class="testimonial-name">Steve Jobs</strong>
                                <span class="testimonial-position">Cfo Loop Inc</span>
                            </div>
                            <div class="testimonial-text">
                                <p> Excellent Customer support!.The template itself is very extended. simply dummy text of the printing and industry. Lorem Ipsum has been the industry's standard dummy  simply dummy text. Thanks a lot for such great features, pages, shortcodes and home variations. Incredible Job. And the best of all, great introductions Thanks a lot for such great features, pages, shortcodes and home variations. Incredible Job. And the best of all, great introductions</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    --}}
    <!-- TESTIMONIAL SECTION START -->

        <!-- LATEST BLOG SECTION START -->

        <!-- LATEST BLOG SECTION END -->


        <!-- OUR TEAM MEMBER SECTION START -->
        <div class="section-full text-center wt-our-team bg-white p-tb80 bg-no-repeat bg-bottom-center" style="background-image:url({{asset('jaz/images/background/bg-8.jpg')}});">
            <div class="container">

                <!-- TITTLE START -->
                <div class="section-head text-center">
                    <h2 class="text-uppercase">Our team</h2>
                    <div class="wt-separator-outer">
                        <div class="wt-separator style-square">
                            <span class="separator-left bg-primary"></span>
                            <span class="separator-right bg-primary"></span>
                        </div>
                    </div>
                    <p>{{$abouts->name}}.</p>
                </div>
                <!-- TITLE END -->

                <div class="section-content">
                    <div class="row">

                        @foreach($teams as $team)
                        <!-- COLUMNS 1 -->
                        <div class="col-md-4 col-sm-4  m-tb15">
                            <div class="wt-team-one bg-white wow wobble">
                                <div class="wt-team-media">
                                    <a href="javascript:void(0);"><img src="{{$team->image}}" class="" alt=""></a>
                                </div>
                                <div class="wt-team-info text-center bg-white p-a10">
                                    <h4 class="wt-team-title"><a href="javascript:void(0);">{{$team->name}}</a></h4>
                                    <p>{{$team->job}}</p>
                                    <ul class="social-icons social-square social-dark">
                                        <li><a href="{{$team->facebook}}" target="_blank" class="fa fa-facebook"></a></li>
                                        <li><a href="{{$team->twitter}}" target="_blank" class="fa fa-twitter"></a></li>
                                        <li><a href="{{$team->linkedin}}" target="_blank" class="fa fa-linkedin"></a></li>
                                        {{--<li><a href="{{$team->youtube}}" target="_blank" class="fa fa-rss"></a></li>--}}
                                        <li><a href="{{$team->youtube}}" target="_blank" class="fa fa-youtube"></a></li>
                                        <li><a href="{{$team->instgram}}" target="_blank" class="fa fa-instagram"></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>

            </div>
        </div>
        <!-- OUR TEAM MEMBER SECTION END -->

        <!-- OUR CLIENT SLIDER START -->
        <div class="section-full overlay-wraper bg-cover bg-repeat-x bg-primary" style="background-image:url({{asset('jaz/images/background/bg7.png')}})">
            <div class="container">

                <!-- IMAGE CAROUSEL START -->
                <div class="section-content">
                    <div class="owl-carousel home4-logo-carousel">

                        @foreach($parteners as $partener)
                        <!-- COLUMNS 1 -->
                        <div class="item">
                            <div class="ow-client-logo">
                                <div class="client-logo wt-img-effect on-color">
                                    <a href="{{$partener->link}}"><img src="{{$partener->image}}" alt=""></a>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
                <!-- IMAGE CAROUSEL START -->
            </div>

        </div>
        <!-- OUR CLIENT SLIDER END -->

        <!-- OUR CLIENT SLIDER START -->
    {{--
    <div class="section-full overlay-wraper bg-cover bg-repeat-x bg-primary" style="background-image:url({{asset('jaz/images/background/bg7.png')}})">
        <div class="container">

            <!-- IMAGE CAROUSEL START -->
            <div class="section-content">
                <div class="owl-carousel home4-logo-carousel">

                    <!-- COLUMNS 1 -->
                    <div class="item">
                        <div class="ow-client-logo">
                            <div class="client-logo wt-img-effect on-color">
                                <a href="#"><img src="{{asset('jaz/images/client-logo/w1.png')}}" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <!-- COLUMNS 2 -->
                    <div class="item">
                        <div class="ow-client-logo">
                            <div class="client-logo wt-img-effect on-color">
                                <a href="#"><img src="{{asset('jaz/images/client-logo/w2.png')}}" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <!-- COLUMNS 3 -->
                    <div class="item">
                        <div class="ow-client-logo">
                            <div class="client-logo wt-img-effect on-color">
                                <a href="#"><img src="{{asset('jaz/images/client-logo/w3.png')}}" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <!-- COLUMNS 4 -->
                    <div class="item">
                        <div class="ow-client-logo">
                            <div class="client-logo wt-img-effect on-color">
                                <a href="#"><img src="{{asset('jaz/images/client-logo/w4.png')}}" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <!-- COLUMNS 5 -->
                    <div class="item">
                        <div class="ow-client-logo">
                            <div class="client-logo wt-img-effect on-color">
                                <a href="#"><img src="{{asset('jaz/images/client-logo/w5.png')}}" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <!-- COLUMNS 6 -->
                    <div class="item">
                        <div class="ow-client-logo">
                            <div class="client-logo wt-img-effect on-color">
                                <a href="#"><img src="{{asset('jaz/images/client-logo/w6.png')}}" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <!-- COLUMNS 7 -->
                    <div class="item">
                        <div class="ow-client-logo">
                            <div class="client-logo wt-img-effect on-color">
                                <a href="#"><img src="{{asset('jaz/images/client-logo/w1.png')}}" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <!-- COLUMNS 8 -->
                    <div class="item">
                        <div class="ow-client-logo">
                            <div class="client-logo wt-img-effect on-color">
                                <a href="#"><img src="{{asset('jaz/images/client-logo/w2.png')}}" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <!-- COLUMNS 9 -->
                    <div class="item">
                        <div class="ow-client-logo">
                            <div class="client-logo wt-img-effect on-color">
                                <a href="#"><img src="{{asset('jaz/images/client-logo/w3.png')}}" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <!-- COLUMNS 10 -->
                    <div class="item">
                        <div class="ow-client-logo">
                            <div class="client-logo wt-img-effect on-color">
                                <a href="#"><img src="{{asset('jaz/images/client-logo/w4.png')}}" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <!-- COLUMNS 11 -->
                    <div class="item">
                        <div class="ow-client-logo">
                            <div class="client-logo wt-img-effect on-color">
                                <a href="#"><img src="{{asset('jaz/images/client-logo/w5.png')}}" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <!-- COLUMNS 12 -->
                    <div class="item">
                        <div class="ow-client-logo">
                            <div class="client-logo wt-img-effect on-color">
                                <a href="#"><img src="{{asset('jaz/images/client-logo/w6.png')}}" alt=""></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- IMAGE CAROUSEL START -->
        </div>

    </div>
    --}}
    <!-- OUR CLIENT SLIDER END -->

    </div>
    <!-- CONTENT END -->

@endsection
