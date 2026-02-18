<?php
$cnt = count($header_banners);
$data['contact_detail'] = $contact_detail;
$this->load->view('header_view');
?>

<!-- Content -->
<div class="page-content bg-white">
	<!-- inner page banner -->
	<div class="dlab-bnr-inr overlay-black-middle bg-pt"
		style="background-image:url(<?php echo base_url("assets/newsite/images/banner/bnr4.jpg"); ?>);">
		<div class="container">
			<div class="dlab-bnr-inr-entry">
				<h1 class="text-white">Category</h1>
			</div>
		</div>
	</div>
	<!-- inner page banner END -->

	<div class="bg-white">
		<div class="section-full bg-white content-inner">
			<div class="container">
				<h1><?php echo $slug[0]['cat_title']; ?></h1>
				<p><?php echo $slug[0]['cat_desc']; ?></p>
				<br /><br />
				<div class="row">
					<div class="col-lg-12">
						<div class="section-content box-sort-in button-example p-b0">
							<div class="row">
								<?php
								if (!empty($product_detail)) {
									foreach ($product_detail as $product_h) {
										$h_prod_title = stripslashes($product_h['prod_title']);
										$h_prod_cost = stripslashes($product_h['prod_cost']);
										$h_prod_image = base_url() . 'upload/je/' . stripslashes($product_h['prod_image']);
								
										$citydata = $this->site_cms_model->get_record_by_id("city", array('id' => $product_h['prod_city_id']), "id", "DESC", '1', '');
										$url = base_url() . strtolower($citydata->name) . "/" . $product_h['prod_url'] . '/';

										$albums = $this->site_cms_model->get_record_by_id("product_image", array('prod_id' => $product_h['prod_id']), "img_id", "DESC", '1', '');
										if (!empty($albums)) {
											$img_prod = base_url() . 'upload/je/' . stripslashes($albums->prod_image);
										} else {
											$img_prod = base_url() . 'assets/site/images/no-img.jpg';
										}

										$category = $this->site_product_model->get_category_by_id($product_h['prod_cat_id']);
										?>
										<div class="post card-container col-lg-4 col-md-6 col-sm-6">
											<div class="blog-post blog-grid blog-rounded blog-effect1">
												<div class="dlab-post-media dlab-img-effect">
													<img src="<?php echo $img_prod; ?>" alt="<?php echo $h_prod_title; ?>">
												</div>
												<div class="dlab-info p-a20 border-1">
													<div class="dlab-post-meta">
														<ul>
															<li class="post-date fs-5">
																<strong>
																	₹ <?php echo $h_prod_cost; ?>
																</strong>
															</li>
														</ul>
													</div>
													<div class="dlab-post-title">
														<h4 class="post-title"><a
																href="blog-single.html"><?php echo $h_prod_title; ?></a></h4>
													</div>
													<div class="dlab-post-readmore">
														<a href="<?php echo $url; ?>" title="READ MORE" rel="bookmark"
															class="site-button">READ MORE
															<i class="ti-arrow-right"></i>
														</a>
													</div>
												</div>
											</div>
										</div>
									<?php }
								} else { ?>
									<h1 class="alert alert-warning" role="alert">Product Not found for
										<?php echo $slug[0]['cat_title']; ?>
										<h1>
										<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Images box with content demo 1 END -->
			<!-- <h5 style="text-align:center">
				<?php print_r($links); ?>
			</h5> -->

			<div class="pagination-wrapper text-center mt-4">
				<?php echo $links; ?>
			</div>

		</div>
		<div class="dlab-divider bg-gray-dark tb10"></div>

	</div>
</div>
<!-- Content END-->

<?php
//$data['page'] = 'about';
//$data['contact_detail'] = $contact_detail;
//$this->load->view('footer_view', $data);
$this->load->view('footer_view', $data);

