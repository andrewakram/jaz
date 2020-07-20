@extends('admin.layouts.app')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <div class="{{Session::get("lang") =="ar" ? 'page-header-right' : 'page-header-left'}}">
                            <h3>Slider </h3>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item active">Slider</li>
                            </ol>
                        </div>
                        <div style="float: {{Session::get("lang") =="ar" ? 'left' : 'right'}}">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#subCat"><i class="icon-plus"></i> Add </button>
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
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{ trans('admin.arabicName')}}</th>
                                <th scope="col">{{ trans('admin.englishName')}}</th>
                                <th scope="col">{{ trans('admin.arabicText')}}</th>
                                <th scope="col">{{ trans('admin.englishText')}}</th>
                                <th scope="col">{{ trans('admin.image')}}</th>
                                <th scope="col">{{ trans('admin.operations')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($cities as $c)
                                    <tr id="main_cat_{{$c->id}}" onclick="myFunction({{$c->id}})">
                                        <td>{{$c->id}}</td>
                                        <td>{{$c->title_ar}}</td>
                                        <td>{{$c->title_en}}</td>
                                        <td>{{$c->body_ar}}</td>
                                        <td>{{$c->body_en}}</td>
                                        <td>
                                            <img src="{{$c->image}}" alt="{{$c->image}}" width="80px" height="80px">
                                        </td>
                                        <td>
                                            <button title="{{trans('admin.edit')}}" type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit_{{$c->id}}"><i class="fa fa-edit"></i> </button>

                                            <a href="{{route('deleteSlid',$c->id)}}" >
                                                <button  class="btn btn-danger">
                                                    -
                                                </button>
                                            </a>
                                        </td>





                                        <div class="modal fade" id="edit_{{$c->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">{{trans('admin.edit')}}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form class="form-horizontal" method="post" action="{{route('editSlid')}}" enctype="multipart/form-data">
                                                        {{csrf_field()}}
                                                        <div class="modal-body">
                                                            <input type="hidden" name="slider_id" value="{{$c->id}}">


                                                            <div class="form-group row {{ $errors->has('title_ar') ? ' has-error' : '' }}">
                                                                <label class="col-lg-12 control-label {{Session::get("lang") =="ar" ? 'text-lg-right' : 'text-lg-left'}}" for="textinput">Arabic name</label>
                                                                <div class="col-lg-12">
                                                                    <input name="title_ar" type="text" placeholder="{{trans('admin.arabicName')}}" class="form-control btn-square" value="{{$c->title_ar}}" required>
                                                                </div>
                                                            </div>
                                                            @include('admin.layouts.error', ['input' => 'ar_name'])

                                                            <div class="form-group row {{ $errors->has('title_en') ? ' has-error' : '' }}">
                                                                <label class="col-lg-12 control-label {{Session::get("lang") =="ar" ? 'text-lg-right' : 'text-lg-left'}}" for="textinput">English name</label>
                                                                <div class="col-lg-12">
                                                                    <input name="title_en" type="text" placeholder="{{trans('admin.englishName')}}" class="form-control btn-square"  value="{{$c->title_en}}" required>
                                                                </div>
                                                            </div>
                                                            @include('admin.layouts.error', ['input' => 'en_name'])

                                                            <div class="form-group row">
                                                                <div class="col-lg-12">
                                                                    <textarea name="body_ar" class="form-control"  placeholder="{{trans('admin.arabicText')}}" >{{$c->body_ar}}</textarea>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <div class="col-lg-12">
                                                                    <textarea name="body_en" class="form-control"  placeholder="{{trans('admin.englishText')}}" >{{$c->body_en}}</textarea>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <div class="col-lg-12">
                                                                    <input name="image" type="file" class="form-control">
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
                                    </tr>
                                @endforeach
                            {{--<tbody id="sub_cats_{{$category->id}}"></tbody>--}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->

    </div>

    <div class="modal fade" id="subCat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form-horizontal" method="post" action="{{route('sliders.store')}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="modal-body">


                        <div class="form-group row">
                            <div class="col-lg-12">
                                <input id="name" name="title_ar" type="text" placeholder="{{trans('admin.arabicName')}}" class="form-control btn-square" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-12">
                                <input id="name" name="title_en" type="text" placeholder="{{trans('admin.englishName')}}" class="form-control btn-square" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-12">
                                <textarea name="body_ar" class="form-control"  placeholder="{{trans('admin.arabicText')}}" ></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-12">
                                <textarea name="body_en" class="form-control"  placeholder="{{trans('admin.englishText')}}" ></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-12">
                                <input name="image" type="file" class="form-control">
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
