<!DOCTYPE html>
<html dir="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('admin_assets/images/favicon_1.ico')}}">
    <title>Mazra3ty</title>
    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="{{asset('admin_assets/plugins/morris/morris.css')}}">
    <link href=" {{asset('admin_assets/plugins/bootstrap-sweetalert/sweet-alert.css')}}" rel="stylesheet" type="text/css">
    <link href=" {{asset('admin_assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin_assets/css/icons.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin_assets/css/style.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin_assets/css/new-style.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('admin_assets/js/modernizr.min.js')}}"></script>
    @yield('styles')
</head>
<body class="fixed-left">
<!-- Begin page -->
<div id="wrapper">
    <!-- Top Bar Start -->
    <div class="topbar">
        <!-- LOGO -->
        <div class="topbar-left">
            <div class="text-center">
                <a href="" class="logo">Mazr<i class="icon-c-logo"></i><span><i class="md md-a"></i>3ty</span></a>
            </div>
        </div>
        <!-- Button mobile view to collapse sidebar menu -->
        <nav class="navbar-custom">
            <ul class="list-inline float-right mb-0">
                <!--full screen button-->
                <li class="list-inline-item notification-list">
                    <a class="nav-link waves-light waves-effect" href="#" id="btn-fullscreen">
                        <i class="dripicons-expand noti-icon"></i>
                    </a>
                </li>
                <!--logout dropdown button-->
                <li class="list-inline-item dropdown notification-list">
                    <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                       aria-haspopup="false" aria-expanded="false">
                        <img src="{{asset('admin_assets/images/users/avatar-1.jpg')}}" alt="user" class="rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown " aria-labelledby="Preview">
                        <!-- admins name-->
                        <div class="dropdown-item noti-title">
{{--                            <h5 class="text-overflow"><small>Welcome {{Auth::user()->name}}</small> </h5>--}}
                        </div>
                        <!-- logout-->
                        <a class="dropdown-item notify-item" href="{{ route('logoutTest') }}"
                           onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                            <i class="zmdi zmdi-power"></i> <span>Logout</span>
                            <form id="logout-form" action="{{ route('logoutTest') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </a>
                    </div>
                </li>
            </ul>
            <!--left sidebar toggle-->
            <ul class="list-inline menu-left mb-0">
                <li class="float-left">
                    <button class="button-menu-mobile open-left waves-light waves-effect">
                        <i class="dripicons-menu"></i>
                    </button>
                </li>
            </ul>
        </nav>
    </div>
    <!-- Top Bar End -->
    <!-- ========== Left Sidebar Start ========== -->
    <div class="left side-menu">
        <div class="sidebar-inner slimscrollleft">
            <!--- Divider -->
            <div id="sidebar-menu">
                <ul>
                    <li>
                        <a href="{{route('dashboard')}}" class="waves-effect"><i class="fa fa-dashboard"></i> <span> Dashboard </span></a>
                    </li>
                    {{--                    <li class="has_sub">--}}
                    {{--                        <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-cogs"></i> <span> Settings </span> <span class="menu-arrow"></span></a>--}}
                    {{--                        <ul class="list-unstyled">--}}
                    {{--                            <a href="{{route('contact_us.index')}}" class="waves-effect"><i class="fa fa-phone"></i> <span> Contact Us </span></a>--}}
                    {{--                            <a href="{{route('setting.index')}}" class="waves-effect"><i class="fa fa-pencil"></i> <span> Website Details </span></a>--}}
                    {{--                            <a href="{{route('abouts.index')}}" class="waves-effect"><i class="fa fa-home"></i> <span> About Us </span></a>--}}
                    {{--                            <a href="{{route('careers.index')}}" class="waves-effect"><i class="fa fa-briefcase "></i> <span> Careers </span></a>--}}
                    {{--                            <a href="{{route('seprators.index')}}" class="waves-effect"><i class="fa fa-clipboard "></i> <span> Separator </span></a>--}}
                    {{--                            <a href="{{route('porchase.index')}}" class="waves-effect"><i class="fa fa-file "></i> <span> Purchase Orders </span></a>--}}
                    {{--                        </ul>--}}
                    {{--                    <li class="has_sub">--}}
                    {{--                        <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-wrench"></i> <span> References </span> <span class="menu-arrow"></span></a>--}}
                    {{--                        <ul class="list-unstyled">--}}
                    {{--                            <a href="{{route('reference.index')}}" class="waves-lis"><i class="fa fa-wrench"></i> <span> Reference</span></a>--}}

                    {{--                            <a href="{{route('countries.index')}}" class="waves-effect"><i class="fa fa-globe "></i> <span>Countries</span></a>--}}
                    {{--                        </ul>--}}

                    <li>
                        <a href="{{route('categories.index')}}" class="waves-effect"><i class="fa fa-list"></i> <span>Categories</span></a>
                        <a href="{{route('subcategory.index')}}" class="waves-effect"><i class="fa fa-list"></i> <span>subcategories</span></a>
                        {{--                        <a href="{{route('service.index')}}" class="waves-effect"><i class="fa fa-server"></i> <span>Services</span></a>--}}
                        {{--                        <a href="{{route('sliders.index')}}" class="waves-effect"><i class="fa fa-sliders"></i></i> <span>Slider</span></a>--}}
                        {{--                        <a href="{{route('healthes.index')}}" class="waves-effect"><i class="fa fa-heartbeat "></i></i> <span>Health And Safety</span></a>--}}
                        <a href="{{route('productsss.index')}}" class="waves-effect"><i class="fa fa-list"></i> <span>Products</span></a>
                        {{--                        <a href="{{route('blog.index')}}" class="waves-effect"><i class="fa fa-file"></i> <span>Blog</span></a>--}}
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- Left Sidebar End -->
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">
                @yield('content')
            </div> <!-- container -->
        </div> <!-- content -->
        <footer class="footer text-right">
            Mazra3ty &copy; 2020 All rights reserved.
        </footer>
    </div>
    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->
</div>
<!-- END wrapper -->
<script>
    var resizefunc = [];
</script>
<!-- jQuery  -->
<script src="{{asset('admin_assets/js/jquery.min.js')}}"></script>
<script src="{{asset('admin_assets/js/popper.min.js')}}"></script><!-- Popper for Bootstrap -->
<script src="{{asset('admin_assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('admin_assets/js/detect.js')}}"></script>
<script src="{{asset('admin_assets/js/fastclick.js')}}"></script>
<script src="{{asset('admin_assets/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('admin_assets/js/jquery.blockUI.js')}}"></script>
<script src="{{asset('admin_assets/js/waves.js')}}"></script>
<script src="{{asset('admin_assets/js/wow.min.js')}}"></script>
<script src="{{asset('admin_assets/js/jquery.nicescroll.js')}}"></script>
<script src="{{asset('admin_assets/js/jquery.scrollTo.min.js')}}"></script>
<script src="{{asset('admin_assets/plugins/morris/morris.min.js')}}"></script>
<script src="{{asset('admin_assets/plugins/raphael/raphael-min.js')}}"></script>
<!-- jQuery  -->
<script src="{{asset('admin_assets/plugins/moment/moment.js')}}"></script>
<script src="{{asset('admin_assets/plugins/bootstrap-sweetalert/sweet-alert.min.js')}}"></script>
<script src="{{asset('admin_assets/plugins/dropzone/dropzone.js')}}"></script>
<!-- chatjs  -->
<script src="{{asset('admin_assets/pages/jquery.chat.js')}}"></script>
<script src="{{asset('admin_assets/plugins/peity/jquery.peity.min.js')}}"></script>
<script src="{{asset('admin_assets/js/jquery.core.js')}}"></script>
<script src="{{asset('admin_assets/js/jquery.app.js')}}"></script>
<script src="{{asset('admin_assets/pages/jquery.dashboard_2.js')}}"></script>
<script src="{{asset('admin_assets/plugins/waypoints/lib/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('admin_assets/plugins/counterup/jquery.counterup.min.js')}}"></script>
<script src="{{asset('admin_assets/plugins/jquery-knob/jquery.knob.js')}}"></script>
<script src="{{asset('admin_assets/pages/jquery.dashboard.js')}}"></script>
<script src="{{asset('admin_assets/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('admin_assets/pages/jquery.dashboard_3.js')}}"></script>

<script type="text/javascript">
    jQuery(document).ready(function($) {
        $('.counter').counterUp({
            delay: 100,
            time: 1200
        });
        $(".knob").knob();
    });
</script>
@yield('scripts')
</body>
</html>
