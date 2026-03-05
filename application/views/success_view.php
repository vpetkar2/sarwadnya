<?php 
	
	$data['title'] = "Enquiry Success"; 
	$data['contact_detail'] = $contact_detail;
	$this->load->view('header_view', $data);
?>
<!-------------------- new code ---------------------------------- -->
<!-- Content -->
<div class="page-content bg-white">
	<div class="dlab-bnr-inr overlay-black-middle bg-pt"
		style="background-image:url(<?php echo base_url("assets/newsite/images/background/bg5.jpg"); ?>);">
		<div class="container">
			<div class="dlab-bnr-inr-entry">
				<h1 class="text-white">Enquiry Sent</h1>
			</div>
		</div>
	</div>
	<!-- Contact Form -->
	<div class="section-full content-inner contact-page-9">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<h2 class="m-b15 title">
						<span class="text-primary">
                            Product equiry sent successfully<br><br>Our team shall get back to you with best proposals. 
                        </span>
					</h2>
				</div>
			</div>
		</div>
	</div>
</div>
<!-------------------- new code ---------------------------------- -->
 <?php 
//$data['page'] = 'about';
//$data['contact_detail'] = $contact_detail;
//$this->load->view('footer_view', $data);
$this->load->view('footer_view',$data);