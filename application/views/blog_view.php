<?php


$data['contact_detail'] = $contact_detail;
$this->load->view('header_view', $data);
?>


<!-- Content -->
<div class="page-content bg-white">
	<!-- contact area -->
	<div class="dlab-bnr-inr overlay-black-middle bg-pt"
		style="background-image:url(<?php echo base_url("assets/newsite/images/background/bg5.jpg"); ?>);">
		<div class="container">
			<div class="dlab-bnr-inr-entry">
				<h1 class="text-white">Blogs</h1>
			</div>
		</div>
	</div>
	<div class="content-area">
		<div class="container">
			<div class="row">
				<!-- Left part start -->
				<div class="col-xl-12 col-lg-12">
					<?php
					if (!empty($blog_list)) {
						foreach ($blog_list as $blogs) {
							$blogs_date = $blogs['b_date'] ? date('d M Y', strtotime($blogs['b_date'])) : '';

							$blogs_name = '';
							if (!empty($blogs['b_title'])) {
								$text = stripslashes($blogs['b_title']);
								// $blogs_name = mb_substr($text, 0, 50) . (mb_strlen($text) > 50 ? '...' : '');
								$blogs_name = $text;
							}

							$blog_by = $blogs['b_author']
								? 'By ' . ucwords(stripslashes($blogs['b_author']))
								: '';

							$b_desc = '';
							if (!empty($blogs['b_desc'])) {
								$text = strip_tags(stripslashes($blogs['b_desc']));
								$b_desc = mb_substr($text, 0, 180) . (mb_strlen($text) > 180 ? '...' : '');
							}

							if ($blogs['b_image'] != '') {
								$blogs_image = base_url() . 'upload/je/' . stripslashes($blogs['b_image']);
							} else {
								$blogs_image = base_url() . 'assets/site/images/background16.jpg';
							}
							$url = base_url() . 'blog/detail/' . $blogs['slug'] . '/';
							?>
							<div class="blog-post blog-md clearfix">
								<div class="dlab-post-media dlab-img-effect zoom-slow">
									<a href="<?php echo $url; ?>">
										<img src="<?php echo $blogs_image; ?>" alt="" title="">
									</a>
								</div>
								<div class="dlab-post-info">
									<div class="dlab-post-meta">
										<ul>
											<li class="post-date"><?php echo $blogs_date; ?></li>
											<li class="post-author"><a href="javascript:void(0);"><?php echo $blog_by; ?></a>
											</li>
										</ul>
									</div>
									<div class="dlab-post-title">
										<h4 class="post-title"><a href="<?php echo $url; ?>"><?php echo $blogs_name; ?></a>
										</h4>
									</div>
									<div class="dlab-post-text">
										<p><?php echo $b_desc; ?></p>
									</div>
									<div class="dlab-post-readmore">
										<a href="<?php echo $url; ?>" title="READ MORE" rel="bookmark" class="site-button">READ
											MORE
											<i class="ti-arrow-right"></i>
										</a>
									</div>
								</div>
							</div>
						<?php }
					} ?>
				</div>

				<!-- Right part start -->
				<!-- <div class="col-xl-4 col-lg-4 ">
					<aside class="side-bar sticky-top">
						<div class="widget">
							<h5 class="widget-title style-1">Search</h5>
							<div class="search-bx style-1">
								<form role="search" method="post">
									<div class="input-group">
										<input name="text" class="form-control" placeholder="Enter your keywords..."
											type="text">
										<span class="input-group-btn">
											<button type="submit" class="fas fa-search text-primary"></button>
										</span>
									</div>
								</form>
							</div>
						</div>
						<div class="widget recent-posts-entry">
							<h5 class="widget-title style-1">Recent Posts</h5>
							<div class="widget-post-bx">
								<div class="widget-post clearfix">
									<div class="dlab-post-media">
										<img src="images/blog/recent-blog/pic1.jpg" width="200" height="143" alt="">
									</div>
									<div class="dlab-post-info">
										<div class="dlab-post-meta">
											<ul>
												<li class="post-date"> <strong>13 Aug</strong> </li>
												<li class="post-author"> By <a href="javascript:void(0);">Jack </a>
												</li>
											</ul>
										</div>
										<div class="dlab-post-header">
											<h6 class="post-title"><a href="blog-single-left-sidebar.html">How To Get
													People To Like Industry</a></h6>
										</div>
									</div>
								</div>
								<div class="widget-post clearfix">
									<div class="dlab-post-media">
										<img src="images/blog/recent-blog/pic2.jpg" width="200" height="160" alt="">
									</div>
									<div class="dlab-post-info">
										<div class="dlab-post-meta">
											<ul>
												<li class="post-date"> <strong>13 Aug</strong> </li>
												<li class="post-author"> By <a href="javascript:void(0);">Jamie </a>
												</li>
											</ul>
										</div>
										<div class="dlab-post-header">
											<h6 class="post-title"><a href="blog-single-left-sidebar.html">Seven Doubts
													You Should Clarify About</a></h6>
										</div>
									</div>
								</div>
								<div class="widget-post clearfix">
									<div class="dlab-post-media">
										<img src="images/blog/recent-blog/pic3.jpg" width="200" height="160" alt="">
									</div>
									<div class="dlab-post-info">
										<div class="dlab-post-meta">
											<ul>
												<li class="post-date"> <strong>13 Aug</strong> </li>
												<li class="post-author"> By <a href="javascript:void(0);">Winnie </a>
												</li>
											</ul>
										</div>
										<div class="dlab-post-header">
											<h6 class="post-title"><a href="blog-single-left-sidebar.html">Why You
													Should Not Go To Industry</a></h6>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="widget widget-newslatter">
							<h5 class="widget-title style-1">Newsletter</h5>
							<div class="news-box">
								<p>Enter your e-mail and subscribe to our newsletter.</p>
								<form class="dzSubscribe" action="script/mailchamp.php" method="post">
									<div class="dzSubscribeMsg"></div>
									<div class="input-group">
										<input name="dzEmail" required="required" type="email" class="form-control"
											placeholder="Your Email">
										<button name="submit" value="Submit" type="submit"
											class="site-button btn-block radius-no">Subscribe Now</button>
									</div>
								</form>
							</div>
						</div>
						<div class="widget widget_gallery gallery-grid-4">
							<h5 class="widget-title style-1">Our Gallery</h5>
							<ul id="lightgallery" class="lightgallery">
								<li>
									<div class="dlab-post-thum dlab-img-effect">
										<span data-exthumbimage="images/gallery/pic1.jpg"
											data-src="images/gallery/pic1.jpg" class="check-km"
											title="Image 1 Title will come here">
											<img src="images/gallery/pic1.jpg" alt="">
										</span>
									</div>
								</li>
								<li>
									<div class="dlab-post-thum dlab-img-effect">
										<span data-exthumbimage="images/gallery/pic2.jpg"
											data-src="images/gallery/pic2.jpg" class="check-km"
											title="Image 2 Title will come here">
											<img src="images/gallery/pic2.jpg" alt="">
										</span>
									</div>
								</li>
								<li>
									<div class="dlab-post-thum dlab-img-effect">
										<span data-exthumbimage="images/gallery/pic3.jpg"
											data-src="images/gallery/pic3.jpg" class="check-km"
											title="Image 3 Title will come here">
											<img src="images/gallery/pic3.jpg" alt="">
										</span>
									</div>
								</li>
								<li>
									<div class="dlab-post-thum dlab-img-effect">
										<span data-exthumbimage="images/gallery/pic4.jpg"
											data-src="images/gallery/pic4.jpg" class="check-km"
											title="Image 4 Title will come here">
											<img src="images/gallery/pic4.jpg" alt="">
										</span>
									</div>
								</li>
								<li>
									<div class="dlab-post-thum dlab-img-effect">
										<span data-exthumbimage="images/gallery/pic5.jpg"
											data-src="images/gallery/pic5.jpg" class="check-km"
											title="Image 5 Title will come here">
											<img src="images/gallery/pic5.jpg" alt="">
										</span>
									</div>
								</li>
								<li>
									<div class="dlab-post-thum dlab-img-effect">
										<span data-exthumbimage="images/gallery/pic6.jpg"
											data-src="images/gallery/pic6.jpg" class="check-km"
											title="Image 6 Title will come here">
											<img src="images/gallery/pic6.jpg" alt="">
										</span>
									</div>
								</li>
								<li>
									<div class="dlab-post-thum dlab-img-effect">
										<span data-exthumbimage="images/gallery/pic7.jpg"
											data-src="images/gallery/pic7.jpg" class="check-km"
											title="Image 7 Title will come here">
											<img src="images/gallery/pic7.jpg" alt="">
										</span>
									</div>
								</li>
								<li>
									<div class="dlab-post-thum dlab-img-effect">
										<span data-exthumbimage="images/gallery/pic8.jpg"
											data-src="images/gallery/pic8.jpg" class="check-km"
											title="Image 8 Title will come here">
											<img src="images/gallery/pic8.jpg" alt="">
										</span>
									</div>
								</li>
							</ul>
						</div>
						<div class="widget widget_archive">
							<h5 class="widget-title style-1">Categories List</h5>
							<ul>
								<li><a href="javascript:void(0);">Electronic Materials</a></li>
								<li><a href="javascript:void(0);">Auto Parts</a></li>
								<li><a href="javascript:void(0);">Building Management</a></li>
								<li><a href="javascript:void(0);">Power Systems</a></li>
								<li><a href="javascript:void(0);">Power & Energy</a></li>
							</ul>
						</div>
						<div class="widget widget-project">
							<h5 class="widget-title style-1">Our Project</h5>
							<div
								class="widget-project-box owl-none owl-loaded owl-theme owl-carousel dots-style-1 owl-dots-black-full">
								<div class="item"><img src="images/our-services/pic1.jpg" alt=""></div>
								<div class="item"><img src="images/our-services/pic2.jpg" alt=""></div>
								<div class="item"><img src="images/our-services/pic3.jpg" alt=""></div>
							</div>
						</div>
						<div class="widget widget_tag_cloud radius">
							<h5 class="widget-title style-1">Tags</h5>
							<div class="tagcloud">
								<a href="javascript:void(0);">Design</a>
								<a href="javascript:void(0);">User interface</a>
								<a href="javascript:void(0);">SEO</a>
								<a href="javascript:void(0);">WordPress</a>
								<a href="javascript:void(0);">Development</a>
								<a href="javascript:void(0);">Joomla</a>
								<a href="javascript:void(0);">Design</a>
								<a href="javascript:void(0);">User interface</a>
								<a href="javascript:void(0);">SEO</a>
								<a href="javascript:void(0);">WordPress</a>
								<a href="javascript:void(0);">Development</a>
								<a href="javascript:void(0);">Joomla</a>
								<a href="javascript:void(0);">Design</a>
								<a href="javascript:void(0);">User interface</a>
								<a href="javascript:void(0);">SEO</a>
								<a href="javascript:void(0);">WordPress</a>
								<a href="javascript:void(0);">Development</a>
								<a href="javascript:void(0);">Joomla</a>
							</div>
						</div>
					</aside>
				</div> -->
				<!-- Left part END -->
			</div>
		</div>
	</div>
</div>
<!-- Content END-->

<?php
//$data['page'] = 'about';
//$data['contact_detail'] = $contact_detail;
//$this->load->view('footer_view', $data);
$this->load->view('footer_view');