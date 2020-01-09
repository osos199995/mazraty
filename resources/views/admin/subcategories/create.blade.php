@extends('layouts.admin')
@section('content')
    <h4 class="m-t-0 header-title">Create New subcategory</h4>
    {!! Form::open(['method'=>'post','action'=>['SubcategoriesController@store'],'files'=>true]) !!}
    <div class="form-group">
        <div class="form-group">
            {!! Form::label('name','name') !!}
            {!! Form::text('name',null,['class'=>'form-control','required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('name_ar','name_ar') !!}
            {!! Form::text('name_ar',null,['class'=>'form-control','required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('description','Description') !!}
            {!! Form::textarea('description',null,['class'=>'form-control','id'=>'elm1']) !!}
            @if ($errors->has('description'))
                <div class="alert alert-danger">{{ $errors->first('description') }}</div>
            @endif
        </div>
        <div class="form-group">
            {!! Form::label('description_ar',' Description_ar') !!}
            {!! Form::textarea('description_ar',null,['class'=>'form-control','id'=>'elm1']) !!}
            @if ($errors->has('description_ar'))
                <div class="alert alert-danger">{{ $errors->first('description_ar') }}</div>
            @endif
        </div>
      
     

       
        <div class="form-group">
            {!! Form::label('category','Category') !!}
            <select name="category_id"  id="category_id"  class="form-control">
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
       
        <div class="form-group">
            <input class="form-control" required type="file" name="image" multiple>
        </div>
        <button class="btn btn-success" type="submit">Create</button>
        <button class="btn btn-default" data-dismiss="modal" >Cancel</button>
    </div>
    {!! Form::close() !!}
    @stop

    @section('scripts')
    


      
@stop
