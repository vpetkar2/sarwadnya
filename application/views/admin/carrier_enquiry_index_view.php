<?php $this->load->view('admin/header_view');?>
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
			<h1>Carrier Enquiry<small> List</small></h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo site_url('/admin/dashboard');?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				<li class="active">Carrier Enquiry List</li>
			</ol>
        </section>
		<!-- Main content -->
        <section class="content">
			<div class="row">
				<div class="col-xs-12">
					 <div class="box">
						<div class="box-header">
							<h3 class="box-title">Carrier Enquiry List</h3>
							
						</div><!-- /.box-header -->
						<div class="box-body">
						    <form id="featureForm" method="POST" action="<?php echo site_url('/admin/carrierenquiry/deleteMultiple');?>">
						        <div style="margin-bottom: 10px;">
                                <button type="submit" class="btn btn-danger" id="deleteBtn" style="display:none;" onclick="return confirm('Are you sure you want to delete selected enquiry?');"><i class="fa fa-trash"></i>&nbsp;Delete Selected</button>
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            </div>
                            
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
									    <th width="50"><input type="checkbox" id="selectAll" title="Select all"></th>

										<th>Sr No.</th>
										<th>Name</th>
										<!--<th>Email Id </th>-->
										<th> Mobile No</th>
											<!--<th> Project Requirement</th> -->
										<th> Message </th>
										<th> Post name</th>
										<th> Resume</th>
										<th> Date </th>
									</tr>
								</thead>
								<tbody>
									<?php
									if( !empty($enquirys) )
									{
										$count=1;
										foreach($enquirys as $contact)
										{	
											$albums = $this->admin_carrier_enquiry_model->showenquiryProd($contact['contact_apply_for']);
											
										?>
										<tr>  	 	 	 	 	 	 	
										<td><input type="checkbox" name="enq_ids[]" value="<?php echo $contact['contact_id'];?>" class="feature-checkbox"></td>

											<td><?php echo $count;?></td>
											<td><?php echo stripslashes($contact['contact_name']);?><br><?php echo stripslashes($contact['contact_email']);?></td>
											<td><?php echo stripslashes($contact['contact_mobile']);?></td>
											<!--<td><?php echo stripslashes($contact['contact_area']);?></td> -->
											<td><?php echo stripslashes($contact['contact_message']);?></td>
											<td><?php echo stripslashes($albums[0]['crr_title']);?></td>
											<td><?php if($contact['contact_resume']!=''){ ?><a href="<? echo base_url('upload/resume/'.$contact['contact_resume']);?>">Resume Link</a><?php } ?></td>
											<td><?php echo stripslashes($contact['contact_applydate']);?></td>

										</tr>
										<?php
											$count++;
										}
									}?>
								</tbody>
							</table>
							</form>
						</div><!-- /.box-body -->
					</div><!-- /.box -->
				</div><!-- /.col -->
			</div><!-- /.row -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    
<script>
	// Select all functionality
	document.getElementById('selectAll').addEventListener('change', function() {
		var checkboxes = document.querySelectorAll('.feature-checkbox');
		checkboxes.forEach(function(checkbox) {
			checkbox.checked = document.getElementById('selectAll').checked;
		});
		updateDeleteButton();
	});

	// Show/hide delete button based on selection
	document.querySelectorAll('.feature-checkbox').forEach(function(checkbox) {
		checkbox.addEventListener('change', function() {
			updateDeleteButton();
		});
	});

	function updateDeleteButton() {
		var checkedBoxes = document.querySelectorAll('.feature-checkbox:checked');
		var deleteBtn = document.getElementById('deleteBtn');
		if (checkedBoxes.length > 0) {
			deleteBtn.style.display = 'inline-block';
		} else {
			deleteBtn.style.display = 'none';
		}
	}
	</script>

<?php $this->load->view('admin/footer_view'); ?>