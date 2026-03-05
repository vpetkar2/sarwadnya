<?php
$cnt = count($header_banners);
$prod_title = '';
// print_r($product_detail); exit;
if (!empty($product_detail)) {
	$product_detail = $product_detail[0];
	$prod_title = stripslashes($product_detail['prod_title']);
	$prod_id = stripslashes($product_detail['prod_id']);
}
$data['title'] = $prod_title;
$data['contact_detail'] = $contact_detail;

// print_r($data); exit; exit;

$this->load->view('header_view', $data);
?>

<?php
$prod_cost = '';
$prod_short_desc = '';
$prod_desc = '';
$prod_image = '';
if (!empty($product_detail)) {
	$prod_cost = stripslashes($product_detail['prod_cost']);
	$prod_short_desc = stripslashes($product_detail['prod_short_desc']);
	$prod_desc = ($product_detail['prod_desc']);
	$prod_image = base_url() . 'upload/je/' . stripslashes($product_detail['prod_image']);
}

//$prod_image = base_url('assets/img/product/1.jpg');
$cnt_alb = 0;
if (!empty($albums)) {
	$cnt_alb = count($albums);
}

$albums = $this->site_cms_model->get_record_by_id("product_image", array('prod_id' => $product_detail['prod_id']), "img_id", "DESC", '1', '');
if (!empty($albums->prod_image)) {
	$img_prod = base_url() . 'upload/je/' . stripslashes($albums->prod_image);
} else {
	$img_prod = base_url() . 'assets/site/images/no-img.jpg';
}
?>
<style>
	strong {
		font-weight: bold;
	}
