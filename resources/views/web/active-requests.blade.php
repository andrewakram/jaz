@extends('web.index')
@section('content')

    <!-- CONTENT START -->
    <div class="page-content">

        <!-- INNER PAGE BANNER -->
        <div class="wt-bnr-inr overlay-wraper" style="background-image:url({{URL::to('jaz/images/banner/about-banner.jpg')}})">
            <div class="overlay-main bg-black opacity-05"></div>
            <div class="container">
                <div class="wt-bnr-inr-entry">
                    <h1 class="text-white">{{__('web.myOrders')}}</h1>
                </div>
            </div>
        </div>
        <!-- INNER PAGE BANNER END -->

        <!-- BREADCRUMB ROW -->


        <!-- OUR BEST SERVICES SECTION  START-->
        <div class="section-full text-center p-tb50">
            <div class="container">
                <div class="section-head">
                    <h2 class="text-uppercase">{{__('web.myOrders')}}</h2>
                    <div class="wt-separator-outer">
                        <div class="wt-separator style-square">
                            <span class="separator-left bg-primary"></span>
                            <span class="separator-right bg-primary"></span>
                        </div>
                    </div>

                </div>
                <!-- TABS NAV BG WITH CONTENT OUTLINE -->
                <div class="section-content">
                    <div class="wt-tabs border-top border bg-tabs wow fadeInUp">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#web-design-31" aria-expanded="true"><i class="fas fa-tools"></i>{{__('web.activeRequests')}} </a></li>
                            <li class=""><a data-toggle="tab" href="#graphic-design-31" aria-expanded="false"><i class="fas fa-tools"></i> {{__('web.history')}}</a></li>

                        </ul>
                        <div class="tab-content">

                            <div id="web-design-31" class="tab-pane active">
                                <div id="no-more-tables">
                                    <table class="table-bordered  table-condensed cf wt-responsive-table shopping-table order-table">
                                        <thead class="cf text-center bg-primary">
                                        <tr>
                                            <th>{{__('web.orderNo')}}</th>
                                            <th>{{__('web.services')}}</th>
                                            <th>{{__('web.acceptedCompany')}}</th>
                                            <th >{{__('web.time')}}</th>

                                            <th class="numeric">{{__('web.viewOffers')}}</th>

                                        </tr>
                                        </thead>
                                        <tbody>



                                        @foreach($active_orders as $active_order)
                                            <tr>
                                                <td data-title="Service">{{$active_order->id}}</td>
                                                <td data-title="Service"><img src="{{$active_order->image}}" alt="{{$active_order->en_name}}" class="max-orders"></td>
                                                <td data-title="Accepted Company">{{$active_order->applied_worker}}</td>
                                                <td data-title="Date" class="numeric">
                                                    {{$active_order->date != "" && $active_order->time != "" ? "$active_order->date , $active_order->time" : trans('web.urgentOrder') }}
                                                </td>
                                                <!--<td data-title="Date" class="numeric">
                                                    {{$active_order->date != "" && $active_order->time != "" ? "$active_order->date , $active_order->time" . " - "." [ ". $active_order->created_at['date'] ." , ". $active_order->created_at['time']."]" : "Urgent, [ ". $active_order->created_at['date'] ." , ". $active_order->created_at['time']."]" }}
                                                </td>-->


                                                <td data-title="View Offers" class="numeric">
                                                    @if($active_order->applied_worker > 0)
                                                    <a href="{{asset("/companies/".$active_order->id)}}" class="site-button radius-sm" type="button">{{__('web.viewOffers')}}</a>
                                                    @endif
                                                </td>

                                            </tr>
                                        @endforeach




                                        {{--
                                        <tr>
                                            <td data-title="Service"><img src="{{asset('jaz/images/cart/thumb/pic-2.jpg')}}" alt="" class="max-orders"></td>
                                            <td data-title="Accepted Company">11</td>
                                            <td data-title="Date" class="numeric">10/10/2019 , 9AM</td>

                                            <td data-title="View Offers" class="numeric"><a href="companies.html" class="site-button radius-sm" type="button">View all Offers</a></td>

                                        </tr>
                                        <tr>
                                            <td data-title="Service"><img src="{{asset('jaz/images/cart/thumb/pic-3.jpg')}}" alt=""></td>
                                            <td data-title="Accepted Company">2</td>
                                            <td data-title="Date" class="numeric">10/10/2019 , 9AM	</td>

                                            <td data-title="View Offers" class="numeric"><a href="companies.html" class="site-button radius-sm" type="button">View all Offers</a></td>

                                        </tr>
                                        <tr>
                                            <td data-title="Service"><img src="{{asset('jaz/images/cart/thumb/pic-4.jpg')}}" alt=""></td>
                                            <td data-title="Accepted Company"> 3</td>
                                            <td data-title="Date" class="numeric">10/10/2019 , 9AM	</td>

                                            <td data-title="View Offers" class="numeric"><a href="companies.html" class="site-button radius-sm" type="button">View all Offers</a></td>

                                        </tr>
                                        <tr>
                                            <td data-title="Service"><img src="{{asset('jaz/images/cart/thumb/pic-2.jpg')}}" alt=""></td>
                                            <td data-title="Accepted Company">4</td>
                                            <td data-title="Date" class="numeric">10/10/2019 , 9AM	</td>

                                            <td data-title="View Offers" class="numeric"><a href="companies.html" class="site-button radius-sm" type="button">View all Offers</a></td>

                                        </tr>
                                        <tr>
                                            <td data-title="Service"><img src="{{URL::to('jaz/images/cart/thumb/pic-6.jpg')}}" alt=""></td>
                                            <td data-title="Accepted Company">5</td>
                                            <td data-title="Date" class="numeric">10/10/2019 , 9AM	</td>

                                            <td data-title="View Offers" class="numeric"><a href="companies.html" class="site-button radius-sm" type="button">View all Offers</a></td>

                                        </tr>
--}}
                                        </tbody>
                                    </table>



                                </div>

                            </div>

                            <div id="graphic-design-31" class="tab-pane">
                                <div id="web-design-31" >
                                    <div id="no-more-tables">
                                        <table class="table-bordered  table-condensed cf wt-responsive-table shopping-table order-table">
                                            <thead class="cf text-center bg-primary">
                                            <tr>
                                                <th>{{__('web.orderNo')}}</th>
                                                <th>{{__('web.services')}}</th>
                                                <th>{{__('web.acceptedCompany')}}</th>
                                                <th class="numeric">{{__('web.status')}}</th>
                                                <th class="numeric">{{__('web.time')}}</th>
                                                <th class="numeric">{{__('web.viewOffers')}} </th>

                                            </tr>
                                            </thead>
                                            <tbody>

                                            @foreach($orderHistory as $oh)
                                                <tr>
                                                    <td data-title="Company">{{$oh->id}}</td>
                                                    <td data-title="Service"><img src="{{$oh->image}}" alt="" class="max-orders"></td>
                                                    <td data-title="Company">{{$oh->worker_name}}</td>
                                                    <td data-title="Status" class="numeric">{{$oh->status}}</td>
                                                    <td data-title="Date" class="numeric">
                                                        {{$oh->date != "" && $oh->time != "" ? "$oh->date , $oh->time" : trans('web.urgentOrder') }}
                                                    </td>
                                                    <!--<td data-title="Date" class="numeric">
                                                        {{$oh->date != "" && $oh->time != "" ? "$oh->date , $oh->time" . " - "." [Order created at ". $oh->created_at['date'] ." , ". $oh->created_at['time']."]" : "Urgent, [Order created at ". $oh->created_at['date'] ." , ". $oh->created_at['time']."]" }}
                                                    </td>-->

                                                    <td data-title="View Offers" class="numeric"><a href="{{asset("/order-tracking/".$oh->id)}}" class="site-button radius-sm" type="button">{{__('web.viewOrder')}}</a></td>
                                                    {{--<td data-title="Change %" class="numeric"><button class="site-button radius-sm" type="button">{{__('web.viewOrder')}}</button></td>--}}
                                                </tr>
                                            @endforeach
{{--

                                            <tr>
                                                <td data-title="Service"><img src="{{asset('jaz/images/cart/thumb/pic-2.jpg')}}" alt="" class="max-orders"></td>
                                                <td data-title="Company">GRAND Company</td>
                                                <td data-title="Status" class="numeric">On a Way</td>
                                                <td data-title="Date" class="numeric">10/10/2019 , 9AM</td>
                                                <td data-title="Change %" class="numeric"><button class="site-button radius-sm" type="button">View Order</button></td>

                                            </tr>
                                            <tr>
                                                <td data-title="Service"><img src="{{asset('jaz/images/cart/thumb/pic-3.jpg')}}" alt=""></td>
                                                <td data-title="Company">GRAND Company</td>
                                                <td data-title="Status" class="numeric">On a Way</td>
                                                <td data-title="Date" class="numeric">10/10/2019 , 9AM	</td>
                                                <td data-title="view" class="numeric"><a href="order-tracking.html" class="site-button radius-sm" type="button">View Order</a></td>

                                            </tr>
                                            <tr>
                                                <td data-title="Service"><img src="{{URL::to('jaz/images/cart/thumb/pic-4.jpg')}}" alt=""></td>
                                                <td data-title="Company">GRAND Company</td>
                                                <td data-title="Status" class="numeric">On a Way</td>
                                                <td data-title="Date" class="numeric">10/10/2019 , 9AM	</td>
                                                <td data-title="view" class="numeric"><a href="order-tracking.html" class="site-button radius-sm" type="button">View Order</a></td>

                                            </tr>
                                            <tr>
                                                <td data-title="Service"><img src="{{URL::to('jaz/images/cart/thumb/pic-2.jpg')}}" alt=""></td>
                                                <td data-title="Company">GRAND Company</td>
                                                <td data-title="Status" class="numeric">On a Way</td>
                                                <td data-title="Date" class="numeric">10/10/2019 , 9AM	</td>
                                                <td data-title="view" class="numeric"><a href="order-tracking.html" class="site-button radius-sm" type="button">View Order</a></td>

                                            </tr>
                                            <tr>
                                                <td data-title="Service"><img src="{{URL::to('jaz/images/cart/thumb/pic-6.jpg')}}" alt=""></td>
                                                <td data-title="Company">GRAND Company</td>
                                                <td data-title="Status" class="numeric">On a Way</td>
                                                <td data-title="Date" class="numeric">10/10/2019 , 9AM	</td>
                                                <td data-title="view" class="numeric"><a href="order-tracking.html" class="site-button radius-sm" type="button">View Order</a></td>

                                            </tr>

--}}
                                            </tbody>
                                        </table>



                                    </div>

                                </div>
                            </div>

                            <div id="developement-31" class="tab-pane">
                                <div id="no-more-tables">
                                    <table class="table-bordered  table-condensed cf wt-responsive-table shopping-table order-table">
                                        <thead class="cf text-center bg-primary">
                                        <tr>
                                            <th>Services</th>
                                            <th>PRODUCT NAME</th>
                                            <th class="numeric">UNIT PRICE</th>
                                            <th class="numeric">STOCK STATUS</th>
                                            <th class="numeric">TOTAL</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td data-title="Service"><img src="{{URL::to('jaz/images/cart/thumb/pic-2.jpg')}}" alt="" class="max-orders"></td>
                                            <td data-title="Company">Prduct Item 1</td>
                                            <td data-title="Price" class="numeric">$35.00</td>
                                            <td data-title="Change" class="numeric">In Stock</td>
                                            <td data-title="Change %" class="numeric"><button class="site-button radius-sm" type="button">View all Offers</button></td>

                                        </tr>
                                        <tr>
                                            <td data-title="Service"><img src="{{URL::to('jaz/images/cart/thumb/pic-3.jpg')}}" alt=""></td>
                                            <td data-title="Company">Prduct Item 2</td>
                                            <td data-title="Price" class="numeric">$15.00</td>
                                            <td data-title="Change" class="numeric">In Stock</td>
                                            <td data-title="Change %" class="numeric"><button class="site-button radius-sm" type="button">View all Offers</button></td>

                                        </tr>
                                        <tr>
                                            <td data-title="Service"><img src="{{URL::to('jaz/images/cart/thumb/pic-4.jpg')}}" alt=""></td>
                                            <td data-title="Company">Prduct Item 3</td>
                                            <td data-title="Price" class="numeric">$28.00</td>
                                            <td data-title="Change" class="numeric">In Stock</td>
                                            <td data-title="Change %" class="numeric"><button class="site-button radius-sm" type="button">View all Offers</button></td>

                                        </tr>
                                        <tr>
                                            <td data-title="Service"><img src="{{URL::to('jaz/images/cart/thumb/pic-2.jpg')}}" alt=""></td>
                                            <td data-title="Company">Prduct Item 4</td>
                                            <td data-title="Price" class="numeric">$36.00</td>
                                            <td data-title="Change" class="numeric">In Stock</td>
                                            <td data-title="Change %" class="numeric"><button class="site-button radius-sm" type="button">View all Offers</button></td>

                                        </tr>
                                        <tr>
                                            <td data-title="Service"><img src="{{URL::to('jaz/images/cart/thumb/pic-6.jpg')}}" alt=""></td>
                                            <td data-title="Company">Prduct Item 5</td>
                                            <td data-title="Price" class="numeric">$28.00</td>
                                            <td data-title="Change" class="numeric">In Stock</td>
                                            <td data-title="Change %" class="numeric"><button class="site-button radius-sm" type="button">View all Offers</button></td>

                                        </tr>

                                        </tbody>
                                    </table>



                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- CONTENT CONTENT END -->
    </div>
    <!-- CONTENT END -->

@endsection
