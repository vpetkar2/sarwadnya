<?php

    $cityname = "";
    $cities = $this->site_cms_model->allcity();
    foreach($cities as $city) {
        if ($this->session->userdata('cityId') == $city['id']) {
            $cityname = $city['name'];
        }
    }

	$url =  'https://'.$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
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


	if(!empty($seo_val))    // For Prodcut category page
	{ 
		$title    = $seo_val->seo_title." "."- Parthfibrotech";
		$keywords = $seo_val->seo_key;
		$desc     = strip_tags($seo_val->seo_desc);
		$image    = $url_img."".$seo_val->seo_image;
		$new_url  = "https://www.parthfibrotech.in/".strtolower($cityname)."/".$seo_val->seo_url; 
	} 
	
	if(empty($seo_val))    // For Show Default matter
	{
	    $title     = "Parth Fibrotech Nagpur & Mumbai, Leading Indoor & Outdoor Green Gym Equipment Manufacturers Suppliers Exporters In  Nagpur & Mumbai India";
		$keywords  = "Parth Fibrotech Nagpur, Parth Fibrotech Mumbai, Playground Equipments, Outdoor Green Gym Equipments, Outdoor Gym Equipments, Indoor Gym Equipment, Playground Equipment Manufacturers, Playground Slides, Playground Combo Set, Merry Go Round, Playground Swings, Playground See-Saw, Playground Climber, Outdoor Playground Multiply, kids and baby online store, Fiber Animal Dustbin from Nagpur, Maharashtra, India";
		$desc      = "Parth Fibrotech Nagpur & Mumbai India, Manufacturers For Outdoor And Indoor Green Gym & Playground Equipments Manufacturers In Nagpur & Mumbai India, Indoor And Outdoor Green Gym equipments for kids, Portable Toilet equipment, Garden Bench suppliers, Outdoor Play Riders, Canteen Table, Single Chest Cum Seating Puller, Outdoor Games for Kids, Games for Kids";
	    $image     = $logo_img;
	    $new_url   = $url;
	}
	// print_r($url);
?>
<!DOCTYPE html>
<html >
	<head>
		<!-- Site made with Mobirise Website Builder v4.9.5,  -->
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="generator" content="Mobirise v4.9.5, mobirise.com">
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
		<link rel="shortcut icon" href="<?php echo base_url('assets/site/images/logo.png'); ?>" type="image/x-icon">
		
		<meta name="title" content="<?php echo $title ; ?>" />
		<meta name="keywords" content="<?php echo $keywords ; ?>" />
		<meta name="description" content="<?php echo $desc ; ?>" /> 
		
        <!-- Start og,geo Tag -->
        <meta property="og:title" content="<?php echo $title ; ?>" />
        <meta property="og:description" content="<?php echo $desc ; ?>" />
        <meta property="og:site_name" content="Website"/>
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
        <meta name="copyright" content="Parth Fibrotech">
        <meta name="author" content="Parth Fibrotech">
        <meta name="Distribution" content="Global">
        
        <!--Geo tag-->
        <meta name="DC.title" content="Parth Fibrotech" />
        <meta name="geo.region" content="IN-MH" />
        <meta name="geo.placename" content="Nagpur" />
        <meta name="geo.position" content="21.143771;78.97493" />
        <meta name="ICBM" content="21.143771, 78.97493" />
       <!--End-->
       
         <!--Markup Social Media-->
    
    <script type="application/ld+json">
      {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name":"parthfibrotech",
        "url": "https://www.parthfibrotech.in/",
        "logo": "https://www.parthfibrotech.in/assets/site/images/logo.png",
        "sameAs" : [ "https://www.facebook.com/parthfibrotechngp/",
        "https://twitter.com/parthfibrotech",
        "https://www.linkedin.com/in/parth-fibrotech-57979a4b/",
        "https://instagram.com/parthfibrotechngp",
        "https://www.youtube.com/channel/UCbEKSlc0eyquSWGQmYCsqUQ"]

        
      }
    </script>
    