</style>
<!-- Content -->
<div class="page-content bg-white">

	<!-- Product Enquiry Form -->
	<div class="modal fade" id="enquireModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
		aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header site-button">
					<h5 class="modal-title mbr-bold" style="font-size:2rem" id="exampleModalLabel">Enquire Here!</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<?php // echo form_open_multipart('home/submitEnquire'); ?>
				<form class="inquiry-form wow box-shadow bg-white fadeInUp" data-wow-delay="0.2s"
						action="<?php echo base_url() . "home/submitEnquire"; ?>" method="post" accept-charset="utf-8"
						enctype="multipart/form-data">
				    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
							value="<?php echo $this->security->get_csrf_hash(); ?>" />
				<div class="modal-body">
					<div class="form-group">
						<label for="exampleFormControlInput1">Full Name</label>
						<input type="text" class="form-control" id="exampleFormControlInput1"
							placeholder="Enter The Name" name="fname">
					</div>
					<div class="form-group">
						<label for="exampleFormControlInput1">Email address</label>
						<input type="email" class="form-control" id="exampleFormControlInput1"
							placeholder="Enter The Email" name="email">
					</div>
					<div class="form-group">
						<label for="exampleFormControlInput1">Contact Number</label>
						<input type="text" class="form-control" id="exampleFormControlInput1"
							placeholder="Enter The Mobile Number" name="mobile">
					</div>
					<div class="form-group">
						<label for="exampleFormControlTextarea1"> Product</label>
						<input type="text" class="form-control" id="exampleFormControlInput1"
							placeholder="products name" name="prodnm" value="<?php echo $prod_title; ?>" readonly>
						<input type="hidden" class="form-control" id="exampleFormControlInput1"
							placeholder="products id" name="prodid" value="<?php echo $prod_id; ?>">
						<!--<input type="hidden" class="form-control" id="exampleFormControlInput1"-->
						<!--	placeholder="products code" name="prodcode" value="<?php // echo $prod_code; ?>">-->
					</div>
					<div class="form-group">
						<label for="exampleFormControlTextarea1">Description</label>
						<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
							name="message"></textarea>
					</div>
				</div>
				<div class="modal-footer justify-content-center">
					<button type="submit" class="btn btn-primary site-button">Enquire</button>
				</div>
				</form>
			</div>
		</div>
	</div>


	<!-- inner page banner -->
	<div class="dlab-bnr-inr overlay-black-middle text-center bg-pt"
		style="background-image:url(<?php echo base_url("assets/newsite/images/background/bg5.jpg"); ?>);">
		<div class="container">
			<div class="dlab-bnr-inr-entry align-m text-center">
				<h1 class="text-white"><?php echo $prod_title; ?></h1>
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

						<!-- Image -->
						<div class="col-lg-6 col-md-12 m-b30">
							<div class="video-bx">
								<img src="<?php echo $img_prod; ?>" alt="" style="width:100%; height:auto;">
							</div>
						</div>

						<!-- Text beside image -->
						<div class="col-lg-6 col-md-12 m-b30 align-self-center video-infobx">
							<div class="content-bx1">
								<h2 class="m-b15 title">
									<span class="text-primary"><?php echo $prod_title; ?></span>
								</h2>
								<?php
								if (!empty($product_detail) && $product_detail['prod_code'] != '') {
									?>
									<h2 class="m-b15 title">
										<span class="text-primary">CODE:
											<?php echo stripslashes($product_detail['prod_code']); ?>
										</span>
									</h2>
									<?php
								}
								if (!empty($features)) {
									?>
									<table class="table table-hover table-bordered" height="110" width="357">
										<tbody>
											<?php
											foreach ($features as $feature) {
												?>
												<tr>
													<th scope="row"><?php echo stripslashes($feature['pf_name']); ?></th>
													<td><?php echo stripslashes($feature['pf_detail']); ?></td>
												</tr>
												<?php
											} ?>
											<tr>
												<th scope="row">Minimum Quantity</th>
												<td>1</td>
											</tr>
										</tbody>
									</table>
									<?php
								} ?>

								<div class="container">
									<div class="row relative">
										<div class="col-md-12 col-lg-6">
											Estimated Pricing*: <h2 class="price">
												₹ <?php echo $prod_cost; ?>
											</h2>
										</div>
										<div class="col-md-12 col-lg-6">
											<div class="mbr-section-btn  align-left"><a
													class="btn btn-md site-button display-4" href="" data-toggle="modal"
													data-target="#enquireModal">Interested/Enquiry</a></div>
										</div>
									</div>
								</div>

							</div>
						</div>

						<!-- Remaining text full width -->
						<?php if (!empty(trim(strip_tags($prod_desc)))) { ?>
							<div class="col-lg-12 col-md-12 m-b30 video-infobx">
								<h2 class="m-b15 title">
									<span class="text-primary">
										Product Specifications
									</span>
								</h2>
								<div class="">
									<?php echo $prod_desc; ?>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>



				<!-- Related Products -->
				<?php
				if (!empty($product_list)) { ?>
					<div class="section-full content-inner wow fadeIn" data-wow-duration="2s" data-wow-delay="0.4s">
						<div class="container">
							<div class="section-head text-center">
								<h2 class="title">Related Products</h2>
							</div>
							<div class="blog-carousel owl-none owl-carousel">
								<?php
								foreach ($product_list as $product_h) {
									$h_prod_title = stripslashes($product_h['prod_title']);
									$h_prod_cost = stripslashes($product_h['prod_cost']);
									$h_prod_image = base_url() . 'upload/je/' . stripslashes($product_h['prod_image']);
									// $url = base_url().'products/detail/'.$product_h['prod_url'].'/';
									$citydata = $this->site_cms_model->get_record_by_id("city", array('id' => $product_h['prod_city_id']), "id", "DESC", '1', '');
									$url = base_url() . strtolower($citydata->name) . "/" . $product_h['prod_url'] . '/';

									$albums = $this->site_cms_model->get_record_by_id("product_image", array('prod_id' => $product_h['prod_id']), "img_id", "DESC", '1', '');
									if (!empty($albums)) {
										$img_prod = base_url() . 'upload/je/' . stripslashes($albums->prod_image);
									} else {
										$img_prod = base_url() . 'assets/site/images/no-img.jpg';
									}

									?>
									<div class="item">
										<div class="blog-post post-style-1">
											<div class="dlab-post-media dlab-img-effect rotate">
												<a href="<?php echo $url; ?>"><img src="<?php echo $img_prod; ?>" alt=""
														title=""></a>
											</div>
											<div class="dlab-post-info">
												<div class="dlab-post-meta">
													<ul>
														<li class="post-author"> <a href="<?php echo $url; ?>">₹
																<?php echo $h_prod_cost; ?></a>
														</li>
													</ul>
												</div>
												<div class="dlab-post-title">
													<h3 class="post-title"><a
															href="<?php echo $url; ?>"><?php echo $h_prod_title; ?></a>
													</h3>
													<p><?php echo $category[0]['cat_title']; ?></p>
												</div>
												<div class="dlab-post-readmore">
													<a href="<?php echo $url; ?>" title="READ MORE" rel="bookmark"
														class="site-button btnhover13">READ MORE</a>
												</div>
											</div>
										</div>
									</div>
								<?php }
								?>
							</div>
						</div>
					</div>
				<?php }
				?>
				<!-- Latest blog END -->



			</div>
		</div>
		<!-- About Services info END -->
	</div>
	<!-- contact area END -->
</div>
<!-- Content END -->


<?php
$data['page'] = 'about';
$data['contact_detail'] = $contact_detail;
$this->load->view('footer_view');
?>