<?php $this->load->view('admin/header_view');?>
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
			<h1>Feature<small>Details of <?php echo $product_name;?></small></h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo site_url('/admin/dashboard');?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				<li><a href="<?php echo site_url('/admin/product');?>">Product</a></li>
				<li><a href="<?php echo site_url('/admin/product/productFeatures/'.$prod_id);?>"><i class="fa fa-cube"></i> Feature</a></li>
				<li class="active">Feature Details of <?php echo $product_name;?></li>
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
							<h3 class="box-title">Edit Feature of <?php echo $product_name;?></h3>
						</div><!-- /.box-header -->

						<?php if($add_error)
						{?>
						<p class="login-box-msg callout callout-danger"><?php echo $add_error;?><BR></p>
						<?php
						}?>
						
						<!-- form start -->
						<?php $attribute = array('class' => 'form-horizontal');?>
						<?php echo form_open_multipart('admin/product/updateFeature', $attribute);?>
							<div class="box-body">
								<div class="form-group">
									<label for="pf_name" class="col-sm-2 control-label">Feature Name</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="pf_name" id="pf_name" placeholder="Enter Feature Name" value="<?php echo stripslashes($feature->pf_name);?>" required>
										<?php echo form_error('pf_name', '<p class="text-danger">', '</p>')?>
									</div>
								</div>
								<div class="form-group">
									<label for="pf_detail" class="col-sm-2 control-label">Feature Detail</label>
									<div class="col-sm-10">
										<input class="form-control" type="text" name="pf_detail" rows="10" cols="80" value="<?php echo stripslashes($feature->pf_detail);?>">
										<?php echo form_error('pf_detail', '<p class="text-danger">', '</p>')?>
									</div>
								</div>
							</div><!-- /.box-body -->
							<div class="box-footer">
								<button type="submit" class="btn btn-primary">Update</button>
							</div>
							<input type="hidden" name="prod_id" value="<?php echo $prod_id;?>">
							<input type="hidden" name="pf_id" value="<?php echo $pf_id;?>">
						</form>
					</div><!-- /.box -->
				</div><!--/.col (center) -->
				
				
			</div>   <!-- /.row -->
			
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
$this->load->view('admin/footer_view');