<!--End Markup Social Media-->

      
		<meta name="google-site-verification" content="EMGi_zCBuC5Mv2AhYLUCRsnaqLSBqd5DOP8wZogLE0k" />
		<link rel="canonical" href="<?php echo $url; ?>" />
		
		<!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-3ZQMT95TQY"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-3ZQMT95TQY');
        </script>
		    <style>
		        .seo_img {
                    width: 70px;
                    height: 70px;
                }
		    </style>
		<title><?php echo $title ; ?> </title>
		
		<!--<link href= "<?php echo base_url("assets/site/web/assets/mobirise-icons/mobirise-icons.css"); ?>" rel="alternate" type="application/rss+xml" title="" />
		<link href= "<?php echo base_url("assets/site/bootstrap/css/bootstrap.min.css"); ?>" rel="alternate" type="application/rss+xml" title="" />
		<link href= "<?php echo base_url("assets/site/bootstrap/css/bootstrap-grid.min.css"); ?>" rel="alternate" type="application/rss+xml" title="" />
		<link href= "<?php echo base_url("assets/site/bootstrap/css/bootstrap-reboot.min.css"); ?>" rel="alternate" type="application/rss+xml" title="" />
		<link href= "<?php echo base_url("assets/site/dropdown/css/style.css"); ?>" rel="alternate" type="application/rss+xml" title="" />
		<link href= "<?php echo base_url("assets/site/animatecss/animate.min.css"); ?>" rel="alternate" type="application/rss+xml" title="" />
		<link href= "<?php echo base_url("assets/site/socicon/css/styles.css"); ?>" rel="alternate" type="application/rss+xml" title="" />
	    <link href= "<?php echo base_url("assets/site/theme/css/style.css"); ?>" rel="alternate" type="application/rss+xml" title="" />
		<link href= "<?php echo base_url("assets/site/gallery/style.css"); ?>" rel="alternate" type="application/rss+xml" title="" />
		<link href= "<?php echo base_url("assets/site/mobirise/css/mbr-additional.css"); ?>" rel="alternate" type="application/rss+xml" title="" />
		<link href= "<?php echo base_url("assets/site/mobirise/css/custom.css"); ?>" rel="alternate" type="application/rss+xml" title="" />-->

		<?php echo link_tag('assets/site/web/assets/mobirise-icons/mobirise-icons.css'); ?>
		<?php echo link_tag('assets/site/bootstrap/css/bootstrap.min.css'); ?>
		<?php echo link_tag('assets/site/bootstrap/css/bootstrap-grid.min.css'); ?>
		<?php echo link_tag('assets/site/bootstrap/css/bootstrap-reboot.min.css'); ?>
		<?php echo link_tag('assets/site/dropdown/css/style.css'); ?>
		<?php echo link_tag('assets/site/animatecss/animate.min.css'); ?>
		<?php echo link_tag('assets/site/socicon/css/styles.css'); ?>
		<?php echo link_tag('assets/site/theme/css/style.css'); ?>
		<?php echo link_tag('assets/site/gallery/style.css'); ?>
		<?php echo link_tag('assets/site/mobirise/css/mbr-additional.css'); ?>
		<?php echo link_tag('assets/site/mobirise/css/custom.css'); ?>
		
