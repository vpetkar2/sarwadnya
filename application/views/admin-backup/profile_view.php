<?php $this->load->view('admin/header_view');?>
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
			<h1>Profile<small>Preview</small></h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo site_url('/admin/dashboard')?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				<li class="active">Profile</li>
			</ol>
        </section>

        <!-- Main content -->
        <section class="content">
			<div class="row">
				<!-- left column -->
				<div class="col-md-6">
					<!-- SELECT2 EXAMPLE -->
					<div class="box box-primary">
						<div class="box-header with-border">
							<h3 class="box-title">Edit Profile</h3>
						</div><!-- /.box-header -->
						
						<?php if($update)
						{?>
						<p class="login-box-msg callout callout-success"><?php echo $update;?></p>
						<?php
						}?>
						<?php if($error)
						{?>
						<p class="login-box-msg callout callout-danger"><?php echo $error;?></p>
						<?php
						}?>
						<!-- form start -->
						<?php echo form_open('admin/profile/update_profile');?>
						
							<div class="box-body">
								<div class="form-group">
									<label for="username">Username</label>
									<input type="text" class="form-control" name="username" id="username" placeholder="Enter Name" value="<?php echo stripslashes($admin_detail->username);?>" required>
									<?php echo form_error('username', '<p class="text-danger">', '</p>')?>
								</div>	
								<div class="form-group">
									<label for="email">Email ID</label>
									<input type="email" class="form-control" name="email" id="email" placeholder="Enter email" value="<?php echo stripslashes($admin_detail->email);?>" required>
									<?php echo form_error('email', '<p class="text-danger">', '</p>')?>
								</div>
								<div class="form-group">
									<label for="contact_no">Contact No.</label>
									<input type="text" class="form-control" name="contact_no" id="contact_no" placeholder="Enter Contact No" value="<?php echo stripslashes($admin_detail->contact_no);?>" required>
									<?php echo form_error('contact_no', '<p class="text-danger">', '</p>')?>
								</div>						
							</div><!-- /.box-body -->
							<div class="box-footer">
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
						</form>
					</div><!-- /.box -->
				</div><!--/.col (left) -->
				<!-- right column -->
				<div class="col-md-6">
					<!-- SELECT2 EXAMPLE -->
					<div class="box box-primary">
						<div class="box-header with-border">
							<h3 class="box-title">Change Password</h3>
							<p></p>
						</div><!-- /.box-header -->
						
						<?php if($password)
						{?>
						<p class="login-box-msg callout callout-success"><?php echo $password;?></p>
						<?php
						}?>
						<?php if($wrong)
						{?>
						<p class="login-box-msg callout callout-danger"><?php echo $wrong;?></p>
						<?php
						}?>
						<?php if($error1)
						{?>
						<p class="login-box-msg callout callout-danger"><?php echo $error1;?></p>
						<?php
						}?>
						<!-- form start -->
						<?php echo form_open('admin/profile/change_password');?>
							<div class="box-body">
								<div class="form-group">
									<label for="old_password">Old Password</label>
									<input type="password" class="form-control" name="old_password" id="old_password" placeholder="Enter Old Password" value="" required>
									<?php echo form_error('old_password', '<p class="text-danger">', '</p>')?>
								</div>
								<div class="form-group">
									<label for="password">New Password</label>
									<input type="password" class="form-control" name="password" id="password" placeholder="Enter New Password" value="" required>
									<?php echo form_error('password', '<p class="text-danger">', '</p>')?>
								</div>														
							</div><!-- /.box-body -->
							<div class="box-footer">
								<button type="submit" class="btn btn-primary">Change Password</button>
							</div>
						</form>
					</div><!-- /.box -->
				</div><!--/.col (right) -->
			</div>   <!-- /.row -->
			
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
$this->load->view('admin/footer_view');