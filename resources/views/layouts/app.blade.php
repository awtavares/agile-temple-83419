<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mentoring</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/iCheck/flat/blue.css') }}">
    <!-- Morris chart -->
    <link rel="stylesheet" href=" {{ asset('dist/css/skins/_all-skins.min.css') }}">

</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="{{ route('app.index')}}" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>M</b></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Mentoring</b></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Alternar navegação</span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">



                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
                                <span class="hidden-xs">
                                    @if(Auth::check())
                                         {{ Auth::user()->name }}
                                    @endif
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
                                    <p>
                                        @if(Auth::check())
                                            {{ Auth::user()->name }}
                                        @endif
                                        {{--<small>Periodo: 2017.1</small>--}}
                                    </p>
                                </li>

                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="{{ route('app.perfil.index') }}" class="btn btn-default btn-flat">Perfil</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{{ route('login.logout') }}" class="btn btn-default btn-flat">Sair</a>
                                    </div>
                                </li>

                            </ul>
                        </li>

                        <!-- Control Sidebar Toggle Button -->

                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>
                            @if(Auth::check())
                                {{ Auth::user()->name }}
                            @endif
                        </p>


                    </div>
                </div>

                <ul class="sidebar-menu">
                    <li class="header"> Menu</li>
                    <li class="active treeview">
                        <a href="{{ route('app.dashboard.index') }}">
                            <i class="fa fa-line-chart"></i> <span>Dashboard</span>
                        </a>
                        <!-- Fora do padrão da margem -->
                        <a href="{{ route('app.demand.index') }}">
                            <img src="{{ asset('/img/raise-your-hand-to-ask.png') }}"> <span> Demandas</span>
                        </a>
                        @if(Auth::check())
                            @if(Auth::user()->roles == 3 )
                        <a href="{{ route('app.mentor.index') }}">
                            <i class="fa fa-graduation-cap"></i> <span>Mentores</span>
                        </a>
                            @endif
                        @endif

                        <a href="{{ route('app.eventos.index') }}">
                            <i class="fa fa-calendar"></i> <span>Eventos</span>
                       </a>
                       <a href="{{ route('app.oportunidades.index') }}">
                            <i class="fa ion-network"></i> <span>Oportunidades</span>
                       </a>
					   
					   
					   @if(Auth::check() && Auth::user()->roles == 3)
                        <a href="{{ route('app.alunos.index') }}">
                            <i class="fa fa-users"></i> <span>Listar Alunos</span>
                        </a>
						@endif
					   
					   
					   
					   
                   </li>

               </ul>
           </section>
           <!-- /.sidebar -->
       </aside>

       <!-- Content Wrapper. Contains page content -->
       <div class="content-wrapper">
        <!-- Main content -->
        @yield('content')
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.3.8
        </div>
        <strong><a href="#">Fábrica de Software - UBTECH OFFICE 2017</a>.</strong>
    </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="{{asset('plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{asset('plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('plugins/knob/jquery.knob.js')}}"></script>
<!-- Slimscroll -->
<script src="{{asset('plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('plugins/fastclick/fastclick.js')}}"></script>
<!-- AdminLTE App -->
{{--<script src="{{asset('App')}}"></script>--}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('dist/js/app.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>

<script>
    $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });
</script>

</body>
</html>
