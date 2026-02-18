<?php
$data['contact_detail'] = $contact_detail;
$this->load->view('header_view', $data);
?>

<!-- Content -->
<div class="page-content bg-white">
	<!-- inner page banner -->
	<div class="dlab-bnr-inr overlay-black-middle bg-pt"
		style="background-image:url(<?php echo base_url("assets/newsite/images/background/bg5.jpg"); ?>);">
		<div class="container">
			<div class="dlab-bnr-inr-entry">
				<h1 class="text-white">Career</h1>
			</div>
		</div>
	</div>
	<!-- inner page banner END -->
	<div class="bg-white">
		<div class="section-full bg-white content-inner">
			<div class="container">

				<?php if ($this->session->flashdata('add_success')) { ?>
					<div class="alert alert-success" id="msg">
						<button type="button" class="close" data-dismiss="alert">x</button>
						<?php echo $this->session->flashdata('add_success'); ?>
					</div>
				<?php } ?>

				<div class="row">
					<div class="col-lg-12">
						<div class="sort-title clearfix text-center">
							<h4>Current Openings</h4>
						</div>
						<div class="section-content box-sort-in button-example p-b0">
							<div class="row">
								<?php
								if (!empty($carrier_list)) {
									foreach ($carrier_list as $carrier) {

										$carrier_name = stripslashes($carrier['crr_title']);
										$carrier_pos = stripslashes($carrier['crr_no_of_position']);

										$carrier_desc = stripslashes($carrier['crr_desc']);

										$url = base_url() . 'carrier/detail/' . $carrier['crr_id'] . '/';
										?>
										<div class="post card-container col-lg-4 col-md-6 col-sm-6">
											<div class="blog-post blog-grid blog-rounded blog-effect1">
												<div class="dlab-post-media dlab-img-effect">
													<a href="blog-single.html"><img src="images/blog/grid/pic1.jpg" alt=""></a>
												</div>
												<div class="dlab-info p-a20 border-1">
													<div class="dlab-post-title">
														<h4 class="post-title"><a
																href="blog-single.html"><?php echo $carrier_name; ?></a></h4>
													</div>
													<div class="dlab-post-meta">
														<ul>
															<li class="post-date"><strong>No Of Position : <?php echo $carrier_pos; ?></strong>
															</li>
														</ul>
													</div>
													<div class="dlab-post-text">
														<p><?php echo $carrier_desc; ?></p>
													</div>
													<div class="dlab-post-readmore">
														<a href="<?php echo $url; ?>" title="READ MORE" rel="bookmark"
															class="site-button">Apply Now
															<i class="ti-arrow-right"></i>
														</a>
													</div>
												</div>
											</div>
										</div>
									<?php }
								} ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Images box with content demo 1 END -->
		</div>
		<!-- <div class="dlab-divider bg-gray-dark tb10"></div> -->

	</div>
</div>
<!-- Content END-->
<?php
//$data['page'] = 'about';
//$data['contact_detail'] = $contact_detail;
//$this->load->view('footer_view', $data);
$this->load->view('footer_view');