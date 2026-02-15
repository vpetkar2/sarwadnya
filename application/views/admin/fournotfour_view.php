<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ticket System | 404 Error Page</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <?php echo link_tag('assets/bootstrap/css/bootstrap.min.css');?>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- DataTables -->
    <?php echo link_tag('assets/plugins/datatables/dataTables.bootstrap.css');?>
    <!-- Theme style -->
    <?php echo link_tag('assets/dist/css/AdminLTE.min.css');?>
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <?php echo link_tag('assets/dist/css/skins/_all-skins.min.css');?>
    <!-- iCheck -->
    <?php echo link_tag('assets/plugins/iCheck/flat/blue.css');?>
    <!-- Morris chart -->
    <!-- <link rel="stylesheet" href="<?php echo $path;?>plugins/morris/morris.css"> -->
    <!-- jvectormap -->
    <!-- <link rel="stylesheet" href="<?php echo $path;?>plugins/jvectormap/jquery-jvectormap-1.2.2.css"> -->
    <!-- Date Picker -->
    <?php echo link_tag('assets/plugins/datepicker/datepicker3.css');?>
    <!-- Daterange picker -->
    <?php echo link_tag('assets/plugins/daterangepicker/daterangepicker-bs3.css');?>
    <!-- bootstrap wysihtml5 - text editor -->
    <?php echo link_tag('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css');?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue-light sidebar-mini layout-boxed">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo site_url('/admin/dashboard');?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>T</b>S</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>TICKET</b>SYSTEM</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          
        </nav>
      </header>
      

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            404 Error Page
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo site_url('/admin/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">404 error</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="error-page">
            <h2 class="headline text-yellow"> 404</h2>
            <div class="error-content">
              <h3><i class="fa fa-warning text-yellow"></i> Oops! Page not found.</h3>
              <p>
                We could not find the page you were looking for.
                Meanwhile, you may <a href="<?php echo site_url('/admin/dashboard');?>">return to dashboard</a>.
              </p>
              
            </div><!-- /.error-content -->
          </div><!-- /.error-page -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <!-- <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div> -->
        <strong>Copyright &copy; <?php echo @date('Y');?> <a target='_new' href="http://www.sapcontrol.com">SAP Control System</a>.</strong> All rights reserved.
      </footer>

      
      
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
     <script src="<?php echo base_url('assets/plugins/jQuery/jQuery-2.1.4.min.js');?>"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js');?>"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url('assets/plugins/fastclick/fastclick.min.js');?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url('assets/dist/js/app.min.js');?>"></script>
    <script src="<?php echo base_url('assets/jquery-3.1.1.min');?>"></script>
  </body>
</html>
