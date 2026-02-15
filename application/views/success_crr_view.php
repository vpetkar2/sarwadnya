<?php 
	
	$data['title'] = "Enquiry Success"; 
	$data['contact_detail'] = $contact_detail;
	$this->load->view('header_view', $data);
?>
<!-------------------- new code ---------------------------------- -->
		
		<section class="cid-rneHpGJaIG mbr-parallax-background" id="content9-1d">
			<div class="mbr-overlay" style="opacity: 0.6; background-color: rgb(35, 35, 35);">
			</div>
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-12 col-md-12 align-center">
						<h2 class="mbr-section-title align-left mbr-fonts-style mbr-bold mbr-white display-2">
							Career Enquiry Sent
						</h2>
						<!--<h3 class="mbr-section-subtitle align-left mbr-fonts-style mbr-white pt-2 display-5">
							Lorem Ipsum Dolor Sit Amet
						</h3>-->
					</div>
				</div>
			</div>
		</section>
		<section class="features19 cid-rm0pwICru2" id="features19-1d">
			<div class="container">
				<h2 class="mbr-section-title align-center mbr-bold mbr-fonts-style display-2">
					Career equiry sent successfully<br><br>Our team shall get back to you as soon as possible. 
				</h2>
				
			</div>
		</section>
		
		<!-------------------- new code ---------------------------------- -->
 <?php 
//$data['page'] = 'about';
//$data['contact_detail'] = $contact_detail;
//$this->load->view('footer_view', $data);
$this->load->view('footer_view',$data);