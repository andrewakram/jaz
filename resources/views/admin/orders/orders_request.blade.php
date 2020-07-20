@extends('company.layouts.app')
@section('content')
    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="{{route('dashboard')}}">{{trans('admin.dashboard')}}</a></li>
        <li> <a href="{{asset( Session::get("lang") . '/admin/orders/urgent')}}">{{trans('admin.orders')}}</a></li>
        <li>Orders Invoice Sheet</li>
        <li class=" active">Request</li>
    </ul>
    <!-- END BREADCRUMB -->

    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                <form class="form-horizontal" method="post" action="{{asset( Session::get("lang") . '/admin/orders/invoice/show')}}">
                    {{csrf_field()}}
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                Info Sheet Request
                            </h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group {{ $errors->has('type') ? ' has-error' : '' }}">
                                <label class="col-md-3 col-xs-12 control-label">{{trans('admin.type')}}</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <select class="form-control select" name="type" data-style="btn-success" required>
                                                <option value="urgent">Urgent</option>
                                                <option value="scheduled">Scheduled</option>
                                        </select>
                                        <span class="input-group-addon"><span class="fa fa-info-circle"></span></span>
                                    </div>
                                    @include('admin.layouts.error', ['input' => 'type'])
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('from') ? ' has-error' : '' }}">
                                <label class="col-md-3 col-xs-12 control-label">{{trans('admin.from')}} : </label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <input type="date" class="form-control" name="from" value="{{old('from')}}" required>
                                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                    </div>
                                    @include('admin.layouts.error', ['input' => 'from'])
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('to') ? ' has-error' : '' }}">
                                <label class="col-md-3 col-xs-12 control-label">{{trans('admin.to')}} : </label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <input type="date" class="form-control" name="to" value="{{old('to')}}" required>
                                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                    </div>
                                    @include('admin.layouts.error', ['input' => 'to'])
                                </div>
                            </div>

                        </div>

                        <div class="panel-footer">
                            <button type="reset" class="btn btn-default">Reset</button> &nbsp;
                            <button class="btn btn-primary {{Session::get("lang") =="ar" ? 'pull-left' : 'pull-right'}}">
                                Show
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>
@endsection
