<?php $data['contact_detail'] = $contact_detail;$this->load->view('header_view');
echo $about_us->cms_desc;
?>
	
		<!--<section class="features16 cid-rlUYnRnRDt" id="features16-18">
			<div class="container">
				<div class="row main align-items-center">
					<div class="col-md-6 image-element ">
						<div class="img-wrap">
							<img src="assets/images/01.jpg" alt="" title="">
						</div>
					</div>
					<div class="col-md-6 text-element">
						<div class="text-content">
							<h2 class="mbr-title pt-2 mbr-fonts-style align-left display-2"><strong>
								Tell About Your Product
								</strong>
							</h2>
							<div class="mbr-section-text">
								<p class="mbr-text pt-3 mbr-light mbr-fonts-style align-left display-7">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, maxime. Minus, mollitia dolorem corrupti expedita. Consectetur doloremque mior sit amet
								</p>
							</div>
							<div class="mbr-section-btn pt-3 align-left"><a class="btn btn-md btn-info display-4" href="products.html">View Products</a></div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="info1 cid-rlUYsbDKQA" id="info1-19">
			<div class="container align-center">
				<div class="row justify-content-md-center">
					<div class="mbr-white col-md-10">
						<h1 class="mbr-section-title align-center pb-3 mbr-fonts-style mbr-black display-2">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta quo quae eaque dolore ad eos recusandae veniam error alias rerum vitae quidem.
						</h1>
						<div class="mbr-media show-modal align-center py-2" data-modal=".modalWindow">
							<div class="btn-play">
								<span class="play"></span> 
							</div>
						</div>
					</div>
				</div>
			</div>
			<div>
				<div class="modalWindow" style="display: none;">
					<div class="modalWindow-container">
						<div class="modalWindow-video-container">
							<div class="modalWindow-video">
								<iframe width="100%" height="100%" frameborder="0" allowfullscreen="1" data-src="https://www.youtube.com/watch?v=36YgDDJ7XSc"></iframe>
							</div>
							<a class="close" role="button" data-dismiss="modal">
							<span aria-hidden="true" class="mbri-close mbr-iconfont closeModal"></span>
							<span class="sr-only">Close</span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="mbr-section article content12 cid-rl3Pl1jTZU" id="content12-15">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-4">
						<h3 class="mbr-fonts-style mbr-title mbr-bold pb-2 display-2"><strong>What We Do</strong></h3>
						<div class="mbr-text mbr-fonts-style display-7">
							Make your own website in a few clicks! Mobirise helps you cut down development time by providing you with a flexible website editor with a drag and drop interface.
						</div>
					</div>
					<div class="col-md-4">
						<h3 class="mbr-fonts-style mbr-title mbr-bold pb-2 display-2"><strong>Our Approach</strong></h3>
						<div class="mbr-text mbr-fonts-style display-7">
							Make your own website in a few clicks! Mobirise helps you cut down development time by providing you with a flexible website editor with a drag and drop interface.
						</div>
					</div>
					<div class="col-md-4">
						<h3 class="mbr-fonts-style mbr-title pb-2 display-2"><strong>Our Mission</strong></h3>
						<div class="mbr-text mbr-fonts-style display-7">
							Make your own website in a few clicks! Mobirise helps you cut down development time by providing you with a flexible website editor with a drag and drop interface.
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="mbr-section article content1 cid-rlV0PL5OZF" id="content1-1d">
			<div class="container">
				<div class="media-container-row">
					<div class="col-md-12">
						<p class="mbr-text m-0 mbr-fonts-style mbr-black display-7">Incepted in the year 2007, we, Parth Fibrotech, are a trustworthy organization engaged in manufacturing broad gamut of Outdoor Multi Play Station, Playground Slides, Playground Equipments, Security Cabins and much more. All our offered collection of these products are designed and fabricated by a team of dexterous professionals by following the industry accepted norms and standards. The experts of our organization make use of modern technologies and production methods to design the offered range of playground equipment. Moreover, to ensure the flawlessness of provided products, these are inspected on various quality parameters by our quality analyzers. We also provide Playground Equipment Fabrication Work.
							<br>
							<br>Being a customer-focused organization of this domain, we strive work towards attaining in an maximum contentment of the esteemed patrons in the efficient manner. Our dedicated professionalâ€™s works in a close relationship with our valued clients to cater their exact requirements and offer products in accordance to their choice. Further, we have installed upgraded machines and equipment in our infrastructure unit that enables us in catering the varied demands of our valued clients with utmost ease. Owing to our transparent business policies, ethical trade practices and sprawling infrastructure facilities, we have been able to obtain the trust of a huge number of patrons across the nation.
							<br>
							<br>Under the valuable guidance of our mentor, Mr. Vijay Bobde, we deserve to achieve a commendable position in this domain. His constant motivation, in-depth knowledge, business understanding, brilliant managerial skills and zeal towards achieving all the predefined business tasks in an effective manner have helped us to reach such pinnacle of success in short period of time.<br>
						</p>
					</div>
				</div>
			</div>
		</section> -->
		<section class="teams1 cid-rlUZBIn0qo" id="teams1-1b">
			<div class="container">
				<h2 class="mbr-section-title mbr-fonts-style align-left mbr-black display-2"><strong>
					Expert Team</strong>
				</h2>
				
				<div class="row justify-content-center flip-card pt-4">
				<?php
				if(!empty($team))
				{
					foreach($team as $teams)
					{
						$teams_name = stripslashes($teams['team_title']);
						$team_designation = stripslashes($teams['team_designation']);
						$team_profile = stripslashes($teams['team_profile']);
						if($teams['team_logo'] != '')
						{ 
							$blogs_image = base_url().'upload/je/'.stripslashes($teams['team_logo']);
						}
						else
						{
							$blogs_image = base_url().'assets/site/images/face5.jpg';
						}
				?>
					<div class="col-md-6 col-lg-3 card-wrap">
						<div class="image-wrap">
							<img src="<?php echo $blogs_image; ?>" alt="">
							<div class="social-media align-center">
								<ul>
									<li>
										<a class="icon-transition" href="https://www.facebook.com/Parth-Fibrotech-794481114272400/">
										<span class="mbr-iconfont mbr-black socicon-facebook socicon"></span>
										</a>
									</li>
									<li>
										<a class="icon-transition" href="https://twitter.com/parthfibrotech">
										<span class="mbr-iconfont mbr-black socicon-twitter socicon"></span>
										</a>
									</li>
									<li>
										<a class="icon-transition" href="https://www.instagram.com/parthfibrotechngp/">
										<span class="mbr-iconfont mbr-black socicon-instagram socicon"></span>
										</a>
									</li>
									<!--<li>-->
									<!--	<a class="icon-transition" href="https://www.youtube.com/">-->
									<!--	<span class="mbr-iconfont mbr-black socicon-youtube socicon"></span>-->
									<!--	</a>-->
									<!--</li>-->
								</ul>
							</div>
							<div class="img-overlay"></div>
						</div>
						<h4 class="mbr-fonts-style mbr-name align-left pt-4 mbr-bold display-5">
							<?php echo $teams_name; ?>
						</h4>
						<h5 class="mbr-fonts-style mbr-role align-left pt-2 display-4"><?php echo $team_designation; ?></h5>
						<p class="mbr-fonts-style mbr-text align-left pt-1 display-7">
							<?php echo $team_profile; ?>
						</p>
					</div>
				<?php } } ?>
				</div>
			</div>
		</section>
		<section class="info7 cid-rlUZuqTjQr" id="info7-1a">
			<div class="mbr-overlay" style="opacity: 0.2; background-color: rgb(0, 0, 0);">
			</div>
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-12 col-md-12 align-center">
						<h2 class="mbr-section-title align-left mbr-fonts-style mbr-bold mbr-white display-2">We manufacture Quality Outdoor Multi Play Station, <br>Playground Slides, Play Equipments, Security Cabins</h2>
					</div>
				</div>
			</div>
		</section>
		<section class="mbr-section info5 cid-rlV2Ezghlk" id="info5-1e">
			<div class="container">
				<div class="row justify-content-center content-row">
					<div class="media-container-column title col-12 col-lg-7 col-md-6">
						<!--<h3 class="mbr-section-subtitle align-left mbr-light pb-3 mbr-fonts-style display-5">
							Hurry up! The offer is limited
						</h3>-->
						<h2 class="align-left mbr-bold mbr-fonts-style mbr-white mbr-section-title display-2">
							Let us know you requirements!
						</h2>
					</div>
					<div class="media-container-column col-12 col-lg-3 col-md-4">
						<div class="mbr-section-btn align-right py-4"><a class="btn btn-white display-4" href="<?php echo base_url('contact-us'); ?>" >Enquire Now</a></div>
					</div>
				</div>
			</div>
		</section>
		<?php 
$data['page'] = 'about';
$data['contact_detail'] = $contact_detail;
$this->load->view('footer_view');
        