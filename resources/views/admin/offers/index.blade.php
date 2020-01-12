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
            <h4 class="m-t-0 header-title">offers</h4>

        </div>
    </div>
    <hr>
    <div class="row">
        <div class="card-box col-md-12">
            <a  class="btn btn-primary"  href="{{route('offers.create')}}" >Add offer</a>
            <table data-toggle="table"
                   data-page-list="[5, 10, 20]"
                   data-page-size="5"
                   data-pagination="true" class="table-bordered ">
                <thead>
                <tr>
                    <th>offer</th>
                    <th>currency offer</th>
                    <th>subcategory name</th>
                    <th>Category Name</th>
                    <th data-field="Actions" data-align="center">Action</th>
                </tr>
                </thead>
                <tbody>
               @foreach($offers as $offer)
                <tr>
                 
                    <td>{{$offer->product->title}}</td>
                    <td>{{$offer->offer_currency}}</td>
                    <td>{{$offer->product->subcategory->name}}</td>
                    <td>{{$offer->product->category->name}}</td>
                   
                    <td>
                        <a data-toggle="modal" class="btn btn-success" data-target=".{{$offer['id'].'edit'}}" >Edit</a>
                        <a data-toggle="modal" class="btn btn-danger" data-target=".{{$offer['id'].'delete'}}" >Delete</a>

                    </td>
                </tr>
                   {{--End Modal for user delete--}}{{--Modal for user delete--}}
                   <div class="modal fade {{$offer['id'].'edit'}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                {!! Form::model($offer,['method'=>'PATCH','action'=>['AdminOfferController@update',$offer->id],'files'=>true]) !!}
                                <div class="modal-body">
                                </div>
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
                                <button class="btn btn-primary">Update</button>
                                <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                                {!! Form::close() !!}
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
                {{--Modal for user delete--}}
                <div class="modal fade {{$offer['id'].'delete'}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title mt-0" style="color: red">Do You Wanna Delete This offer</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                {!! Form::open(['method'=>'Delete','action'=>['AdminOfferController@destroy',$offer['id']]]) !!}
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













