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
        <h4 class="m-t-0 header-title">subcategories :</h4>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-4">
            <h4 style=" background-color:transparent;"><span class="m-t-0 header-title" style=" background-color: lightslategrey;">Add New  subcategoryCategory:</span></h4>

            {!! Form::open(['method'=>'post','action'=>'SubCategoriesController@store','files'=>true]) !!}
            <div class="form-group">
                {!! Form::label('name','Name') !!}
                {!! Form::text('name',null,['class'=>'form-control','required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('name Ar','Name Ar') !!}
                {!! Form::text('name_ar',null,['class'=>'form-control','required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('description','description') !!}
                {!! Form::text('description',null,['class'=>'form-control','required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('description AR','description Ar') !!}
                {!! Form::text('description_ar',null,['class'=>'form-control','required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('category','Category') !!}
                <select name="category_id"   class="form-control">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <input class="form-control" required type="file" name="image" multiple>
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
                        <th>desription</th>
                        <th>description Ar</th>
                        <th>category name</th>
                        <th>image</th>
                        <th data-field="Actions" data-align="center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach($subcategories as $subcategory):
                    ?>
                    <tr>
                        <td>{{$subcategory['name']}}</td>
                        <td>{{$subcategory['name_ar']}}</td>
                        <td>{{$subcategory['description']}}</td>
                        <td>{{$subcategory['description_ar']}}</td>
                        <td>{{$subcategory->Subcategories->name}}</td>
                        <td><img width="200px" src="{{asset('subcategories/'.$subcategory->image)}}" alt=""></td>

                        <td>
                            <a data-toggle="modal" class="btn btn-success" data-target=".{{$subcategory['id'].'edit'}}" >Edit</a>
                            <a data-toggle="modal" class="btn btn-danger" data-target=".{{$subcategory['id'].'delete'}}" >Delete</a>
                        </td>
                    </tr>
                    {{--Modal for user delete--}}
                    <div class="modal fade {{$subcategory['id'].'delete'}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title mt-0" style="color: red">Do You Wanna Delete This subCategory</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">
                                    {!! Form::open(['method'=>'Delete','action'=>['SubCategoriesController@destroy',$subcategory['id']]]) !!}
                                    <button class="btn btn-danger">Delete</button>
                                    <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    {!! Form::close() !!}
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                    {{--End Modal for user delete--}}
                    {{--End Modal for user delete--}}{{--Modal for user delete--}}
                    <div class="modal fade {{$subcategory['id'].'edit'}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">
                                    {!! Form::model($subcategory,['method'=>'PATCH','action'=>['SubCategoriesController@update',$subcategory->id],'files'=>true]) !!}
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
                                    <div class="form-group">
                                        {!! Form::label('description','description') !!}
                                        {!! Form::text('description',null,['class'=>'form-control','required']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('description AR','description Ar') !!}
                                        {!! Form::text('description_ar',null,['class'=>'form-control','required']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('category','Category') !!}
                                        <select name="category_id"   class="form-control">
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control"  type="file" name="image" multiple>
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
