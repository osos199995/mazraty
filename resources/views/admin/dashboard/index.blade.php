@extends('layouts.admin')
@section('content')
{{--    <div class="container-fluid">--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-6 col-lg-4 col-xl-4">--}}
{{--                <div class="widget-panel widget-style-2 bg-white">--}}
{{--                    <i class="fa fa-phone text-primary"></i>--}}
{{--                    <h2 class="m-0 text-danger counter font-600">{{$contacts->count()}}</h2>--}}
{{--                    <div class="text-muted m-t-5">Contact Us</div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-md-6 col-lg-4 col-xl-4">--}}
{{--                <div class="widget-panel widget-style-2 bg-white">--}}
{{--                    <i class="fa fa-newspaper-o text-primary"></i>--}}
{{--                    <h2 class="m-0 text-danger counter font-600">{{$careers->count()}}</h2>--}}
{{--                    <div class="text-muted m-t-5">Careers</div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-md-6 col-lg-4 col-xl-4">--}}
{{--                <div class="widget-panel widget-style-2 bg-white">--}}
{{--                    <i class="fa fa-file text-primary"></i>--}}
{{--                    <h2 class="m-0 text-danger counter font-600">{{$orders->count()}}</h2>--}}
{{--                    <div class="text-muted m-t-5">Purchase Orders</div>--}}
{{--                </div>--}}
</div>

{{--        </div>--}}
{{--    </div>--}}

<hr>
<section class="">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-4">
                @if (Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @elseif(Session::has('danger'))
                    <div class="alert alert-danger">{{ Session::get('danger') }}</div>
                @endif

                {!! Form::model($user,['method'=>'PATCH','action'=>['AdminUserController@update',$user->id],'files'=>true]) !!}
                {{--                        img< src="{{asset('admin_assets/images/logo1.png')}}" class="img-responsive" alt="logo" style=" display: table; margin-bottom: 17px;" />--}}


                <div class="form-group">
                    <label > Admin Name: </label>
                    <input type="text" name="name" value="{{$user->name}}" class="form-control" placeholder="User Name">
                    @if ($errors->has('name'))
                        <div class="alert alert-danger">{{ $errors->name }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label > E-mail </label>
                    <input type="email" name="email" value="{{$user->email}}" class="form-control" placeholder="E-mail Address">
                    @if ($errors->has('email'))
                        <div class="alert alert-danger">{{ $errors->email }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label > Password </label>
                    <input type="password" name="password" class="form-control" placeholder="Password ">
                    @if ($errors->has('password'))
                        <div class="alert alert-danger">{{ $errors->first('password') }}</div>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary" style="margin: auto; display: table; padding: 8px 20px;"> Update </button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</section>
@stop

