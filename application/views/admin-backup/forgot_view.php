<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>A Globia | Forgot Password</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"> -->
	<?php echo link_tag('assets/admin/bootstrap/css/bootstrap.min.css');?>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <!-- <link rel="stylesheet" href="dist/css/AdminLTE.min.css"> -->
	<?php echo link_tag('assets/admin/dist/css/AdminLTE.min.css');?>
    <!-- iCheck -->
    <!-- <link rel="stylesheet" href="plugins/iCheck/square/blue.css"> -->
	<?php echo link_tag('assets/admin/plugins/iCheck/square/blue.css');?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="#"><b>Forgot</b> Password</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
		<?php if($error = $this->session->flashdata('wrong'))
		{?>
		<p class="login-box-msg callout callout-danger"><?php echo $error;?><BR></p>
		<?php
		}?>
		<?php if($error = $this->session->flashdata('captcha'))
		{?>
		<p class="login-box-msg callout callout-danger"><?php echo $error;?><BR></p>
		<?php
		}?>
		<?php if($error = $this->session->flashdata('sent'))
		{?>
		<p class="login-box-msg callout callout-success"><?php echo $error;?><BR></p>
		<?php
		}?>		
        <p class="login-box-msg">Enter Username to recover your password</p>
        <!-- <form action="submit-login.php" method="post"> -->
		<?php echo form_open('admin/forgot/submit_forgot');?>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Username" name="username" id="username" value="<?php echo set_value('username');?>" autocomplete="off" required>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
			<?php echo form_error('username', '<p class="text-danger">', '</p>')?>
         </div>
         
		  <div class="form-group has-feedback">
			<div class="row">
				<!-- left column -->
				<div class="col-sm-5">
				<?php echo $image;?>				
				</div>
				<!-- right column -->
				<div class="col-sm-7">
				<input type="text" class="form-control" placeholder="Enter Captcha" name="admin_captcha" id="admin_captcha" value="" autocomplete="off" required>
				<?php echo form_error('admin_captcha', '<p class="text-danger">', '</p>')?>
				</div>
			</div>
            
          </div>
		  
          <div class="row">
            <div class="col-xs-8">
              &nbsp;
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
            </div><!-- /.col -->
          </div>
        <?php echo form_close();?>

        

        <a href="<?php echo site_url('/admin/login');?>">Back To Login</a><br>
        

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url('assets/admin/plugins/jQuery/jQuery-2.1.4.min.js');?>"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url('assets/admin/bootstrap/js/bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('assets/admin/bootstrap/js/custom.js');?>"></script>
  </body>
</html>
