<?php $this->load->view('admin/header_view');?>
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
			<h1>Blog<small>Details</small></h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo site_url('/admin/dashboard');?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				<li><a href="<?php echo site_url('/admin/blog');?>">Blog</a></li>
				<li class="active">Blog Details</li>
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
							<h3 class="box-title">Edit Blog</h3>
						</div><!-- /.box-header -->

						<?php if($add_error)
						{?>
						<p class="login-box-msg callout callout-danger"><?php echo $add_error;?><BR></p>
						<?php
						}?>
						
						<?php $blog_categories = explode(',', $blog->cat_id);?>
						
						<!-- form start -->
						<?php $attribute = array('class' => 'form-horizontal');?>
						<?php echo form_open_multipart('admin/blog/updateBlog', $attribute);?>
							<div class="box-body">
								<!--<div class="form-group">
									<label for="cat_id" class="col-sm-2 control-label">Category</label>
									<div class="col-sm-10">
										<select class="form-control select2" multiple="multiple" name="cat_id[]" data-placeholder="Select Category" required>
											<option value="">Please Select</option>
											<?php
											foreach($categories as $category)
											{			
											?>
											<option value="<?php echo $category['cat_id'];?>" <?php if(in_array($category['cat_id'],$blog_categories)){echo "SELECTED";}?>><?php echo stripslashes($category['cat_title']);?></option>
											<?php
											}?>
										</select>										
										<?php echo form_error('cat_id', '<p class="text-danger">', '</p>')?>
									</div>
								</div> -->
								<div class="form-group">
									<label for="b_title" class="col-sm-2 control-label">Blog Title</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="b_title" id="b_title" placeholder="Enter Blog Title" value="<?php echo stripslashes($blog->b_title);?>" required>
										<?php echo form_error('b_title', '<p class="text-danger">', '</p>')?>
									</div>
								</div>
								<div class="form-group">
									<label for="b_author" class="col-sm-2 control-label">Blog Author</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="b_author" id="b_author" placeholder="Enter Author" value="<?php echo stripslashes($blog->b_author);?>" required>
										<?php echo form_error('b_author', '<p class="text-danger">', '</p>')?>
									</div>
								</div>
								<div class="form-group">
									<label for="download" class="col-sm-2 control-label">Image</label>
									<div class="col-sm-10">
										<input type="file" name="b_file" id="b_file">
										<?php
										if($blog->b_image!="")
										{?>
										<?php $path_to_file = base_url().'upload/je/'.stripslashes($blog->b_image);?>
										<p class="help-block" style="padding-left:50px;"><a href="#" onclick="open('<?php echo $path_to_file;?>','barcode','scrollbars=1,toolbar=0,location=0,resizable=0,width=500,height=520')">View Image</a></p>
										<input type="hidden" name="old_file" value="<?php echo stripslashes($blog->b_image);?>">
										<?php
										}?>
										
										<?php echo form_error('b_file', '<p class="text-danger">', '</p>')?>
									</div>
								</div>
								<div class="form-group">
									<label for="b_desc" class="col-sm-2 control-label">Description</label>
									<div class="col-sm-10">
										<textarea id="editor1" name="b_desc" rows="10" cols="80"><?php echo stripslashes($blog->b_desc);?></textarea>
										<?php echo form_error('b_desc', '<p class="text-danger">', '</p>')?>
									</div>
								</div>
							</div><!-- /.box-body -->
							<div class="box-footer">
								<button type="submit" class="btn btn-primary">Update</button>
							</div>
							<input type="hidden" name="b_id" value="<?php echo $b_id;?>">
						</form>
					</div><!-- /.box -->
				</div><!--/.col (center) -->
				
				
			</div>   <!-- /.row -->
			
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
$this->load->view('admin/footer_view');