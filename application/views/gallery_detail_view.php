 <?php  	$data['title'] = $album;$data['contact_detail'] = $contact_detail;$this->load->view('header_view', $data);?>
              <style>
         
         .thumbnail{
                 width: 300px!important;
         }
         
     </style>   
                <!--Breadcrumb section-->
                <div class="breadcrumb_section">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="breadcrumb_inner">
                                    <ul>
                                        <li><a href="<?php echo base_url('');?>">Home</a></li>
                                        <li><i class="zmdi zmdi-chevron-right"></i></li>
                                        <li><a href="<?php echo base_url('gallery/');?>">Gallery</a></li>
										<li><i class="zmdi zmdi-chevron-right"></i></li>
                                        <li><?php echo $album; ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Breadcrumb section end-->
                
                <!--product Details Inner-->
      

<div class="container">
	<div class="row">
		<div class="row">
		<?php
				if(!empty($gallery))
				{
					foreach($gallery as $images)
					{
						$image	= base_url()."upload/gallery/".stripslashes($images['gal_image']);
						$path = pathinfo($image);

						$gal_thumb_path = base_url().'/upload/gallery/'.$path['filename'] .'_thumb.'.$path['extension'];
					?>
						<div class="col-lg-3 col-md-4 col-xs-6 thumb">
							<a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title=""
							   data-image="<?php echo $gal_thumb_path;?>"
							   data-target="#image-gallery">
								<img class="img-thumbnail"
									 src="<?php echo $gal_thumb_path."?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260";?>"
									 alt="Another alt text">
							</a>
						</div>
				<?php } } 
				?>
            
        </div>


      
	</div>
</div>
               
                
<?php 
$data['page'] = 'about';
$data['contact_detail'] = $contact_detail;
$this->load->view('footer_view', $data);
?>

<div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<!--<h4 class="modal-title" id="image-gallery-title"></h4>-->
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>
				</button>
			</div>
			<div class="modal-body">
				<img id="image-gallery-image" class="img-responsive col-md-12" src="">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary float-left" id="show-previous-image"><i class="fa fa-arrow-left"></i>
				</button>

				<button type="button" id="show-next-image" class="btn btn-secondary float-right"><i class="fa fa-arrow-right"></i>
				</button>
			</div>
		</div>
	</div>
</div>





