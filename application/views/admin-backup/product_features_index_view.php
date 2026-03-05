<?php $this->load->view('admin/header_view');?>
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Features<small> List of <?php echo $product_name;?></small></h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo site_url('/admin/dashboard');?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="<?php echo site_url('/admin/product');?>"><i class="fa fa-cube"></i> Product</a></li>
                <li class="active">Features List of <?php echo $product_name;?></li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                     <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Features List :: <?php echo $product_name;?></h3>
                            <p><br/><a class="btn bg-red" href="<?php echo site_url('/admin/product/addFeature/'.$prod_id);?>"><i class="fa fa-plus-square"></i>&nbsp;Add</a></p>
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

                        <?php if($this->session->flashdata('delete_success')) { ?>
                        <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        <?php echo $this->session->flashdata('delete_success');?>
                        </div>
                        <?php } ?>

                        <div class="box-body">
                            <form id="featureForm" method="POST" action="<?php echo site_url('/admin/product/deleteMultipleFeatures/'.$prod_id);?>">

							<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

                                <div style="margin-bottom: 10px;">
                                    <button type="submit" class="btn btn-danger" id="deleteBtn" style="display:none;" onclick="return confirm('Are you sure you want to delete selected features?');"><i class="fa fa-trash"></i>&nbsp;Delete Selected</button>
                                </div>
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th width="50"><input type="checkbox" id="selectAll" title="Select all"></th>
                                            <th>Sr No.</th>
                                            <th>Title</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $count=1;
                                        if(!empty($features))
                                        {
                                        foreach($features as $feature)
                                        {
                                        ?>
                                        <tr>
                                            <td><input type="checkbox" name="feature_ids[]" value="<?php echo $feature['pf_id'];?>" class="feature-checkbox"></td>
                                            <td><?php echo $count;?></td>
                                            <td><?php echo stripslashes($feature['pf_name']);?></td>
                                            <td>
                                                <a class="btn bg-purple" href="<?php echo site_url('/admin/product/editFeature/'.$prod_id.'/'.$feature['pf_id']);?>"><i class="fa fa-edit"></i>&nbsp;Edit</a>
                                            </td>
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

<?php $this->load->view('admin/footer_view');?>

