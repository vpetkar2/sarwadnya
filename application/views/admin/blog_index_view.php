<?php $this->load->view('admin/header_view');?>
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
			<h1>Blog<small> List</small></h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo site_url('/admin/dashboard');?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				<li class="active">Blog List</li>
			</ol>
        </section>
		<!-- Main content -->
        <section class="content">
			<div class="row">
				<div class="col-xs-12">
					 <div class="box">
						<div class="box-header">
							<h3 class="box-title">Blog List</h3>
							<p><br/><a class="btn bg-red" href="<?php echo site_url('/admin/blog/addBlog');?>"><i class="fa fa-plus-square"></i>&nbsp;Add</a></p>
						</div><!-- /.box-header -->

						<?php if($this->session->flashdata('add_success')) { ?>
						<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert">x</button>
						<?php echo $this->session->flashdata('add_success');?>
						</div>
						<?php } ?>

						<?php if($this->session->flashdata('update_success')) { ?>
						<div class="alert alert-warning">
						<button type="button" class="close" data-dismiss="alert">x</button>
						<?php echo $this->session->flashdata('update_success');?>
						</div>
						<?php } ?>

						<?php if($this->session->flashdata('status_inactive')) { ?>
						<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert">x</button>
						Record is Inactive now!
						</div>
						<?php } ?>
						<?php if($this->session->flashdata('status_active')) { ?>
						<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert">x</button>
						Record is Active now!
						</div>
						<?php } ?>
						<?php if($this->session->flashdata('error')) { ?>
						<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert">x</button>
						<?php echo $this->session->flashdata('error');?>
						</div>
						<?php } ?>

						<div class="box-body">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Sr No.</th>
										<th>Name</th>
										<th>Author</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$count=1;
									if(!empty($blogs))
									{
									foreach($blogs as $blog)
									{
										if($blog['b_status']=='active')
										{
											$action = "<i class='fa fa-pause'></i>&nbsp;Inactive";
											$mode = "in";
										}
										else
										{
											$action = "<i class='fa fa-play'></i>&nbsp;Active";
											$mode = "ac";
										}
									?>
									<tr>
										<td><?php echo $count;?></td>
										<td><?php echo stripslashes($blog['b_title']);?></td>
										<td><?php echo stripslashes($blog['b_author']);?></td>
										<td><span class="label <?php if($blog['b_status']=='active'){?>label-success<?php }else{?>label-danger<?php }?>"><?php echo ucfirst($blog['b_status']);?></span></td>
										<td>
											<a class="btn bg-purple" href="<?php echo site_url('/admin/blog/editBlog/'.$blog['b_id']);?>"><i class="fa fa-edit"></i>&nbsp;Edit</a>
											<a class="btn <?php if($blog['b_status']=='active'){?>bg-orange<?php }else{?>bg-olive<?php }?>" href="<?php echo site_url('/admin/blog/updateStatus/'.$blog['b_id']);?>"><?php echo $action;?></a>
										</td>
									</tr>
									<?php
									$count++;
									}
									}?>
								</tbody>
							</table>
						</div><!-- /.box-body -->
					</div><!-- /.box -->
				</div><!-- /.col -->
			</div><!-- /.row -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
$this->load->view('admin/footer_view');