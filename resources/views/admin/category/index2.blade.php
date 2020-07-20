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
                                        </td>
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
