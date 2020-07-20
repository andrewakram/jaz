



    <!DOCTYPE html>

<html lang="en">

<head>

    <!-- META -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />
    <meta name="description" content="" />

    <!-- FAVICONS ICON -->
    <link rel="icon" href="{{asset('jaz/images/favicon.ico')}}" type="image/x-icon" />
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('jaz/images/favicon.png')}}" />

    <!-- PAGE TITLE HERE -->
    <title>Jaz website </title>

    <!-- MOBILE SPECIFIC -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

<!-- [if lt IE 9]>
    <script src="{{asset('jaz/js/html5shiv.min.js')}}"></script>
    <script src="{{asset('jaz/js/respond.min.js')}}"></script>
    <![endif] -->
    <script>


    </script>

    {{--in register--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('jaz/css/all.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- BOOTSTRAP STYLE SHEET -->
    <!--    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">-->
    <!--    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">-->
    @if(Session::get("lang") == 'en')
        <link rel="stylesheet" type="text/css" href="{{asset('jaz/css/bootstrap.min.css')}}">
    @else
        <link rel="stylesheet" type="text/css" href="{{asset('jaz/css/bootstrap.min-rtl.css')}}">
    @endif


    {{--order-form--}}
    <link rel="stylesheet" type="text/css" href="{{asset('jaz/dist/bootstrap-clockpicker.min.css')}}">


    <!-- FONTAWESOME STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="{{asset('jaz/css/fontawesome/css/font-awesome.min.css')}}" />
    <!-- FLATICON STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="{{asset('jaz/css/flaticon.min.css')}}">
    <!-- ANIMATE STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="{{asset('jaz/css/animate.min.css')}}">
    <!-- OWL CAROUSEL STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="{{asset('jaz/css/owl.carousel.min.css')}}">
    <!-- BOOTSTRAP SELECT BOX STYLE SHEET -->
    @if(Session::get("lang") == 'en')
        <link rel="stylesheet" type="text/css" href="{{asset('jaz/css/bootstrap-select.min.css')}}">
    @else
        <link rel="stylesheet" type="text/css" href="{{asset('jaz/css/bootstrap-select.min-rtl.css')}}">
    @endif

<!-- MAGNIFIC POPUP STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="{{asset('jaz/css/magnific-popup.min.css')}}">
    <!-- LOADER STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="{{asset('jaz/css/loader.min.css')}}">
    <!-- MAIN STYLE SHEET -->
    <!--    <link rel="stylesheet" type="text/css" href="css/style.css">-->
    <!--     <link rel="stylesheet" type="text/css" href="css/style.css">-->
    @if(Session::get("lang") == 'en')
        <link rel="stylesheet" type="text/css" href="{{asset('jaz/css/style.css')}}">
    @else
        <link rel="stylesheet" type="text/css" href="{{asset('jaz/css/style-rtl.css')}}">
    @endif



    {{--in register--}}
    {{--<link rel="stylesheet" type="text/css" href="{{asset('jaz/css/style2.css')}}">--}}


<!-- THEME COLOR CHANGE STYLE SHEET -->
    <link rel="stylesheet" class="skin" type="text/css" href="{{asset('jaz/css/skin/skin-12.css')}}">
    <!-- CUSTOM  STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="{{asset('jaz/css/custom.css')}}">
    <!-- SIDE SWITCHER STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="{{asset('jaz/css/switcher.css')}}">

    {{--order-form--}}
    <link rel="stylesheet" type="text/css" href="{{asset('jaz/css/filepond.css')}}">


    <!-- REVOLUTION SLIDER CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('jaz/plugins/revolution/revolution/css/settings.css')}}">
    <!-- REVOLUTION NAVIGATION STYLE -->
    <link rel="stylesheet" type="text/css" href="{{asset('jaz/plugins/revolution/revolution/css/navigation.css')}}">

    {{--<link rel="stylesheet" type="text/css" href="{{asset('jaz/css/style-form.css')}}">--}}
    @yield("styleForm")

<!-- GOOGLE FONTS -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,300italic,400italic,500,500italic,700,700italic,900italic,900' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,800italic,800,700italic' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Crete+Round:400,400i&amp;subset=latin-ext" rel="stylesheet">


    {{--order-form--}}
    <script type="text/javascript" src="{{asset('jaz/js/filepond.js')}}"></script>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/css/bootstrap-datepicker.min.css'>


    <style>
        .mainCat {
            cursor: pointer;
        }
        .footer-dark .footer-top .widget_newsletter .form-control {
            margin: 0px;
        }
    </style>
    <style>
        @font-face {
            font-family: 'din';
            src: url({{asset('din.otf')}}) format('opentype');
        }
        body,h1,h2,h3,h4,h5,h6,* {
            font-family: 'din';
        }
    </style>
</head>

<body id="bg" >
<div class="loading-area">
    <div class="loading-box"></div>
    <div class="loading-pic">
        <div class="loader">
            <span class="block-1"></span>
            <span class="block-2"></span>
            <span class="block-3"></span>
            <span class="block-4"></span>
            <span class="block-5"></span>
            <span class="block-6"></span>
            <span class="block-7"></span>
            <span class="block-8"></span>
            <span class="block-9"></span>
            <span class="block-10"></span>
            <span class="block-11"></span>
            <span class="block-12"></span>
            <span class="block-13"></span>
            <span class="block-14"></span>
            <span class="block-15"></span>
            <span class="block-16"></span>
        </div>
    </div>
</div>
<div class="page-wraper">

    <!-- HEADER START -->
    <header class="site-header header-style-6">

        <div class="top-bar bg-primary">
            <div class="container">
                <div class="row">
                    <div class="clearfix">
                        <div class="wt-topbar-left">
                            <ul class="list-unstyled e-p-bx pull-left">
                                <li><i class="fa fa-envelope"></i><a href="mailto:Info@jaz.com.sa">Info@jaz.com.sa</a></li>
                                <li><i class="fa fa-phone"></i><a href="tel:(966) 500 599 167">(966) 500 599 167</a></li>
                            </ul>
                        </div>

                        <div class="wt-topbar-right">
                            <ul class="list-unstyled e-p-bx pull-right">

                                <li>
                                    <a href="{{asset('/changeLanguagee/'.Session::get('lang'))}}">
                                        <i class="fa fa-globe"></i>
                                        {{__('web.lang')}}
                                    </a>
                                </li>

                                @if(Session::get('u_phone') != "")
                                    <li><b>{{Session::get('u_name')}}</b> - <b>{{Session::get('u_phone')}}</b> - <b>{{Session::get('u_email')}}</b></li>

                                    <li><a href="{{asset('/edit-profile')}}" ><i class="fa fa-user"></i>{{__('web.profile')}}</a></li>
                                    <li><a href="{{asset('/log-out')}}" ><i class="fa fa-sign-in"></i>{{__('web.logout')}}</a></li>

                                @else
                                    <li><a href="{{asset('/log-in')}}" ><i class="fa fa-user"></i>{{__('web.login')}}</a></li>
                                    <li><a href="{{asset('/webregister')}}"><i class="fa fa-sign-in"></i>{{__('web.register')}}</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Search Link -->

        <div class="main-bar header-middle bg-white">
            <div class="container">
                <div class="logo-header wow zoomIn">
                    <a href="{{asset("/")}}">
                        <img src="{{asset('jaz/images/logo-12.png')}}" width="216" height="37" alt="" />
                    </a>
                </div>
                <div class="header-info">
                    <ul>
                        <li>
                            <div>
                                <div class="icon-sm">
                                    <span class="icon-cell  text-primary"><i class="flaticon-placeholder"></i></span>
                                </div>
                                <div class="icon-content text-right2">
                                    <strong>{{__('web.ourLocation')}} </strong>
                                    <span>3101</span><span> شارع الأمير محمد بن عبد العزيز</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div>
                                <div class="icon-sm">
                                    <span class="icon-cell  text-primary"><i class="flaticon-smartphone"></i></span>
                                </div>
                                <div class="icon-content text-right2">
                                    <strong>{{__('web.ourPhone')}}</strong>
                                    <span>+966 500 599 167</span>
                                </div>
                            </div>
                        </li>
                        <li class="btn-col-last">
                            <a href="https://play.google.com/store/apps/details?id=grand.jazzworker&hl=en" target="_blank" class="site-button text-uppercase radius-sm font-weight-700">{{__('web.provideService')}}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="sticky-header main-bar-wraper">
            <div class="main-bar header-botton nav-bg-secondry">
                <div class="container">
                    <!-- NAV Toggle Button -->
                    <button data-target=".header-nav" data-toggle="collapse" type="button" class="navbar-toggle collapsed">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- ETRA Nav -->
                    <div class="extra-nav">
                        <div class="extra-cell" style="display: none">
                            <a href="#search" class="site-search-btn"><i class="fa fa-search"></i></a>
                        </div>
                        <div class="extra-cell">
                            <a href="javascript:;" class="wt-cart cart-btn" title="{{__('web.cart')}}">
                                    <span class="link-inner">
                                        <span class="woo-cart-total"> </span>
                                        <span class="woo-cart-count">

                                            <span class="shopping-bag wcmenucart-count ">
                                                ?
                                            </span>
                                        </span>
                                    </span>
                            </a>

                            <div class="cart-dropdown-item-wraper clearfix">
                                <div class="nav-cart-content">

                                    <div class="nav-cart-items p-a15" style="overflow-y: scroll; height:auto; max-height:350px">


                                        {{-- [cart] = active requests that the user doesn't show it --}}
                                        {{--@if(sizeof(Session::get("active_orders_in_cart")) > 0)
                                            @foreach(Session::get("active_orders_in_cart") as $item)
                                                <div class="nav-cart-item clearfix" id="myCart{{$item->id}}">
                                                    <div class="nav-cart-item-image">
                                                        <a href="{{asset("/companies/".$item->id)}}"><img src="{{$item->image}}" alt="{{$item->en_name}}" myCart-order="{{$item->id}}" class="myCartViewOrder"></a>
                                                    </div>
                                                    <div class="nav-cart-item-desc" >
                                                        <a href="{{asset("/companies/".$item->id)}}"  myCart-order="{{$item->id}}" class="myCartViewOrder">{{__('web.newOffers')}}</a><br>
                                                        <a href="{{asset("/companies/".$item->id)}}"  myCart-order="{{$item->id}}" class="myCartViewOrder">{{__('web.yourOrderNum')}}. : {{$item->id}}</a>
                                                        <a href="{{asset("/companies/".$item->id)}}"  myCart-order="{{$item->id}}" class="myCartViewOrder"> <span class="nav-cart-item-price"> {{$item->applied_worker}} {{__('web.cayo')}}}</span></a>
                                                        <a href="" class="nav-cart-item-quantity myCart" myCart-remove-order="{{$item->id}}">x</a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="nav-cart-item clearfix" >
                                                {{__('web.noNewOrder')}}
                                            </div>
                                        @endif--}}


                                        {{--<div class="nav-cart-item clearfix">
                                            <div class="nav-cart-item-image">
                                                <a href="#"><img src="{{asset('jaz/images/cart/pic-1.jpg')}}" alt="p-1"></a>
                                            </div>
                                            <div class="nav-cart-item-desc">
                                                <a href="#">New Offers</a>
                                                <a href="#"> <span class="nav-cart-item-price"> 10 companies accept your order</span></a>
                                                <a href="#" class="nav-cart-item-quantity">x</a>
                                            </div>
                                        </div>
                                        <div class="nav-cart-item clearfix">
                                            <div class="nav-cart-item-image">
                                                <a href="#"><img src="{{asset('jaz/images/cart/pic-2.jpg')}}" alt="p-2"></a>
                                            </div>
                                            <div class="nav-cart-item-desc">
                                                <a href="#">New Offers</a>
                                                <a href="#">  <span class="nav-cart-item-price">10 companies accept your order</span></a>
                                                <a href="#" class="nav-cart-item-quantity">x</a>
                                            </div>
                                        </div>
                                        <div class="nav-cart-item clearfix">
                                            <div class="nav-cart-item-image">
                                                <a href="#"><img src="{{asset('jaz/images/cart/pic-3.jpg')}}" alt="p-1"></a>
                                            </div>
                                            <div class="nav-cart-item-desc">
                                                <a href="#">New Offers</a>
                                                <a href="#">   <span class="nav-cart-item-price"> 10 companies accept your order</span></a>
                                                <a href="#" class="nav-cart-item-quantity">x</a>
                                            </div>
                                        </div>
                                        <div class="nav-cart-item clearfix">
                                            <div class="nav-cart-item-image">
                                                <a href="#"><img src="{{asset('jaz/images/cart/pic-4.jpg')}}" alt="p-2"></a>
                                            </div>
                                            <div class="nav-cart-item-desc">
                                                <a href="#">New Offers</a>
                                                <a href="#"><span class="nav-cart-item-price"> 10 companies accept your order</span></a>
                                                <a href="#" class="nav-cart-item-quantity">x</a>
                                            </div>
                                        </div>--}}
                                    </div>


                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- SITE Search -->
                    <div id="search">
                        <span class="close"></span>
                        <form role="search" id="searchform" action="https://thewebmax.com/search" method="get" class="radius-xl">
                            <div class="input-group rtl">
                                <input value="" name="q" type="search" placeholder="Type to search"/>
                                <span class="input-group-btn"><button type="button" class="search-btn"><i class="fa fa-search"></i></button></span>
                            </div>
                        </form>
                    </div>

                {{--@if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif--}}

                <!-- MAIN Nav -->
                    <div class="header-nav navbar-collapse collapse ">
                        <ul class=" nav navbar-nav">
                            <li class="active">
                                <a href="{{asset('/')}}">{{__('web.home')}}</a>

                            </li>

                            <li>
                                <a href="{{asset('/about-us')}}">{{__('web.aboutJaz')}}</a>


                            </li>

                            <li>
                                <a href="{{asset('/active-requests')}}">{{__('web.myOrders')}}</a>

                            </li>

                            <li>
                                <a href="{{asset('/acceptedcompanies')}}">{{__('web.companies')}}</a>

                            </li>

                            <li class="submenu-direction">
                                <a href="{{asset('/terms-condition')}}">{{__('web.terms')}}</a>

                            </li>

                            <li class="has-mega-menu ">
                                <a href="{{asset('/contact-us')}}">{{__('web.contactUs')}}</a>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </header>
    <!-- HEADER END -->


{{--@section('content')--}}

    <!-- CONTENT START -->
    <div class="page-content">



        <!-- SECTION CONTENT START -->
        <div class="section-full p-t80 p-b50">
            <div class="container">
                <div class="section-content">
                    <div class="row">

                        <div class="col-lg-8 col-md-6 col-sm-6">
                            <div class="page-notfound text-center">
                                <form method="post">
                                    <strong class="text-uppercase">Error</strong>
                                    <strong>4<i class="fa fa-frown-o text-primary"></i>4</strong>
                                    <span>Page not found</span>
                                    <a href="{{asset('/en')}}" class="site-button ">GO TO HOME  <i class="fa fa-angle-double-right"></i></a>
                                </form>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="page-notfound-left text-center bg-gray">
                                <div class="constrot-strip"></div>
                                <span class="flaticon-plumber-working"></span>
                                <div class="constrot-strip"></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- SECTION CONTENT END -->

    </div>
    <!-- CONTENT END -->

{{--@endsection--}}


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
                            <h4 class="widget-title">{{__('web.aboutCompany')}}</h4>
                            <div class="logo-footer clearfix p-b15">
                                <a href="{{asset('/')}}"><img src="{{asset('jaz/images/footer-logo.png')}}" width="230" height="67" alt=""/></a>
                            </div>
                            <p>
                                {{Session::get("about")}}.
                            </p>
                        </div>
                    </div>
                    <!-- RESENT POST -->
                    <div class="col-md-3 col-sm-6">
                        <div class="widget widget_services">
                            <h4 class="widget-title">{{__('web.quickLinks')}}</h4>
                            <ul>
                                <li><a href="{{asset('/about-us')}}">{{__('web.aboutJaz')}}</a></li>
                                <li><a href="{{asset('/suggestion')}}">{{__('web.suggestion')}}</a></li>
                                {{--<li><a href="{{asset('/')}}">Career</a></li>
                                <li><a href="{{asset('/')}}">Our Team</a></li>--}}
                                <li><a href="{{asset('/#makeOrderFromHere')}}">{{__('web.services')}}</a></li>
                                <li><a href="{{asset('/#jazGallery')}}">{{__('web.gallery')}}</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- USEFUL LINKS -->
                    <div class="col-md-3 col-sm-6">
                        <div class="widget widget_services">
                            <h4 class="widget-title">{{__('web.usefulLinks')}}</h4>
                            <ul>
                                <li><a href="{{asset('/about-us')}}">{{__('web.aboutJaz')}}</a></li>
                                <li><a href="{{asset('/suggestion')}}">{{__('web.suggestion')}}</a></li>
                                {{--<li><a href="{{asset('/')}}">Career</a></li>
                                <li><a href="{{asset('/')}}">Our Team</a></li>--}}
                                <li><a href="{{asset('/#makeOrderFromHere')}}">{{__('web.services')}}</a></li>
                                <li><a href="{{asset('/#jazGallery')}}">{{__('web.gallery')}}</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- NEWSLETTER -->
                    <div class="col-md-3 col-sm-6">
                        <div class="widget widget_newsletter">
                            <h4 class="widget-title">Newsletter</h4>
                            <div class="newsletter-bx">
                                <form  method="post" enctype="multipart/form-data" action="{{url('/send-newsletter')}}">
                                    {{csrf_field()}}
                                    <div class="input-group">
                                        <input name="newsletter" class="form-control" placeholder="{{trans("admin.email")}}" type="text">
                                        <span class="input-group-btn">
                                            <button type="submit" class="site-button"><i class="fa fa-paper-plane-o"></i></button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- SOCIAL LINKS -->
                        <div class="widget widget_social_inks">
                            <h4 class="widget-title">{{__('web.socialLinks')}}</h4>
                            <ul class="social-icons social-square social-darkest">
                                <li><a target="_blank" href="https://www.facebook.com/jazappksa" class="fa fa-facebook"></a></li>
                                <li><a target="_blank" href="https://tweetsrepeat.info/JAzAPPKSA" class="fa fa-twitter"></a></li>
                                {{--<li><a target="_blank" href="javascript:void(0);" class="fa fa-linkedin"></a></li>
                                <li><a target="_blank" href="javascript:void(0);" class="fa fa-rss"></a></li>
                                <li><a target="_blank" href="javascript:void(0);" class="fa fa-youtube"></a></li>
                                <li><a target="_blank" href="javascript:void(0);" class="fa fa-instagram"></a></li>--}}
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-4 col-sm-6  p-tb20">
                        <div class="wt-icon-box-wraper left  bdr-1 bdr-gray-dark p-tb15 p-lr10 clearfix">
                            <div class="icon-md text-primary">
                                <span class="iconmoon-travel"></span>
                            </div>
                            <div class="icon-content">
                                <h5 class="wt-tilte text-uppercase m-b0">{{__('web.address')}}</h5>
                                <p>3101 شارع الأمير محمد بن عبد العزيز</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6  p-tb20 ">
                        <div class="wt-icon-box-wraper left  bdr-1 bdr-gray-dark p-tb15 p-lr10 clearfix ">
                            <div class="icon-md text-primary">
                                <span class="iconmoon-smartphone-1"></span>
                            </div>
                            <div class="icon-content">
                                <h5 class="wt-tilte text-uppercase m-b0">{{__('web.ourPhone')}}</h5>
                                <p class="m-b0">+966 500 599 167</p>
                                {{--<p>+41 555 888 9585</p>--}}
                            </div>
                        </div>
                    </div>
                    {{--<div class="col-md-3 col-sm-6  p-tb20">
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
                    </div>--}}
                    <div class="col-md-4 col-sm-6 p-tb20">
                        <div class="wt-icon-box-wraper left  bdr-1 bdr-gray-dark p-tb15 p-lr10 clearfix">
                            <div class="icon-md text-primary">
                                <span class="iconmoon-email"></span>
                            </div>
                            <div class="icon-content">
                                <h5 class="wt-tilte text-uppercase m-b0">{{__('web.email')}}</h5>
                                <p class="m-b0">Info@jaz.com.sa</p>
                                {{--<p>info@demo1234.com</p>--}}
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
                        <span class="copyrights-text">{{__('web.rights')}}<a href="https://2grand.net/"><img src="{{asset('jaz/images/grand.png')}}" class="grand"></a></span>
                    </div>
                    <div class="wt-footer-bot-right">
                        <ul class="copyrights-nav pull-right">
                            <li><a href="{{asset('/terms-condition')}}">{{__('web.terms')}}</a></li>
                            {{--<li><a href="{{asset('/terms-condition')}}">Privacy Policy</a></li>--}}
                            <li><a href="{{asset('/contact-us')}}">{{__('web.contactUs')}}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- FOOTER END -->


    <!-- SCROLL TOP BUTTON -->
    <button class="scroltop"><span class=" iconmoon-house relative" id="btn-vibrate"></span>Top</button>

    <!-- MODAL  LOGIN -->
    <div id="Login-form" class="modal fade " role="dialog">
        <div class="modal-dialog modal-sm">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title text-white">Login Your Account</h4>
                </div>
                <div class="modal-body p-a30">
                    <form id="log-form">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input class="form-control" placeholder="Enter Username" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input class="form-control" placeholder="Enter email" type="email">
                            </div>
                        </div>
                        <button type="button" class="site-button-secondry text-uppercase btn-block m-b10">Submit</button>
                        <span class="font-12">Don't have an account? <a href="javascript:;" class="text-primary">Register Here</a></span>
                    </form>
                </div>
                <div class="modal-footer text-center">
                    <div class="text-center"><img src="{{asset('jaz/images/logo-dark.png')}}" alt=""></div>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL  REGISTER -->
    <div id="Register-form" class="modal fade " role="dialog">
        <div class="modal-dialog modal-sm">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title text-white">Register here</h4>
                </div>
                <div class="modal-body p-a30">
                    <form id="reg-form">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input class="form-control" placeholder="Enter Username" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input class="form-control" placeholder="Enter email" type="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                <input class="form-control" placeholder="Enter Password" type="email">
                            </div>
                        </div>
                        <button type="button" class="site-button-secondry text-uppercase btn-block m-b10">Submit</button>
                        <span class="font-12">Already Have an Account? <a href="javascript:;" class="text-primary">Login</a></span>
                    </form>
                </div>
                <div class="modal-footer text-center">
                    <div class="text-center"><img src="{{asset('jaz/images/logo-dark.png')}}" alt=""></div>
                </div>
            </div>
        </div>
    </div>
</div>




<script type="text/javascript" src="{{asset('jaz/assets/js/jquery.min.js')}}"></script>

<script type="text/javascript" src="{{asset('jaz/dist/bootstrap-clockpicker.min.js')}}"></script>
<script type="text/javascript">
    $('.clockpicker').clockpicker()
        .find('input').change(function() {
        console.log(this.value);
    });
    var input = $('#single-input').clockpicker({
        placement: 'bottom',
        align: 'left',
        autoclose: true,
        'default': 'now'
    });

    $('.clockpicker-with-callbacks').clockpicker({
        donetext: 'Done',
        init: function() {
            console.log("colorpicker initiated");
        },
        beforeShow: function() {
            console.log("before show");
        },
        afterShow: function() {
            console.log("after show");
        },
        beforeHide: function() {
            console.log("before hide");
        },
        afterHide: function() {
            console.log("after hide");
        },
        beforeHourSelect: function() {
            console.log("before hour selected");
        },
        afterHourSelect: function() {
            console.log("after hour selected");
        },
        beforeDone: function() {
            console.log("before done");
        },
        afterDone: function() {
            console.log("after done");
        }
    })
        .find('input').change(function() {
        console.log(this.value);
    });

    // Manually toggle to the minutes view
    $('#check-minutes').click(function(e) {
        // Have to stop propagation here
        e.stopPropagation();
        input.clockpicker('show')
            .clockpicker('toggleView', 'minutes');
    });
    if (/mobile/i.test(navigator.userAgent)) {
        $('input').prop('readOnly', true);
    }
</script>
<script type="text/javascript" src="{{asset('jaz/assets/js/highlight.min.js')}}"></script>
<script type="text/javascript">
    hljs.configure({
        tabReplace: '    '
    });
    hljs.initHighlightingOnLoad();
</script>


<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/js/bootstrap-datepicker.min.js'></script>
<script>
    $('.input-group.date').datepicker({
        format: "yyyy-mm-dd"
    });
</script>


{{--<script src="{{ asset('jaz/maps/google-chart-loader.js')}}"></script>
<script src="{{ asset('jaz/maps/google-chart.js')}}"></script>
<script type="text/javascript">
    var map = new google.maps.Map(document.getElementById('map'), {
        center: {
            lat: 30.1258867,
            lng: 31.374936
        },
        zoom: 10
    });
    var marker = new google.maps.Marker({
        position: {
            lat: 30.1258867,
            lng: 31.374936
        },
        map: map,
        draggable: true
    });
    google.maps.event.addListener(marker, 'position_changed', function () {
        var lat = marker.getPosition().lat();
        var lng = marker.getPosition().lng();
        $('#lat').val(lat);
        $('#lng').val(lng);
    });
</script>--}}





<!-- JAVASCRIPT  FILES ========================================= -->
<script type="text/javascript"  src="{{asset('jaz/js/jquery-1.12.4.min.js')}}"></script><!-- JQUERY.MIN JS -->
<script type="text/javascript"  src="{{asset('jaz/js/bootstrap.min.js')}}"></script><!-- BOOTSTRAP.MIN JS -->

<script type="text/javascript"  src="{{asset('jaz/js/bootstrap-select.min.js')}}"></script><!-- FORM JS -->
<script type="text/javascript"  src="{{asset('jaz/js/jquery.bootstrap-touchspin.min.js')}}"></script><!-- FORM JS -->

<script type="text/javascript"  src="{{asset('jaz/js/magnific-popup.min.js')}}"></script><!-- MAGNIFIC-POPUP JS -->

<script type="text/javascript"  src="{{asset('jaz/js/waypoints.min.js')}}"></script><!-- WAYPOINTS JS -->
<script type="text/javascript"  src="{{asset('jaz/js/counterup.min.js')}}"></script><!-- COUNTERUP JS -->
<script type="text/javascript"  src="{{asset('jaz/js/waypoints-sticky.min.js')}}"></script><!-- COUNTERUP JS -->

<script type="text/javascript" src="{{asset('jaz/js/isotope.pkgd.min.js')}}"></script><!-- MASONRY  -->

<script type="text/javascript"  src="{{asset('jaz/js/owl.carousel.min.js')}}"></script><!-- OWL  SLIDER  -->

<script type="text/javascript"  src="{{asset('jaz/js/stellar.min.js')}}"></script><!-- PARALLAX BG IMAGE   -->
<script type="text/javascript"  src="{{asset('jaz/js/scrolla.min.js')}}"></script><!-- ON SCROLL CONTENT ANIMTE   -->

{{--<script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCqwdZHU6gzIhPBEB2VNbIydp4coZmNPy0&amp;callback=initMap"  ></script>--}}<!-- GOOGLE MAP -->
<script type="text/javascript"  src="{{asset('jaz/js/map.script.js')}}"></script><!-- MAP FUCTIONS [ this file use with google map]  -->

<script type="text/javascript"  src="{{asset('jaz/js/custom.js')}}"></script><!-- CUSTOM FUCTIONS  -->
<script type="text/javascript"  src="{{asset('jaz/js/shortcode.js')}}"></script><!-- SHORTCODE FUCTIONS  -->
<script type="text/javascript"  src="{{asset('jaz/js/switcher.js')}}"></script><!-- SWITCHER FUCTIONS  -->


<!-- REVOLUTION JS FILES -->
<script type="text/javascript" src="{{asset('jaz/plugins/revolution/revolution/js/jquery.themepunch.tools.min.js')}}"></script>
<script type="text/javascript" src="{{asset('jaz/plugins/revolution/revolution/js/jquery.themepunch.revolution.min.js')}}"></script>

<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
<script type="text/javascript" src="{{asset('jaz/plugins/revolution/revolution/js/extensions/revolution.extension.actions.min.js')}}"></script>
<script type="text/javascript" src="{{asset('jaz/plugins/revolution/revolution/js/extensions/revolution.extension.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('jaz/plugins/revolution/revolution/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
<script type="text/javascript" src="{{asset('jaz/plugins/revolution/revolution/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
<script type="text/javascript" src="{{asset('jaz/plugins/revolution/revolution/js/extensions/revolution.extension.migration.min.js')}}"></script>
<script type="text/javascript" src="{{asset('jaz/plugins/revolution/revolution/js/extensions/revolution.extension.navigation.min.js')}}"></script>
<script type="text/javascript" src="{{asset('jaz/plugins/revolution/revolution/js/extensions/revolution.extension.parallax.min.js')}}"></script>
<script type="text/javascript" src="{{asset('jaz/plugins/revolution/revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
<script type="text/javascript" src="{{asset('jaz/js/wow.min.js')}}"></script>
{{--<script type="text/javascript" src="{{asset('jaz/build/js/wow.min.js')}}"></script>--}}
<script>
    new WOW().init();
</script>

<!-- REVOLUTION SLIDER SCRIPT FILES -->
<script type="text/javascript" src="{{asset('jaz/js/rev-script-4.js')}}"></script>

<!-- LOADING AREA START ===== -->

<!-- LOADING AREA  END ====== -->

<!-- STYLE SWITCHER  ======= -->
<div class="styleswitcher" >

    <div class="switcher-btn-bx">
        <a class="switch-btn">
            <span class="fa fa-cog fa-spin"></span>
        </a>
    </div>

    <div class="styleswitcher-inner">

        <h6 class="switcher-title">Color Skin</h6>
        <ul class="color-skins">
            <li><a class="theme-skin skin-1" href="{{asset('jaz/index-5a39b.html?theme=css/skin/skin-1')}}" title="default Theme"></a></li>
            <li><a class="theme-skin skin-2" href="{{asset('jaz/index-561e7.html?theme=css/skin/skin-2')}}" title="pink Theme"></a></li>
            <li><a class="theme-skin skin-3" href="{{asset('jaz/index-5cce5.html?theme=css/skin/skin-3')}}" title="sky Theme"></a></li>
            <li><a class="theme-skin skin-4" href="{{asset('jaz/index-513f7.html?theme=css/skin/skin-4')}}" title="green Theme"></a></li>
            <li><a class="theme-skin skin-5" href="{{asset('jaz/index-519a6.html?theme=css/skin/skin-5')}}" title="red Theme"></a></li>
            <li><a class="theme-skin skin-6" href="{{asset('jaz/index-5fe5c.html?theme=css/skin/skin-6')}}" title="orange Theme"></a></li>
            <li><a class="theme-skin skin-7" href="{{asset('jaz/index-5ab47.html?theme=css/skin/skin-7')}}" title="purple Theme"></a></li>
            <li><a class="theme-skin skin-8" href="{{asset('jaz/index-55f8d.html?theme=css/skin/skin-8')}}" title="blue Theme"></a></li>
            <li><a class="theme-skin skin-9" href="{{asset('jaz/index-55663.html?theme=css/skin/skin-9')}}" title="gray Theme"></a></li>
            <li><a class="theme-skin skin-10" href="{{asset('jaz/index-528ac.html?theme=css/skin/skin-10')}}" title="brown Theme"></a></li>
            <li><a class="theme-skin skin-11" href="{{asset('jaz/index-526b8.html?theme=css/skin/skin-11')}}" title="gray Theme"></a></li>
            <li><a class="theme-skin skin-12" href="{{asset('jaz/index-57f4c.html?theme=css/skin/skin-12')}}" title="golden Theme"></a></li>
        </ul>

        <h6 class="switcher-title">Nav</h6>
        <ul class="nav-view">
            <li class="nav-light active">Light</li>
            <li class="nav-dark">Dark</li>
        </ul>

        <h6 class="switcher-title">Nav</h6>
        <ul class="nav-width">
            <li class="nav-boxed active">Boxed</li>
            <li class="nav-wide">Wide</li>
        </ul>

        <h6 class="switcher-title">Header</h6>
        <ul class="header-view">
            <li class="header-fixed active">Fixed</li>
            <li class="header-static">Static</li>
        </ul>

        <h6 class="switcher-title">Layout</h6>
        <ul class="layout-view">
            <li class="wide-layout active">Wide</li>
            <li class="boxed">Boxed</li>
        </ul>

        <h6 class="switcher-title">Background Image</h6>
        <ul class="background-switcher">
            <li><img src="{{asset('jaz/images/switcher/switcher-bg/thum/bg1.jpg')}}" rel="images/switcher/switcher-bg/large/bg1.jpg" alt=""></li>
            <li><img src="{{asset('jaz/images/switcher/switcher-bg/thum/bg2.jpg')}}" rel="images/switcher/switcher-bg/large/bg2.jpg"  alt=""></li>
            <li><img src="{{asset('jaz/images/switcher/switcher-bg/thum/bg3.jpg')}}" rel="images/switcher/switcher-bg/large/bg3.jpg"  alt=""></li>
            <li><img src="{{asset('jaz/images/switcher/switcher-bg/thum/bg4.jpg')}}" rel="images/switcher/switcher-bg/large/bg4.jpg"  alt=""></li>
        </ul>

        <h6 class="switcher-title">Background Pattern</h6>
        <ul class="pattern-switcher">
            <li><img src="{{asset('jaz/images/switcher/switcher-patterns/thum/bg1.jpg')}}"  rel="images/switcher/switcher-patterns/large/pt1.jpg" alt=""></li>
            <li><img src="{{asset('jaz/images/switcher/switcher-patterns/thum/bg2.jpg')}}"  rel="images/switcher/switcher-patterns/large/pt2.jpg" alt=""></li>
            <li><img src="{{asset('jaz/images/switcher/switcher-patterns/thum/bg3.jpg')}}"  rel="images/switcher/switcher-patterns/large/pt3.jpg" alt=""></li>
            <li><img src="{{asset('jaz/images/switcher/switcher-patterns/thum/bg4.jpg')}}"  rel="images/switcher/switcher-patterns/large/pt4.jpg" alt=""></li>
            <li><img src="{{asset('jaz/images/switcher/switcher-patterns/thum/bg5.jpg')}}"  rel="images/switcher/switcher-patterns/large/pt5.jpg" alt=""></li>
            <li><img src="{{asset('jaz/images/switcher/switcher-patterns/thum/bg6.jpg')}}"  rel="images/switcher/switcher-patterns/large/pt6.jpg" alt=""></li>
            <li><img src="{{asset('jaz/images/switcher/switcher-patterns/thum/bg7.jpg')}}"  rel="images/switcher/switcher-patterns/large/pt7.jpg" alt=""></li>
            <li><img src="{{asset('jaz/images/switcher/switcher-patterns/thum/bg8.jpg')}}"  rel="images/switcher/switcher-patterns/large/pt8.jpg" alt=""></li>
            <li><img src="{{asset('jaz/images/switcher/switcher-patterns/thum/bg9.jpg')}}"  rel="images/switcher/switcher-patterns/large/pt9.jpg" alt=""></li>
            <li><img src="{{asset('jaz/images/switcher/switcher-patterns/thum/bg10.jpg')}}"  rel="images/switcher/switcher-patterns/large/pt10.jpg" alt=""></li>
            <li><img src="{{asset('jaz/images/switcher/switcher-patterns/thum/bg11.jpg')}}"  rel="images/switcher/switcher-patterns/large/pt11.jpg" alt=""></li>
            <li><img src="{{asset('jaz/images/switcher/switcher-patterns/thum/bg12.jpg')}}"  rel="images/switcher/switcher-patterns/large/pt12.jpg" alt=""></li>
        </ul>

    </div>
</div>
<!-- STYLE SWITCHER END ==== -->








{{--/////////////// order details page///////////////////--}}
<script>
    $(document).ready(function() {

        var sync1 = $("#sync1");
        var sync2 = $("#sync2");
        var slidesPerPage = 4; //globaly define number of elements per page
        var syncedSecondary = true;

        sync1.owlCarousel({
            items : 1,
            slideSpeed : 2000,
            nav: true,
            autoplay: false,
            dots: false,
            loop: true,
            responsiveRefreshRate : 200,
            navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
        }).on('changed.owl.carousel', syncPosition);

        sync2
            .on('initialized.owl.carousel', function () {
                sync2.find(".owl-item").eq(0).addClass("current");
            })
            .owlCarousel({
                items : slidesPerPage,
                dots: false,
                nav: false,
                margin:5,
                smartSpeed: 200,
                slideSpeed : 500,
                slideBy: slidesPerPage, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel
                responsiveRefreshRate : 100
            }).on('changed.owl.carousel', syncPosition2);

        function syncPosition(el) {
            //if you set loop to false, you have to restore this next line
            //var current = el.item.index;

            //if you disable loop you have to comment this block
            var count = el.item.count-1;
            var current = Math.round(el.item.index - (el.item.count/2) - .5);

            if(current < 0) {
                current = count;
            }
            if(current > count) {
                current = 0;
            }

            //end block

            sync2
                .find(".owl-item")
                .removeClass("current")
                .eq(current)
                .addClass("current");
            var onscreen = sync2.find('.owl-item.active').length - 1;
            var start = sync2.find('.owl-item.active').first().index();
            var end = sync2.find('.owl-item.active').last().index();

            if (current > end) {
                sync2.data('owl.carousel').to(current, 100, true);
            }
            if (current < start) {
                sync2.data('owl.carousel').to(current - onscreen, 100, true);
            }
        }

        function syncPosition2(el) {
            if(syncedSecondary) {
                var number = el.item.index;
                sync1.data('owl.carousel').to(number, 100, true);
            }
        }

        sync2.on("click", ".owl-item", function(e){
            e.preventDefault();
            var number = $(this).index();
            sync1.data('owl.carousel').to(number, 300, true);
        });
    });
</script>

<script>

    $(document).ready(function(){

        /* rating script */
        $('#stars li').on('mouseover', function(){
            var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

            // Now highlight all the stars that's not after the current hovered star
            $(this).parent().children('li.star').each(function(e){
                if (e < onStar) {
                    $(this).addClass('hover');
                }
                else {
                    $(this).removeClass('hover');
                }
            });

        }).on('mouseout', function(){
            $(this).parent().children('li.star').each(function(e){
                $(this).removeClass('hover');
            });
        });


        /* 2. Action to perform on click */
        $('#stars li').on('click', function(){
            var onStar = parseInt($(this).data('value'), 10); // The star currently selected
            var stars = $(this).parent().children('li.star');

            for (i = 0; i < stars.length; i++) {
                $(stars[i]).removeClass('selected');
            }

            for (i = 0; i < onStar; i++) {
                $(stars[i]).addClass('selected');
            }

            // JUST RESPONSE (Not needed)
            var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
            var msg = "";
            if (ratingValue > 1) {
                msg = "Thanks! You rated this " + ratingValue + " stars.";
            }
            else {
                msg = "We will improve ourselves. You rated this " + ratingValue + " stars.";
            }
            responseMessage(msg);

        });


    });


    function responseMessage(msg) {
        $('.success-box').fadeIn(200);
        $('.success-box div.text-message').html("<span>" + msg + "</span>");
    }
</script>
<!-- LOADING AREA START ===== -->

<!-- LOADING AREA  END ====== -->

<!--///////////////////////////////////////////////////////-->

<script>
    $(document).on('click', '.star', function(){
        var rateValue = $(this).attr("data-value");
        var orderIdValue = $("#orderIdValue").val();
        if(rateValue && orderIdValue ){
            $.ajax({
                type:"GET",
                url:"{{url('/change/orderRate')}}?orderIdValue="+orderIdValue+"&rateValue="+rateValue,
                success:function(res){
                    if(res){}
                }
            });
        }
    });
</script>

<!--///////////////////////////////////////////////////////-->

<script>
    $(document).on('click', '.myCart', function(e){
        e.preventDefault();
        var orderIdValue = $(this).attr("myCart-remove-order");
        if(orderIdValue){
            $("#myCart"+orderIdValue).css({ display : "none" });
            var cartValue=(parseInt($(".wcmenucart-count").html()))-1;
            $(".wcmenucart-count").html(cartValue);
            $.ajax({
                type:"GET",
                url:"{{url('/change/myCart-remove-order')}}?id="+orderIdValue,
                success:function(res){
                    if(res){
                        /*$("#myCart"+orderIdValue).css({ display : "none" });
                        var cartValue=(parseInt($(".wcmenucart-count").html()))-1;
                        $(".wcmenucart-count").html(cartValue);*/
                    }
                }
            });
        }
    });
    $(document).on('click', '.myCartViewOrder', function(){
        var orderIdValue = $(this).attr("myCart-order");
        if(orderIdValue){
            $("#myCart"+orderIdValue).css({ display : "none" });
            var cartValue=(parseInt($(".wcmenucart-count").html()))-1;
            $(".wcmenucart-count").html(cartValue);
        }
    });
</script>



@yield("chatScriptCode")



{{----}}
<script>
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    })

</script>


@yield('mapLocation')


<script  src="{{asset('jaz/js/index2.js')}}"></script>


@yield('loadSubCats')


</body>

</html>
