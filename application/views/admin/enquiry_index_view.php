<?php $this->load->view('admin/header_view');?>
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
			<h1>Enquiry<small> List</small></h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo site_url('/admin/dashboard');?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				<li class="active">Enquiry List</li>
			</ol>
        </section>
		<!-- Main content -->
        <section class="content">
			<div class="row">
				<div class="col-xs-12">
					 <div class="box">
						<div class="box-header">
							<h3 class="box-title">Enquiry List</h3>
							
						</div><!-- /.box-header -->
						<div class="box-body">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Sr No.</th>
										<th>Name</th>
										<th>Email Id </th>
										<th> Mobile No</th>
											<!--<th> Project Requirement</th> -->
										<th> Message </th>
										<th> Product name</th>
										<th> Contact Date </th>
										<th> Action </th>
									</tr>
								</thead>
								<tbody>
									<?php
									if( !empty($enquirys) )
									{
										$count=1;
										foreach($enquirys as $contact)
										{	
											$albums = $this->admin_enquiry_model->showenquiryProd($contact['contact_prod_id']);
											
										?>
										<tr>  	 	 	 	 	 	 	 
											<td><?php echo $count;?></td>
											<td><?php echo stripslashes($contact['contact_name']);?></td>
											<td><?php echo stripslashes($contact['contact_email']);?></td>
											<td><?php echo stripslashes($contact['contact_mobile']);?></td>
											<!--<td><?php echo stripslashes($contact['contact_area']);?></td> -->
											<td><?php echo stripslashes($contact['contact_message']);?></td>
											<td><?php echo stripslashes($albums[0]['prod_title']);?></td>
											<td><?php echo stripslashes($contact['contact_applydate']);?></td>
                                            <td>
                                                <a class="btn bg-red" href="<?php echo site_url('/admin/enquiry/deleteEnquiry/'.$contact['contact_id']);?>"><i class="fa fa-edit"></i>&nbsp;Delete</a>
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