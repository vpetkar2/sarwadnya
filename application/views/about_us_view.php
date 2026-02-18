<?php $data['contact_detail'] = $contact_detail;
$this->load->view('header_view');
?>


<!-- Content -->
<div class="page-content bg-white">
	<!-- inner page banner -->
	<div class="dlab-bnr-inr overlay-black-middle text-center bg-pt"
		style="background-image:url(<?php echo base_url("assets/newsite/images/background/bg5.jpg"); ?>);">
		<div class="container">
			<div class="dlab-bnr-inr-entry align-m text-center">
				<h1 class="text-white">About Us </h1>
			</div>
		</div>
	</div>
	<!-- inner page banner END -->
	<!-- contact area -->
	<div class="content-block">
		<!-- About Services info -->
		<div class="section-full content-inner bg-white video-section"
			style="background-image:url('images/background/bg-video.png');">
			<div class="container">
				<div class="section-content">
					<div class="row d-flex">
						<div class="col-lg-6 col-md-12 m-b30">
							<div class="video-bx">
								<div class="video-play-icon">
									<a href="https://www.youtube.com/watch?v=_FRZVScwggM"
										class="popup-youtube video bg-primary"><i class="fa fa-play"></i></a>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-12 m-b30 align-self-center video-infobx">
							<div class="content-bx1">
								<h2 class="m-b15 title">Sarwadnya Sports & Fitness
									<br><span class="text-primary"> Committed to Quality Manufacturing</span>
								</h2>
								<p class="m-b30">Established in 2018, Sarwadnya Sports & Fitness Private Limited is a
									leading manufacturer of high-quality playground equipment, outdoor gym machines, and
									fitness solutions. We specialize in designing and producing durable, safe, and
									performance-oriented products using premium raw materials and modern manufacturing
									technology. Our wide product range is known for weather resistance, strong
									construction, long service life, and attractive design, making it ideal for parks,
									schools, societies, and public spaces.

									With a strong commitment to quality and innovation, we provide customized solutions
									to meet specific client requirements. Under the leadership of our mentor Mr. Sanjay
									Bobde, our company continues to grow by delivering reliable products and maintaining
									long-term relationships with customers through trust, service, and excellence.</p>
								<img src="images/sign.png" width="200" alt="" />
								<h4 class="m-b0">Pradnya Sanjay Bobde</h4>
								<span class="font-14">Managing Director</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- About Services info END -->
		<!-- Counter -->
		<div class="section-full content-inner overlay-black-dark bg-img-fix"
			style="background-image:url(<?php echo base_url("assets/newsite/images/background/bg1.jpg"); ?>);">
			<div class="container">
				<div class="section-content text-white">
					<div class="row d-flex">
						<div class="col-lg-6 col-md-12  align-self-center video-infobx">
							<div class="content-bx1">
								<h2 class="m-b15 title">Why Choose Us</h2>
								<p class="m-b30">We are committed to delivering superior products with consistent
									quality and dependable service. Our strengths include:</p>
							</div>
						</div>
						<div class="col-lg-6 col-md-12 m-b30">
							<ul>
								<li>High-quality and durable product range</li>
								<li>Customer-focused approach</li>
								<li>Competitive pricing</li>
								<li>Wide distribution network across India</li>
								<li>Modern manufacturing facility</li>
								<li>Experienced and skilled professional team</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Counter END -->
		<!-- About Infrastructure -->
		<div class="section-full content-inner bg-white video-section"
			style="background-image:url('images/background/bg-video.png');">
			<div class="container">
				<div class="section-content">
					<div class="row d-flex">
						<div class="col-lg-6 col-md-12  align-self-center video-infobx">
							<div class="content-bx1">
								<h2 class="m-b15 title">Our Infrastructure</h2>
								<p class="m-b30">We have a well-equipped manufacturing unit with modern machinery and
									tools that enable us to produce high-quality products efficiently. Our
									infrastructure supports design, production, quality testing, and packaging, ensuring
									every product meets industry standards and customer expectations.</p>
							</div>
						</div>
						<div class="col-lg-6 col-md-12 m-b30">
							<div class="video-bx">
								<div class="video-play-icon">
									<a href="https://www.youtube.com/watch?v=_FRZVScwggM"
										class="popup-youtube video bg-primary"><i class="fa fa-play"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Infrastructure END -->
		<!-- Team -->
		<div class="section-full content-inner overlay-black-dark bg-img-fix"
			style="background-image:url(<?php echo base_url("assets/newsite/images/background/bg1.jpg"); ?>);">
			<div class="container">
				<div class="section-content text-white">
					<div class="row d-flex">
						<div class="col-lg-6 col-md-12  align-self-center video-infobx">
							<div class="content-bx1">
								<h2 class="m-b15 title">Our Team</h2>
								<p class="m-b30">Our success is driven by a dedicated and skilled team of professionals
									committed to excellence and innovation.
								</p>
							</div>
						</div>
						<div class="col-lg-6 col-md-12 m-b30">
							<ul>
								<li>Experienced and knowledgeable professionals</li>
								<li>Strong focus on quality and precision</li>
								<li>Customer-oriented working approach</li>
								<li>Continuous learning and innovation</li>
								<li>Efficient teamwork and coordination</li>
								<li>Commitment to timely project delivery</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Team END -->
	</div>
	<!-- contact area END -->
</div>
<!-- Content END -->
<?php
$data['page'] = 'about';
$data['contact_detail'] = $contact_detail;
$this->load->view('footer_view');