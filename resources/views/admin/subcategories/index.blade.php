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
        <div class="col-sm-12">
            <h4 class="m-t-0 header-title">subcategory</h4>

        </div>
    </div>
    <hr>
    <div class="row">
        <div class="card-box col-md-12">
            <a  class="btn btn-primary"  href="{{route('subcategory.create')}}" >Add subcategory</a>
            <table data-toggle="table"
                   data-page-list="[5, 10, 20]"
                   data-page-size="5"
                   data-pagination="true" class="table-bordered ">
                <thead>
                <tr>
                    <th>Image</th>
                    <th>name</th>
                    <th>name Ar</th>
                    <th>Category Name</th>
                    <th data-field="Actions" data-align="center">Action</th>
                </tr>
                </thead>
                <tbody>
               @foreach($subcategories as $subcategory)
                <tr>
                    @if(null!==$subcategory->image)

                        <td><img width="200px" src="{{asset('subcategories/'.$subcategory->image)}}" alt=""></td>


                    @else
                        <td></td>
                    @endif

                    <td>{{$subcategory->name}}</td>
                    <td>{{$subcategory->name_ar}}</td>
                    @if(isset($subcategory->Subcategories))
                    <td>{{$subcategory->Subcategories->name}}</td>
                    @else
                    <td></td>
                    @endif
                    <td>
                    <a data-toggle="modal" class="btn btn-primary" data-target=".{{$subcategory['id'].'show'}}" >show</a>
                        <a data-toggle="modal" class="btn btn-success" data-target=".{{$subcategory['id'].'edit'}}" >edit</a>
                        <a data-toggle="modal" class="btn btn-danger" data-target=".{{$subcategory['id'].'delete'}}" >Delete</a>

                    </td>
                </tr>
                {{--Modal for user delete--}}
                <div class="modal fade {{$subcategory['id'].'delete'}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title mt-0" style="color: red">Do You Wanna Delete This subcategory</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                {!! Form::open(['method'=>'Delete','action'=>['SubcategoriesController@destroy',$subcategory['id']]]) !!}
                                <button class="btn btn-danger">Delete</button>
                                <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                                {!! Form::close() !!}
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
                {{--End Modal for user delete--}}{{--Modal for user delete--}}
                <!-- /.modal -->
                {{--End Modal for user delete--}}
                {{--start Modal for subcategories edit--}}
                    <div class="modal fade {{$subcategory['id'].'edit'}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">
                                    {!! Form::model($subcategory,['method'=>'PATCH','action'=>['SubcategoriesController@update',$subcategory->id],'files'=>true]) !!}
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
                    {{--end Modal for subcategories edit--}}
                    {{--start Modal for subcategories edit--}}
                    <div class="modal fade {{$subcategory['id'].'show'}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                              <label>description</label>
                              <h5>{{$subcategory->description}}</h5>
                              <label>description_ar</label>
                              <h5>{{$subcategory->description_ar}}</h5> 
                                 
                                    {!! Form::close() !!}
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                    {{--end Modal for subcategories edit--}}
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
@stop
@section('scripts')
    <script src="{{asset('admin_assets/plugins/bootstrap-table/js/bootstrap-table.js')}}"></script>
    <script src="{{asset('admin_assets/pages/jquery.bs-table.js')}}"></script>
@stop













