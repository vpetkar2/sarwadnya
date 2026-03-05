<?php

$cityname = "";
$cities = $this->site_cms_model->allcity();
foreach ($cities as $city) {
	if ($this->session->userdata('cityId') == $city['id']) {
		$cityname = $city['name'];
	}
}

$url = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$arr = explode("/", $url);
$str = end($arr);

if ($arr[3] == "nagpur" || $arr[3] == "india") {
	$cityname = $arr[3];
}

if (is_numeric($str)) {
	$str = $arr[count($arr) - 2];
}

// $this->load->helper('general_helper');
// 	$seo_val = getSeoData($str);

// echo"<pre>"; print_r($str); exit;
// echo $cityname; exit;
$seo_val = getSeoData($str, $cityname);
$seo_val_prod = getSeoDataProd($str);
$url_img = "https://sarwadnyaplay.com/upload/je/";
$logo_img = "https://sarwadnyaplay.com/assets/newsite/images/logo/logo.png";

// echo"<pre>"; print_r($seo_val); exit;


if (!empty($seo_val))    // For Prodcut category page
{
	$title = $seo_val->seo_title . " " . "- SarwadnyaPlay";
	$keywords = $seo_val->seo_key;
	$desc = strip_tags($seo_val->seo_desc);
	$image = $url_img . "" . $seo_val->seo_image;
	$new_url = "https://sarwadnyaplay.com/" . strtolower($cityname) . "/" . $seo_val->seo_url;
}

