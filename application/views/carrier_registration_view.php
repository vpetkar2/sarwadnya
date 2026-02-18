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
					<form class="inquiry-form wow bg-white fadeInUp" data-wow-delay="0.2s">
						<h3 class="title-box font-weight-300 m-t0 m-b10">Career Form <span class="bg-primary"></span>
						</h3>
						<br />
						<!-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the</p> -->
						<div class="row">
							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><i class="ti-user text-primary"></i></span>
										<input name="dzName" type="text" required class="form-control"
											placeholder="First Name">
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><i class="ti-mobile text-primary"></i></span>
										<input name="dzOther[Phone]" type="text" required class="form-control"
											placeholder="Phone">
									</div>
								</div>
							</div>
							<div class="col-lg-12 col-md-12">
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><i class="ti-email text-primary"></i></span>
										<input name="dzEmail" type="email" class="form-control" required
											placeholder="Your Email Id">
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><i class="ti-check-box text-primary"></i></span>
										<select>
											<option>Select Industry</option>
											<option>Oil/Gas Plant</option>
											<option>Steel Plant</option>
											<option>Factory</option>
											<option>Construct</option>
											<option>Solar Plant</option>
											<option>Food Industry</option>
											<option>Agriculture</option>
											<option>Ship Industry</option>
											<option>Leather Industry</option>
											<option>Nuclear Plant</option>
											<option>Beer Factory</option>
											<option>Mining Industry</option>
											<option>Car Industry</option>
											<option>Plastic Industry</option>
										</select>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><i class="ti-file text-primary"></i></span>
										<input name="dzOther[Subject]" type="text" required class="form-control"
											placeholder="Upload File">
									</div>
								</div>
							</div>
							<div class="col-lg-12 col-md-12">
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><i class="ti-agenda text-primary"></i></span>
										<textarea name="dzMessage" rows="4" class="form-control" required
											placeholder="Tell us about your project or idea"></textarea>
									</div>
								</div>
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