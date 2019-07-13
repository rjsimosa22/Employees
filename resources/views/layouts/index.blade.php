<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>SITAWEB</title>
        
        <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
        <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
        <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.css">
        <link rel="stylesheet" href="dist/css/AdminLTE.css">
        <link rel="stylesheet" href="css/jquery.modal.min.css" />
        <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
        <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>

    <style>
        input:invalid {
            border: 1px solid red;
        }
        input:valid {
            border: 1px solid green;
        }
    </style>

    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            <header class="main-header">
                <a href="#" class="logo">
                    <span class="logo-mini"><b>SITA</b></span>
                    <span class="logo-lg"><b>SITAWEB</b></span>
                </a>                

                <nav class="navbar navbar-static-top">
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-user" style="font-size:18px;"></i>
                                    <span class="hidden-xs" style="font-size:16px;">{{ Auth::user()->name }}</span>
                                </a>

                                <ul class="dropdown-menu">
                                <li class="user-header">
                                        <i class="fa fa-drivers-license-o" style="font-size:80px;color:#fff;"></i>
                                        <p> Bienvenido Sr(a):<br>{{ Auth::user()->name }} </p>
                                    </li>
                                </ul>
                            </li>
                            
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" title="Cerrar sesión"><i class="fa fa-power-off" style="font-size:18px;"></i></a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>

            @include('common.main')

            <!-- Main content -->
            <div class="content-wrapper">
                <section class="content">
                    <main class="py-4">
                        @yield('content')
                    </main>
                </section>
            </div>    
            <!-- Main content find -->   
            
            
            <footer class="main-footer">
                <strong>Copyright &copy; {{ date('Y') }} <a href="https://adminlte.io">SITAWEB</a>.</strong> All rights
                reserved.
            </footer>
            <script>var SITEURL = '{{URL::to('')}}';</script>
            <script src="bower_components/jquery/dist/jquery.min.js"></script>
            <script src="bower_components/jquery-ui/jquery-ui.js"></script>
            <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
            <script src="bower_components/fastclick/lib/fastclick.js"></script>
            <script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
            <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
            <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
            <script src="bower_components/raphael/raphael.min.js"></script>
            <script src="bower_components/morris.js/morris.min.js"></script>
            <script src="bower_components/datatables.net/js/jquery.dataTables.js?v={{ time() }}"></script>
            <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
            <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
            <script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
            <script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>
            <script src="bower_components/chart.js/Chart.js"></script>
            <script src="dist/js/adminlte.min.js"></script>
            <script src="dist/js/pages/dashboard.js"></script>
            <script src="dist/js/demo.js"></script>
            <script src="js/jquery.modal.min.js"></script>
            <script src="js/common/common.js?v={{ time() }}"></script>
            <script src="js/user/user.js?v={{ time() }}"></script>
            <script src="js/system/system.js?v={{ time() }}"></script>
            <script src="js/client/client.js?v={{ time() }}"></script>
            <script src="js/vehicle/vehicle.js?v={{ time() }}"></script>
        </div>
    </body>
</html>