<!-- Google Analytics -->

	</head>
	
	<body>
		<section class="menu cid-rkUAaV0Uh8" once="menu" id="menu1-0">
			<nav class="navbar navbar-dropdown navbar-fixed-top navbar-expand-lg">
				<div class="navbar-brand">
					<span class="navbar-logo">
					<a href="<?php echo base_url(''); ?>">
					<img src="<?php echo base_url('assets/site/images/flogo.png'); ?>" alt="Parth Logo">
					</a>
					</span>
					<!--<span class="navbar-caption-wrap"><a class="navbar-caption text-black display-2" href="">
					Parth FibroTech</a></span> -->
				</div>
				<div class="navbar-brand">
					<span class="">
					<a href="tel:7875290909">
					<img src="<?php echo base_url('assets/site/images/calling_logo.png'); ?>" alt="Calling Logo" style="width: 40px; height: 2.5rem !important;">
					</a>
					</span>
					<!--<span class="navbar-caption-wrap"><a class="navbar-caption text-black display-2" href="">
					Parth FibroTech</a></span> -->
				</div>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
					<div class="hamburger">
						<span></span>
						<span></span>
						<span></span>
						<span></span>
					</div>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav nav-dropdown" data-app-modern-menu="true">
						<li class="nav-item">
							<a class="nav-link link text-black display-4" href="<?php echo base_url(''); ?>">
							Home
							</a>
						</li>
					<li class="nav-item product-btn product-btn">
							<a class="nav-link link text-black display-4" href='<?php echo base_url('products/'); ?>'>
							Products</a>
							<div class="product-cat" id="scrollBar">
								<ul class="product-list">
									<?php
									foreach($categories as $category)
										{ 
										    $citydata = $this->site_cms_model->get_record_by_id("city", array('id' => $category['city_id']), "id", "DESC", '1', '');
										?>    <!-- echo base_url('product/'.stripslashes($category['slug']).'/' -->
											<li><a href="<?php echo base_url( strtolower($citydata->name)."/".stripslashes($category['slug']).'/'); ?>"><?php echo stripslashes($category['cat_title']); ?></a></li>
											<?php
										}
									?>
								</ul>
							</div>
						</li>
						<li class="nav-item"><a class="nav-link link text-black display-4" href="<?php echo base_url('about-us/'); ?>">About Us</a></li>
						<li class="nav-item"><a class="nav-link link text-black display-4" href="<?php echo base_url('blog/'); ?>">Blogs</a></li>
						<li class="nav-item"><a class="nav-link link text-black display-4" href="<?php echo base_url('carrier/'); ?>">Career</a></li>
						<li class="nav-item">
							<a class="nav-link link text-black display-4" href="<?php echo base_url('contact-us'); ?>">
							Contact</a>
						</li>
						
					</ul>
					<div class="icons-menu">
				             <?php echo form_open_multipart('products');?>
				        	    <input type="text" name="sch_prod" id="sch_prod" class="" size='10' value="<?php if(!(empty($sch))) { echo ucfirst($sch); } ?>">
				        	    <!--<button class="btn btn-primary" type="submit"><span class="mbri-search"></span></button>-->
					            <input type="submit" name="submit" id="submit" value="Search" class="btn btn-sm btn-primary display-4">
				            </form>
				    </div>
				    <div class="icons-menu">
				        <form method="post" action="<?php echo base_url('set_city'); ?>" enctype="multipart/form-data">
				            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
				            <select name="city" onchange="this.form.submit()">
				            <?php 
				            $cities = $this->site_cms_model->allcity();
				            foreach($cities as $city) { ?>
				            <option value="<?php echo $city['id']; ?>" <?php if ($this->session->userdata('cityId') == $city['id']) { echo "selected"; } ?>><?php echo $city['name']; ?></option>
				            <?php } ?>
				            </select>
				        </form>
				    </div>
			       	<!-- <div class="icons-menu">
						<div class="soc-item">
							<a href="<?php echo $social->tw_social ;?>" target="_blank">
							<span class="mbr-iconfont socicon socicon-twitter"></span>
							</a>
						</div>
						<div class="soc-item">
							<a href="<?php echo $social->fb_social ;?>v" target="_blank">
							<span class="mbr-iconfont socicon socicon-facebook"></span>
							</a>
						</div>
						<div class="soc-item">
							<a href="<?php echo $social->ln_social ;?>" target="_blank">
							<span class="mbr-iconfont socicon socicon-linkedin"></span>
							</a>
						</div>
					</div>
						<div class="navbar-buttons mbr-section-btn">
						<a class="btn btn-sm btn-primary display-4" href="" data-toggle="modal" data-target="#exampleModal">
						Get In Touch
						</a>
					</div> 
					<div class="navbar-buttons mbr-section-btn">
						<a class="btn btn-sm btn-primary display-4" href="<?php echo base_url('contact-us'); ?>">
						Get In Touch
						</a>
					</div>-->
				</div>
			</nav>
		</section>
		<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title mbr-bold" style="font-size:2rem" id="exampleModalLabel">Get in touch!</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form action="">
						<div class="modal-body">
							<div class="form-group">
								<label for="exampleFormControlInput1">Full Name</label>
								<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="John Doe">
							</div>
							<div class="form-group">
								<label for="exampleFormControlInput1">Email address</label>
								<input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
							</div>
							<div class="form-group">
								<label for="exampleFormControlInput1">Contact Number</label>
								<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="+91 9999 999 999">
							</div>
							<div class="form-group">
								<label for="exampleFormControlTextarea1">Description</label>
								<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
							</div>
						</div>
						<div class="modal-footer justify-content-center">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		