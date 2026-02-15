<?php 
//$data['title'] = 'Homepage test';
$this->load->view('header_view');
?>
<section class="header4 cid-rkYzVEqdQp mbr-fullscreen mbr-parallax-background" id="header4-g">
			<div class="mbr-overlay" style="opacity: 0.2; background-color: rgb(0, 0, 0);">
			</div>
			<div class="container">
				<div class="row  align-items-center">
					<div class="col-md-12">
						<h3 class="mbr-fonts-style mbr-section-subtitle mbr-bold align-left display-2"><span style="font-weight: normal;">Explore High Quality Products </span></h3>
						<h1 class="mbr-section-title align-left py-2 mbr-bold mbr-fonts-style display-1">Outdoor Multi Play Station, <br>Play Slides &amp; Equipments <br>and Security Cabins</h1>
						<div class="mbr-media show-modal align-center py-2">
							<div class="btn-play" data-modal=".modalWindow">
								<span class="play"></span> 
							</div>
							<div class="mbr-section-btn align-left"><a class="btn btn-lg btn-primary display-4" href="<?php echo base_url('products/'); ?>">Explore Products</a></div>
						</div>
					</div>
				</div>
			</div>
			<div>
				<div class="modalWindow">
					<div class="modalWindow-container">
						<div class="modalWindow-video-container">
							<div class="modalWindow-video">
							    <?php echo html_entity_decode(stripslashes($video[0]['media_url'])); ?>
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
		<section class="cid-rkYLgstBWU" id="info3-x">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-12 col-md-12 align-center">
						<h2 class="mbr-section-title align-center mbr-fonts-style mbr-bold display-2">We build International Quality Play &amp; Outdoor Products</h2>
					</div>
				</div>
			</div>
		</section>
		
		
		<?php echo $home_content->cms_desc; ?>
		
		<section class="mbr-gallery mbr-slider-carousel cid-rkYz8IfZc3" id="gallery2-e">
			<div class="container">
				<h2 class="align-center mbr-fonts-style mbr-section-title display-2">
					Meet Our New Products
				</h2>
			</div>
			<div>
				<div class="col-left-gallery">
					<!-- Filter -->
					<div class="mbr-gallery-filter container gallery-filter-active">
						<ul buttons="0">
							<li class="mbr-gallery-filter-all"><a class="btn btn-md btn-primary-outline active display-7" href="">All</a></li>

						</ul>
					</div>
					<!-- Gallery -->
					<div class="mbr-gallery-row">
						<div class="mbr-gallery-layout-default">
							<div>
								<div>
								<?php
                                    // print_r($new_category);
									$j =0;
									foreach($new_category as $newcategory)
									{

										$prod = $this->site_cms_model->get_records_array_home("product", array('prod_cat_id' => $newcategory['cat_id'], 'prod_city_id' => $newcategory['city_id']), "prod_id", "DESC", '2', '2');
										foreach($prod as $product)
										{
											$albums = $this->site_cms_model->get_record_by_id("product_image", array('prod_id' => $product['prod_id']), "img_id", "DESC", '1', '');
											if(!empty($albums))
                    						{
                    						    $img_prod = base_url().'upload/je/'.stripslashes($albums->prod_image);
                    						    $citydata = $this->site_cms_model->get_record_by_id("city", array('id' => $product['prod_city_id']), "id", "DESC", '1', '');
									?>
										<!--<div class="mbr-gallery-item mbr-gallery-item--p2" data-video-url="false" data-tags="<?php echo $newcategory['cat_title']; ?>">
											<div href="#lb-gallery2-e" data-slide-to="<?php echo $j; ?>" data-toggle="modal">
											    <img src="<?php echo $img_prod; ?>" alt="" title="">
											    <span class="icon-focus"></span><span class="mbr-gallery-title mbr-fonts-style display-7"><?php echo $product['prod_title']; ?></span></div>
										</div>-->
										
										<a href="<?php echo strtolower($citydata->name)."/".$product['prod_url']; ?>">
										<div class="mbr-gallery-item mbr-gallery-item--p2" data-video-url="false" data-tags="<?php echo $newcategory['cat_title']; ?>">
											<div href="" data-slide-to="<?php echo $j; ?>" data-toggle="modal">
											    <img src="<?php echo $img_prod; ?>" alt="" title="">
											    <span class="icon-focus"></span><span class="mbr-gallery-title mbr-fonts-style display-7"><?php echo $product['prod_title']; ?></span></div>
										</div>
										</a>
									<?php $j++; } } 
									}?>
									
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
					<!-- Lightbox -->
					<div data-app-prevent-settings="" class="mbr-slider modal fade carousel slide" tabindex="-1" data-keyboard="true" data-interval="false" id="lb-gallery2-e">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-body">
									<div class="carousel-inner">
									<?php
									$i =1;
									foreach($new_category as $newcategorys)
									{
										
										$prods = $this->site_cms_model->get_records_array_home("product", array('prod_cat_id' => $newcategorys['cat_id']), "prod_id", "DESC", '2', '2');
										
										foreach($prods as $products)
										{
											
											$albumss = $this->site_cms_model->get_record_by_id("product_image", array('prod_id' => $products['prod_id']), "img_id", "DESC", '1', '');
											if(!empty($albumss))
                    						{
                    						    $img_prods = base_url().'upload/je/'.stripslashes($albumss->prod_image);
									?>
										<div class="carousel-item<?php if($i == '1' ) { ?>  active<?php } ?>"><img src="<?php echo $img_prods; ?>" alt="" title=""></div>
									<?php $i++;} } } ?>
									</div>
									<a class="carousel-control carousel-control-prev" role="button" data-slide="prev" href="#lb-gallery2-e"><span class="mbri-left mbr-iconfont" aria-hidden="true"></span><span class="sr-only">Previous</span></a><a class="carousel-control carousel-control-next" role="button" data-slide="next" href="#lb-gallery2-e"><span class="mbri-right mbr-iconfont" aria-hidden="true"></span><span class="sr-only">Next</span></a><a class="close" href="#" role="button" data-dismiss="modal"><span class="sr-only">Close</span></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="carousel slide testimonials-slider cid-rkYxOPsnbh" data-interval="false" id="testimonials-slider2-9" data-bg-video="https://www.youtube.com/watch?v=36YgDDJ7XSc">
			<div class="mbr-overlay" style="opacity: 0.7; background-color: rgb(35, 35, 35);">
			</div>
			<div class="container text-center">
				<h3 class="mbr-section-subtitle mbr-fonts-style align-left display-5">Testimonials</h3>
				<h2 class="mbr-fonts-style mbr-section-title align-left mbr-white display-2">
					Our Clients Say!
				</h2>
				<div class="carousel slide pt-4" role="listbox" data-pause="true" data-keyboard="false" data-ride="carousel" data-interval="5000">
					<div class="carousel-inner">
						<div class="carousel-item">
							<div class="row justify-content-center">
							<?php
							if(!empty($testimonials))
							{
								$i =0;
								foreach($testimonials as $testimonial)
								{
									
									$tes_name = stripslashes($testimonial['tes_name']);
									$tes_company = stripslashes($testimonial['tes_company']);
									$tes_det = stripslashes($testimonial['tes_detail']);
									if($i == 3){ echo '</div></div><div class="carousel-item">
							<div class="row justify-content-center">'; $i=0; }
							?>
								<div class="col-md-4">
									<div class="mbr-text mbr-fonts-style align-left display-7">
										<?php echo $tes_det; ?>
									</div>
									<h4 class="mbr-fonts-style signature mbr-bold pt-3 align-left display-5"><strong><?php echo $tes_name; ?></strong></h4>
								</div>
							<?php $i++; } } ?>
							</div>
						</div>
					</div>
					<div class="carousel-controls">
						<a class="carousel-control-prev" role="button" data-slide="prev">
						<span aria-hidden="true" class="mbri-left mbr-iconfont"></span>
						<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" role="button" data-slide="next">
						<span aria-hidden="true" class="mbri-right mbr-iconfont"></span>
						<span class="sr-only">Next</span>
						</a>
					</div>
				</div>
			</div>
		</section>
		<section class="features10 cid-rneJ6NS4kA" id="features10-1g">
			<div class="container">
				<h2 class="mbr-section-title align-left mbr-fonts-style display-2">
					Read our blog to understand our philosophy
				</h2>
				<!--<p class="mbr-section-subtitle align-left mbr-fonts-style display-5">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde et repellat fuga sed impedit hic, nesciunt, soluta ratione facere ad nisi deleniti magni. Dolore libero, saepe repudiandae ex ipsa natus.
				</p>-->
				<div class="row justify-content-center align-items-start">
				<?php
				if(!empty($blog))
				{
					$i =0;
					foreach($blog as $blogs)
					{
						
						$blogs_name = stripslashes($blogs['b_title']);
					
						if($blogs['b_image'] != '')
						{ 
							$blogs_image = base_url().'upload/je/'.stripslashes($blogs['b_image']);
						}
						else
						{
							$blogs_image = base_url().'assets/site/images/background16.jpg';
						}
						$url = base_url().'blog/detail/'.$blogs['slug'].'/';
					?>
					<div class="card px-3 py-4 col-md-4">
						<div class="card-wrapper flip-card">
							<div class="card-img">
								<img src="<?php echo $blogs_image; ?>" alt="Mobirise" title="">
							</div>
							<div class="card-box">
								<p class="mbr-card-text mbr-fonts-style align-center display-7">
									<?php echo $blogs_name ; ?>.
								</p>
								<div class="mbr-section-btn align-center pt-3">
									<a href="<?php echo $url; ?>" class="btn btn-md btn-info display-4">Read More</a>
								</div>
							</div>
						</div>
					</div>
				<?php } } ?>
				</div>
			</div>
		</section>
		<section class="mbr-section info5 cid-rkUAD7K6ct" id="info5-5">
			<div class="container">
				<div class="row justify-content-center content-row">
					<div class="media-container-column title col-12 col-lg-7 col-md-6">
						<h2 class="align-left mbr-bold mbr-fonts-style mbr-white mbr-section-title display-2">Meet our Outdoor Equipment Experts</h2>
					</div>
					<div class="media-container-column col-12 col-lg-3 col-md-4">
						<div class="mbr-section-btn align-right py-4"><a class="btn btn-warning display-4" href="">Learn More</a></div>
					</div>
				</div>
			</div>
		</section>
		<section class="map1 cid-rkYxRgE6PV" id="map1-a">
			<div class="google-map">
				<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14884.025659329323!2d79.002089!3d21.152143!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x8d0c367fedc1415b!2sParth+Fibrotech+(Playground+Equipment+Manufacturer+In+Nagpur)!5e0!3m2!1sen!2sin!4v1555311261380!5m2!1sen!2sin"  frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
		</section>
		<!--<section class="form3 cid-rkYxN5Zguv" id="form3-8">
			<div class="container">
				<div class="row justify-content-center">
					<div class="form-1 col-md-10 col-lg-8">
						<h2 class="mbr-fonts-style mbr-fonts-style mbr-section-title align-center display-2">
							Get In Touch
						</h2>
						<h3 class="mbr-fonts-style mbr-fonts-style mbr-section-subtitle align-center display-5">
							Lorem Ipsum Dolor Sit Amet
						</h3>
						<div class="form-wrap pt-4" data-form-type="formoid">
							
							<form action="/" method="POST" class="mbr-form form-with-styler" data-form-title="My Mobirise Form">
								<input type="hidden" name="email" data-form-email="true" value="0yz2U2Jv/85ilqEe+Cl2jatskrvad+GGhkeZhDtic3NODbk1JGEb/liphO6d2Kull6xW8ZfuvXhyChOl+qzEO4AZPvdtidSqDtQkVC7AdaoKgylFquPcch9BdW+qbJjf">
								<div class="row">
									<div hidden="hidden" data-form-alert="" class="alert alert-success col-12">Thanks for filling out the form!</div>
									<div hidden="hidden" data-form-alert-danger="" class="alert alert-danger col-12"></div>
								</div>
								<div class="dragArea row">
									<div data-for="name" class="col-lg-6  mb-3 form-group">
										<input type="text" name="name" placeholder="Your Name*" data-form-field="Name" class="form-control input display-7" required="required" id="name-form3-8">
									</div>
									<div data-for="lastname" class="col-lg-6  mb-3 form-group">
										<input type="text" name="lastname" placeholder="Last Name" data-form-field="Last Name" class="form-control input display-7" id="lastname-form3-8">
									</div>
									<div data-for="email" class="col-lg-6  mb-3 form-group">
										<input type="email" name="email" placeholder="Email*" data-form-field="Email" class="form-control input display-7" required="required" id="email-form3-8">
									</div>
									<div data-for="phone" class="col-lg-6  mb-3 form-group">
										<input type="text" name="phone" placeholder="Phone" data-form-field="Phone" class="form-control input display-7" id="phone-form3-8">
									</div>
									<div class="col-md-12  mb-2 form-group" data-for="message">
										<textarea name="message" placeholder="Message" data-form-field="Message" class="form-control input display-7" id="message-form3-8"></textarea>
									</div>
									<div class="col-md-12 input-group-btn  mt-2 align-left"><button type="submit" class="btn btn-form btn-bgr btn-primary display-4">Send Message</button></div>
								</div>
							</form>
							
						</div>
					</div>
				</div>
			</div>
		</section>-->
<?php 
	$this->load->view('footer_view');
?>







