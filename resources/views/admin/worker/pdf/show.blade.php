@extends('admin.layouts.app')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-header">
                <div style="float: {{Session::get("lang") =="ar" ? 'left' : 'right'}};">
                    <button class="btn btn-primary mb-control" data-toggle="modal" data-target="#add_pdf" title="suspend">{{trans("admin.addPdf")}} pdf</button>
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
                                <th>#</th>
                                <th>{{trans('admin.type')}}</th>
                                <th>{{trans('admin.file')}}</th>
                                <th>{{trans('admin.operations')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($worker_pdfs) > 0 )
                                @foreach($worker_pdfs as $worker_pdf)
                                    <tr>
                                        <td>{{$worker_pdf->id}}</td>
                                        <td>{{$worker_pdf->type}}</td>
                                        <td><a target="_blank" href="{{$worker_pdf->file}}" class="fa fa-download"></a></td>

                                        <td>
                                            <button class="btn btn-primary btn-condensed" data-toggle="modal" data-target="#edit_pdf"><i class="fa fa-eye"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="add_pdf" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{trans("admin.addPdf")}} Pdf</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form-horizontal" method="post" action="{{route('uploadAdminContractPdf')}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="modal-body">

                        <div class="form-group row">
                            <label class="col-lg-12 control-label {{Session::get("lang") =="ar" ? 'text-lg-right' : 'text-lg-left'}}" for="textinput">{{trans('admin.type')}}</label>
                            <div class="col-lg-12">
                                <select name="type" class="form-control">
                                    <option value="worker">Worker</option>
                                    <option value="company">Company</option>
                                    <option value="individual">Individual</option>
                                </select>
                            </div>
                        </div>
                        @include('admin.layouts.error', ['input' => 'type'])

                        <div class="form-group row">
                            <label class="col-lg-12 control-label {{Session::get("lang") =="ar" ? 'text-lg-right' : 'text-lg-left'}}" for="textinput">{{trans('admin.uploadfile')}}</label>
                            <div class="col-lg-12">
                                <input id="inputImage" type="file" name="file">
                            </div>
                        </div>
                        @include('admin.layouts.error', ['input' => 'file'])

                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-dark" data-dismiss="modal">{{trans('admin.close')}}</button>
                        <button class="btn btn-primary">{{trans('admin.saveChanges')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="edit_pdf" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Pdf</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form-horizontal" method="post" action="{{route('editAdminContractPdf')}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="modal-body">

                        <div class="form-group row">
                            <label class="col-lg-12 control-label {{Session::get("lang") =="ar" ? 'text-lg-right' : 'text-lg-left'}}" for="textinput">Type</label>
                            <div class="col-lg-12">
                                <select name="type" class="form-control">
                                    <option value="worker">Worker</option>
                                    <option value="company">Company</option>
                                    <option value="individual">Individual</option>
                                </select>
                            </div>
                        </div>
                        @include('admin.layouts.error', ['input' => 'type'])

                        <div class="form-group row">
                            <label class="col-lg-12 control-label {{Session::get("lang") =="ar" ? 'text-lg-right' : 'text-lg-left'}}" for="textinput">Upload File</label>
                            <div class="col-lg-12">
                                <input id="inputImage" type="file" name="file">
                            </div>
                        </div>
                        @include('admin.layouts.error', ['input' => 'file'])

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