if (empty($seo_val))    // For Show Default matter
{
	$title = "Sarwadnya Nagpur & India, Leading Indoor & Outdoor Green Gym Equipment Manufacturers Suppliers Exporters In  Nagpur & India";
	$keywords = "Sarwadnya Nagpur, Playground Equipments, Outdoor Green Gym Equipments, Outdoor Gym Equipments, Indoor Gym Equipment, Playground Equipment Manufacturers, Playground Slides, Playground Combo Set, Merry Go Round, Playground Swings, Playground See-Saw, Playground Climber, Outdoor Playground Multiply, kids and baby online store, Fiber Animal Dustbin from Nagpur, Maharashtra, India";
	$desc = "Sarwadnya Nagpur & India, Manufacturers For Outdoor And Indoor Green Gym & Playground Equipments Manufacturers In Nagpur & India, Indoor And Outdoor Green Gym equipments for kids, Portable Toilet equipment, Garden Bench suppliers, Outdoor Play Riders, Canteen Table, Single Chest Cum Seating Puller, Outdoor Games for Kids, Games for Kids";
	$image = $logo_img;
	$new_url = $url;
}
$segment1 = $this->uri->segment(1);
// print_r($segment1);
// exit;
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Site made with Mobirise Website Builder v4.9.5,  -->
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
	<link rel="shortcut icon" href="<?php echo base_url('assets/newsite/images/favicon.ico'); ?>" type="image/x-icon">

	<title><?php echo $title; ?></title>
	<meta name="title" content="<?php echo $title; ?>" />
	<meta name="keywords" content="<?php echo $keywords; ?>" />
	<meta name="description" content="<?php echo $desc; ?>" />

	<!-- Start og,geo Tag -->
	<meta property="og:title" content="<?php echo $title; ?>" />
	<meta property="og:description" content="<?php echo $desc; ?>" />
	<meta property="og:site_name" content="Website" />
	<meta property="og:url" content="<?php echo $new_url; ?>" />
	<meta property="og:image" content="<?php echo $image; ?>" />
	<meta property="og:image:url" content="<?php echo $image; ?>" />
	<meta property="og:image:width" content="500" />
	<meta property="og:image:height" content="500" />

	<meta name="rating" content="General" />
	<meta name="revisit-after" content="1 day" />
	<meta name="viewport" content="user-scalable = yes" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="Googlebots" content="index, follow">
	<meta name="Robots" content="index, follow">
	<meta name="copyright" content="Sarwadnya">
	<meta name="author" content="Sarwadnya">
	<meta name="Distribution" content="Global">

	<!--Geo tag-->
	<meta name="DC.title" content="Sarwadnyaplay" />
    <meta name="geo.region" content="IN-MH" />
    <meta name="geo.placename" content="Nagpur" />
    <meta name="geo.position" content="22.351115;78.667743" />
    <meta name="ICBM" content="22.351115, 78.667743" />
	<!--End-->

	<!--Markup Social Media-->
	<script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organisation",
      "name": "Sarwadnya Sports & Fitness Pvt Ltd",
      "url": "https://sarwadnyaplay.com/",
      "logo": "https://sarwadnyaplay.com/assets/newsite/images/logo/logo.png",
      "description": "Sarwadnya Sports & Fitness Pvt Ltd Nagpur India is a trusted manufacturer, wholesaler & supplier of indoor & outdoor playground equipment, gym & fitness machines across India. Quality products at best price.",
      
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Rajat Hill, Beside Lime Research Institute, Amravati Road",
        "addressLocality": "Nagpur",
        "addressRegion": "Maharashtra",
        "postalCode": "440033",
        "addressCountry": "IN"
      },
    
      "telephone": "+91-9823232019",
      "email": "info@sarwadnyaplay.com",
    
      "sameAs": [
        "https://www.facebook.com/sarwadnyasportsandfitness/",
        "https://www.linkedin.com/in/sanjay-bobde-478710173/",
        "https://www.youtube.com/@sarwadnyasportsandfitnessp2743"
      ],
    
      "keywords": "sports equipment, fitness equipment, gym equipment, indoor playground equipment, outdoor playground equipment manufacturer in India",
    
      "contactPoint": [
        {
          "@type": "ContactPoint",
          "telephone": "+91-7875190909",
          "contactType": "customer service",
          "areaServed": "IN",
          "availableLanguage": ["English", "Hindi", "Marathi"]
        }
      ]
    }
    </script>

	<!--End Markup Social Media-->

	<meta name="google-site-verification" content="xY6LCurHFn3aBUTzBlVh_CnxpScCfHAS9kiv2RbyBXE" />

	<link rel="canonical" href="<?php echo $url; ?>" />

	<!-- FAVICONS ICON -->
	<link rel="icon" href="images/favicon.ico" type="image/x-icon" />
	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />


	<!--[if lt IE 9]>
	<script src="js/html5shiv.min.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	<!-- STYLESHEETS -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/newsite/css/plugins.css"); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/newsite/css/style.css"); ?>">
	<link class="skin" rel="stylesheet" type="text/css"
		href="<?php echo base_url("assets/newsite/css/skin/skin-1.css"); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/newsite/css/templete.css"); ?>">
	<!-- Google Font -->
	<style>
		@import url('https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i|Playfair+Display:400,400i,700,700i,900,900i|Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap');
	</style>

	<!-- REVOLUTION SLIDER CSS -->
	<link rel="stylesheet" type="text/css"
		href="<?php echo base_url("assets/newsite/plugins/revolution/revolution/css/revolution.min.css"); ?>">

	<style>
		.counter::after {
			content: "+";
		}

		.pagination {
			margin-top: 20px;
		}

		.dlab-post-meta {
			margin-bottom: 0px;
		}

		.dlab-post-meta ul li {
			font-size: 20px;
		}

		.pagination .page-item.active .page-link {
			background-color: var(--color-primary);
			border-color: var(--color-primary);
		}

		.pagination .page-link {
			color: #333;
			padding: 8px 14px;
		}

		.pagination .page-link:hover {
			background: #f1f1f1;
		}

		.page-link {
			display: inline;
		}

		.logo-header img {
			height: 60px;
			width: auto;
			max-width: 100%;
		}

		.logo-header {
			width: auto;
		}
	</style>

	<!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-LNCGWTRLTD"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'G-LNCGWTRLTD');
    </script>
</head>

