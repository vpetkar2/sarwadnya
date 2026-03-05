<?php $data['contact_detail'] = $contact_detail;
$this->load->view('header_view', $data); ?>
<!-- Content -->
<div class="page-content bg-white">
	<!-- Contact Form -->
	<div class="section-full content-inner contact-page-9 overlay-black-dark"
		style="background-image: url(<?php echo base_url("assets/newsite/images/background/bg5.jpg"); ?>); background-position: 30% 100%">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-12 text-white">
					<div class="row">
						<div class="col-lg-12 col-md-12 m-b30">
							<div class="icon-bx-wraper bx-style-1 p-a20 radius-sm">
								<div class="icon-content">
									<h5 class="dlab-tilte">
										<span class="icon-sm text-primary"><i class="ti-location-pin"></i></span>
										Company Address
									</h5>
									<p>
										<b>Sarwadnya Sports And Fitness Private Limited</b><br>
										Rajat Hill, Beside Lime Research Institute, Amaravati Road, Nagpur -
										440033, Maharashtra, India
									</p>
									<h6 class="m-b15 text-black font-weight-400"><i class="ti-alarm-clock"></i> Office
										Hours</h6>
									<p class="m-b0">Mon To Sat - 10.00 - 18.00</p>
									<p>Sunday - Close</p>
								</div>
							</div>
						</div>
						<div class="col-lg-12 col-md-6 m-b30">
							<div class="icon-bx-wraper bx-style-1 p-a20 radius-sm">
								<div class="icon-content">
									<h5 class="dlab-tilte">
										<span class="icon-sm text-primary"><i class="ti-email"></i></span>
										E-mail
									</h5>
									<p class="m-b0">info@sarwadnyaplay.com</p>
									<p class="m-b0">sarwadnya.sportnfitness@gmail.com</p>
								</div>
							</div>
						</div>
						<div class="col-lg-12 col-md-6 m-b30">
							<div class="icon-bx-wraper bx-style-1 p-a20 radius-sm">
								<div class="icon-content">
									<h5 class="dlab-tilte">
										<span class="icon-sm text-primary"><i class="ti-mobile"></i></span>
										Phone Numbers
									</h5>
									<p class="m-b0">+91-9823232019</p>
									<p class="m-b0">+91-7875190909</p>
									<p class="m-b0">+91-8432730909</p>
									<!-- <p class="m-b0">+00 1234 5678 90</p> -->
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-8 col-md-12 m-b30">
					<form class="inquiry-form wow box-shadow bg-white fadeInUp" data-wow-delay="0.2s"
						action="<?php echo base_url() . "home/submitContact"; ?>" method="post" accept-charset="utf-8"
						enctype="multipart/form-data">
						<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
							value="<?php echo $this->security->get_csrf_hash(); ?>" />


						<!-- <form class="inquiry-form wow box-shadow bg-white fadeInUp" data-wow-delay="0.2s"> -->
						<input type="hidden" name="email" data-form-email="true"
							value="bYDTO6AeOHmd+izPBZBxSlhGJJ32e4Frqe3tPqqfnT8u9EcFzXAzgy/4IiH2VhwLrpDwOevF1GdteEAYQbPlc+S/ocJprm23D7DkBXXz35B1Cekb6TosrQ8UjpMG6X8A">
						<h3 class="title-box font-weight-300 m-t0 m-b10">Let’s Convert Your Idea into Reality<span
								class="bg-primary"></span></h3>
						<p>Contact Sarwadnya Sports and Fitness Pvt. Ltd. for playground equipment, outdoor gym
							solutions, and science park products. As an ISO 9001:2015 certified manufacturer, we provide
							quality, durable, and safe equipment.</p>
						<div class="row">
							<div class="col-lg-12 col-md-12">
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
							</div>
							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><i class="ti-user text-primary"></i></span>
										<input name="fname" type="text" required class="form-control"
											placeholder="First Name">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon"><i class="ti-user text-primary"></i></span>
									<input name="lname" type="text" required class="form-control"
										placeholder="Last Name">
								</div>
							</div>
							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><i class="ti-mobile text-primary"></i></span>
										<input name="mobile" type="text" required class="form-control"
											placeholder="Phone">
									</div>
								</div>
							</div>
							<div class="col-lg-12 col-md-12">
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><i class="ti-email text-primary"></i></span>
										<input name="email" type="email" class="form-control" required
											placeholder="Your Email Id">
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
							<div class="col-lg-12 col-md-12">
								<div class="form-group">
									<div class="col-lg-6  mb-3">
										<br>
										<?php echo $captcha_img['image']; ?>
									</div>
									<div data-for="phone" class="col-lg-6  mb-3 form-group">
										<input type="text" class="form-control input display-7" name="captcha"
											id="captcha" placeholder="Enter Beside security Code" required="required" />
									</div>
								</div>
							</div>
							<div class="col-lg-12 col-md-12">
								<button name="submit" type="submit" value="Submit" class="site-button button-md">
									<span>Send Message</span> </button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<iframe
						src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2903.3037773721626!2d79.11344559999999!3d21.095300999999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bd4bf27e5f40ed7%3A0x71295eb80547489e!2sSarwadnya%20Sports%20and%20Fitness%20Pvt%20Ltd!5e1!3m2!1sen!2sin!4v1771864307397!5m2!1sen!2sin"
						width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
						referrerpolicy="no-referrer-when-downgrade">
					</iframe>
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
$this->load->view('footer_view');