<?php $this->load->view('admin/header_view');?>
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
			<h1>Team<small>Details</small></h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo site_url('/admin/dashboard');?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				<li><a href="<?php echo site_url('/admin/team');?>">Team</a></li>
				<li class="active">Team Details</li>
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
							<h3 class="box-title">Add Team</h3>
						</div><!-- /.box-header -->

						<?php if($add_error)
						{?>
						<p class="login-box-msg callout callout-danger"><?php echo $add_error;?><BR></p>
						<?php
						}?>

						<!-- form start -->
						<?php $attribute = array('class' => 'form-horizontal');?>
						<?php echo form_open_multipart('admin/team/submitTeam', $attribute);?>
							<div class="box-body">
								<div class="form-group">
									<label for="team_title" class="col-sm-2 control-label">Member Name</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="team_title" id="team_title" placeholder="Enter Member Name" value="<?php echo set_value('team_title');?>" required>
										<?php echo form_error('team_title', '<p class="text-danger">', '</p>')?>
									</div>
								</div>
								<div class="form-group">
									<label for="team_designation" class="col-sm-2 control-label">Designation</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="team_designation" id="team_designation" placeholder="Enter Designation" value="<?php echo set_value('team_designation');?>" required>
										<?php echo form_error('team_designation', '<p class="text-danger">', '</p>')?>
									</div>
								</div>
								<div class="form-group">
									<label for="team_profile" class="col-sm-2 control-label">Profile</label>
									<div class="col-sm-10">
										<textarea id="team_profile" name="team_profile" rows="3" cols="80"></textarea>

										<?php echo form_error('team_profile', '<p class="text-danger">', '</p>')?>
									</div>
								</div>
								<div class="form-group">
									<label for="team" class="col-sm-2 control-label">Image</label>
									<div class="col-sm-10">
										<input type="file" class="form-control" name="team" id="team" value="<?php echo set_value('team');?>" required>

										<?php echo form_error('team', '<p class="text-danger">', '</p>')?>
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