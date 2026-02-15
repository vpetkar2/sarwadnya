<section class="footer4 cid-rkYy1MeThE mbr-reveal" id="footer3-17">
			<div class="container">
				<div class="row content mbr-white justify-content-center">
					<div class="col-md-6 col-lg-6">
						<h2 class="mbr-section-title align-left mbr-fonts-style display-2">
							<b style="font-size: 25px;">Nagpur Head Office</b></h2> 	
						<p class="mbr-footer-list">Office No. 8, 9, 10, Rajat Arcade Amravati Road,<br>
						 Nagpur - 440023, Maharashtra, India</p>
						 <p class="mbr-footer-list">Mobile : 7875290909, 7507280222<br>
						 Email : parth.fibrotech@gmail.com</p>					
					</div>
					<div class="col-md-6 col-lg-6">
						<h2 class="mbr-section-title align-left mbr-fonts-style display-2">
							<b style="font-size: 25px;">Mumbai Branch Office</b> </h2>
						<p class="mbr-footer-list">C-208, Shreedham Splendor, Opp Patliputra, 
							<br>
						 Anand Nagar, New Link Rd, Oshiwara, Jogeshwari West,<br> Mumbai, Maharashtra 400102</p>
						 <p class="mbr-footer-list">Mobile : 9923521510</br>
						    Email : parth.fibrotech@gmail.com</p>
					</div>
				</div>
				<br>
				<div class="row content mbr-white justify-content-center">
					<div class="col-md-6 col-lg-4">
						<h3 class="mb-4 mbr-fonts-style footer-title display-5">
							<b style="font-size:20px;">Parth Fibrotech</b>
						</h3>
						<div class="mbr-footer-list mbr-fonts-style display-4" style="display: none;">
							<ul class="list" >
								<li>Mobile: <?php echo $contact_detail->conus_mobile;?></li>
								<li>Phone: <?php echo $contact_detail->conus_phone;?></li>
								<li>Email: <?php echo $contact_detail->conus_email;?></li>
								<li>Address:<br><?php echo $contact_detail->conus_address;?></li>
							</ul>
						</div>
						<div class="social-list pl-0 mb-0">
							<div class="soc-item">
								<a href="<?php echo $social->tw_social ;?>" target="_blank">
								<span class="socicon-twitter socicon mbr-iconfont mbr-iconfont-social"></span>
								</a>
							</div>
							<div class="soc-item">
								<a href="<?php echo $social->fb_social ;?>" target="_blank">
								<span class="socicon-facebook socicon mbr-iconfont mbr-iconfont-social"></span>
								</a>
							</div>
							<div class="soc-item">
								<a href="<?php echo $social->ln_social ;?>" target="_blank">
								<span class="socicon-linkedin socicon mbr-iconfont mbr-iconfont-social"></span>
								</a>
							</div>
							<div class="soc-item">
								<a href="<?php echo $social->yt_social ;?>" target="_blank">
								<span class="socicon-youtube socicon mbr-iconfont mbr-iconfont-social"></span>
								</a>
							</div>
							<div class="soc-item">
								<a href="<?php echo $social->Ins_social ;?>" target="_blank">
								<span class="socicon-instagram socicon mbr-iconfont mbr-iconfont-social"></span>
								</a>
							</div>
							<div class="soc-item">
								<a href="<?php echo $social->pin_social ;?>" target="_blank">
								<span class="socicon-pinterest socicon mbr-iconfont mbr-iconfont-social"></span>
								</a>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-4">
						<h3 class="mb-4 footer-title mbr-fonts-style display-5">
							<b style="font-size:20px;">Links</b>
						</h3>
						<div class="mbr-footer-list mbr-fonts-style display-4">
							<ul class="list">
								<li><a href="<?php echo base_url(''); ?>">Home</a></li>
								<li><a href="<?php echo base_url('products/'); ?>">Products</a></li>
								<li><a href="<?php echo base_url('about-us'); ?>">About Us</a></li>
								<li><a href="<?php echo base_url('blog'); ?>">Blog</a></li>
								<li><a href="<?php echo base_url('contact-us'); ?>" >Get In Touch</a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-6 col-lg-4">
						<h3 class="mb-4 footer-title mbr-fonts-style display-5">
							<b style="font-size:20px;">Product Category</b>
						</h3>
						<div class="mbr-footer-list mbr-fonts-style display-4">
							<ul class="list">
								<?php
								$cityname = '';
    				            $cities = $this->site_cms_model->allcity();
    				            foreach($cities as $city) {
    				                if ($this->session->userdata('cityId') == $city['id']) {
    				                    $cityname = $city['name'];
    				                }
    				            }
								foreach($footer_cat as $footercat)
								{ ?>
									<li><a href='<?php echo base_url(strtolower($cityname).'/'.$footercat['slug']); ?>'><?php echo stripslashes($footercat['cat_title']); ?></a></li>
								<?php } ?>
								
							</ul>
						</div>
					</div>
					
					<div class="col-md-12 col-lg-12">
					    <marquee>
						<h3>
							<?php
								foreach($categories as $category)
								{ ?>
								    <b><?php echo stripslashes($category['cat_title']); ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
								<?php
								}
							?>
						</h3>
						</marquee>
					</div>
				</div>
			</div>
		</section>
		<!--<marquee>TEst marquee</marquee>-->
		<script type="text/javascript" src="<?php echo base_url("assets/site/web/assets/jquery/jquery.min.js"); ?>" ></script>
		<script type="text/javascript" src="<?php echo base_url("assets/site/popper/popper.min.js"); ?>" ></script>
		<script type="text/javascript" src="<?php echo base_url("assets/site/bootstrap/js/bootstrap.min.js"); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url("assets/site/smoothscroll/smooth-scroll.js"); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url("assets/site/dropdown/js/script.min.js"); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url("assets/site/touchswipe/jquery.touch-swipe.min.js"); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url("assets/site/viewportchecker/jquery.viewportchecker.js"); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url("assets/site/playervimeo/vimeo_player.js"); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url("assets/site/parallax/jarallax.min.js");?>"></script>
		<script type="text/javascript" src="<?php echo base_url("assets/site/masonry/masonry.pkgd.min.js");?>"></script>
		<script type="text/javascript" src="<?php echo base_url("assets/site/imagesloaded/imagesloaded.pkgd.min.js"); ?> "></script>
		<script type="text/javascript" src="<?php echo base_url("assets/site/bootstrapcarouselswipe/bootstrap-carousel-swipe.js"); ?>" ></script>
		<script type="text/javascript" src="<?php echo base_url("assets/site/mbr-testimonials-slider/mbr-testimonials-slider.js"); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url("assets/site/ytplayer/jquery.mb.ytplayer.min.js"); ?>" ></script>
		<script type="text/javascript" src="<?php echo base_url("assets/site/vimeoplayer/jquery.mb.vimeo_player.js"); ?>" ></script>
		
		
		<script src="<?php// echo base_url('assets/site/web/assets/jquery/jquery.min.js'); ?>"></script>
		<script src="<?php // echo base_url('assets/site/popper/popper.min.js'); ?>"></script>
		<script src="<?php // echo base_url('assets/site/bootstrap/js/bootstrap.min.js'); ?>"></script>
		<script src="<?php // echo base_url('assets/site/smoothscroll/smooth-scroll.js'); ?>"></script>
		<script src="<?php // echo base_url('assets/site/dropdown/js/script.min.js'); ?>"></script>
		<script src="<?php // echo base_url('assets/site/touchswipe/jquery.touch-swipe.min.js'); ?>"></script>
		<script src="<?php // echo base_url('assets/site/viewportchecker/jquery.viewportchecker.js'); ?>"></script>
		<script src="<?php // echo base_url('assets/site/playervimeo/vimeo_player.js'); ?>"></script>
		<script src="<?php // echo base_url('assets/site/parallax/jarallax.min.js'); ?>"></script>
		<script src="<?php // echo base_url('assets/site/masonry/masonry.pkgd.min.js'); ?>"></script>
		<script src="<?php // echo base_url('assets/site/imagesloaded/imagesloaded.pkgd.min.js'); ?>"></script>
		<script src="<?php // echo base_url('assets/site/bootstrapcarouselswipe/bootstrap-carousel-swipe.js'); ?>"></script>
		<script src="<?php // echo base_url('assets/site/mbr-testimonials-slider/mbr-testimonials-slider.js'); ?>"></script>
		<script src="<?php // echo base_url('assets/site/ytplayer/jquery.mb.ytplayer.min.js'); ?>"></script>
		<script src="<?php // echo base_url('assets/site/vimeoplayer/jquery.mb.vimeo_player.js'); ?>"></script>
		
		
		<!-- --------------------About Us -------------------- -->
		<script type="text/javascript" src="<?php echo base_url("assets/mbr-flip-card/mbr-flip-card.js");?>"></script>
		<script src="<?php // echo base_url('assets/mbr-flip-card/mbr-flip-card.js'); ?>"></script>
		<!-- -------------------- About Us-------------------- -->
		
		<script src="<?php // echo base_url('assets/site/theme/js/script.js'); ?>"></script>
		<script src="<?php // echo base_url('assets/site/theme/js/custom.js'); ?>"></script>
		<script src="<?php // echo base_url('assets/site/gallery/player.min.js'); ?>"></script>
		<script src="<?php // echo base_url('assets/site/gallery/script.js'); ?>"></script>
		
		<script type="text/javascript" src="<?php echo base_url("assets/site/theme/js/script.js"); ?>" ></script>
		<script type="text/javascript" src="<?php echo base_url("assets/site/theme/js/custom.js"); ?>" ></script>
		<script type="text/javascript" src="<?php echo base_url("assets/site/gallery/player.mn.js"); ?>" ></script>
		<script type="text/javascript" src="<?php echo base_url("assets/site/gallery/script.js"); ?>" ></script>
		
		<!-- --------------------Product -------------------- -->
		<script src="<?php // echo base_url('assets/site/slidervideo/script.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url("assets/site/slidervideo/script.js"); ?>" ></script>

		<!-- -------------------- Product-------------------- -->
		
		<script src="<?php // echo base_url('assets/site/formoid/formoid.min.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url("assets/site/formoid/formoid.min.js"); ?>"></script>
	   <!-- Go to www.addthis.com/dashboard to customize your tools side icon bar -->
        <!--<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5cd1377dc9bd7898"></script>-->



	</body>
</html>