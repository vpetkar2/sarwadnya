<?php 	
	$cnt = count($header_banners);
	$prod_title = '';
	if (!empty($product_detail)) {
	    $product_detail = $product_detail[0];
	    $prod_title = stripslashes($product_detail['prod_title']);   
	    $prod_id = stripslashes($product_detail['prod_id']);  
	}
	$data['title'] = $prod_title ;
	$data['contact_detail'] = $contact_detail;
	$this->load->view('header_view', $data);
?>
     <!-- Product Enquiry Form -->
		<div class="modal fade" id="enquireModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title mbr-bold" style="font-size:2rem" id="exampleModalLabel">Enquire Here!</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php  echo form_open_multipart('home/submitEnquire'); ?>
						<div class="modal-body">
							<div class="form-group">
								<label for="exampleFormControlInput1">Full Name</label>
								<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter The Name" name="fname">
							</div>
							<div class="form-group">
								<label for="exampleFormControlInput1">Email address</label>
								<input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Enter The Email" name="email">
							</div>
							<div class="form-group">
								<label for="exampleFormControlInput1">Contact Number</label>
								<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter The Mobile Number"  name="mobile">
							</div>
							<div class="form-group">
								<label for="exampleFormControlTextarea1"> Product</label>
								<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="products name"  name="prodnm" value="<?php echo $prod_title ; ?>" readonly>
								<input type="hidden" class="form-control" id="exampleFormControlInput1" placeholder="products name"  name="prodid" value="<?php echo $prod_id; ?>" >
							</div>
							<div class="form-group">
								<label for="exampleFormControlTextarea1">Description</label>
								<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="message"></textarea>
							</div>
						</div>
						<div class="modal-footer justify-content-center">
							<button type="submit" class="btn btn-primary" >Enquire</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<!--<section class="carousel slide cid-rm0p4hgOZk" data-interval="false" id="slider2-1a">
			<div class="container-fluid content-slider">
				<div class="content-slider-wrap">
					<div>
						<div class="mbr-slider slide carousel" data-pause="true" data-keyboard="false" data-ride="false" data-interval="false">
							<ol class="carousel-indicators">
								<?php 
								for($k=0;$k<$cnt;$k++)
								{ ?>
									<li data-app-prevent-settings="" data-target="#slider2-1a" data-slide-to="<?php echo $k; ?>" class="<?php if($k == '0') { ?> active<?php } ?>"></li>
								<?php } ?>
							</ol>
							<div class="carousel-inner" role="listbox">
								<?php
							if(!empty($header_banners))
							{
								$i =0;
								foreach($header_banners as $banner)
								{
									$img = base_url().'upload/je/'.stripslashes($banner['ban_image']);
								?>
								<div class="carousel-item slider-fullscreen-image<?php if($i == '0') { ?> active<?php } ?>" data-bg-video-slide="false" style="background-image: url(<?php echo $img; ?>);">
									<div class="container container-slide">
										<div class="image_wrapper">
											<div class=""></div>
											<img src="<?php echo $img; ?>">
											<div class="carousel-caption justify-content-center">
												<div class="col-10 align-center">
													<p class="lead mbr-text mbr-fonts-style display-7"></p>
												</div>
											</div>
										</div>
									</div>
								</div>
							<?php $i++; } } else { ?>
								<div class="carousel-item slider-fullscreen-image active" data-bg-video-slide="false" style="background-image: url(assets/images/background3.jpg);">
									<div class="container container-slide">
										<div class="image_wrapper">
											<div class="mbr-overlay"></div>
											<img src="assets/images/background3.jpg">
											<div class="carousel-caption justify-content-center">
												<div class="col-10 align-center">
													<p class="lead mbr-text mbr-fonts-style display-7"></p>
												</div>
											</div>
										</div>
									</div>
								</div>
							<?php } ?>
							</div>
							<a data-app-prevent-settings="" class="carousel-control carousel-control-prev" role="button" data-slide="prev" href="#slider2-1a"><span aria-hidden="true" class="mbri-left mbr-iconfont"></span><span class="sr-only">Previous</span></a><a data-app-prevent-settings="" class="carousel-control carousel-control-next" role="button" data-slide="next" href="#slider2-1a"><span aria-hidden="true" class="mbri-right mbr-iconfont"></span><span class="sr-only">Next</span></a>
						</div>
					</div>
				</div>
			</div>
		</section>-->
		<section class="cid-rneHpGJaIG mbr-parallax-background" id="content9-1d">
			<div class="mbr-overlay" style="opacity: 0.6; background-color: rgb(35, 35, 35);">
			</div>
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-12 col-md-12 align-center">
						<h2 class="mbr-section-title align-left mbr-fonts-style mbr-bold mbr-white display-2">
							<?php echo $prod_title; ?>
						</h2>
						<!--<h3 class="mbr-section-subtitle align-left mbr-fonts-style mbr-white pt-2 display-5">
							Lorem Ipsum Dolor Sit Amet
						</h3>-->
					</div>
				</div>
			</div>
		</section>
		
		<section class="products">
			<div class="container">
				<!-- Product -->
				<?php
					$prod_cost = '';
					$prod_short_desc = '';
					$prod_desc = '';
					$prod_image = '';
					if (!empty($product_detail)) {
					    $prod_cost = stripslashes($product_detail['prod_cost']);
    					$prod_short_desc = stripslashes($product_detail['prod_short_desc']);
    					$prod_desc = stripslashes($product_detail['prod_desc']);
    					$prod_image = base_url().'upload/je/'.stripslashes($product_detail['prod_image']);    
					}
					
					//$prod_image = base_url('assets/img/product/1.jpg');
					$cnt_alb = 0;
					if (!empty($albums)) {
					    $cnt_alb =  count($albums);   
					}
				?>
				<div class="row">
					<div class="col-12 col-md-6 ">
						<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
							<ol class="carousel-indicators">
							<?php 
							for($j=0;$j<$cnt_alb;$j++)
							{ ?>
								<li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $j; ?>" class="<?php if($j == '0') { ?> active<?php } ?>"></li>
							<?php  } ?>
							</ol>
							<div class="carousel-inner">
							
							<?php 
							$i =0;
							if(!empty($albums))
							{
							foreach($albums as $album)
							{
								$img_prod = base_url().'upload/je/'.stripslashes($album['prod_image']);
							?>
								<div class="carousel-item<?php if($i == '0') { ?> active<?php } ?>">
									<img class="d-block w-100" src="<?php echo $img_prod; ?>" alt="<?php echo $prod_title; ?>">
								</div>
								<?php 
								$i++ ; 
							}
							}
							else
							{
								$img_prod = base_url().'assets/site/images/no-img.jpg'; ?>
								<div class="carousel-item active">
									<img class="d-block w-100" src="<?php echo $img_prod; ?>" alt="<?php echo $prod_title; ?>">
								</div>
							    <?php 
							} ?>
								
							</div>
							<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
							</a>
							<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
							</a>
						</div>
					</div>
					<div class="col-12 col-md-6 product-details">
						<h2 class="align-left mbr-fonts-style mbr-section-title display-2">	<?php echo $prod_title ; ?>	</h2>
						<?php 
						if(!empty($product_detail) && $product_detail['prod_code']!='')
						{
						?>
						<h2 class="align-left mbr-fonts-style mbr-section-title display-2">CODE:	<?php echo stripslashes($product_detail['prod_code']) ; ?>	</h2>
						<?php 
						}
						if(!empty($features))
						{
						?>
							<table class="table table-hover table-bordered" height="110" width="357">
								<tbody>
								<?php 
								foreach($features as $feature)
								{
								?>
									<tr>
										<th scope="row"><?php echo stripslashes($feature['pf_name']) ; ?></th>
										<td><?php echo stripslashes($feature['pf_detail']) ; ?></td>
									</tr>
									<?php 
								} ?>
								</tbody>
							</table>
							<?php 
						} ?>

						
						<table class="table table-hover table-bordered">
							<tbody>
								<tr>
									<td colspan="2">
										Estimated Pricing*
										<div class="row align-items-center">
											<div class="col-6 ">
												<h2 class="price">
												₹	<?php echo $prod_cost ; ?>
												</h2>
											</div>
											<div class="col-6">
												<div class="mbr-section-btn  align-left"><a class="btn btn-md btn-warning display-4" href="" data-toggle="modal" data-target="#enquireModal">Interested/Enquiry</a></div>
											</div>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<!-- Specification -->
					<div class="specs col-12">
						<h2 class="mbr-section-title align-left mbr-fonts-style mbr-bold display-2">Product Specifications</h2>
						<?php echo $prod_desc ; ?>
					</div>
				</div>
				<!-- Row -->
				<!-- Product -->
				
			</div>
		</section>
		<?php
		if(!empty($product_list))
		{ ?>
		<section class="features19 cid-rm0pwICru2" id="features19-1d">
			<div class="container">
				<h2 class="mbr-section-title align-left mbr-bold mbr-fonts-style display-2">
					Related Products
				</h2>
				<div class="row justify-content-center align-items-start">
				<?php
					foreach($product_list as $product_h)
					{
						$h_prod_title = stripslashes($product_h['prod_title']);
						$h_prod_cost = stripslashes($product_h['prod_cost']);
						$h_prod_image = base_url().'upload/je/'.stripslashes($product_h['prod_image']);
						// $url = base_url().'products/detail/'.$product_h['prod_url'].'/';
					    $citydata = $this->site_cms_model->get_record_by_id("city", array('id' => $product_h['prod_city_id']), "id", "DESC", '1', '');
					    $url = base_url().strtolower($citydata->name)."/".$product_h['prod_url'].'/';
					    
					    

						$albums = $this->site_cms_model->get_record_by_id("product_image", array('prod_id' => $product_h['prod_id']), "img_id", "DESC", '1', '');
						if(!empty($albums))
						{
						    $img_prod = base_url().'upload/je/'.stripslashes($albums->prod_image);
						}
						else
						{
						    $img_prod = base_url().'assets/site/images/no-img.jpg';
						}
						
					?>
					<div class="card px-3 py-4 col-md-6 col-lg-3">
						<div class="card-wrapper flip-card">
							<div class="card-img">
								<img src="<?php echo $img_prod; ?>" alt="Mobirise">
								<div class="img-text mbr-text mbr-fonts-style align-left mbr-white display-4">
									<?php echo $category[0]['cat_title']; ?>
								</div>
							</div>
							<div class="card-box">
								<h3 class="mbr-title mbr-fonts-style mbr-bold mbr-black display-5">
									<?php echo $h_prod_title ; ?>
								</h3>
								<p class="mbr-card-text mbr-fonts-style align-left display-7">
									₹	<?php echo $h_prod_cost ; ?>
								</p>
								<div class="navbar-buttons mbr-section-btn">
									<a class="btn btn-sm btn-primary display-4" href="<?php echo $url; ?>">
									Read More
									</a>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
					
				</div>
			</div>
		</section>
		<?php } ?>
		<section class="cid-rkYLgstckz" id="info3-x">
			<div class="container">
				<div class="row justify-content-center align-items-center">
					<div class="col-12 col-md-9 align-center">
						<h2 class="mbr-section-title align-left mbr-fonts-style mbr-bold display-2">Need assistance to choose right product for you ?</h2>
					</div>
					<div class="col-12 col-md-3 align-center">
						<div class="mbr-section-btn  align-left"><a class="btn btn-md btn-warning display-4" href="<?php echo base_url('about-us'); ?>">Company Profile</a></div>
					</div>
				</div>
			</div>
		</section>
<?php 
$data['page'] = 'about';
$data['contact_detail'] = $contact_detail;
$this->load->view('footer_view', $data);
?>
