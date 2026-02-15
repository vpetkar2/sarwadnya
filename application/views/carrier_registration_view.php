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
							Career Details
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
			<?php echo form_open_multipart('carrier/submitPost');?>
				<?php if(!empty($add_error))
				{?>
				<div class="alert alert-warning" id="msg">
						<button type="button" class="close" data-dismiss="alert">x</button><?php echo $add_error;?></div>
				<?php
				}?>
				<?php if($this->session->flashdata('add_success')) { ?>
					<div class="alert alert-success" id="msg">
						<button type="button" class="close" data-dismiss="alert">x</button>
						<?php echo $this->session->flashdata('add_success');?>
					</div>
				<?php } ?>
				<?php if($this->session->flashdata('error')) { ?>
					<div class="alert alert-warning">
						<button type="button" class="close" data-dismiss="alert">x</button>
						<?php echo $this->session->flashdata('error');?>
					</div>
				<?php } ?>
				<div class="row justify-content-center align-items-start">
					<div class="dragArea row">
						<div data-for="carri_title" class="col-lg-6  mb-3 form-group">
							<input type="text" name="title" placeholder="Enter Name*" data-form-field="carri_title" class="form-control input display-7" required="required" id="title-form3-1s">
						</div>
						<div data-for="carri_no_of_position" class="col-lg-6  mb-3 form-group">
							<input type="email" required="required" name="email" placeholder="Email ID" data-form-field=" carri_no_of_position" class="form-control input display-7" id="carri_no_of_position-form3">
						</div>
						<div data-for="carri_desc" class="col-lg-6  mb-3 form-group">
							<input type="text" name="mobile" placeholder="Telephone No / Mobile No  *" data-form-field="carri_desc" class="form-control input display-7" required="required" id="carri_desc-form3-1s">
						</div>
						<div data-for="carri_title" class="col-lg-6  mb-3 form-group">
						<select data-form-field="carri_title" class="form-control input display-7" required="required" id="title-form3-1s" name="crrpost">
						<option value="" >Select Post</option>
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
							<option value="<?php echo $carrier['crr_id']; ?>" <?php if($carrier['crr_id'] == $ids) { ?>selected <?php } ?>><?php echo $carrier_name; ?></option>
						<?php } } ?>
						</select>
							
						</div>
						<div data-for="carri_no_of_position" class="col-lg-12  mb-3 form-group">
							<textarea name="message" placeholder="Comment" data-form-field=" carri_no_of_position" class="form-control input display-7" id="carri_no_of_position-form3"></textarea>
						</div>
						<div data-for="carri_desc" class="col-lg-4  mb-3 form-group"></div>
						<div data-for="carri_desc" class="col-lg-4  mb-3 form-group">
							<input type="text" value="OR" class="form-control input display-7 align-center" readonly>
						</div>
						<div data-for="carri_desc" class="col-lg-4  mb-3 form-group"></div>
						
						<div data-for="carri_desc" class="col-lg-12  mb-3 form-group">
							<input type="file" name="resume" data-form-field="carri_desc" class="form-control input display-7"  id="carri_desc-form3-1s">
						</div>
						
						<div class="col-lg-3  mb-3 form-group">
							<?  echo $captcha_img['image'];?>
						</div>
						<div class="col-lg-4  mb-3 form-group">
							<input type="text" class="form-control input display-7" name="captcha" id="captcha"  placeholder="Enter Beside security Code" required="required"/>
						</div>
									
						<div class="col-md-12 input-group-btn  mt-2 align-left">
							<button type="submit" class="btn btn-form btn-bgr btn-primary display-4">Apply now</button>
						</div>
							
							
						</div>
					</div>
				</div>
				</form>
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