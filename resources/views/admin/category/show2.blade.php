@extends('admin.layouts.app')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <div class="{{Session::get("lang") =="ar" ? 'page-header-right' : 'page-header-left'}}">
                            <h3>{{trans('admin.subCategory')}} </h3>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{route('categories.index')}}">{{trans('admin.categories')}}</a></li>
                                <li class="breadcrumb-item">{{trans('admin.subCategory')}}</li>
                            </ol>
                        </div>
                        @if(strpos($_SERVER['REQUEST_URI'],'third_cats' ))
                            @if(admin()->hasPermissionTo('Add third category'))
                            {{--<div style="float: right">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#thirdCat"><i class="icon-plus"></i> Add Third Category </button>
                            </div>--}}
                            @endif
                        @else
                            @if(admin()->hasPermissionTo('Add sub category'))
                            <div style="float: {{Session::get("lang") =="ar" ? 'left' : 'right'}}">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#subCat"><i class="icon-plus"></i> {{trans('admin.addSubCategory')}} </button>
                            </div>
                            @endif
                        @endif

                    </div>
                </div>
            </div>
        </div>
        @include('admin.layouts.message')
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-lg-12 col-xl-12">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{trans('admin.arabicName')}}</th>
                                <th scope="col">{{trans('admin.englishName')}}</th>
                                <th scope="col">{{trans('admin.image')}}</th>
                                @if(strpos($_SERVER['REQUEST_URI'],'third_cats'))
                                    <th scope="col">{{trans('admin.price')}}</th>
                                @endif
                                {{--@elseif($id == 3)--}}
                                    <th scope="col">{{trans('admin.operations')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr style="background-color: {{$category->active == 1 ? "" : "#ff7172"}}" >
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->ar_name}}</td>
                                    <td>{{$category->en_name}}</td>
                                    <td>
                                        <img src="{{$category->image}}" class="image_radius"/>
                                    </td>
                                    @if(strpos($_SERVER['REQUEST_URI'],'third_cats'))
                                        <td>{{$category->price}}</td>
                                    @endif
                                    <td>
                                        @if(route('sub_cats',$category->id) && $category->parent_id == 3)
                                            <a title="{{trans('admin.view')}}" href="{{route('third_cats',$category->id)}}"><button class="btn btn-info btn-condensed"><i class="fa fa-eye"></i></button></a>
                                        @endif
                                        @if(admin()->hasPermissionTo('Edit sub category') || admin()->hasPermissionTo('Edit third category'))

                                            @if($category->active == 1)
                                                <button title="{{trans('admin.edit')}}" type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit_{{$category->id}}"><i class="fa fa-edit"></i> </button>
                                                <a href="{{route('editCatStatus',$category->id)}}" >
                                                    <button title="{{trans("admin._deactivate")}}" class="btn btn-danger">
                                                    -
                                                    </button>
                                                </a>
                                            @else
                                                <button title="{{trans('admin.edit')}}" type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit_{{$category->id}}"><i class="fa fa-edit"></i> </button>
                                                <a href="{{route('editCatStatus',$category->id)}}"  >
                                                    <button title="{{trans("admin._activate")}}" class="btn btn-success">
                                                    +
                                                    </button>
                                                </a>
                                            @endif

                                        @endif
                                    </td>

                                    <div class="modal fade" id="edit_{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">{{trans('admin.editCategory')}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form class="form-horizontal" method="post" action="{{route('editCat')}}" enctype="multipart/form-data">
                                                    {{csrf_field()}}
                                                    <div class="modal-body">
                                                        <input type="hidden" name="cat_id" value="{{$category->id}}">
                                                        <input type="hidden" @if(isset($id)) name="parent_id" value="{{($id)}}"
                                                        @else name="parent_third_id" value="{{($thirdId)}}" @endif>

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

                                                        @if($category->type == 3)
                                                            <div class="form-group row {{ $errors->has('price') ? ' has-error' : '' }}">
                                                                <label class="col-lg-12 control-label {{Session::get("lang") =="ar" ? 'text-lg-right' : 'text-lg-left'}}" for="textinput">Price</label>
                                                                <div class="col-lg-12">
                                                                    <input name="price" type="number" placeholder="{{trans('admin.price')}}" class="form-control btn-square" value="{{$category->price}}" required>
                                                                </div>
                                                            </div>
                                                            @include('admin.layouts.error', ['input' => 'price'])

                                                            <div class="form-group row {{ $errors->has('description') ? ' has-error' : '' }}">
                                                                <label class="col-lg-12 control-label {{Session::get("lang") =="ar" ? 'text-lg-right' : 'text-lg-left'}}" for="textinput">{{trans('admin.description')}}</label>
                                                                <div class="col-lg-12">
                                                                    <textarea class="form-control z-depth-1" id="exampleFormControlTextarea6" name="description" rows="3"  required>{{$category->description}}</textarea>
                                                                </div>
                                                            </div>
                                                            @include('admin.layouts.error', ['input' => 'description'])
                                                        @endif

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
                    <h5 class="modal-title" id="exampleModalLabel">{{trans('admin.addSubCategory')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form-horizontal" method="post" action="{{route('categories.store')}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <input type="hidden" name="parent_id" value="{{isset($id)?$id:''}}">

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

                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-dark" data-dismiss="modal">{{trans('admin.close')}}</button>
                        <button class="btn btn-primary">{{trans('admin.saveChanges')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="thirdCat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{trans('admin.add3cat')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form-horizontal" method="post" action="{{route('storeThird')}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <input type="hidden" name="parent_id" value="{{isset($thirdId)?$thirdId:''}}">

                        <div class="form-group row">
                            <label class="col-lg-12 control-label {{Session::get("lang") =="ar" ? 'text-lg-right' : 'text-lg-left'}}" for="textinput">{{trans('admin.arabicName')}}</label>
                            <div class="col-lg-12">
                                <input name="ar_name" type="text" placeholder="{{trans('admin.arabicName')}}" class="form-control btn-square" required>
                            </div>
                        </div>
                            @include('admin.layouts.error', ['input' => 'ar_name'])
                        <div class="form-group row">
                            <label class="col-lg-12 control-label {{Session::get("lang") =="ar" ? 'text-lg-right' : 'text-lg-left'}}" for="textinput">{{trans('admin.englishName')}}</label>
                            <div class="col-lg-12">
                                <input name="en_name" type="text" placeholder="{{trans('admin.englishName')}}" class="form-control btn-square" required>
                            </div>
                        </div>
                            @include('admin.layouts.error', ['input' => 'en_name'])

                        <div class="form-group row">
                            <label class="col-lg-12 control-label {{Session::get("lang") =="ar" ? 'text-lg-right' : 'text-lg-left'}}" for="textinput">{{trans('admin.price')}}</label>
                            <div class="col-lg-12">
                                <input name="price" type="number" placeholder="{{trans('admin.price')}}" class="form-control btn-square" required>
                            </div>
                        </div>
                            @include('admin.layouts.error', ['input' => 'price'])

                        <div class="form-group row">
                            <label class="col-lg-12 control-label {{Session::get("lang") =="ar" ? 'text-lg-right' : 'text-lg-left'}}" for="textinput">{{trans('admin.description')}}</label>
                            <div class="col-lg-12">
                                <textarea class="form-control z-depth-1" id="exampleFormControlTextarea6" name="description" rows="3" placeholder="{{trans('admin.description')}}" required></textarea>
                            </div>
                        </div>
                            @include('admin.layouts.error', ['input' => 'description'])

                        <div class="form-group row">
                            <label class="col-lg-12 control-label {{Session::get("lang") =="ar" ? 'text-lg-right' : 'text-lg-left'}}" for="textinput">{{trans('admin.uploadImage')}}</label>
                            <div class="col-lg-12">
                                <input id="inputImage" type="file" name="image" accept=".jpg,.jpeg,.png,.gif,.bmp,.tiff" required>
                            </div>
                        </div>
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


@endsection
