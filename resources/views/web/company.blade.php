@extends('web.index')
@section('content')

    <!-- CONTENT START -->
    <div class="page-content">


        <!-- INNER PAGE BANNER END -->

    @foreach($companies as $company)
        <!-- SECTION CONTENT START -->
        <div class="section-full p-t40 p-b50">
            <div class="container">

                <!-- BLOG START -->
                <div class="blog-post date-style-3 blog-post-single">
                    <div class=" company-logo">
                        <a href="javascript:void(0);">
                            <img src="{{URL::to('/public/public/workers/images/'.$company->image)}}" alt="{{$company->image}}" >
                        </a>
                    </div>
                    <div class="post-description-area p-t30">
                        <div class="wt-post-title center2 ">
                            <h1 class="post-title"><a href="javascript:void(0);">{{$company->name}}</a></h1>
                        </div>
                        <div class="rating-bx center2">
                            @if($company->rate <1)
                                <p>No rate found</p>
                            @else
                                @for($i=0; $i<$company->rate; $i++)
                                    <i class="fa fa-star"></i>
                                @endfor
                            @endif
                        </div>

                        <div class="wt-post-text wow bounceInUp text-right2" data-wow-duration="2s">
                            <p>{{$company->description == "" ? "No description found" : $company->description}} </p>
                        </div>


                    </div>
                </div>




                <!-- BLOG END -->

            </div>
        </div>
        <!-- SECTION CONTENT END -->
    @endforeach

    </div>
    <!-- CONTENT END -->





    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title rtl" id="exampleModalLongTitle">موقع الشركة</h5>

                </div>
                <div class="modal-body">
                    <div id="oneordermap"></div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>

                </div>
            </div>
        </div>
    </div>



@endsection
