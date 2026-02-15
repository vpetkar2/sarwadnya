<?php $this->load->view('admin/header_view');?>
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
			<h1>Contact Us<small>Details</small></h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo site_url('/admin/dashboard');?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				<li class="active">Contact Us Details</li>
			</ol>
        </section>

        <!-- Main content -->
        <section class="content">
			<div class="row">
				
				<!-- center column -->
				<div class="col-md-12">
					<!-- SELECT2 EXAMPLE -->
					<div class="box box-primary">
						<div class="box-header with-border">
							<h3 class="box-title">Edit Contact Us</h3>
						</div><!-- /.box-header -->

						<?php if($add_error)
						{?>
						<p class="login-box-msg callout callout-danger"><?php echo $add_error;?><BR></p>
						<?php
						}?>
						
						<!-- form start -->
						<?php $attribute = array('class' => 'form-horizontal');?>
						<?php echo form_open('admin/contactus/submitContactUs', $attribute);?>
						
							<div class="box-body">
								<div class="form-group">
									<label for="conus_email" class="col-sm-2 control-label">Email</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="conus_email" id="conus_email" placeholder="Enter Email" value="<?php echo stripslashes($conus->conus_email);?>" required>
										<?php echo form_error('conus_email', '<p class="text-danger">', '</p>')?>
									</div>
								</div>
								<div class="form-group">
									<label for="conus_phone" class="col-sm-2 control-label">Phone</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="conus_phone" id="conus_phone" placeholder="Enter Phone No." value="<?php echo stripslashes($conus->conus_phone);?>" required>
										<?php echo form_error('conus_phone', '<p class="text-danger">', '</p>')?>
									</div>
								</div>
								<div class="form-group">
									<label for="conus_mobile" class="col-sm-2 control-label">Mobile</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="conus_mobile" id="conus_mobile" placeholder="Enter Mobile" value="<?php echo stripslashes($conus->conus_mobile);?>" required>
										<?php echo form_error('conus_mobile', '<p class="text-danger">', '</p>')?>
									</div>
								</div>
								<div class="form-group">
									<label for="conus_address" class="col-sm-2 control-label">Address</label>
									<div class="col-sm-10">
										<textarea class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="conus_address" id="conus_address"><?php echo stripslashes($conus->conus_address);?></textarea>
										<?php echo form_error('conus_address', '<p class="text-danger">', '</p>')?>
									</div>
								</div>	
								<div class="form-group">
									<label for="conus_address2" class="col-sm-2 control-label">Address 2</label>
									<div class="col-sm-10">
										<textarea class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="conus_address2" id="conus_address2"><?php echo stripslashes($conus->conus_address2);?></textarea>
										<?php echo form_error('conus_address2', '<p class="text-danger">', '</p>')?>
									</div>
								</div>									
							</div><!-- /.box-body -->
							<div class="box-footer">
								<button type="submit" class="btn btn-primary">Update</button>
							</div>
							<input type="hidden" name="conus_id" value="<?php echo $conus->conus_id;?>">
						</form>
					</div><!-- /.box -->
				</div><!--/.col (center) -->
				
				
			</div>   <!-- /.row -->
			
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
$this->load->view('admin/footer_view');