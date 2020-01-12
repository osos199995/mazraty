@extends('layouts.admin')
@section('content')
    <h4 class="m-t-0 header-title">Edit Product</h4>
    {!! Form::model($products,['method'=>'PATCH','action'=>['AdminOfferController@update',$products->id],'files'=>true]) !!}
    <div class="form-group">
     
   
    
     

        <div class="form-group">
            {!! Form::label('offer_currency','offer_currency') !!}
            <input required name="offer_currency" type="number" value="{{old('offer_currency', $offer->offer_currency)}}">
        </div>
        <div class="form-group">
            {!! Form::label('offers','offers') !!}
            <select name="product_id"   class="form-control">
                @foreach($products as $product)
                    <option value="{{$product->id}}">{{$product->title}}</option>
                @endforeach
            </select>
        </div>
      




     
        <button class="btn btn-success" type="submit">edit</button>
        <button class="btn btn-default" data-dismiss="modal" >Cancel</button>
    {!! Form::close() !!}

    @stop

    @section('scripts')
        <!-- Wysiwig js-->
            <script src="{{asset('admin_assets/plugins/tinymce/tinymce.min.js')}}"></script>

  


@stop
