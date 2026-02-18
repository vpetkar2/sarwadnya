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

if ($arr[3] == "nagpur" || $arr[3] == "mumbai" || $arr[3] == "india") {
	$cityname = $arr[3];
}

if (is_numeric($str)) {
	$str = $arr[count($arr) - 2];
}

$this->load->helper('general_helper');
// 	$seo_val = getSeoData($str);


//echo $cityname;
$seo_val = getSeoData($str, $cityname);
$seo_val_prod = getSeoDataProd($str);
$url_img = "https://www.parthfibrotech.in/upload/je/";
$logo_img = "https://www.parthfibrotech.in/assets/admin/images/parth_logo.png";

// echo"<pre>"; print_r($seo_val); exit;


if (!empty($seo_val))    // For Prodcut category page
{
	$title = $seo_val->seo_title . " " . "- Parthfibrotech";
	$keywords = $seo_val->seo_key;
	$desc = strip_tags($seo_val->seo_desc);
	$image = $url_img . "" . $seo_val->seo_image;
	$new_url = "https://www.parthfibrotech.in/" . strtolower($cityname) . "/" . $seo_val->seo_url;
}

if (empty($seo_val))    // For Show Default matter
{
	$title = "Parth Fibrotech Nagpur & Mumbai, Leading Indoor & Outdoor Green Gym Equipment Manufacturers Suppliers Exporters In  Nagpur & Mumbai India";
	$keywords = "Parth Fibrotech Nagpur, Parth Fibrotech Mumbai, Playground Equipments, Outdoor Green Gym Equipments, Outdoor Gym Equipments, Indoor Gym Equipment, Playground Equipment Manufacturers, Playground Slides, Playground Combo Set, Merry Go Round, Playground Swings, Playground See-Saw, Playground Climber, Outdoor Playground Multiply, kids and baby online store, Fiber Animal Dustbin from Nagpur, Maharashtra, India";
	$desc = "Parth Fibrotech Nagpur & Mumbai India, Manufacturers For Outdoor And Indoor Green Gym & Playground Equipments Manufacturers In Nagpur & Mumbai India, Indoor And Outdoor Green Gym equipments for kids, Portable Toilet equipment, Garden Bench suppliers, Outdoor Play Riders, Canteen Table, Single Chest Cum Seating Puller, Outdoor Games for Kids, Games for Kids";
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
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	<meta name="description" content="Industry - Factory & Industrial HTML Template" />
	<meta property="og:title" content="Industry - Factory & Industrial HTML Template" />
	<meta property="og:description" content="Industry - Factory & Industrial HTML Template" />
	<meta property="og:image" content="https://industry.dexignzone.com/xhtml/social-image.png" />
	<meta name="format-detection" content="telephone=no">

	<!-- FAVICONS ICON -->
	<link rel="icon" href="images/favicon.ico" type="image/x-icon" />
	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />

	<!-- PAGE TITLE HERE -->
	<title>Industry - Factory & Industrial HTML Template</title>

	<!-- MOBILE SPECIFIC -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

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
	</style>
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
									src="<?php echo base_url("assets/newsite/images/logo.png"); ?>" alt=""></a>
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
							<form action="#">
								<input name="search" value="" type="text" class="form-control"
									placeholder="Type to search">
								<span id="quik-search-remove"><i class="ti-close"></i></span>
							</form>
						</div>
						<!-- main nav -->
						<div class="header-nav navbar-collapse collapse justify-content-end" id="navbarNavDropdown">
							<div class="logo-header d-md-block d-lg-none">
								<a href="index.html"><img src="images/logo.png" alt=""></a>
							</div>
							<ul class="nav navbar-nav">
								<li class="<?= ($segment1 == '' ? 'active' : '') ?>">
									<a href="<?= base_url(); ?>">Home</a>
								</li>
								<li class="<?= ($segment1 == 'products' ? 'active' : '') ?>">
									<a href="<?= base_url('products'); ?>">Products</a>
								</li>
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