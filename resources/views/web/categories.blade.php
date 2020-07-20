@extends('web.index')
@section('content')

    <!-- CONTENT START -->
    <div class="page-content login-form">
        <div class="wt-bnr-inr overlay-wraper" style="background-image:url({{URL::to('jaz/images/background/why-choose-pic-2.png')}})">
            <div class="overlay-main bg-black opacity-07"></div>
            <div class="container">
                <div class="wt-bnr-inr-entry">
                    <h1 class="text-white text-right2">{{__('web.ourServices')}}</h1>
                </div>
            </div>
        </div>
        <!-- Section content -->
        <div class="wt-contact-wrap row equal-wraper">

            <!-- MAP BLOCK START -->

            <!-- MAP BLOCK END -->

            <!-- RIGHT PART START -->
            <div class="section-full bg-gray p-t80 p-b120 bg-no-repeat bg-left-center" style="background-image:url({{URL::to('jaz/images/background/why-choose-pic-2.png')}})">
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
                        {{--<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>--}}
                    </div>
                    <!-- TITLE END-->
                    <div class="section-content no-col-gap">
                        <div class="row getSub">

                            @foreach($categories as $category)
                                {{$category->has_period}}
                            <div class="col-md-4 col-sm-6 animate_line {{Session::get("thirdCat") == 3 ? "" : "mainCat"}}" mainCat="{{$category->id}}">
                                <div class="wt-icon-box-wraper  p-a30 center bg-white m-a5 wow slideInUp">
                                    <div class="icon-lg text-primary m-b20">
                                        @if(Session::get("thirdCat") == 3)
                                        <a href="{{asset('/service-type/'.$category->id)}}" class="icon-cell">
                                        @endif
                                            <img src="{{asset('/public/public/category/images/'.$category->image)}}" alt="">
                                        @if(Session::get("thirdCat") == 3)
                                        </a>
                                        @endif
                                    </div>
                                    <div class="icon-content">
                                        @if(Session::get("thirdCat") == 3)
                                        <a href="{{asset('/service-type/'.$category->id)}}" class="icon-cell">
                                        @endif
                                            <h5 class="wt-tilte text-uppercase">{{Session::get('lang') == "en" ? $category->en_name : $category->ar_name}}</h5>
                                        @if(Session::get("thirdCat") == 3)
                                        </a>
                                        @endif
                                        <p>{{$category->description == "" ? trans('web.noDes') : $category->description }}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach



                        </div>

                    </div>

                </div>

            </div>
            <!-- RIGHT PART END -->

        </div>
        <!-- Section content END -->

    </div>
    <!-- CONTENT END -->

@endsection
@section("loadSubCats")
    <script>
        $(document).on('click', '.mainCat', function(){
            var catId = $(this).attr("mainCat");

            /*console.log(cat_id);*/
            /*alert("hgjhgjh");*/
            if(catId){
                $.ajax({
                    type:"GET",
                    url:"{{url('/get/subCats')}}"+catId,
                    success:function(res){
                        if(res){

                            console.log(res);
                            $(".getSub").empty();
                            $.each(res,function($key,$value){
                                /*console.log(res.id);
                                console.log(res.name);
                                console.log(res.image);
                                console.log(res.description);
                                console.log(res.type);*/
                                plus($value.id,$value.name,$value.image,$value.description,$value.type,$value.hasSubCats);
                                /*$("#selectCompanies").append(
                                    '<option value="'+key+'" >'+value+'</option>'
                                );*/
                            });
                        }
                        if(res.length === 0){
                            console.log("datazero");
                            /*$("#getSubCat").empty();*/
                        }
                    }
                });
            }
        });
/*c3*/
        function plus(cat_id,cat_name,cat_image,cat_des,catType,hasSubCats) {
            if(hasSubCats == false){
                console.log(hasSubCats);
                urll="{{url('/service-type')}}"+"/"+cat_id;
                console.log(cat_id)
                var new_elem = '<div class="col-md-4 col-sm-6 animate_line mainCat" >\n' +
                    '<div class="wt-icon-box-wraper  p-a30 center bg-white m-a5 wow slideInUp">\n' +
                    '<div class="icon-lg text-primary m-b20">\n' +
                    '<a href="'+urll+'">\n' +
                    '<img src="'+cat_image+'" alt="">\n' +
                    '</a>\n' +
                    '</div>\n' +
                    '<div class="icon-content">\n' +
                    '<a href="'+urll+'">\n' +
                    '<h5 class="wt-tilte text-uppercase">'+cat_name+'</h5>\n' +
                    '</a>\n' +
                    '<p>'+cat_des+'</p>\n' +
                    '</div>\n' +
                    '</div>\n' +
                    '</div>\n' ;
            }else{
                console.log(hasSubCats);
                var new_elem = '<div class="col-md-4 col-sm-6 animate_line mainCat" mainCat="'+cat_id+'">\n' +
                    '<div class="wt-icon-box-wraper  p-a30 center bg-white m-a5 wow slideInUp">\n' +
                    '<div class="icon-lg text-primary m-b20">\n' +
                    /*'<a href="{{url('/service-type/')}}"'+cat_id+'>\n' +*/
                    '<img src="'+cat_image+'" alt="">\n' +
                    /*'</a>\n' +*/
                    '</div>\n' +
                    '<div class="icon-content">\n' +
                    /*'<a href="{{url('/service-type/')}}"'+cat_id+'>\n' +*/
                    '<h5 class="wt-tilte text-uppercase">'+cat_name+'</h5>\n' +
                    /*'</a>\n' +*/
                    '<p>'+cat_des+'</p>\n' +
                    '</div>\n' +
                    '</div>\n' +
                    '</div>\n' ;
            }


            $('.getSub').append(new_elem);
        }
    </script>
@endsection
