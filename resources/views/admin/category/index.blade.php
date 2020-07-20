@extends('admin.layouts.app')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <div class="{{Session::get("lang") =="ar" ? 'page-header-right' : 'page-header-left'}}">
                            <h3>{{ trans('admin.categories')}} </h3>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item active">{{ trans('admin.categories')}}</li>
                            </ol>
                        </div>

                        @if(admin()->hasPermissionTo('Add sub category'))
                            <div style="float: {{Session::get("lang") =="ar" ? 'left' : 'right'}}">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#subCat"><i class="icon-plus"></i> {{trans('admin.category')}} </button>
                            </div>
                        @endif

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
                                <th scope="col">{{trans('admin.image')}}</th>
                                <th scope="col">{{ trans('admin.operations')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                    <tr id="main_cat_{{$category->id}}" onclick="myFunction({{$category->id}})">
                                        <td>{{$category->id}}</td>
                                        <td>{{$category->ar_name}}</td>
                                        <td>{{$category->en_name}}</td>
                                        <td>
                                            <img src="{{$category->image}}" class="image_radius"/>
                                        </td>
                                        <td>
                                            <a title='{{trans("admin.view")}}' href="{{route('sub_cats',$category->id)}}"><button class="btn btn-info"><i class="fa fa-eye"></i></button></a>
                                            <button title="{{trans('admin.edit')}}" type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit_{{$category->id}}"><i class="fa fa-edit"></i> </button>
                                        </td>
                                    </tr>


                                    <div class="modal fade" id="edit_{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">{{trans('admin.editCategory')}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form class="form-horizontal" method="post" action="{{route('editMainCat')}}" enctype="multipart/form-data">
                                                    {{csrf_field()}}
                                                    <div class="modal-body">
                                                        <input type="hidden" name="cat_id" value="{{$category->id}}">

                                                        <div class="form-group row {{ $errors->has('ar_name') ? ' has-error' : '' }}">
                                                            <label class="col-lg-12 control-label {{Session::get("lang") =="ar" ? 'text-lg-right' : 'text-lg-left'}}" for="textinput">Arabic name</label>
                                                            <div class="col-lg-12">
                                                                <input name="ar_name" type="text" placeholder="{{trans('admin.arabicName')}}" class="form-control btn-square" value="{{$category->ar_name}}" required>
                                                            </div>
                                                        </div>
                                                        @include('admin.layouts.error', ['input' => 'ar_name'])

                                                        <div class="form-group row {{ $errors->has('en_name') ? ' has-error' : '' }}">
                                                            <label class="col-lg-12 control-label {{Session::get("lang") =="ar" ? 'text-lg-right' : 'text-lg-left'}}" for="textinput">English name</label>
                                                            <div class="col-lg-12">
                                                                <input name="en_name" type="text" placeholder="{{trans('admin.englishName')}}" class="form-control btn-square"  value="{{$category->en_name}}" required>
                                                            </div>
                                                        </div>
                                                        @include('admin.layouts.error', ['input' => 'en_name'])

                                                        <div class="form-group row {{ $errors->has('image') ? ' has-error' : '' }}">
                                                            <label class="col-lg-12 control-label {{Session::get("lang") =="ar" ? 'text-lg-right' : 'text-lg-left'}}" for="textinput">{{trans('admin.uploadImage')}}</label>
                                                            <div class="col-lg-12">
                                                                <input id="inputImage" type="file" name="image" accept=".jpg,.jpeg,.png,.gif,.bmp,.tiff">
                                                            </div>
                                                        </div>
                                                        <img src="{{$category->image}}" class="image_radius"><br>
                                                        <span class="label label-warning">Leave it there if no changes</span>
                                                        @include('admin.layouts.error', ['input' => 'image'])


                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="reset" class="btn btn-dark" data-dismiss="modal">{{trans('admin.close')}}</button>
                                                        <button class="btn btn-primary">{{trans('admin.saveChanges')}}</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

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

    <div class="modal fade" id="subCat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        <i class="icon-plus"></i> {{trans('admin.category')}}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form-horizontal" method="post" action="{{route('storeMainCat')}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="modal-body">

                        <div class="form-group row">
                            <label class="col-lg-12 control-label {{Session::get("lang") =="ar" ? 'text-lg-right' : 'text-lg-left'}}" for="textinput">{{trans('admin.arabicName')}}</label>
                            <div class="col-lg-12">
                                <input id="name" name="ar_name" type="text" placeholder="{{trans('admin.arabicName')}}" class="form-control btn-square" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-12 control-label {{Session::get("lang") =="ar" ? 'text-lg-right' : 'text-lg-left'}}" for="textinput">{{trans('admin.englishName')}}</label>
                            <div class="col-lg-12">
                                <input id="name" name="en_name" type="text" placeholder="{{trans('admin.englishName')}}" class="form-control btn-square" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-12 control-label {{Session::get("lang") =="ar" ? 'text-lg-right' : 'text-lg-left'}}" for="textinput">{{trans('admin.image')}}</label>
                            <div class="col-lg-12">
                                <input name="image" type="file" accept=".jpg,.jpeg,.png,.gif,.bmp,.tiff" required>
                            </div>
                        </div>

                        {{--<div class="col-md-12">

                            <label>{{trans('admin.cities')}}:</label>
                            <div class="col-md-11 breadcrumb" style="background-color:#c1c1c1;padding-bottom: 0">

                                @foreach($cities as $city)

                                    <label class="d-block" for="chk-ani">
                                        <input type="checkbox" name="city[]" value="{{$city->id}}" class="checkbox_animated">
                                    </label>
                                    {{$city->name}}
                                    &nbsp;&nbsp;&nbsp;&nbsp;

                                @endforeach

                            </div>
                        </div>--}}

                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-dark" data-dismiss="modal">{{trans('admin.close')}}</button>
                        <button class="btn btn-primary">{{trans('admin.saveChanges')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
