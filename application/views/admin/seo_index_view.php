<?php $this->load->view('admin/header_view'); 
    $url_img = "http://www.parthfibrotech.in/upload/je/";
   // echo "<br>";  print_r($seoes); ?>
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
			<h1>SEO<small> List</small></h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo site_url('/admin/dashboard');?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				<li class="active">SEO List</li>
			</ol>
        </section>
		<!-- Main content -->
        <section class="content">
			<div class="row">
				<div class="col-xs-12">
					 <div class="box">
						<div class="box-header">
							<h3 class="box-title">SEO List</h3>
							<p><br/><a class="btn bg-red" href="<?php echo site_url('/admin/seo/addSEO');?>"><i class="fa fa-plus-square"></i>&nbsp;Add</a></p>
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
										<th>URL</th>
										<th>City</th>
										<th>Name</th>
										<th>Key</th>
										<th>Desc</th>
										<th>Image</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$count=1;
									if(!empty($seoes))
									{
									foreach($seoes as $seo)
									{
										
									?>
									<tr>
										<td><?php echo $count;?></td>
										<td><?php echo substr(stripslashes($seo['seo_url']),0,12);?></td>
										<td><?php echo substr(stripslashes($seo['seo_city']),0,15);?></td>
										<td><?php echo substr(stripslashes($seo['seo_title']),0,15);?></td>
										<td><?php echo substr(stripslashes($seo['seo_key']),0,15);?></td>
										<td><?php echo substr(stripslashes($seo['seo_desc']),0,50);?></td>
										<td>
										    <?php if($seo['seo_image']!="") { ?> 
										    <img src="<?php echo "$url_img"."".$seo['seo_image'] ;?>" alt="Seo Img" class="seo_img" style="width:50px; height:50px;">
										    <?php } else { ?>
										    <img src=""> <?php } ?></td>
										<td>
											<a class="btn bg-purple" href="<?php echo site_url('/admin/seo/editseo/'.$seo['seo_id']);?>"><i class="fa fa-edit"></i>&nbsp;Edit</a> 
										<a class="btn bg-red" href="<?php echo site_url('/admin/seo/deleteseo/'.$seo['seo_id']);?>"><i class="fa fa-trash"></i>&nbsp;Delete</a>
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