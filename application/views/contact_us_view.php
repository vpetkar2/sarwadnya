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
									<p>007 Dummy Ashoka Apartment, Gautam Marg, Rani Sati Nagar,Jaipur / India </p>
									<h6 class="m-b15 text-black font-weight-400"><i class="ti-alarm-clock"></i> Office
										Hours</h6>
									<p class="m-b0">Mon To Sat - 10.00 - 07.00</p>
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
									<p class="m-b0">info@example.com</p>
									<p class="m-b0">hr@example.com</p>
									<p class="m-b0">support@example.com</p>
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
									<p class="m-b0">+00 234 678 9012</p>
									<p class="m-b0">+00 1234 5678 90</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-8 col-md-12 m-b30">
					<form class="inquiry-form wow box-shadow bg-white fadeInUp" data-wow-delay="0.2s">
						<h3 class="title-box font-weight-300 m-t0 m-b10">Let's Convert Your Idea into Reality <span
								class="bg-primary"></span></h3>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
							been the industry's standard dummy text ever since the</p>
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
									<span>Get A Free Quote!</span> </button>
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
$this->load->view('footer_view');