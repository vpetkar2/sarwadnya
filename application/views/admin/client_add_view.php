<?php $this->load->view('admin/header_view');?>
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
			<h1>Client<small>Details</small></h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo site_url('/admin/dashboard');?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				<li><a href="<?php echo site_url('/admin/client');?>">Client</a></li>
				<li class="active">Client Details</li>
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
							<h3 class="box-title">Add Client</h3>
						</div><!-- /.box-header -->

						<?php if($add_error)
						{?>
						<p class="login-box-msg callout callout-danger"><?php echo $add_error;?><BR></p>
						<?php
						}?>

						<!-- form start -->
						<?php $attribute = array('class' => 'form-horizontal');?>
						<?php echo form_open_multipart('admin/client/submitClient', $attribute);?>
							<div class="box-body">
								<div class="form-group">
									<label for="client_title" class="col-sm-2 control-label">Title</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="client_title" id="client_title" placeholder="Enter Client Title" value="<?php echo set_value('client_title');?>" required>
										<?php echo form_error('client_title', '<p class="text-danger">', '</p>')?>
									</div>
								</div>
								<div class="form-group">
									<label for="client" class="col-sm-2 control-label">Logo</label>
									<div class="col-sm-10">
										<input type="file" class="form-control" name="client" id="client" value="<?php echo set_value('client');?>" required>

										<?php echo form_error('client', '<p class="text-danger">', '</p>')?>
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