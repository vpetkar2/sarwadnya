<?php $this->load->view('admin/header_view');?>
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
			<h1>Product<small>Details</small></h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo site_url('/admin/dashboard');?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				<li><a href="<?php echo site_url('/admin/Product');?>">Product</a></li>
				<li class="active">Product Details</li>
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
							<h3 class="box-title">Edit Product</h3>
						</div><!-- /.box-header -->

						<?php if($add_error)
						{?>
						<p class="login-box-msg callout callout-danger"><?php echo $add_error;?><BR></p>
						<?php
						}?>
						
						<!-- form start -->
						<?php $attribute = array('class' => 'form-horizontal');?>
						<?php echo form_open_multipart('admin/product/updateProduct', $attribute);?>
							<div class="box-body">
							    <div class="form-group">
									<label for="cat_id" class="col-sm-2 control-label">City</label>
									<div class="col-sm-10">
										<select class="form-control select2" name="city_id" data-placeholder="Select City" required>
											<option value="">Please Select</option>
											<?php
											foreach($city as $city_name)
											{											
											?>
											<option value="<?php echo $city_name->id; ?>" <?php if($product->prod_city_id == $city_name->id) { ?> SELECTED <?php } ?>> <?php echo $city_name->name; ?> </option>
											<?php
											}?>
										</select>
										<?php echo form_error('id', '<p class="text-danger">', '</p>')?>
									</div>
								</div>
								<div class="form-group">
									<label for="cat_id" class="col-sm-2 control-label">Category</label>
									<div class="col-sm-10">
										<select class="form-control select2" name="cat_id" data-placeholder="Select Category" required>
											<option value="">Please Select</option>
											<?php
											foreach($categories as $category)
											{								
											    if ($category['city_id'] == 2) {
											     $cityname = "Mumbai";
											    }
											    if ($category['city_id'] == 1) {
											     $cityname = "Nagpur";
											    }
											    if ($category['city_id'] == 3) {
											     $cityname = "India";
											    }
											?>
											<option value="<?php echo $category['cat_id'];?>" <?php if($product->prod_cat_id == $category['cat_id']){ ?>SELECTED<?php } ?>><?php echo stripslashes($category['cat_title'])." - ".$cityname;?></option>
											<?php
											}?>
										</select>
										<?php echo form_error('cat_id', '<p class="text-danger">', '</p>')?>
									</div>
								</div>
								<div class="form-group">
									<label for="prod_title" class="col-sm-2 control-label">Product Title</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="prod_title" id="prod_title" placeholder="Enter Product Title" value="<?php echo stripslashes($product->prod_title);?>" required>
										<?php echo form_error('prod_title', '<p class="text-danger">', '</p>')?>
									</div>
								</div>
							<!--	<div class="form-group">
									<label for="download" class="col-sm-2 control-label">Image</label>
									<div class="col-sm-10">
										<input type="file" name="prod_file" id="prod_file">
										<?php
										if($product->prod_image!="")
										{?>
										<?php $path_to_file = base_url().'upload/je/'.stripslashes($product->prod_image);?>
										<p class="help-block" style="padding-left:50px;"><a href="#" onclick="open('<?php echo $path_to_file;?>','barcode','scrollbars=1,toolbar=0,location=0,resizable=0,width=500,height=520')">View Image</a></p>
										<input type="hidden" name="old_file" value="<?php echo stripslashes($product->prod_image);?>">
										<?php
										}?>
										
										<?php echo form_error('prod_file', '<p class="text-danger">', '</p>')?>
									</div>
								</div>
								<div class="form-group">
									<label for="prod_desc" class="col-sm-2 control-label">Short Description</label>
									<div class="col-sm-10">
										<textarea id="editor2" name="prod_short_desc" rows="4" cols="80"><?php echo stripslashes($product->prod_short_desc);?></textarea>

										<?php echo form_error('prod_desc', '<p class="text-danger">', '</p>')?>
									</div>
								</div>-->
								<div class="form-group">
									<label for="prod_desc" class="col-sm-2 control-label">Description</label>
									<div class="col-sm-10">
										<textarea id="editor1" name="prod_desc" rows="10" cols="121"><?php echo stripslashes($product->prod_desc);?></textarea>
										<?php echo form_error('prod_desc', '<p class="text-danger">', '</p>')?>
									</div>
								</div>
								
								<div class="form-group">
									<label for="prod_title" class="col-sm-2 control-label">product Price</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="prod_cost" id="prod_title" placeholder="Enter product Price" value="<?php echo stripslashes($product->prod_cost);?>" required>
										<?php echo form_error('prod_title', '<p class="text-danger">', '</p>')?>
									</div>
								</div>
								<div class="form-group">
									<label for="prod_code" class="col-sm-2 control-label">product Code</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="prod_code" id="prod_code" placeholder="Enter product Code" value="<?php echo stripslashes($product->prod_code);?>">
										<?php echo form_error('prod_code', '<p class="text-danger">', '</p>')?>
									</div>
								</div>
							</div><!-- /.box-body -->
							<div class="box-footer">
								<button type="submit" class="btn btn-primary">Update</button>
							</div>
							<input type="hidden" name="prod_id" value="<?php echo $prod_id;?>">
						</form>
					</div><!-- /.box -->
				</div><!--/.col (center) -->
				
				
			</div>   <!-- /.row -->
			
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
$this->load->view('admin/footer_view');