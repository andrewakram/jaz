@extends('admin.layouts.app')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <div class="{{Session::get("lang") =="ar" ? 'page-header-right' : 'page-header-left'}}">
                            <h3>{{trans('admin.settings')}}</h3>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item">{{trans('admin.settings')}}</li>
                                <li class="breadcrumb-item active"> {{trans("admin." . $type)}} </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        @include('admin.layouts.message')
        <div class="container-fluid">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-block row">
                        <div class="col-sm-12 col-lg-12 col-xl-12">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">{{trans('admin.englishText')}}</th>
                                        <th scope="col">{{trans('admin.arabicName')}}</th>
                                        <th scope="col">{{trans('admin.operations')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>{{$setting->en_name}}</td>
                                        <td>{{$setting->ar_name}}</td>
                                        <td>
                                            <a href="{{asset( Session::get('lang') . '/admin/settings/'. $type .'/edit')}}" title="{{trans('admin.edit')}}" class="buttons"><button class="btn btn-warning btn-condensed"><i class="fa fa-edit"></i></button></a>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div>


            @if($type == "about_us")
                <div class="form-group {{ $errors->has('en_text') ? ' has-error' : '' }}">
                    <label class="col-md-6 col-md-offset-6 col-xs-12 control-label">{{trans('admin.percent')}}</label>
                    <div>
                        <input name="en_name" type="number" placeholder="{{trans('admin.percent')}}" class="form-control btn-square"  value="{{$percent->interest_fee}}" readonly>
                    </div>
                    @include('admin.layouts.error', ['input' => 'ar_text'])
                </div>
                
                <div class="form-group {{ $errors->has('en_text') ? ' has-error' : '' }}">
                    <label class="col-md-6 col-md-offset-6 col-xs-12 control-label">{{trans('admin.gov_percent')}}</label>
                    <div>
                        <input name="gov_percent" type="number" placeholder="{{trans('admin.gov_percent')}}" class="form-control btn-square"  value="{{$percent->gov_fee}}" readonly>
                    </div>
                    @include('admin.layouts.error', ['input' => 'ar_text'])
                </div>
            @endif




        </div>
        <!-- Container-fluid Ends-->
    </div>

@endsection
