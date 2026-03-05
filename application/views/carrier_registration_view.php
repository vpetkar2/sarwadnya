<?php
$data['contact_detail'] = $contact_detail;
$this->load->view('header_view', $data);
?>
<!-- Content -->
<div class="page-content bg-white">
	<!-- inner page banner -->
	<div class="dlab-bnr-inr overlay-black-middle bg-pt"
		style="background-image:url(<?php echo base_url("assets/newsite/images/background/bg5.jpg"); ?>);">
		<div class="container">
			<div class="dlab-bnr-inr-entry">
				<h1 class="text-white">Career Details</h1>
			</div>
		</div>
	</div>
</div>
<!-- Content END-->

<!-- Content -->
<div class="page-content bg-white">
	<!-- Contact Form -->
	<div class="section-full content-inner contact-page-9"
		style="background-image: url(images/background/bg5.jpg); background-position: 30% 100%">
		<div class="container">
			<?php if (!empty($add_error)) { ?>
				<div class="alert alert-warning" id="msg">
					<button type="button" class="close" data-dismiss="alert">x</button><?php echo $add_error; ?>
				</div>
			<?php } ?>
			<?php if ($this->session->flashdata('add_success')) { ?>
				<div class="alert alert-success" id="msg">
					<button type="button" class="close" data-dismiss="alert">x</button>
					<?php echo $this->session->flashdata('add_success'); ?>
				</div>
			<?php } ?>
			<?php if ($this->session->flashdata('error')) { ?>
				<div class="alert alert-warning">
					<button type="button" class="close" data-dismiss="alert">x</button>
					<?php echo $this->session->flashdata('error'); ?>
				</div>
			<?php } ?>

			<div class="row">
				<div class="col-lg-8 offset-lg-2 col-md-12 m-b30">
				    
        			<?php if ($this->session->flashdata('add_success')) { ?>
        				<div class="alert alert-success" id="msg">
        					<button type="button" class="close" data-dismiss="alert">x</button>
        					<?php echo $this->session->flashdata('add_success'); ?>
        				</div>
        			<?php } ?>
        			<?php if ($this->session->flashdata('error')) { ?>
        				<div class="alert alert-warning">
        					<button type="button" class="close" data-dismiss="alert">x</button>
        					<?php echo $this->session->flashdata('error'); ?>
        				</div>
        			<?php } ?>
					<form class="inquiry-form wow box-shadow bg-white fadeInUp" data-wow-delay="0.2s"
						action="<?php echo base_url() . "carrier/submitPost"; ?>" method="post" accept-charset="utf-8"
						enctype="multipart/form-data">
				    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
							value="<?php echo $this->security->get_csrf_hash(); ?>" />
						<h3 class="title-box font-weight-300 m-t0 m-b10">Career Form <span class="bg-primary"></span>
						</h3>
						<br />
						<!-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the</p> -->
						<div class="row">
							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><i class="ti-user text-primary"></i></span>
										<input name="title" type="text" required class="form-control"
											placeholder="Enter Name">
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><i class="ti-email text-primary"></i></span>
										<input name="email" type="text" required class="form-control"
											placeholder="Email ID">
									</div>
								</div>
							</div>
							<div class="col-lg-12 col-md-12">
								<div class="form-group">
									<div class="input-group">
									    	<span class="input-group-addon"><i class="ti-mobile text-primary"></i></span>
										<input name="mobile" type="text" class="form-control" required
											placeholder="Telephone No / Mobile No">
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><i class="ti-check-box text-primary"></i></span>
										<select name="crrpost">
											<option>Select Industry</option>
											<?php
                    						if(!empty($carrier_list))
                    						{
                    							foreach($carrier_list as $carrier)
                    							{
                    								
                    								$carrier_name = stripslashes($carrier['crr_title']);
                    								$carrier_pos = stripslashes($carrier['crr_no_of_position']);
                    								
                    								$carrier_desc= stripslashes($carrier['crr_desc']);
                    							
                    								$url = base_url().'carrier/detail/'.$carrier['crr_id'].'/';
                    							?>
                    							<option value="<?php echo $carrier['crr_id']; ?>" <?php if($carrier['crr_id'] == $ids) { ?>selected <?php } ?>><?php echo $carrier_name; ?></option>
                    						<?php } } ?>
										</select>
									</div>
								</div>
							</div>
							<div class="col-lg-12 col-md-12">
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><i class="ti-agenda text-primary"></i></span>
										<textarea name="message" rows="4" class="form-control" required
											placeholder="Tell us about your project or idea"></textarea>
									</div>
								</div>
							</div>
							
							<!--<hr>-->
							
							<!--<div class="col-lg-6 col-md-6">-->
							<!--	<div class="form-group">-->
							<!--		<div class="input-group">-->
							<!--			<span class="input-group-addon"><i class="ti-file text-primary"></i></span>-->
							<!--			<input name="resume" type="file" required class="form-control"-->
							<!--				placeholder="Upload Resume">-->
							<!--		</div>-->
							<!--	</div>-->
							<!--</div>-->
							
							<div class="col-lg-6  mb-3 form-group">
    							<?php  echo $captcha_img['image'];?>
    						</div>
    						<div class="col-lg-6  mb-3 form-group">
    							<input type="text" class="form-control input display-7" name="captcha" id="captcha"  placeholder="Enter Beside security Code" required="required"/>
    						</div>
						
							<div class="col-lg-12 col-md-12">
								<button name="submit" type="submit" value="Submit" class="site-button button-md">
									<span>Apply Now</span> </button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- Contact Form END -->
</div>
<!-- Content END-->

<?php
//$data['page'] = 'about';
//$data['contact_detail'] = $contact_detail;
//$this->load->view('footer_view', $data);
$this->load->view('footer_view');