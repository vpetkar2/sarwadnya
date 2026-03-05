<?php $this->load->view('admin/header_view');?>
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
			<h1>CMS<small>Details</small></h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo site_url('/admin/dashboard');?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				<li><a href="<?php echo site_url('/admin/cms');?>">CMS</a></li>
				<li class="active">CMS Details</li>
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
							<h3 class="box-title">Edit CMS</h3>
						</div><!-- /.box-header -->

						<?php if($add_error)
						{?>
						<p class="login-box-msg callout callout-danger"><?php echo $add_error;?><BR></p>
						<?php
						}?>
						
						<!-- form start -->
						<?php $attribute = array('class' => 'form-horizontal');?>
						<?php echo form_open_multipart('admin/cms/updateCMS', $attribute);?>
							<div class="box-body">
								<div class="form-group">
									<label for="cms_title" class="col-sm-2 control-label">CMS Title</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="cms_title" id="cms_title" placeholder="Enter CMS Title" value="<?php echo stripslashes($cms->cms_title);?>" required>
										<?php echo form_error('cms_title', '<p class="text-danger">', '</p>')?>
									</div>
								</div>
								<div class="form-group">
									<label for="cms_url" class="col-sm-2 control-label">CMS URL</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="cms_url" id="cms_url" placeholder="Enter CMS URL" value="<?php echo stripslashes($cms->cms_url);?>" required>
										<?php echo form_error('cms_url', '<p class="text-danger">', '</p>')?>
									</div>
								</div>
								<div class="form-group">
									<label for="cms_window_title" class="col-sm-2 control-label">Window Title</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="cms_window_title" id="cms_window_title" placeholder="Enter Window Title" value="<?php echo stripslashes($cms->cms_window_title);?>" required>
										<?php echo form_error('cms_window_title', '<p class="text-danger">', '</p>')?>
									</div>
								</div>
								<div class="form-group">
									<label for="cms_metakey" class="col-sm-2 control-label">Meta Keyword</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="cms_metakey" id="cms_metakey" placeholder="Enter Meta Keyword" value="<?php echo stripslashes($cms->cms_metakey);?>" required>
										<?php echo form_error('cms_metakey', '<p class="text-danger">', '</p>')?>
									</div>
								</div>
								<div class="form-group">
									<label for="cms_metadesc" class="col-sm-2 control-label">Meta Description</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="cms_metadesc" id="cms_metadesc" placeholder="Enter Meta Description" value="<?php echo stripslashes($cms->cms_metadesc);?>" required>
										<?php echo form_error('cms_metadesc', '<p class="text-danger">', '</p>')?>
									</div>
								</div>
								<div class="form-group">
									<label for="download" class="col-sm-2 control-label">Image</label>
									<div class="col-sm-10">
										<input type="file" name="cms_file" id="cms_file">
										<?php
										if($cms->cms_image!="")
										{?>
										<?php $path_to_file = base_url().'upload/je/'.stripslashes($cms->cms_image);?>
										<p class="help-block" style="padding-left:50px;"><a href="#" onclick="open('<?php echo $path_to_file;?>','barcode','scrollbars=1,toolbar=0,location=0,resizable=0,width=500,height=520')">View Image</a></p>
										<input type="hidden" name="old_file" value="<?php echo stripslashes($cms->cms_image);?>">
										<?php
										}?>
										
										<?php echo form_error('cms_file', '<p class="text-danger">', '</p>')?>
									</div>
								</div>
								<div class="form-group">
									<label for="cms_desc" class="col-sm-2 control-label">Main Description</label>
									<div class="col-sm-10">
										<textarea id="editor1" name="cms_desc" rows="10" cols="80"><?php echo stripslashes($cms->cms_desc);?></textarea>
										<?php echo form_error('cms_desc', '<p class="text-danger">', '</p>')?>
									</div>
								</div>
							</div><!-- /.box-body -->
							<div class="box-footer">
								<button type="submit" class="btn btn-primary">Update</button>
							</div>
							<input type="hidden" name="cms_id" value="<?php echo $cms_id;?>">
						</form>
					</div><!-- /.box -->
				</div><!--/.col (center) -->
				
				
			</div>   <!-- /.row -->
			
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
$this->load->view('admin/footer_view');