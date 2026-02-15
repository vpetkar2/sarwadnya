<?php $this->load->view('admin/header_view');?>
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
			<h1>SEO<small>Details</small></h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo site_url('/admin/dashboard');?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				<li><a href="<?php echo site_url('/admin/seo');?>">SEO</a></li>
				<li class="active">SEO Details</li>
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
							<h3 class="box-title">Edit SEO</h3>
						</div><!-- /.box-header -->

						<?php if($add_error)
						{?>
						<p class="login-box-msg callout callout-danger"><?php echo $add_error;?><BR></p>
						<?php
						}?>
						
						<!-- form start -->
						<?php $attribute = array('class' => 'form-horizontal');?>
						<?php echo form_open_multipart('admin/seo/updateSEO', $attribute);?>
							<div class="box-body">
								<div class="form-group">
									<label for="seo_url" class="col-sm-2 control-label">SEO URL</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="seo_url" id="seo_url" placeholder="Enter SEO Url" value="<?php echo stripslashes($seo->seo_url);?>" required>
										<?php echo form_error('seo_url', '<p class="text-danger">', '</p>')?>
									</div>
								</div>
								<div class="form-group">
									<label for="seo_url" class="col-sm-2 control-label">SEO City</label>
									<div class="col-sm-10">
										<select class="form-control" name="seo_city" id="seo_city" required>
										    <option value=""></option>
									        <?php foreach($cities as $city) { ?>
									        <option name="<?php echo $city['name']; ?>" <?php if (stripslashes($seo->seo_city) == $city['name']) { echo "selected"; } ?>><?php echo $city['name']; ?></option>
									        <?php } ?>
									    </select>
										<?php echo form_error('seo_city', '<p class="text-danger">', '</p>')?>
									</div>
								</div>
								<div class="form-group">
									<label for="seo_title" class="col-sm-2 control-label">SEO Title</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="seo_title" id="seo_title" placeholder="Enter SEO Title" value="<?php echo stripslashes($seo->seo_title);?>" required>
										<?php echo form_error('seo_title', '<p class="text-danger">', '</p>')?>
									</div>
								</div>
								<div class="form-group">
									<label for="seo_key" class="col-sm-2 control-label">SEO Key</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="seo_key" id="seo_key" placeholder="Enter SEO Key" value="<?php echo stripslashes($seo->seo_key);?>" required>
										<?php echo form_error('seo_key', '<p class="text-danger">', '</p>')?>
									</div>
								</div>
								<div class="form-group">
									<label for="seo_desc" class="col-sm-2 control-label">SEO Description</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="seo_desc" id="seo_desc" placeholder="Enter SEO Description" value="<?php echo stripslashes($seo->seo_desc);?>" required>
										<?php echo form_error('seo_desc', '<p class="text-danger">', '</p>')?>
									</div>
								</div>
								<div class="form-group">
									<label for="download" class="col-sm-2 control-label">Image</label>
									<div class="col-sm-10">
										<input type="file" name="seo_file" id="seo_file">
										<?php
										if($seo->seo_image!="")
										{?>
										<?php $path_to_file = base_url().'upload/je/'.stripslashes($seo->seo_image);?>
										<p class="help-block" style="padding-left:50px;"><a href="#" onclick="open('<?php echo $path_to_file;?>','barcode','scrollbars=1,toolbar=0,location=0,resizable=0,width=500,height=520')">View Image</a></p>
										<input type="hidden" name="old_file" value="<?php echo stripslashes($seo->seo_image);?>">
										<?php
										}?>
										
										<?php echo form_error('seo_file', '<p class="text-danger">', '</p>')?>
									</div>
								</div>
							</div><!-- /.box-body -->
							<div class="box-footer">
								<button type="submit" class="btn btn-primary">Update</button>
							</div>
							<input type="hidden" name="seo_id" value="<?php echo $seo_id;?>">
						</form>
					</div><!-- /.box -->
				</div><!--/.col (center) -->
				
				
			</div>   <!-- /.row -->
			
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
$this->load->view('admin/footer_view');