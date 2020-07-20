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
    <div class="page-content sugeest-form">

        <!-- Section content -->
        <div class="wt-contact-wrap row equal-wraper">

            <!-- MAP BLOCK START -->

            <!-- MAP BLOCK END -->

            <!-- RIGHT PART START -->
            <div class="section-full p-t80 p-b50">

                <!-- CONTACT DETAIL -->


                <!-- CONTACT FORM -->

                <div class="m-a30 wt-box border-2">

                    <form class=" wow zoomIn" method="post" enctype="multipart/form-data" action="{{url('/addSuggestion')}}">
                        {{csrf_field()}}

                        <div class="wrapper fadeInDown">
                            <h4 class="text-uppercase login-text">{{__('web.suggestion')}}  </h4>
                            <div id="formContent">
                                <!-- Tabs Titles -->

                                <!-- Icon -->

                                <!-- Login Form -->
                                {{--<form>--}}
                                    <input type="text" id="login" class="fadeIn second suggest-text" name="title" placeholder="{{__('web.title')}}" required>
                                    <textarea rows="10" placeholder="{{__('web.suggestion')}}" name="{{__('web.description')}}" required></textarea>
                                    <input type="submit" class="fadeIn fourth" value="{{__('web.send')}}">
                                {{--</form>--}}


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
