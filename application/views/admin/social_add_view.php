<?php $this->load->view('admin/header_view');?>
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
			<h1>Social Media<small>Details</small></h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo site_url('/admin/dashboard');?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				<li class="active">Social Media Details</li>
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
							<h3 class="box-title">Edit Social Media</h3>
						</div><!-- /.box-header -->

						<?php if($add_error)
						{?>
						<p class="login-box-msg callout callout-danger"><?php echo $add_error;?><BR></p>
						<?php
						}?>
						
						<!-- form start -->
						<?php $attribute = array('class' => 'form-horizontal');?>
						<?php echo form_open('admin/social/submitContactUs', $attribute);?>
						
							<div class="box-body">
								<div class="form-group">
									<label for="fb_social" class="col-sm-2 control-label">Facebook</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="fb_social" id="fb_social" placeholder="Enter Facebook" value="<?php echo stripslashes($conus->fb_social);?>" required>
										<?php echo form_error('fb_social', '<p class="text-danger">', '</p>')?>
									</div>
								</div>
								<div class="form-group">
									<label for="tw_social" class="col-sm-2 control-label">Twitter</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="tw_social" id="tw_social" placeholder="Enter Twitter No." value="<?php echo stripslashes($conus->tw_social);?>" required>
										<?php echo form_error('tw_social', '<p class="text-danger">', '</p>')?>
									</div>
								</div>
								<div class="form-group">
									<label for="ln_social" class="col-sm-2 control-label">LinkedIn</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="ln_social" id="ln_social" placeholder="Enter LinkedIn" value="<?php echo stripslashes($conus->ln_social);?>" required>
										<?php echo form_error('ln_social', '<p class="text-danger">', '</p>')?>
									</div>
								</div>
								<div class="form-group">
									<label for="Ins_social" class="col-sm-2 control-label">Instagram</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="Ins_social" id="Ins_social" placeholder="Enter Instagram" value="<?php echo stripslashes($conus->Ins_social);?>" required>
										<?php echo form_error('Ins_social', '<p class="text-danger">', '</p>')?>
									</div>
								</div>	
									<div class="form-group">
									<label for="yt_social" class="col-sm-2 control-label">YouTube</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="yt_social" id="yt_social" placeholder="Enter YouTube" value="<?php echo stripslashes($conus->yt_social);?>" required>
										<?php echo form_error('yt_social', '<p class="text-danger">', '</p>')?>
									</div>
								</div>	
									<div class="form-group">
									<label for="pin_social" class="col-sm-2 control-label">Pinterest</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="pin_social" id="pin_social" placeholder="Enter Pinterest" value="<?php echo stripslashes($conus->pin_social);?>" required>
										<?php echo form_error('pin_social', '<p class="text-danger">', '</p>')?>
									</div>
								</div>	
							</div><!-- /.box-body -->
							<div class="box-footer">
								<button type="submit" class="btn btn-primary">Update</button>
							</div>
							<input type="hidden" name="conus_id" value="<?php echo $conus->s_id;?>">
						</form>
					</div><!-- /.box -->
				</div><!--/.col (center) -->
				
				
			</div>   <!-- /.row -->
			
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
$this->load->view('admin/footer_view');