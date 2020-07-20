@extends('web.index')
@section('content')

    <!-- CONTENT START -->
    <div class="page-content">

        <!-- INNER PAGE BANNER -->
        <div class="wt-bnr-inr overlay-wraper" style="background-image:url({{URL::to('jaz/images/banner/product-banner.jpg')}})">
            <div class="overlay-main bg-black opacity-07"></div>
            <div class="container">
                <div class="wt-bnr-inr-entry">
                    <h1 class="text-white">{{__('web.orderDetails')}}</h1>
                </div>
            </div>
        </div>
        <!-- INNER PAGE BANNER END -->

        <!-- BREADCRUMB ROW -->

        <!-- BREADCRUMB ROW END -->

        <!-- SECTION CONTENT START -->
        <div class="section-full p-t80 p-b50">

            <!-- PRODUCT DETAILS -->
            <div class="container woo-entry">

                <div class="row m-b30">


                    <div class="col-md-12 col-sm-12">
                        <div class="section-content">
                            <!--Fade slider-->
                            <div class="owl-carousel owl-fade-slider-one owl-btn-vertical-center owl-dots-bottom-center">

                                <div class="item">
                                    <div class="aon-thum-bx">
                                        <img src="{{asset("jaz/images/our-work/small-slider/pic1.jpg")}}" alt="">
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="aon-thum-bx">
                                        <img src="{{asset("jaz/images/our-work/small-slider/pic2.jpg")}}" alt="">
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="aon-thum-bx">
                                        <img src="{{asset("jaz/images/our-work/small-slider/pic3.jpg")}}" alt="">
                                    </div>
                                </div>

                            </div>
                            <!--fade slider END-->
                        </div>

                        @foreach($orders as $order)
                            <div class="col-md-4 col-sm-4 m-b30">
                                <div class="wt-team-one  bg-gray p-a10 wt-team-media2">
                                    <div class="wt-team-media ">
                                        <a href="javascript:void(0);"><img src="{{$order->image}}" alt=""></a>
                                    </div>
                                    <div class="wt-team-info wt-team-info2 text-center bg-gray p-a5">
                                        <h4 class="wt-team-title"><a href="javascript:void(0);">{{$order->name}}</a></h4>


                                    </div>
                                </div>

                            </div>
                            <div class="col-md-8">
                                <div class="section-head wt-post-text2">
                                    <h2 class="text-uppercase">{{__('web.description')}}</h2>
                                    <div class="wt-separator-outer">
                                        <div class="wt-separator style-square">
                                            <span class="separator-left bg-primary"></span>
                                            <span class="separator-right bg-primary"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="wt-post-text ">
                                    <p class="m-b10">
                                        {{$order->description}}
                                    </p>
                                </div>
                                <div class="col-md-12">
                                    <ol class="progtrckr" data-progtrckr-steps="5">
                                        <li class="{{$order->status == "accept_order" || $order->status == "on_way" || $order->status == "finish_order" ? "progtrckr-done" : "progtrckr-todo" }}">{{__('web.accepted')}} </li>

                                        <li class="{{$order->status == "on_way" || $order->status == "finish_order" ? "progtrckr-done" : "progtrckr-todo" }}">{{__('web.onWay')}}</li>
                                        <li class="{{$order->status == "finish_order" ? "progtrckr-done" : "progtrckr-todo" }}">{{__('web.finished')}}</li>

                                    </ol>
                                </div>
                                <table class="table table-bordered rtl" >
                                    <tr>
                                        <td>{{$order->date == "" ? trans('web.urgentOrder') : $order->date}}</td>
                                        <td>{{$order->time == "" ? "-" : $order->time}}</td>
                                    </tr>
                                    <tr>
                                        <td>{{$order->address}}</td>
                                        @if($order->order_total != "")
                                            <td>{{__('web.pay')}} <span>{{$order->order_total}}</span></td>
                                        @endif
                                    </tr>


                                    {{--@if($order->rate != 0 || $order->rate != "")--}}
                                    <tr>
                                        <td>{{__('web.rate')}}</td>

                                        <td>
											<span class="rating-bx">
                                                <section class='rating-widget' >
                                                    <!-- Rating Stars Box -->
                                                    <div class='rating-stars text-center2'>
                                                        <ul id='stars'>
                                                          <li class='star {{$order->rate > 0 ? "selected" : ""}}' title='Poor' data-value='1'>
                                                            <i class='fa fa-star fa-fw star-margin'></i>
                                                          </li>
                                                          <li class='star {{$order->rate > 1 ? "selected" : ""}}' title='Fair' data-value='2'>
                                                            <i class='fa fa-star fa-fw star-margin'></i>
                                                          </li>
                                                          <li class='star {{$order->rate > 2 ? "selected" : ""}}' title='Good' data-value='3'>
                                                            <i class='fa fa-star fa-fw star-margin'></i>
                                                          </li>
                                                          <li class='star {{$order->rate > 3 ? "selected" : ""}}' title='Excellent' data-value='4'>
                                                            <i class='fa fa-star fa-fw star-margin'></i>
                                                          </li>
                                                          <li class='star {{$order->rate > 4 ? "selected" : ""}}' title='WOW!!!' data-value='5'>
                                                            <i class='fa fa-star fa-fw star-margin'></i>
                                                          </li>
                                                        </ul>
                                                    </div>
                                                </section>
											</span>
                                        </td>
                                    </tr>
                                    {{--@endif--}}




                                </table>

                                @if($order->status == "" || $order->status == "accept_order")
                                <form method="post" class="cart">
                                    <button type="button" class="site-button " data-toggle="modal" data-target="#with-form">Cancel Order<i class="fa fa-angle-double-right"></i></button>
                                </form>
                                @endif

                                <div id="with-form" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header bg-primary">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title text-white">{{__('web.cancelReason')}}</h4>
                                            </div>


                                            <form role="form" id="" method="post" class="form-horizontal mb-lg" action="{{URL::to('/cancel-order')}}" >
                                                @csrf
                                            {{--<form id="demo-form" class="form-horizontal mb-lg" novalidate>--}}
                                            <div class="modal-body">

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">{{__('web.reason')}}</label>
                                                        <div class="col-sm-9">
                                                            <input type="hidden" name="order_id" value="{{$order->id}}" id="orderIdValue">
                                                            <textarea rows="5" name="cancelReason" class="form-control" placeholder="Type your comment..." required></textarea>
                                                        </div>
                                                    </div>

                                            </div>
                                            <div class="modal-footer">


                                                <button type="submit" class="site-button ">{{__('web.send')}}
                                                    <i class="fa fa-angle-double-right"></i></button>

                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                        {{--
                        <div class="col-md-4 col-sm-4 m-b30">
                            <div class="wt-team-one  bg-gray p-a10 wt-team-media2">
                                <div class="wt-team-media ">
                                    <a href="javascript:void(0);"><img src="{{asset("jaz/images/our-team/pic4.jpg")}}" alt=""></a>
                                </div>
                                <div class="wt-team-info wt-team-info2 text-center bg-gray p-a5">
                                    <h4 class="wt-team-title"><a href="javascript:void(0);">John Halpern</a></h4>


                                </div>
                            </div>

                        </div>
                        <div class="col-md-8">
                            <div class="section-head wt-post-text2">
                                <h2 class="text-uppercase">Description</h2>
                                <div class="wt-separator-outer">
                                    <div class="wt-separator style-square">
                                        <span class="separator-left bg-primary"></span>
                                        <span class="separator-right bg-primary"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="wt-post-text ">
                                <p class="m-b10">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                    text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book make a type specimen book make a type specimen book make a type specimen book.</p>
                            </div>
                            <div class="col-md-12">
                                <ol class="progtrckr" data-progtrckr-steps="5">
                                    <li class="progtrckr-done">Accepted </li>

                                    <li class="progtrckr-done">On way</li>
                                    <li class="progtrckr-todo">Finished</li>

                                </ol>
                            </div>
                            <table class="table table-bordered rtl" >
                                <tr>
                                    <td>12 Dec,2019</td>
                                    <td>6:30 pm</td>
                                </tr>
                                <tr>
                                    <td>egypt, 3 hashem al ashkar</td>
                                    <td>Required to pay <span>500$</span></td>
                                </tr>
                                <tr>
                                    <td>Rate</td>
                                    <td>
											<span class="rating-bx">


<section class='rating-widget'>

  <!-- Rating Stars Box -->
  <div class='rating-stars text-center2'>
    <ul id='stars'>
      <li class='star' title='Poor' data-value='1'>
        <i class='fa fa-star fa-fw star-margin'></i>
      </li>
      <li class='star' title='Fair' data-value='2'>
        <i class='fa fa-star fa-fw star-margin'></i>
      </li>
      <li class='star' title='Good' data-value='3'>
        <i class='fa fa-star fa-fw star-margin'></i>
      </li>
      <li class='star' title='Excellent' data-value='4'>
        <i class='fa fa-star fa-fw star-margin'></i>
      </li>
      <li class='star' title='WOW!!!' data-value='5'>
        <i class='fa fa-star fa-fw star-margin'></i>
      </li>
    </ul>
  </div>
                                                </section>

											</span>
                                    </td>
                                </tr>
                            </table>
                            <form method="post" class="cart">
                                <button type="button" class="site-button " data-toggle="modal" data-target="#with-form">Cancel Order<i class="fa fa-angle-double-right"></i></button>


                            </form>
                            <div id="with-form" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title text-white">Cncelation Reason</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form id="demo-form" class="form-horizontal mb-lg" novalidate>



                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Reason</label>
                                                    <div class="col-sm-9">
                                                        <textarea rows="5" class="form-control" placeholder="Type your comment..." required></textarea>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">


                                            <button type="button" class="site-button ">Send
                                                <i class="fa fa-angle-double-right"></i></button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
--}}

                    </div>
                </div>


            </div>
            <!-- PRODUCT DETAILS -->

        </div>
        <!-- CONTENT CONTENT END -->


    </div>
    <!-- CONTENT END -->


@endsection
