<?php 
	$b_title = stripslashes($blog['b_title']);
	$data['title'] = $b_title; 
	$data['contact_detail'] = $contact_detail;
	$this->load->view('header_view', $data);
	
	
		
	//$b_author = stripslashes($blog['b_author']);
	
	$b_desc = html_entity_decode(stripslashes($blog['b_desc']));
	
	$originalDate = $blog['b_date'];
	$newDate = date("d-m-Y", strtotime($originalDate));
	
	if($blog['b_image']!='')
	{
		$img = base_url().'/upload/je/'.stripslashes($blog['b_image']);
	}
	else
	{
		$img = base_url().'/assets/site/img/gallery-big-03.jpg';
	}
	
	

						
?>
		<section class="cid-rneHpGJaIG mbr-parallax-background" id="content9-1d">
			<div class="mbr-overlay" style="opacity: 0.6; background-color: rgb(35, 35, 35);">
			</div>
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-12 col-md-12 align-center">
						<h2 class="mbr-section-title align-left mbr-fonts-style mbr-bold mbr-white display-2">
							Blog Detail
						</h2>
						
					</div>
				</div>
			</div>
		</section>
		<section class="cid-rneJOvEByF" id="content7-1h">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-12 col-md-12 align-center">
						<h2 class="mbr-section-title align-center mbr-fonts-style mbr-bold display-2">
							<?php echo $b_title ; ?>
						</h2>
					</div>
				</div>
			</div>
		</section>
		<section class="mbr-section content8 cid-rneKN5uAk1" id="content8-1m">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="media-container-row">
							<div class="media-content">
								<div class="mbr-section-text">
									<p class="mbr-text align-left mb-0 mbr-fonts-style mbr-black display-7">
										<?php echo $b_desc ; ?>
									</p>
								</div>
							</div>
							<div class="mbr-figure" style="width: 80%;">
								<img src="<?php echo $img ; ?>" alt="Mobirise">  
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<section class="mbr-section info5 cid-rneHQ8fMuT" id="info5-1e">
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
		 <?php 
//$data['page'] = 'about';
//$data['contact_detail'] = $contact_detail;
//$this->load->view('footer_view', $data);
$this->load->view('footer_view');