<body id="bg">
	<div class="page-wraper">
		<div id="loading-area"></div>
		<!-- header -->
		<header class="site-header mo-left header">
			<!-- main header -->
			<div class="sticky-header main-bar-wraper navbar-expand-lg">
				<div class="main-bar clearfix ">
					<div class="container clearfix">
						<!-- website logo -->
						<div class="logo-header mostion logo-dark">
							<a href="<?php echo base_url(''); ?>"><img
									src="<?php echo base_url("assets/newsite/images/logo/logo.png"); ?>" alt=""></a>
						</div>
						<!-- nav toggle button -->
						<button class="navbar-toggler collapsed navicon justify-content-end" type="button"
							data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
							aria-expanded="false" aria-label="Toggle navigation">
							<span></span>
							<span></span>
							<span></span>
						</button>
						<!-- extra nav -->
						<div class="extra-nav">
							<div class="extra-cell">
								<button id="quik-search-btn" type="button" class="site-button-link"><i
										class="la la-search"></i></button>
							</div>
						</div>
						<!-- Quik search -->
						<div class="dlab-quik-search">
							<form class="inquiry-form wow box-shadow bg-white fadeInUp" data-wow-delay="0.2s"
    						action="<?php echo base_url() . "products"; ?>" method="post" accept-charset="utf-8"
    						enctype="multipart/form-data" style="height: 130px;">
    						<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
    							value="<?php echo $this->security->get_csrf_hash(); ?>" />
							<input type="text" name="sch_prod" id="sch_prod" class="form-control" size='10' value="<?php if (!(empty($sch))) {
								echo ucfirst($sch);
							} ?>" style="border: 1px solid black; color: black; height: 50px;">
							<!--<button class="btn btn-primary" type="submit"><span class="mbri-search"></span></button>-->
							<input type="submit" name="submit" id="submit" value="Search"
								class="btn btn-sm btn-primary display-4">
							</form>
							<!-- <form action="#">
								<input name="search" value="" type="text" class="form-control"
									placeholder="Type to search">
								<span id="quik-search-remove"><i class="ti-close"></i></span>
							</form> -->
						</div>
						<!-- main nav -->
						<div class="header-nav navbar-collapse collapse justify-content-end" id="navbarNavDropdown">
							<div class="logo-header d-md-block d-lg-none">
								<a href="<?php echo base_url(''); ?>"><img
									src="<?php echo base_url("assets/newsite/images/logo/logo.png"); ?>" alt=""></a>
							</div>
							<ul class="nav navbar-nav">
								<li class="<?= ($segment1 == '' ? 'active' : '') ?>">
									<a href="<?= base_url(); ?>">Home</a>
								</li>
								<li class="has-mega-menu">
									<a href="javascript:;">Products <i class="fa fa-chevron-down"></i></a>

									<ul class="mega-menu">

										<?php
										$columns = 4; // number of columns
										$chunks = array_chunk($categories, ceil(count($categories) / $columns));

										foreach ($chunks as $chunk) {
											?>
											<li>
												<!-- <a href="javascript:;">Categories</a> -->
												<ul>

													<?php
													foreach ($chunk as $category) {
														$citydata = $this->site_cms_model->get_record_by_id(
															"city",
															array('id' => $category['city_id']),
															"id",
															"DESC",
															'1',
															''
														);
														?>

														<li>
															<a
																href="<?php echo base_url(strtolower($citydata->name) . "/" . stripslashes($category['slug'])); ?>">
																<?php echo stripslashes($category['cat_title']); ?>
															</a>
														</li>

													<?php } ?>

												</ul>
											</li>

										<?php } ?>

									</ul>
								</li>
								<!-- <li class="<?= ($segment1 == 'products' ? 'active' : '') ?>">
									<a href="<?= base_url('products'); ?>">Products</a>
								</li> -->
								<li class="<?= ($segment1 == 'about-us' ? 'active' : '') ?>">
									<a href="<?= base_url('about-us'); ?>">About Us</a>
								</li>
								<li class="<?= ($segment1 == 'blog' ? 'active' : '') ?>">
									<a href="<?= base_url('blog'); ?>">Blogs</a>
								</li>
								<li class="<?= ($segment1 == 'career' ? 'active' : '') ?>">
									<a href="<?= base_url('career'); ?>">Career</a>
								</li>
								<li class="<?= ($segment1 == 'contact-us' ? 'active' : '') ?>">
									<a href="<?= base_url('contact-us'); ?>">Contact</a>
								</li>
								<li>
									<a href="javascript:;"><?php echo $citydata->name; ?> <i
											class="fa fa-chevron-down"></i></a>
									<ul class="sub-menu">

										<?php
										$cities = $this->site_cms_model->allcity();
										foreach ($cities as $city) { ?>

											<li>
												<form method="post" action="<?php echo base_url('set_city'); ?>"
													id="city_<?php echo $city['id']; ?>">

													<input type="hidden"
														name="<?php echo $this->security->get_csrf_token_name(); ?>"
														value="<?php echo $this->security->get_csrf_hash(); ?>">

													<input type="hidden" name="city" value="<?php echo $city['id']; ?>">

													<a href="javascript:void(0);"
														onclick="document.getElementById('city_<?php echo $city['id']; ?>').submit();">
														<?php echo $city['name']; ?>
													</a>

												</form>
											</li>

										<?php } ?>

									</ul>
								</li>
							</ul>
							<div class="dlab-social-icon">
								<ul>
									<li><a class="site-button facebook circle-sm outline fa fa-facebook"
											href="javascript:void(0);"></a></li>
									<li><a class="site-button twitter circle-sm outline fa fa-twitter"
											href="javascript:void(0);"></a></li>
									<li><a class="site-button linkedin circle-sm outline fa fa-linkedin"
											href="javascript:void(0);"></a></li>
									<li><a class="site-button instagram circle-sm outline fa fa-instagram"
											href="javascript:void(0);"></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- main header END -->
		</header>
		<!-- header END -->