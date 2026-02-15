<!DOCTYPE html>
<?php // echo $this->session->userdata('admin_user_type'); exit; ?>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Parth Fibrotech | Administrator Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <?php echo link_tag('assets/admin/bootstrap/css/bootstrap.min.css');?>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- DataTables -->
    <?php echo link_tag('assets/admin/plugins/datatables/dataTables.bootstrap.css');?>
	<!-- Select2 -->
    <?php echo link_tag('assets/admin/plugins/select2/select2.min.css');?>
    <!-- Theme style -->
    <?php echo link_tag('assets/admin/dist/css/AdminLTE.min.css');?>
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <?php echo link_tag('assets/admin/dist/css/skins/_all-skins.min.css');?>
    <!-- iCheck -->
    <?php echo link_tag('assets/admin/plugins/iCheck/flat/blue.css');?>
    <!-- Morris chart -->
    <!-- <link rel="stylesheet" href="plugins/morris/morris.css"> -->
    <!-- jvectormap -->
    <!-- <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css"> -->
    <!-- Date Picker -->
    <?php echo link_tag('assets/admin/plugins/datepicker/datepicker3.css');?>
    <!-- Daterange picker -->
    <?php echo link_tag('assets/admin/plugins/daterangepicker/daterangepicker-bs3.css');?>
    <!-- bootstrap wysihtml5 - text editor -->
   

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
          <span class="logo-mini"><b>P F</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Parth Fibrotech</b></span>
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
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo base_url('assets/admin/dist/img/avatar5.png');?>" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo $this->session->userdata('admin_name');?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo base_url('assets/admin/dist/img/avatar5.png');?>" class="img-circle" alt="User Image">
                    <p><?php echo $this->session->userdata('admin_name');?></p>
                  </li>

				  
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?php echo site_url('/admin/profile');?>" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo site_url('/admin/logout');?>" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              
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
              <img src="<?php echo base_url('assets/admin/dist/img/avatar5.png');?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $this->session->userdata('admin_name');?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li <?php if($this->uri->segment(2)=='dashboard'){?>class="active"<?php }?>>
              <a href="<?php echo site_url('/admin/dashboard');?>">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> 
              </a>              
            </li>
            
			<?php
			if($this->session->userdata('admin_user_type')=='super')
			{
		    ?>
            <li <?php if($this->uri->segment(2)=='banner'){?>class="active"<?php }?>><a href="<?php echo site_url('/admin/banner/index');?>"><i class="fa fa-file-picture-o"></i> <span>Header Banner</span></a></li>	
			
			<li <?php if($this->uri->segment(2)=='cms'){?>class="active"<?php }?>><a href="<?php echo site_url('/admin/cms/index');?>"><i class="fa fa-gear"></i> <span>CMS</span></a></li>
			
			<li <?php if($this->uri->segment(2)=='seo'){?>class="active"<?php }?>><a href="<?php echo site_url('/admin/seo/index');?>"><i class="fa fa-search"></i> <span>SEO</span></a></li>
			
			<li <?php if($this->uri->segment(2)=='category'){?>class="active"<?php }?>><a href="<?php echo site_url('/admin/category/index');?>"><i class="fa fa-cube"></i> <span>Category</span></a></li>
			
			<li <?php if($this->uri->segment(2)=='product'){?>class="active"<?php }?>><a href="<?php echo site_url('/admin/product/index');?>"><i class="fa fa-cube"></i> <span>Product</span></a></li>
			

			
			<li <?php if($this->uri->segment(2)=='media'){?>class="active"<?php }?>><a href="<?php echo site_url('/admin/media/index');?>"><i class="fa fa-cube"></i> <span>Video Management</span></a></li>
			
		    <!--<li <?php if($this->uri->segment(2)=='gallery'){?>class="active"<?php }?>><a href="<?php echo site_url('/admin/gallery/index');?>"><i class="fa fa-picture-o"></i> <span>Gallery</span></a></li>
		    <li <?php if($this->uri->segment(2)=='client'){?>class="active"<?php }?>><a href="<?php echo site_url('/admin/client/index');?>"><i class="fa fa-user"></i> <span>Client</span></a></li> -->
			
			<li <?php if($this->uri->segment(2)=='team'){?>class="active"<?php }?>><a href="<?php echo site_url('/admin/team/index');?>"><i class="fa fa-user"></i> <span>Team</span></a></li>
			
			<!-- <li <?php if($this->uri->segment(3)=='cmsIndex'){?>class="active"<?php }?>><a href="<?php echo site_url('/admin/team/cmsIndex');?>"><i class="fa fa-user"></i> <span>Team CMS</span></a></li> -->

			<!-- <li <?php if($this->uri->segment(3)=='media'){?>class="active"<?php }?>><a href="<?php echo site_url('/admin/media');?>"><i class="fa fa-user"></i> <span>Video Management</span></a></li> -->
			
			
			<li <?php if($this->uri->segment(2)=='testimonial'){?>class="active"<?php }?>><a href="<?php echo site_url('/admin/testimonial/index');?>"><i class="fa fa-edit"></i> <span>Testimonial</span></a></li>
			
			<!-- <li <?php if($this->uri->segment(2)=='category'){?>class="active"<?php }?>><a href="<?php echo site_url('/admin/category/index');?>"><i class="fa fa-cube"></i> <span>Category</span></a></li> -->
			<li <?php if($this->uri->segment(2)=='carrier'){?>class="active"<?php }?>><a href="<?php echo site_url('/admin/carrier/index');?>"><i class="fa fa-cube"></i> <span>Career</span></a></li>
			<li <?php if($this->uri->segment(2)=='carrierenquiry'){?>class="active"<?php }?>><a href="<?php echo site_url('/admin/carrierenquiry/index');?>"><i class="fa fa-cube"></i> <span>Carrier Enquiry</span></a></li>
			<li <?php if($this->uri->segment(2)=='blog'){?>class="active"<?php }?>><a href="<?php echo site_url('/admin/blog/index');?>"><i class="fa fa-cube"></i> <span>Blog</span></a></li>
			<li <?php if($this->uri->segment(2)=='social'){?>class="active"<?php }?>><a href="<?php echo site_url('/admin/social/index');?>"><i class="fa fa-th"></i> <span>Social Media</span></a></li>
			<li <?php if($this->uri->segment(2)=='contactus'){?>class="active"<?php }?>><a href="<?php echo site_url('/admin/contactus/index');?>"><i class="fa fa-envelope-o"></i> <span>Contact Us</span></a></li>

			<li <?php if($this->uri->segment(2)=='contact'){?>class="active"<?php }?>><a href="<?php echo site_url('/admin/contact/index');?>"><i class="fa fa-th"></i> <span>Feedback</span></a></li>
			
			<li <?php if($this->uri->segment(2)=='enquiry'){?>class="active"<?php }?>><a href="<?php echo site_url('/admin/enquiry/index');?>"><i class="fa fa-th"></i> <span>Product Enquiry</span></a></li>
			
			
			<li <?php if($this->uri->segment(2)=='meta'){?>class="active"<?php }?>><a href="<?php echo site_url('/admin/meta/index');?>"><i class="fa fa-th"></i> <span>Meta Tags</span></a></li>
			
			<?php
			}?>           
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>