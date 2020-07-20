@extends('web.index')
@section('content')

    <!-- CONTENT START -->
    <div class="page-content">


        <!-- INNER PAGE BANNER END -->


        <!-- SECTION CONTENT START -->
        <div class="section-full p-t40 p-b50">
            <div class="container">

                <!-- BLOG START -->
                <div class="blog-post date-style-3 blog-post-single">
                    {{--<div class=" company-logo">
                        <a href="javascript:void(0);"><img src="{{asset("jaz/images/company.png")}}" alt="" class="company-logo"></a>
                    </div>--}}
                    <div class="post-description-area p-t30">
                        {{--<div class="wt-post-title center2 ">
                            <h1 class="post-title "><a href="javascript:void(0);">Company name </a></h1>
                        </div>
                        <div class="rating-bx center2">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>

                        <div class="wt-post-text wow bounceInUp text-right2" data-wow-duration="2s">
                            <p>Asperiores, tenetur, blanditiis, quaerat odit ex exercitationem pariatur quibusdam veritatis quisquam laboriosam esse beatae hic perferendis velit deserunt soluta iste repellendus officia in neque veniam debitis Consectetur, Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium vitae, consequuntur minima tempora cupiditate ratione est, ad molestias deserunt in ipsam ea quasi cum culpa adipisci dolores voluptatum fuga at! assumenda provident lorem ipsum dolor sit amet, consectetur. Asperiores, tenetur, blanditiis, quaerat odit ex exercitationem pariatur quibusdam veritatis quisquam laboriosam esse beatae hic perferendis velit deserunt soluta iste repellendus officia in neque veniam debitis Consectetur, Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium vitae, consequuntur minima tempora cupiditate ratione est, ad molestias deserunt in ipsam ea quasi cum culpa adipisci dolores voluptatum fuga at! assumenda provident lorem ipsum dolor sit amet, consectetur.Asperiores, tenetur, blanditiis, quaerat odit ex exercitationem pariatur quibusdam veritatis quisquam laboriosam esse beatae hic perferendis velit deserunt soluta iste repellendus officia in neque veniam debitis Consectetur, Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium vitae, consequuntur minima tempora cupiditate ratione est, ad molestias deserunt in ipsam ea quasi cum culpa adipisci dolores voluptatum fuga at! assumenda provident lorem ipsum dolor sit amet, consectetur.Asperiores, tenetur, blanditiis, quaerat odit ex exercitationem pariatur quibusdam veritatis quisquam laboriosam esse beatae hic perferendis velit deserunt soluta iste repellendus officia in neque veniam debitis Consectetur, Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium vitae, consequuntur minima tempora cupiditate ratione est, ad molestias deserunt in ipsam ea quasi cum culpa adipisci dolores voluptatum fuga at! assumenda provident lorem ipsum dolor sit amet, consectetur.</p>

                        </div>--}}
                        {{--<div class="wt-divider divider-2px bg-primary  text-primary icon-left"></div>--}}
                        <div class="p-b10">
                            <h2 class="text-uppercase">{{__('web.cars')}} {{-- Details--}}</h2>
                            <div class="wt-divider divider-2px bg-primary  text-primary icon-left"></div>
                            <div class="wt-divider divider-2px bg-primary  text-primary icon-left"></div>
                            {{--<div class="wt-separator-outer  m-b30">
                                <div class="wt-separator style-square">
                                    <span class="separator-left bg-primary"></span>
                                    <span class="separator-right bg-primary"></span>
                                </div>
                            </div>--}}
                        </div>
                        @foreach($third_cats as $third_cat)
                            <div class="{{--wt-post-media--}} wt-img-effect wow bounceInLeft" data-wow-duration="2s" style="width:200px; height:200px">
                                <a href="javascript:void(0);"><img src="{{$third_cat->image}}" alt=""></a>
                            </div>
                            <div class="post-description-area p-t30">
                                <div class="wt-post-title  ">
                                    <h3 class="post-title text-right2"><a href="javascript:void(0);">
                                            {{$third_cat->en_name}}
                                        </a></h3>
                                    <h2 class="m-tb10 text-right2">{{$third_cat->price}} / {{__('web.hour')}}</h2>
                                </div>


                                <div class="wt-post-text text-right2">
                                    <p>{{$third_cat->description == "" ? __('web.noDes') : $third_cat->description}}</p>


                                </div>

                                    {{--@csrf--}}
                                {{--<a href="{{asset('/')}}" >--}}

                                    <form role="form" id="" method="get" class="form-horizontal mb-lg" action="{{URL::to('/choose-choice')}}/{{$third_cat->id}}" >
                                        <!--<input type="hidden" name="send" value="{{$third_cat->id}}">-->
                                        <button class="site-button  m-r15 " type="submit">
                                            {{__('web.select')}}  <i class="fas fa-check"></i>
                                        </button>
                                    </form>

                                {{--</a>--}}

                                {{--<a href="{{asset('/')}}" >
                                <button class="site-button  m-r15" type="button">
                                        cancel <i class="fas fa-times"></i>
                                </button>
                                </a>--}}
                            </div>
                            <div class="wt-divider divider-2px bg-primary  text-primary icon-left"></div>
                        @endforeach
                    </div>



                    <!-- BLOG END -->

                </div>
            </div>
            <!-- SECTION CONTENT END -->

        </div>
        <!-- CONTENT END -->

        <!-- FOOTER START -->
        <footer class="site-footer footer-dark">
            <!-- FOOTER BLOCKES START -->
            <div class="footer-top overlay-wraper">
                <div class="overlay-main"></div>
                <div class="container">
                    <div class="row">
                        <!-- ABOUT COMPANY -->
                        <div class="col-md-3 col-sm-6">
                            <div class="widget widget_about">
                                <h4 class="widget-title">About Company</h4>
                                <div class="logo-footer clearfix p-b15">
                                    <a href="index.html"><img src="{{asset("jaz/images/footer-logo.png")}}" width="230" height="67" alt=""/></a>
                                </div>
                                <p>Thewebmax ipsum dolor sit amet, consectetuer adipiscing elit,
                                    sed diam nonummy nibh euismod tincidunt ut laoreet dolore agna aliquam erat .
                                    wisi enim ad minim veniam, quis tation. sit amet, consec tetuer.
                                    ipsum dolor sit amet, consectetuer adipiscing.ipsum dolor sit .
                                </p>
                            </div>
                        </div>
                        <!-- RESENT POST -->
                        <div class="col-md-3 col-sm-6">
                            <div class="widget widget_services">
                                <h4 class="widget-title">Quick Links</h4>
                                <ul>
                                    <li><a href="about-us.html">About</a></li>
                                    <li><a href="suggest.html">Suggestion</a></li>
                                    <li><a href="#">Career</a></li>
                                    <li><a href="#">Our Team</a></li>
                                    <li><a href="categories.html">Services</a></li>
                                    <li><a href="#">Gallery</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- USEFUL LINKS -->
                        <div class="col-md-3 col-sm-6">
                            <div class="widget widget_services">
                                <h4 class="widget-title">Useful links</h4>
                                <ul>
                                    <li><a href="about-us.html">About</a></li>
                                    <li><a href="suggest.html">Suggestion</a></li>
                                    <li><a href="#">Career</a></li>
                                    <li><a href="#">Our Team</a></li>
                                    <li><a href="categories.html">Services</a></li>
                                    <li><a href="#">Gallery</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- NEWSLETTER -->
                        <div class="col-md-3 col-sm-6">
                            <div class="widget widget_newsletter">
                                <h4 class="widget-title">Newsletter</h4>
                                <div class="newsletter-bx">
                                    <form role="search" method="post">
                                        <div class="input-group">
                                            <input name="news-letter" class="form-control" placeholder="ENTER YOUR EMAIL" type="text">
                                            <span class="input-group-btn">
                                            <button type="submit" class="site-button"><i class="fa fa-paper-plane-o"></i></button>
                                        </span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- SOCIAL LINKS -->
                            <div class="widget widget_social_inks">
                                <h4 class="widget-title">Social Links</h4>
                                <ul class="social-icons social-square social-darkest">
                                    <li><a href="javascript:void(0);" class="fa fa-facebook"></a></li>
                                    <li><a href="javascript:void(0);" class="fa fa-twitter"></a></li>
                                    <li><a href="javascript:void(0);" class="fa fa-linkedin"></a></li>
                                    <li><a href="javascript:void(0);" class="fa fa-rss"></a></li>
                                    <li><a href="javascript:void(0);" class="fa fa-youtube"></a></li>
                                    <li><a href="javascript:void(0);" class="fa fa-instagram"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-3 col-sm-6  p-tb20">
                            <div class="wt-icon-box-wraper left  bdr-1 bdr-gray-dark p-tb15 p-lr10 clearfix">
                                <div class="icon-md text-primary">
                                    <span class="iconmoon-travel"></span>
                                </div>
                                <div class="icon-content">
                                    <h5 class="wt-tilte text-uppercase m-b0">Address</h5>
                                    <p>No.123 Chalingt Gates, Supper market New York</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6  p-tb20 ">
                            <div class="wt-icon-box-wraper left  bdr-1 bdr-gray-dark p-tb15 p-lr10 clearfix ">
                                <div class="icon-md text-primary">
                                    <span class="iconmoon-smartphone-1"></span>
                                </div>
                                <div class="icon-content">
                                    <h5 class="wt-tilte text-uppercase m-b0">Phone</h5>
                                    <p class="m-b0">+41 555 888 9585</p>
                                    <p>+41 555 888 9585</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6  p-tb20">
                            <div class="wt-icon-box-wraper left  bdr-1 bdr-gray-dark p-tb15 p-lr10 clearfix">
                                <div class="icon-md text-primary">
                                    <span class="iconmoon-fax"></span>
                                </div>
                                <div class="icon-content">
                                    <h5 class="wt-tilte text-uppercase m-b0">Fax</h5>
                                    <p class="m-b0">FAX: (123) 123-4567</p>
                                    <p>FAX: (123) 123-4567</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 p-tb20">
                            <div class="wt-icon-box-wraper left  bdr-1 bdr-gray-dark p-tb15 p-lr10 clearfix">
                                <div class="icon-md text-primary">
                                    <span class="iconmoon-email"></span>
                                </div>
                                <div class="icon-content">
                                    <h5 class="wt-tilte text-uppercase m-b0">Email</h5>
                                    <p class="m-b0">info@demo.com</p>
                                    <p>info@demo1234.com</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- FOOTER COPYRIGHT -->
            <div class="footer-bottom overlay-wraper">
                <div class="overlay-main"></div>
                <div class="constrot-strip wow shake"></div>
                <div class="container p-t30">
                    <div class="row">
                        <div class="wt-footer-bot-left wow shake">
                            <span class="copyrights-text">© 2017 Your Company. All Rights Reserved<a href="http://2grand.net/"><img src="{{asset("jaz/images/grand.png")}}" class="grand"></a></span>
                        </div>
                        <div class="wt-footer-bot-right">
                            <ul class="copyrights-nav pull-right">
                                <li><a href="terms-condition.html">Terms  & Condition</a></li>
                                <li><a href="terms-condition.html">Privacy Policy</a></li>
                                <li><a href="contact-us.html">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- FOOTER END -->

        <!-- BUTTON TOP START -->
        <button class="scroltop"><span class=" iconmoon-house relative" id="btn-vibrate"></span>Top</button>

    </div>

@endsection
