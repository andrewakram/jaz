@extends("web.index")


@section("styleForm")
    {{--in register--}}
    @if(Session::get("lang") == 'en')
        <link rel="stylesheet" type="text/css" href="{{asset('jaz/css/style-form.css')}}">
    @else
        <link rel="stylesheet" type="text/css" href="{{asset('jaz/css/style-form-rtl.css')}}">
    @endif

@endsection


@section("content")




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

                    <form class=" wow zoomIn" method="post" action="{{url('/login/user')}}">
                        {{csrf_field()}}

                        <div class="wrapper fadeInDown">
                            <h4 class="text-uppercase login-text">{{__('web.login')}}  </h4>
                            <div id="formContent">
                                <!-- Tabs Titles -->

                                <!-- Icon -->
                                <div class="fadeIn first">
                                    <img src="{{asset('jaz/images/logo.png')}}" id="icon" alt="User Icon" />
                                </div>

                                <!-- Login Form -->


                                    <input type="text" id="login" class="fadeIn second" name="phone" placeholder="{{__('web.phone')}}">
                                    <input type="password" id="password" class="fadeIn third" name="password" placeholder="{{__('web.password')}}">
                                    <input type="submit" class="fadeIn fourth" value="{{__('web.login')}}">

                                <div id="formFooter">
                                    <a class="underlineHover" href="{{asset('/webregister')}}">{{__('web.dontHaveAccount')}}</a>
                                </div>
                                <!-- Remind Passowrd -->
                                <div id="formFooter">
                                    <a class="underlineHover" href="{{route('webForget-password')}}">{{__('web.forgetPassword')}}?</a>
                                </div>

                            </div>
                        </div>


                    </form>

                </div>

            </div>
            <!-- RIGHT PART END -->

        </div>
        <!-- Section content END -->

    </div>
    <!-- CONTENT END -->

@endsection
