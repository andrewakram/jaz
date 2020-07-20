@extends('admin.layouts.app')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <div class="{{Session::get("lang") =="ar" ? 'page-header-right' : 'page-header-left'}}">
                            <h3>{{ trans('admin.cities')}} </h3>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item active">{{ trans('admin.cities')}}</li>
                            </ol>
                        </div>
                        <div style="float: {{Session::get("lang") =="ar" ? 'left' : 'right'}}">
                            @if(admin()->hasPermissionTo('Add city'))
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#subCat">
                                <i class="icon-plus"></i>
                                {{trans('admin.addCity')}} 
                            </button>
                            @endif
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
                                <th scope="col">{{ trans('admin.operations')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($cities as $c)
                                    <tr id="main_cat_{{$c->id}}" onclick="myFunction({{$c->id}})" class="{{$c->active == 0 ? 'table-danger' :''}}">
                                        <td>{{$c->id}}</td>
                                        <td>{{$c->ar_name}}</td>
                                        <td>{{$c->en_name}}</td>
                                        <td>
                                            @if(admin()->hasPermissionTo('Edit City'))
                                            <button title="{{trans('admin.edit')}}" type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit_{{$c->id}}">
                                                <i class="fa fa-edit"></i> 
                                            </button>
                                            @endif
                                            @if(admin()->hasPermissionTo('Delete City'))
                                                    @if($c->active == 1)
                                                        <a href="{{route('editCityStatus',$c->id)}}" >
                                                            <button title="{{trans("admin._deactivate")}}" class="btn btn-danger">
                                                                -
                                                            </button>
                                                        </a>
                                                    @else
                                                        <a href="{{route('editCityStatus',$c->id)}}"  >
                                                            <button title="{{trans("admin._activate")}}" class="btn btn-success">
                                                                +
                                                            </button>
                                                        </a>
                                                    @endif
                                                {{--<button title="{{trans('admin.delete')}}" type="button" class="btn btn-danger" data-toggle="modal" data-target="#subCat">
                                                    -
                                                </button>--}}
                                            @endif
                                        </td>

                                        <div class="modal fade" id="edit_{{$c->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">{{trans('admin.editCity')}}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form class="form-horizontal" method="post" action="{{route('editCity')}}" enctype="multipart/form-data">
                                                        {{csrf_field()}}
                                                        <div class="modal-body">
                                                            <input type="hidden" name="city_id" value="{{$c->id}}">


                                                            <div class="form-group row {{ $errors->has('ar_name') ? ' has-error' : '' }}">
                                                                <label class="col-lg-12 control-label {{Session::get("lang") =="ar" ? 'text-lg-right' : 'text-lg-left'}}" for="textinput">Arabic name</label>
                                                                <div class="col-lg-12">
                                                                    <input name="ar_name" type="text" placeholder="{{trans('admin.arabicName')}}" class="form-control btn-square" value="{{$c->ar_name}}" required>
                                                                </div>
                                                            </div>
                                                            @include('admin.layouts.error', ['input' => 'ar_name'])

                                                            <div class="form-group row {{ $errors->has('en_name') ? ' has-error' : '' }}">
                                                                <label class="col-lg-12 control-label {{Session::get("lang") =="ar" ? 'text-lg-right' : 'text-lg-left'}}" for="textinput">English name</label>
                                                                <div class="col-lg-12">
                                                                    <input name="en_name" type="text" placeholder="{{trans('admin.englishName')}}" class="form-control btn-square"  value="{{$c->en_name}}" required>
                                                                </div>
                                                            </div>
                                                            @include('admin.layouts.error', ['input' => 'en_name'])


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
                    <h5 class="modal-title" id="exampleModalLabel">{{trans('admin.addCity')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form-horizontal" method="post" action="{{route('cities.store')}}" enctype="multipart/form-data">
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
