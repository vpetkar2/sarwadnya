<?php 
	$cnt = count($header_banners);
	$data['contact_detail'] = $contact_detail;
	$this->load->view('header_view');
?>
<!-------------------- new code ---------------------------------- -->
		<section class="carousel slide cid-rm0p4hgOZk" data-interval="5000" id="slider2-1a">
			<div class="container-fluid content-slider">
				<div class="content-slider-wrap">
					<div>
						<div class="mbr-slider slide carousel" data-pause="true" data-keyboard="false" data-ride="false" data-interval="false">
							<ol class="carousel-indicators">
							<?php 
							for($j=0;$j<$cnt;$j++)
							{ ?>
								<li data-app-prevent-settings="" data-target="#slider2-1a" data-slide-to="<?php echo $j; ?>" class="<?php if($j == '0') { ?> active<?php } ?>"></li>
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
											<img src="<?php echo $img; ?>" alt="">
											<div class="carousel-caption justify-content-center">
												<div class="col-10 align-center">
													<p class="mbr-bold mbr-fonts-style display-1"><?php echo stripslashes($banner['ban_cap']); ?></p>
												</div>
											</div>
										</div>
									</div>
								</div>
							<?php $i++; } } else { ?>
								<div class="carousel-item slider-fullscreen-image active" data-bg-video-slide="false" style="background-image: url(<?php echo base_url('assets/site/images/background3.jpg'); ?>);">
									<div class="container container-slide">
										<div class="image_wrapper">
											<div class="mbr-overlay"></div>
											<img src="<?php echo base_url('assets/site/images/background3.jpg'); ?>">
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
		</section>
		
		<section class="features19 cid-rm0pwICru2" id="features19-1d">
			<div class="container">
			    
			    <div class="row content justify-content-center">
					<div class="col-md-6 col-lg-8">
						<h2 class="mbr-section-title align-left mbr-bold mbr-fonts-style display-2">
					<?php echo $title; ?> </h2>
					</div>
					<div class="col-md-6 col-lg-4">
				       <form method="post" action="<?php echo base_url('set_city'); ?>" enctype="multipart/form-data">
				            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
				            <select name="city" onchange="this.form.submit()" style="width: 120px; height: 40px; text-align: center;">
				            <?php 
				            $cities = $this->site_cms_model->allcity();
				            foreach($cities as $city) { ?>
				            <option value="<?php echo $city['id']; ?>" <?php if ($this->session->userdata('cityId') == $city['id']) { echo "selected"; } ?>><?php echo $city['name']; ?></option>
				            <?php } ?>
				            </select>
				        </form>
					</div>
				</div>
				
				<!--<h2 class="mbr-section-title align-right mbr-bold mbr-fonts-style display-2">
				<?php echo form_open_multipart('products');?>
					<input type="text" name="sch_prod" id="sch_prod" class="" value="<?php echo $sch; ?>"/>
					<input type="submit" name="submit" id="submit" value="Search Product" class="btn btn-sm btn-primary display-4"/>
				</form>
				</h2>-->
				<div class="row justify-content-center align-items-start">
				<?php
					if(!empty($product_detail))
					{
					foreach($product_detail as $product_h)
					{
						$h_prod_title = stripslashes($product_h['prod_title']);
						$h_prod_cost = stripslashes($product_h['prod_cost']);
						$h_prod_image = base_url().'upload/je/'.stripslashes($product_h['prod_image']);
						// $url = base_url().'products/detail/'.$product_h['prod_url'].'/';
						
						$citydata = $this->site_cms_model->get_record_by_id("city", array('id' => $product_h['prod_city_id']), "id", "DESC", '1', '');

						$url = base_url().strtolower($citydata->name)."/".$product_h['prod_url'].'/';

						$albums = $this->site_cms_model->get_record_by_id("product_image", array('prod_id' => $product_h['prod_id']), "img_id", "DESC", '1', '');
						
						if(!empty($albums->prod_image))
						{
						    $img_prod = base_url().'upload/je/'.stripslashes($albums->prod_image);
						}
						else
						{
						    $img_prod = base_url().'assets/site/images/no-img.jpg';
						}
						
						$category = $this->site_product_model->get_category_by_id($product_h['prod_cat_id']);
					?>
					<div class="card px-3 py-4 col-md-6 col-lg-3">
						<div class="card-wrapper flip-card">
							<div class="card-img">
							
								<img src="<?php echo $img_prod; ?>" alt="<?php echo $h_prod_title; ?>">
							
								<!--<div class="img-text mbr-text mbr-fonts-style align-left mbr-white display-8">-->
								<!--	<?php echo $category[0]['cat_title']; ?>-->
								<!--</div>-->
							</div>
							<div class="card-box">
								<h3 class="mbr-title mbr-fonts-style mbr-bold mbr-black display-5">
									<?php echo $h_prod_title; ?>
								</h3>
								<p class="mbr-card-text mbr-fonts-style align-left display-7">
									₹	<?php echo $h_prod_cost; ?>
								</p>
								<div class="navbar-buttons mbr-section-btn">
									<a class="btn btn-sm btn-primary display-4" href="<?php echo $url; ?>">
									Read More
									</a>
								</div>
							</div>
						</div>
					</div>
					<?php }  }  else { ?>
						<h1 class="alert alert-warning" role="alert">Product Not found for Search Keyword : <?php echo $sch; ?><h1>
					<?php } ?>
					
				</div>
				<h5 style="text-align:center"><?php print_r($links); ?></h5>
			</div>
		</section>
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
		<!-------------------- new code ---------------------------------- -->
 <?php 
//$data['page'] = 'about';
//$data['contact_detail'] = $contact_detail;
//$this->load->view('footer_view', $data);
$this->load->view('footer_view',$data);