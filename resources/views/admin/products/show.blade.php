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
            <h4 class="m-t-0 header-title">Product Details :</h4>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-4">
            <a href="{{route('productsss.edit',$products->id)}}" class="btn btn-primary" style="float: right">Edit product</a>
            <div class="profile-detail card-box">
                <div>
                    <div class="text-left">
                        <p class="text-muted font-13"><strong> Title:</strong> <span class="m-l-15">{{$products->title}}</span></p>
                        <p class="text-muted font-13"><strong> Title Ar:</strong> <span class="m-l-15">{{$products->title_ar}}</span></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card-box">
                <p class="text-muted font-13"><strong> Description:</strong> <span class="m-l-15">{!! $products->description !!}</span></p>
                <p class="text-muted font-13"><strong>Description Ar:</strong> <span class="m-l-15">{!! $products->description_ar !!}</span></p>
                <p class="text-muted font-13"><strong>container:</strong> <span class="m-l-15">{!! $products->container !!}</span></p>
                <p class="text-muted font-13"><strong>number of container :</strong> <span class="m-l-15">{!! $products->number_of_container !!}</span></p>
                <p class="text-muted font-13"><strong>price:</strong> <span class="m-l-15">{!! $products->price !!}</span></p>
            </div>
            <div class="card-box">
                <table data-toggle="table"
                       data-page-list="[5, 10, 20]"
                       data-page-size="5"
                       data-pagination="true" class="table-bordered ">
                    <thead>
                    <tr>
                        <th>image</th>

                    </tr>
                    </thead>


                    <tbody>
@if (json_decode($products->images))


                    @foreach(json_decode($products->images) as $image)

                        <tr>
                            <td><img style=" width: 200px" src="{{asset('products/'.$image)}}" alt=""></td>


                    @endforeach
@endif
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