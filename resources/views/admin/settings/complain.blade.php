@extends('admin.layouts.app')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <div class="{{Session::get("lang") =="ar" ? 'page-header-right' : 'page-header-left'}}">
                            <h3>{{trans('admin.complainsSuggestion')}}</h3>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item active">{{trans('admin.complainsSuggestion')}}</li>
                            </ol>
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
                                <th scope="col">{{trans('admin.type')}}</th>
                                <th scope="col">{{trans('admin.user')}} {{trans('admin.name')}}</th>
                                <th scope="col">{{trans('admin.title')}}</th>
                                <th scope="col">{{trans('admin.description')}}</th>
                                <th scope="col">{{trans('admin.date')}}</th>
                                <th scope="col">{{trans('admin.operations')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($complains as $complain)
                                <tr>
                                    <td>{{$complain->id}}</td>
                                    <td>{{$complain->type}}</td>
                                    <td>{{$complain->user->name}}</td>
                                    <td>{{$complain->title}}</td>
                                    <td>{{$complain->description}}</td>
                                    <td>{{$complain->created_at->diffForHumans()}}</td>
                                    <td>
                                        <button class="btn btn-danger btn-condensed mb-control" data-toggle="modal" data-target="#message-box-danger" title="Delete"><i class="fa fa-trash-o"></i></button>
                                    </td>
                                </tr>

                                <div class="modal animated fadeIn" id="message-box-danger" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header btn-danger">
                                                <h5 class="modal-title" id="exampleModalLabel">{{trans('admin.decline')}}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <h4>{{trans('admin.areYouSure')}}</h4>
                                                <h6>Your are about to delete {{$complain->type}}.</h6>
                                            </div>
                                            <div class="modal-footer">
                                                <form method="post" action="{{route('deleteComplainSuggest')}}" class="buttons">
                                                    {{csrf_field()}}
                                                    <input type="hidden" name="complain_id" value="{{$complain->id}}">
                                                    <button class="btn btn-dark" type="button" data-dismiss="modal">{{trans('admin.close')}}</button>
                                                    <button type="submit" class="btn btn-danger">{{trans('admin.confirm')}}</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->

    </div>
@endsection
