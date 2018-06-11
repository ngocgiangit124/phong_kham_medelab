<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | Spectre</title>
    <base href="{{asset('')}}}">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="admin_asset/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="admin_asset/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="admin_asset/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="admin_asset/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter

          apply the skin class to the body tag so the changes take effect. -->
    <link rel="stylesheet" href="admin_asset/dist/css/fix_index.css">
    <link rel="stylesheet" href="admin_asset/dist/css/skins/skin-blue.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- DataTables -->
    <link rel="stylesheet" href="admin_asset//bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>


<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">

    <!-- Main Header -->
    <header class="main-header fixheader">
    @include('admin.layout.header');
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    @if(Auth::check())
        @if($user=Auth::user()->user_level == 0)
             @include('admin.layout.menu')
        @elseif($user=Auth::user()->user_level == 1)
            @include('admin.layout.menunv')
        @elseif($user=Auth::user()->user_level == 2)
            @include('admin.layout.menunv')
        @endif
    @endif
    <!-- Content Wrapper. Contains page content -->
    <div class="fix-content-wrapper content-wrapper ">
    @yield('content')
    <!-- /.content-wrapper -->
    </div>
    <!-- Main Footer -->
    @include('admin.layout.footer')

    <!-- Control Sidebar -->
    @include('admin.layout.setting')
</div>

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="admin_asset/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="admin_asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="admin_asset/dist/js/adminlte.min.js"></script>


<!-- DataTables -->
<script src="admin_asset/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="admin_asset/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="admin_asset/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="admin_asset/bower_components/fastclick/lib/fastclick.js"></script>

<!-- CK Editor -->
<script src="admin_asset/bower_components/ckeditor/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="admin_asset/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="admin_asset/dist/js/demo.js"></script>
<!-- page script -->
<script src="admin_asset/dist/js/myscript.js"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
@yield('script');
</body>
</html>