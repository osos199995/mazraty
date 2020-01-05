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
            <h4 class="m-t-0 header-title">Products</h4>

        </div>
    </div>
    <hr>
    <div class="row">
        <div class="card-box col-md-12">
            <a  class="btn btn-primary"  href="{{route('productsss.create')}}" >Add product</a>
            <table data-toggle="table"
                   data-page-list="[5, 10, 20]"
                   data-page-size="5"
                   data-pagination="true" class="table-bordered ">
                <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Title Ar</th>
                    <th>Category Name</th>
                    <th data-field="Actions" data-align="center">Action</th>
                </tr>
                </thead>
                <tbody>
               @foreach($products as $product)
                <tr>
                    @if(null!==json_decode($product->images))

                        @foreach(json_decode($product->images) as $image)

                        <td><img width="200px" src="{{asset('products/'.$image)}}" alt=""></td>
                            @break
                        @endforeach
                    @else
                        <td></td>
                    @endif

                    <td>{{$product->title}}</td>
                    <td>{{$product->title_ar}}</td>
                    <td>{{$product->category->name}}</td>
                    <td>
                        <a class="btn btn-info" href="{{route('productsss.show',$product->id)}}" >show</a>
                        <a class="btn btn-primary"  href="{{route('productsss.edit',$product->id)}}">Edit</a>
                        <a data-toggle="modal" class="btn btn-danger" data-target=".{{$product['id'].'delete'}}" >Delete</a>

                    </td>
                </tr>
                {{--Modal for user delete--}}
                <div class="modal fade {{$product['id'].'delete'}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title mt-0" style="color: red">Do You Wanna Delete This Product</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                {!! Form::open(['method'=>'Delete','action'=>['ProductsController@destroy',$product['id']]]) !!}
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













