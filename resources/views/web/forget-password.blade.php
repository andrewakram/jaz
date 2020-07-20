@extends('web.index')


@section("styleForm")
    {{--in register--}}
    @if(Session::get("lang") == 'en')
        <link rel="stylesheet" type="text/css" href="{{asset('jaz/css/style-form.css')}}">
    @else
        <link rel="stylesheet" type="text/css" href="{{asset('jaz/css/style-form-rtl.css')}}">
    @endif
@endsection


@section('content')

    <!-- CONTENT START -->
    <div class="page-content login-form">

        <!-- Section content -->
        <div class="wt-contact-wrap row equal-wraper">

            <!-- MAP BLOCK START -->

            <!-- MAP BLOCK END -->

            <!-- RIGHT PART START -->
            <div class="section-full p-t80 p-b50">

                <!-- CONTACT DETAIL -->


                <!-- CONTACT FORM -->

                <div class="m-a30 wt-box border-2">

                    {{--<form class="cons-contact-form wow zoomIn" method="post" >--}}

                        <div class="wrapper fadeInDown">
                            <h4 class="text-uppercase login-text">{{__('web.forgetPassword')}}  </h4>
                            <div id="formContent">
                                <!-- Tabs Titles -->

                                <!-- Icon -->
                                <div class="fadeIn first">
                                    <img src="{{URL::to('jaz/images/logo.png')}}" id="icon" alt="User Icon" />
                                </div>

                                <!-- Login Form -->
                                <form  role="form" method="post" enctype="multipart/form-data" action="{{url('/reset-password')}}">
                                    @csrf
                                    <input type="text" id="login" class="fadeIn second" name="phone" placeholder="{{__('web.phone')}}" required>

                                    <button type="submit" value="submit" class="ref">{{__('web.reset')}}</button>
                                    {{--<a href="{{route('webForget-code')}}" class="ref" > reset</a>--}}

                                </form>


                            </div>
                        </div>


                    {{--</form>--}}

                </div>

            </div>
            <!-- RIGHT PART END -->

        </div>
        <!-- Section content END -->

    </div>
    <!-- CONTENT END -->

@endsection
