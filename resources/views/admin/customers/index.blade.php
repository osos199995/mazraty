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
            <h4 class="m-t-0 header-title">customers</h4>

        </div>
    </div>
    <hr>
    <div class="row">
        <div class="card-box col-md-12">
           
            <table data-toggle="table"
                   data-page-list="[5, 10, 20]"
                   data-page-size="5"
                   data-pagination="true" class="table-bordered ">
                <thead>
                <tr>
                    <th>f_name</th>
                    <th>f_name</th>
                    <th>email</th>
                    <th>gender</th>
                    <th>mobile</th>
                    <th>status</th>
             
                </tr>
                </thead>
                <tbody>
               @foreach($users as $user)
                <tr>
                  <td>{{$user->f_name}}</td>
                  <td>{{$user->l_name}}</td>
                   <td>{{$user->email    }}</td>
                 @if($user->gender_id == 1)
                 <td>male</td>
                 @else
                 <td>female</td>
                 @endif
                    <td>{{$user->mobile_number}}</td>
                    <td>
                        <input data-id="{{$user->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $user->status ? 'checked' : '' }} inactive>
                     </td>
                </tr>
          

                <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
@stop
@section('scripts')
    <script src="{{asset('admin_assets/plugins/bootstrap-table/js/bootstrap-table.js')}}"></script>
    <script src="{{asset('admin_assets/pages/jquery.bs-table.js')}}"></script>
    <script>
        $(function() {
          $('.toggle-class').change(function() {
              var status = $(this).prop('checked') == true ? 1 : 0; 
              var user_id = $(this).data('id'); 
               
              $.ajax({
                  type: "GET",
                  dataType: "json",
                  url: window.location.origin+'/mazraty/public/changeStatus',
            
                  data: {'status': status, 'user_id': user_id},
                  success: function(data){
                    console.log(data.success)
                  }
              });
          })
        })
      </script>
@stop













