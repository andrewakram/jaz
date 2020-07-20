@extends('admin.layouts.app')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-header">
                @foreach($cities as $c)
                <div class="row">
                    <div class="col">
                        <div class="{{Session::get("lang") =="ar" ? 'page-header-right' : 'page-header-left'}}">
                            <h3>Vision </h3>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item active">Vision</li>
                            </ol>
                        </div>

                        <div style="float: {{Session::get("lang") =="ar" ? 'left' : 'right'}}">
                            <button title="{{trans('admin.edit')}}" type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit_{{$c->id}}"><i class="fa fa-edit"></i> </button>
                        </div>



                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-lg-12 col-xl-12">
                    <div class="table-responsive">
                        <table class="table">

                            <thead class="thead-dark">

                            </thead>
                            <tbody>

                                    {{--<tr  onclick="myFunction({{$c->id}})">
                                        <td>#</td>
                                        <td>{{$c->id}}</td>
                                    </tr>--}}
                                    <tr  onclick="myFunction({{$c->id}})">
                                        <td>body</td>
                                        <td>{{$c->body_en}}</td>
                                        <td>{{$c->body_ar}}</td>
                                    </tr>

                                    <tr  onclick="myFunction({{$c->id}})">
                                        <td>1</td>
                                        <td>{{$c->vision1_en}}</td>
                                        <td>{{$c->vision1_ar}}</td>
                                    </tr>
                                    <tr  onclick="myFunction({{$c->id}})">
                                        <td>2</td>
                                        <td>{{$c->vision2_en}}</td>
                                        <td>{{$c->vision2_ar}}</td>
                                    </tr>
                                    <tr  onclick="myFunction({{$c->id}})">
                                        <td>3</td>
                                        <td>{{$c->vision3_en}}</td>
                                        <td>{{$c->vision3_ar}}</td>
                                    </tr>
                                    <tr  onclick="myFunction({{$c->id}})">
                                        <td>4</td>
                                        <td>{{$c->vision4_en}}</td>
                                        <td>{{$c->vision4_ar}}</td>
                                    </tr>


                                    <div class="modal fade" id="edit_{{$c->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">{{trans('admin.edit')}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form class="form-horizontal" method="post" action="{{route('editVision')}}" enctype="multipart/form-data">
                                                    {{csrf_field()}}
                                                    <div class="modal-body">
                                                        <input type="hidden" name="id" value="{{$c->id}}">

                                                        <div class="form-group row">
                                                            <div class="col-lg-12">
                                                                <label>body</label>
                                                                <textarea name="body_en" class="form-control" rows="4" placeholder="{{trans('admin.englishText')}}" >{{$c->body_en}}</textarea>
                                                                <textarea name="body_ar" class="form-control" rows="4" placeholder="{{trans('admin.arabicText')}}" >{{$c->body_ar}}</textarea>
                                                            </div>
                                                        </div>

                                                        <hr>

                                                        <div class="form-group row">
                                                            <div class="col-lg-12">
                                                                <label>vision1</label>
                                                                <textarea name="vision1_en" class="form-control" rows="4" placeholder="{{trans('admin.vision1')}}" >{{$c->vision1_en}}</textarea>
                                                                <textarea name="vision1_ar" class="form-control" rows="4" placeholder="{{trans('admin.vision1')}}" >{{$c->vision1_ar}}</textarea>
                                                            </div>
                                                        </div>

                                                        <hr>

                                                        <div class="form-group row">
                                                            <div class="col-lg-12">
                                                                <label>vision2</label>
                                                                <textarea name="vision2_en" class="form-control" rows="4" placeholder="{{trans('admin.vision2')}}" >{{$c->vision2_en}}</textarea>
                                                                <textarea name="vision2_ar" class="form-control" rows="4" placeholder="{{trans('admin.vision2')}}" >{{$c->vision2_ar}}</textarea>
                                                            </div>
                                                        </div>

                                                        <hr>

                                                        <div class="form-group row">
                                                            <div class="col-lg-12">
                                                                <label>vision3</label>
                                                                <textarea name="vision3_en" class="form-control" rows="4" placeholder="{{trans('admin.vision3')}}" >{{$c->vision3_en}}</textarea>
                                                                <textarea name="vision3_ar" class="form-control" rows="4" placeholder="{{trans('admin.vision3')}}" >{{$c->vision3_ar}}</textarea>
                                                            </div>
                                                        </div>

                                                        <hr>

                                                        <div class="form-group row">
                                                            <div class="col-lg-12">
                                                                <label>vision4</label>
                                                                <textarea name="vision4_en" class="form-control" rows="4" placeholder="{{trans('admin.vision4')}}" >{{$c->vision4_en}}</textarea>
                                                                <textarea name="vision4_ar" class="form-control" rows="4" placeholder="{{trans('admin.vision4')}}" >{{$c->vision4_ar}}</textarea>
                                                            </div>
                                                        </div>



                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="reset" class="btn btn-dark" data-dismiss="modal">{{trans('admin.close')}}</button>
                                                        <button class="btn btn-primary">{{trans('admin.saveChanges')}}</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>


                                    {{--<tbody id="sub_cats_{{$category->id}}"></tbody>--}}
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
        @endforeach
    </div>

    <script>
        // function myFunction(id){
        //     $.ajax({
        //         url: 'sub_cats/' + id,
        //         type: "GET",
        //         dataType: "json",
        //
        //         success: function (data) {
        //             // $("#main_cat_"+id).click(function () {
        //             //     $('#sub_cats_'+id).empty();
        //             //     $("#sub_cats_"+id).toggle();
        //             // });
        //             $('#sub_cats_'+id).empty();
        //             $.each(data, function (i, sub_cat) {
        //                 $('#sub_cats_'+id).append(
        //                     '<tr id="third_cat_"'+sub_cat.id+'>'+
        //                     '<td></td>'+
        //                     '<td>' + sub_cat.id + '</td>'+
        //                     '<td>' + sub_cat.ar_name + '</td>'+
        //                     '<td>' + sub_cat.en_name + '</td>'+
        //                     '</tr>'
        //                 );
        //             });
        //         }
        //     });
        // }
    </script>
@endsection
