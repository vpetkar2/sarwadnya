<?php $this->load->view('admin/header_view');?>
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
			<h1>News<small>Details</small></h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo site_url('/admin/dashboard');?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				<li><a href="<?php echo site_url('/admin/News');?>">News</a></li>
				<li class="active">News Details</li>
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
							<h3 class="box-title">Edit News</h3>
						</div><!-- /.box-header -->

						<?php if($add_error)
						{?>
						<p class="login-box-msg callout callout-danger"><?php echo $add_error;?><BR></p>
						<?php
						}?>
						
						<?php $news_categories = explode(',', $news->cat_id);?>
						
						<!-- form start -->
						<?php $attribute = array('class' => 'form-horizontal');?>
						<?php echo form_open_multipart('admin/news/updatenews', $attribute);?>
							<div class="box-body">
								<div class="form-group">
									<label for="news_title" class="col-sm-2 control-label">News Title</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="news_title" id="news_title" placeholder="Enter News Title" value="<?php echo stripslashes($news->news_title);?>" required>
										<?php echo form_error('news_title', '<p class="text-danger">', '</p>')?>
									</div>
								</div>
								<div class="form-group">
									<label for="download" class="col-sm-2 control-label">Image</label>
									<div class="col-sm-10">
										<input type="file" name="news_file" id="news_file">
										<?php
										if($news->news_image!="")
										{?>
										<?php $path_to_file = base_url().'upload/je/'.stripslashes($news->news_image);?>
										<p class="help-block" style="padding-left:50px;"><a href="#" onclick="open('<?php echo $path_to_file;?>','barcode','scrollbars=1,toolbar=0,location=0,resizable=0,width=500,height=520')">View Image</a></p>
										<input type="hidden" name="old_file" value="<?php echo stripslashes($news->news_image);?>">
										<?php
										}?>
										
										<?php echo form_error('news_file', '<p class="text-danger">', '</p>')?>
									</div>
								</div>
								<div class="form-group">
									<label for="news_desc" class="col-sm-2 control-label">Description</label>
									<div class="col-sm-10">
										<textarea id="editor1" name="news_desc" rows="10" cols="80"><?php echo stripslashes($news->news_desc);?></textarea>
										<?php echo form_error('news_desc', '<p class="text-danger">', '</p>')?>
									</div>
								</div>
							</div><!-- /.box-body -->
							<div class="box-footer">
								<button type="submit" class="btn btn-primary">Update</button>
							</div>
							<input type="hidden" name="news_id" value="<?php echo $news_id;?>">
						</form>
					</div><!-- /.box -->
				</div><!--/.col (center) -->
				
				
			</div>   <!-- /.row -->
			
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
$this->load->view('admin/footer_view');