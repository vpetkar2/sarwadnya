<?php $this->load->view('admin/header_view');?>
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
			<h1>Testimonial<small>Details</small></h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo site_url('/admin/dashboard');?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				<li><a href="<?php echo site_url('/admin/testimonial');?>">Testimonial</a></li>
				<li class="active">Testimonial Details</li>
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
							<h3 class="box-title">Edit Testimonial</h3>
						</div><!-- /.box-header -->

						<?php if($add_error)
						{?>
						<p class="login-box-msg callout callout-danger"><?php echo $add_error;?><BR></p>
						<?php
						}?>
						
						<!-- form start -->
						<?php $attribute = array('class' => 'form-horizontal');?>
						<?php echo form_open_multipart('admin/testimonial/updateTestimonial', $attribute);?>
							<div class="box-body">
								<div class="form-group">
									<label for="tes_name" class="col-sm-2 control-label">Name</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="tes_name" id="tes_name" placeholder="Enter Your Name" value="<?php echo stripslashes($testimonial->tes_name);?>" required>
										<?php echo form_error('tes_name', '<p class="text-danger">', '</p>')?>
									</div>
								</div>
							<!--	<div class="form-group">
									<label for="tes_company" class="col-sm-2 control-label">Company</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="tes_company" idtes_companytes_type" placeholder="Enter Type Ex: Vendor, Client..etc" value="<?php echo stripslashes($testimonial->tes_company);?>" required>
										<?php echo form_error('tes_company', '<p class="text-danger">', '</p>')?>
									</div>
								</div>-->
							
								<div class="form-group">
									<label for="tes_detail" class="col-sm-2 control-label">Testimonial</label>
									<div class="col-sm-10">
										<textarea id="tes_detail" name="tes_detail" rows="3" cols="80"><?php echo stripslashes($testimonial->tes_detail);?></textarea>

										<?php echo form_error('tes_detail', '<p class="text-danger">', '</p>')?>
									</div>
								</div>
							</div><!-- /.box-body -->
							<div class="box-footer">
								<button type="submit" class="btn btn-primary">Update</button>
							</div>
							<input type="hidden" name="tes_id" value="<?php echo $tes_id;?>">
						</form>
					</div><!-- /.box -->
				</div><!--/.col (center) -->
				
				
			</div>   <!-- /.row -->
			
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
$this->load->view('admin/footer_view');