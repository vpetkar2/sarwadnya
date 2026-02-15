<?php $this->load->view('admin/header_view');?>
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
			<h1>Carrier<small>Details</small></h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo site_url('/admin/dashboard');?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				<li><a href="<?php echo site_url('/admin/Carrier');?>">Carrier</a></li>
				<li class="active">Carrier Details</li>
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
							<h3 class="box-title">Edit Carrier</h3>
						</div><!-- /.box-header -->

						<?php if($add_error)
						{?>
						<p class="login-box-msg callout callout-danger"><?php echo $add_error;?><BR></p>
						<?php
						}?>
						
						<!-- form start -->
						<?php $attribute = array('class' => 'form-horizontal');?>
						<?php echo form_open_multipart('admin/carrier/updateCarrier', $attribute);?>						
							<div class="box-body">
								<div class="form-group">
									<label for="crr_title" class="col-sm-2 control-label">Title</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="crr_title" id="crr_title" placeholder="Enter Carrier Title" value="<?php echo stripslashes($carrier->crr_title);?>" required>
										<?php echo form_error('crr_title', '<p class="text-danger">', '</p>')?>
									</div>
								</div>
								<div class="form-group">
									<label for="crr_no_of_position" class="col-sm-2 control-label">No Of Position</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="crr_no_of_position" id="crr_no_of_position" placeholder="Enter Carrier Title" value="<?php echo stripslashes($carrier->crr_no_of_position);?>" required>
										<?php echo form_error('crr_no_of_position', '<p class="text-danger">', '</p>')?>
									</div>
								</div>
								<div class="form-group">
									<label for="crr_desc" class="col-sm-2 control-label">Description</label>
									<div class="col-sm-10">
										<textarea class="form-control" name="crr_desc" id="crr_desc" placeholder="Enter Carrier Description" ><?php echo stripslashes($carrier->crr_desc);?></textarea>
										<?php echo form_error('crr_desc', '<p class="text-danger">', '</p>')?>
									</div>
								</div>																					
							</div><!-- /.box-body -->
							<div class="box-footer">
								<button type="submit" class="btn btn-primary">Update</button>
							</div>
							<input type="hidden" name="crr_id" value="<?php echo $crr_id;?>">
						</form>
					</div><!-- /.box -->
				</div><!--/.col (center) -->
				
				
			</div>   <!-- /.row -->
			
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
$this->load->view('admin/footer_view');