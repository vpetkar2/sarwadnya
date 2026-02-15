<?php $this->load->view('admin/header_view');
$Product_name = stripslashes($this->db->get_where('product', array('prod_id' => $prod_id))->row()->prod_title);
?>
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
			<h1>Product<small> Images List For : <?php echo "<i>".$Product_name."</i>";?></small></h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo site_url('/admin/dashboard');?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				<li><a href="<?php echo site_url('/admin/Product');?>"><i class="fa fa-picture"></i> Product</a></li>
				<li class="active">Product Images List</li>
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
							<h3 class="box-title">Add Image For : <?php echo "<i>".$Product_name."</i>";?></h3>
						</div><!-- /.box-header -->

						<?php if($add_error)
						{?>
						<p class="login-box-msg callout callout-danger"><?php echo $add_error;?><BR></p>
						<?php
						}?>
						
						<?php if($this->session->flashdata('add_success')) { ?>
						<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert">x</button>
						<?php echo $this->session->flashdata('add_success');?>
						</div>
						<?php } ?>
						
						<?php if($this->session->flashdata('delete_success')) { ?>
						<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert">x</button>
						<?php echo $this->session->flashdata('delete_success');?>
						</div>
						<?php } ?>

						<!-- form start -->
						<?php $attribute = array('class' => 'form-horizontal');?>
						<?php echo form_open_multipart('admin/product/submitproductImage', $attribute);?>
							<div class="box-body">
								<div class="form-group">
									<label for="prod_image" class="col-sm-2 control-label">Upload Image</label>
									<div class="col-sm-10">
										<input type="file" name="prod_image" id="prod_image" required>
										<?php echo form_error('prod_title', '<p class="text-danger">', '</p>')?>
									</div>
								</div>														
							</div><!-- /.box-body -->
							<div class="box-footer">
								<button type="submit" class="btn btn-primary">Submit</button>
								<input type="hidden" name="prod_id" value="<?php echo $prod_id;?>">
							</div>							
						</form>
					</div><!-- /.box -->
				</div><!--/.col (center) -->
			</div><!-- /.row -->
			
			
			<div class="row">
				<div class="col-xs-12">
					 <div class="box">
						<div class="box-header">
							<h3 class="box-title">Product Images List For : <?php echo "<i>".$Product_name."</i>";?></h3>							
						</div><!-- /.box-header -->

						
						<div class="box-body">
							<?php
							$count=1;
							if(!empty($pimages))
							{?>
							<table class="table table-striped">
								<tbody>
									<tr>
									<?php
									foreach($pimages as $pimage)
									{
										$path_to_file	= base_url()."upload/je/".stripslashes($pimage['prod_image']);
									?>
										<td>
											<a href="#" onclick="open('<?php echo $path_to_file;?>','barcode','scrollbars=1,toolbar=0,location=0,resizable=0,width=500,height=520')"><img src="<?php echo $path_to_file;?>" width="120px;"></a>								
											<br/><br/>
											<a class="btn bg-purple" onClick='if(confirm("Do You Want To Delete This ?")){return true;}else{return false;}' href="<?php echo site_url('/admin/product/deleteproductImage/'.$prod_id.'/'.$pimage['img_id']);?>"><i class="fa fa-trash"></i>&nbsp;Delete</a>
										</td>									
									<?php
										if($count==4)
										{
											echo "</tr><tr>";
											$count=1;
										}
										else
										{
											$count++;
										}
									}?>
									</tr>
								</tbody>
							</table>
							<?php
							}
							else
							{
								echo "No Images Found";
							}?>
						</div><!-- /.box-body -->
					</div><!-- /.box -->
				</div><!-- /.col -->
			</div><!-- /.row -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
$this->load->view('admin/footer_view');