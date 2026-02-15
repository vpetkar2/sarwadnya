<?php 
	
	
	$data['contact_detail'] = $contact_detail;
	$this->load->view('header_view', $data);
?>
		<section class="cid-rneHpGJaIG mbr-parallax-background" id="content9-1d">
			<div class="mbr-overlay" style="opacity: 0.6; background-color: rgb(35, 35, 35);">
			</div>
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-12 col-md-12 align-center">
						<h2 class="mbr-section-title align-left mbr-fonts-style mbr-bold mbr-white display-2">
							Career
						</h2>
						<!--<h3 class="mbr-section-subtitle align-left mbr-fonts-style mbr-white pt-2 display-5">
							Lorem Ipsum Dolor Sit Amet
						</h3>-->
					</div>
				</div>
			</div>
		</section>
		
		<section class="features10 cid-rneHioChsC" id="features10-1a">
			<div class="container">
				<?php if($this->session->flashdata('add_success')) { ?>
					<div class="alert alert-success" id="msg">
						<button type="button" class="close" data-dismiss="alert">x</button>
						<?php echo $this->session->flashdata('add_success');?>
					</div>
				<?php } ?>
				<div class="row justify-content-center align-items-start">
				
				<?php
				if(!empty($carrier_list))
				{
					foreach($carrier_list as $carrier)
					{
						
						$carrier_name = stripslashes($carrier['crr_title']);
						$carrier_pos = stripslashes($carrier['crr_no_of_position']);
						
						$carrier_desc= stripslashes($carrier['crr_desc']);
					
						$url = base_url().'carrier/detail/'.$carrier['crr_id'].'/';
					?>
					<div class="card px-3 py-4 col-md-4">
						<div class="card-wrapper flip-card">
							<div class="card-box">
								<p class="mbr-card-text mbr-bold mbr-fonts-style align-center display-7">
									<?php echo $carrier_name; ?>
								</p>
								<p class="mbr-card-text mbr-bold mbr-fonts-style align-center display-7">
									No Of Position : 
									<?php echo $carrier_pos; ?>
								</p>
								<p class="mbr-card-text mbr-fonts-style align-center display-7">
									<?php echo $carrier_desc; ?>
								</p>
								<div class="mbr-section-btn align-center pt-3">
									<a href="<?php echo $url; ?>" class="btn btn-md btn-info display-4">Apply Now</a>
								</div>
							</div>
						</div>
					</div>
				<?php } } ?>
					
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