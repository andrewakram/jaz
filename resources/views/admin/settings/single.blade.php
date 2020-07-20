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
                                <li class="breadcrumb-item">{{trans("admin." . $type)}}</li>
                                <!--<li class="breadcrumb-item active">{{$new_type}}</li>-->
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        @include('admin.layouts.message')
        <div class="container-fluid">
            <div class="col-md-12">
                <form class="form-horizontal" action="{{asset( Session::get('lang') . '/admin/settings/'.$type.'/edit/update')}}" method="post">
                    {{csrf_field()}}
                    <div class="card">
                        <div class="card-header">
                            <h3 class="panel-title">
                                {{trans('admin.edit')}} {{trans("admin." . $type)}}<!--{{$new_type}} -->
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group {{ $errors->has('en_text') ? ' has-error' : '' }}">
                                <label class="col-md-3 col-xs-12 control-label">{{trans('admin.englishText')}}</label>
                                <div>
                                    <textarea class="form-control" name="en_name" rows="5">{{$setting->en_name }}</textarea>
                                </div>
                                @include('admin.layouts.error', ['input' => 'en_text'])
                            </div>

                            <div class="form-group {{ $errors->has('en_text') ? ' has-error' : '' }}">
                                <label class="col-md-3 col-xs-12 control-label">{{trans('admin.arabicText')}}</label>
                                <div>
                                    <textarea class="form-control" name="ar_name" rows="5">{{$setting->ar_name }}</textarea>
                                </div>
                                @include('admin.layouts.error', ['input' => 'ar_text'])
                            </div>

                            @if($type == "about_us")
                                <div class="form-group {{ $errors->has('en_text') ? ' has-error' : '' }}">
                                    <label class="col-md-3 col-xs-12 control-label">{{trans('admin.percent')}}</label>
                                    <div>
                                        <input name="interest_fee" type="number" placeholder="{{trans('admin.percent')}}" class="form-control btn-square"  value="{{$percent->interest_fee}}" required>
                                    </div>
                                    @include('admin.layouts.error', ['input' => 'ar_text'])
                                </div>
                                
                                <div class="form-group {{ $errors->has('en_text') ? ' has-error' : '' }}">
                                    <label class="col-md-3 col-xs-12 control-label">{{trans('admin.gov_percent')}}</label>
                                    <div>
                                        <input name="gov_fee" type="number" placeholder="{{trans('admin.gov_percent')}}" class="form-control btn-square"  value="{{$percent->gov_fee}}" required>
                                    </div>
                                    @include('admin.layouts.error', ['input' => 'ar_text'])
                                </div>
                                
                            @endif

                        </div>
                        <div class="panel-footer">
                            <button type="reset" class="btn btn-default">{{trans('admin.clear')}}</button> &nbsp;
                            <button class="btn btn-primary {{Session::get("lang") =="ar" ? 'pull-left' : 'pull-right'}}">
                                {{trans('admin.update')}}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>

@endsection
