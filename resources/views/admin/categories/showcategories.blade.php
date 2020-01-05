@extends('layouts.admin')
@section('styles')
    <link href="{{asset('admin_assets/plugins/bootstrap-table/css/bootstrap-table.min.css')}}" rel="stylesheet" type="text/css" />
@stop
@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @elseif(Session::has('danger'))
        <div class="alert alert-danger">{{ Session::get('danger') }}</div>
    @endif

    <div class="row">
        <h4 class="m-t-0 header-title">categories :</h4>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-4">
            <h4 style=" background-color:transparent;"><span class="m-t-0 header-title" style=" background-color: lightslategrey;">Add New Category:</span></h4>

            {!! Form::open(['method'=>'post','action'=>'CategoriesController@store','files'=>true]) !!}
            <div class="form-group">
                {!! Form::label('name','Name') !!}
                {!! Form::text('name',null,['class'=>'form-control','required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('name Ar','Name Ar') !!}
                {!! Form::text('name_ar',null,['class'=>'form-control','required']) !!}
            </div>
            <button class="btn btn-primary">Create</button>
            <button class="btn btn-default" data-dismiss="modal" >Cancel</button>
            {!! Form::close() !!}
        </div>
        <div class="col-md-8">
            <div class="card-box">
                <table data-toggle="table"
                       data-page-list="[5, 10, 20]"
                       data-page-size="5"
                       data-pagination="true" class="table-bordered ">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Name Ar</th>
                        <th data-field="Actions" data-align="center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach($categories as $category):
                    ?>
                    <tr>
                        <td>{{$category['name']}}</td>
                        <td>{{$category['name_ar']}}</td>
                        <td>
                            <a data-toggle="modal" class="btn btn-success" data-target=".{{$category['id'].'edit'}}" >Edit</a>
                            <a data-toggle="modal" class="btn btn-danger" data-target=".{{$category['id'].'delete'}}" >Delete</a>
                        </td>
                    </tr>
                    {{--Modal for user delete--}}
                    <div class="modal fade {{$category['id'].'delete'}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title mt-0" style="color: red">Do You Wanna Delete This Category</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">
                                    {!! Form::open(['method'=>'Delete','action'=>['CategoriesController@destroy',$category['id']]]) !!}
                                    <button class="btn btn-danger">Delete</button>
                                    <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    {!! Form::close() !!}
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                    {{--End Modal for user delete--}}
                    {{--End Modal for user delete--}}{{--Modal for user delete--}}
                    <div class="modal fade {{$category['id'].'edit'}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">
                                    {!! Form::model($category,['method'=>'PATCH','action'=>['CategoriesController@update',$category->id],'files'=>true]) !!}
                                    <div class="modal-body">
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('name','Name') !!}
                                        {!! Form::text('name',null,['class'=>'form-control','required']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('name','Name Ar') !!}
                                        {!! Form::text('name_ar',null,['class'=>'form-control','required']) !!}
                                    </div>
                                    <button class="btn btn-primary">Update</button>
                                    <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    {!! Form::close() !!}
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                    {{--End Modal for user delete--}}
                    <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>




@stop


@section('scripts')
    <script src="{{asset('admin_assets/plugins/bootstrap-table/js/bootstrap-table.js')}}"></script>
    <script src="{{asset('admin_assets/pages/jquery.bs-table.js')}}"></script>
@stop
