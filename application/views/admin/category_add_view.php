<?php $this->load->view('admin/header_view');?>
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
			<h1>Category<small>Details</small></h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo site_url('/admin/dashboard');?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				<li><a href="<?php echo site_url('/admin/category');?>">Category</a></li>
				<li class="active">Category Details</li>
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
							<h3 class="box-title">Add Category</h3>
						</div><!-- /.box-header -->

						<?php if($add_error)
						{?>
						<p class="login-box-msg callout callout-danger"><?php echo $add_error;?><BR></p>
						<?php
						}?>

						<!-- form start -->
						<?php $attribute = array('class' => 'form-horizontal');?>
						<?php echo form_open_multipart('admin/category/submitCategory', $attribute);?>
							<div class="box-body">
							    <div class="form-group">
									<label for="id" class="col-sm-2 control-label">City</label>
									<div class="col-sm-10">
										<select class="form-control select2" name="city_id" data-placeholder="Select City" required>
											<option value="">Please Select</option>
											<?php
											foreach($city as $city_name)
											{			
											?>
											<option value="<?php echo $city_name->id; ?>"><?php echo $city_name->name; ?></option>
											<?php
											}?>
										</select>
										<?php echo form_error('id', '<p class="text-danger">', '</p>')?>
									</div>
								</div>
								
								<div class="form-group">
									<label for="cat_title" class="col-sm-2 control-label">Title</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="cat_title" id="cat_title" placeholder="Enter Category Title" value="<?php echo set_value('cat_title');?>" required>
										<?php echo form_error('cat_title', '<p class="text-danger">', '</p>')?>
									</div>
								</div>
								<div class="form-group">
									<label for="cat_desc" class="col-sm-2 control-label">Description</label>
									<div class="col-sm-10">
										<textarea class="form-control" name="cat_desc" id="cat_desc" placeholder="Enter Category Description" value="<?php echo set_value('cat_title');?>"><?php echo set_value('cat_desc');?></textarea>
										<?php echo form_error('cat_title', '<p class="text-danger">', '</p>')?>
									</div>
								</div>
							</div><!-- /.box-body -->
							<div class="box-footer">
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>							
						</form>
					</div><!-- /.box -->
				</div><!--/.col (center) -->
				
				
			</div>   <!-- /.row -->
			
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
$this->load->view('admin/footer_view');