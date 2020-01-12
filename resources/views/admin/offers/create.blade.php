@extends('layouts.admin')
@section('content')
    <h4 class="m-t-0 header-title">Create New Product</h4>
    {!! Form::open(['method'=>'post','action'=>['AdminOfferController@store'],'files'=>true]) !!}
    <div class="form-group">


        <div class="form-group">
            {!! Form::label('offer_currency','offer_currency') !!}
            <input name="offer_currency" type="number">
        </div>
        <div class="form-group">
            {!! Form::label('offer','offer') !!}
            <select name="product_id"  id="product_id"  class="form-control">
                @foreach($products as $product)
                    <option value="{{$product->id}}">{{$product->title}}</option>
                @endforeach
            </select>
        </div>
     
        
        <button class="btn btn-success" type="submit">Create</button>
        <button class="btn btn-default" data-dismiss="modal" >Cancel</button>
    </div>
    {!! Form::close() !!}
    @stop

    @section('scripts')
        <!-- Wysiwig js-->
            <script src="{{asset('admin_assets/plugins/tinymce/tinymce.min.js')}}"></script>

     


@stop
