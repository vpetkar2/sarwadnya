<?php $data['title'] = "Gallery"; $data['contact_detail'] = $contact_detail;$this->load->view('header_view', $data);?>
                <!--Breadcrumb section-->
                <div class="breadcrumb_section">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="breadcrumb_inner">
                                    <ul>
                                        <li><a href="#">Home</a></li>
                                        <li><i class="zmdi zmdi-chevron-right"></i></li>
                                        <li>Gallery</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Breadcrumb section end-->
                
                
                <!--shop area start-->
                <div class="blog_area pt-105 pb-100">
                    <div class="container">
                        <div class="row">
						<?php
				if(!empty($albums))
				{
					foreach($albums as $album)
					{
						$query = $this->db->order_by('img_id', 'DESC')->limit(1,0)->get_where('gallery_image', array('gal_id' => $album['gal_id']));
						
						if($query->num_rows() > 0)
						{
							$album_img = $query->row()->gal_image;
							
							$image	= base_url()."upload/gallery/".$album_img;
							
							$path = pathinfo($image);

							$gal_thumb_path = base_url().'/upload/gallery/'.$path['filename'] .'_thumb.'.$path['extension'];
							
							$album_id = $album['gal_id'];
							
							$url = base_url().'gallery/detail/'.$album_id.'/';
						
						
					?>
                            <div class="col-lg-4 col-md-6">
                                <div class="single_blog_post mb-40">
                                    <div class="post_thumbnail">
                                        <a href="<?php echo $url; ?>"><img src="<?php echo $gal_thumb_path;?>" alt="Album Image"></a>
                                    </div>
                                    <div class="post_content_meta">
                                       
                                        <div class="blog_post_desc">
                                            <h2><a href="gallery-details.php"><?php echo  $album['gal_title']; ?></a></h2>
                                            </div>
                                       
                                    </div>
                                </div>
                            </div>
							<?php
						}
					}
				}?>
                           
                        </div>
                        <!--<div class="row pagination_box mt-30">
                            <div class="col-12">
                                <div class="pagination">
                                    <ul>
                                        <li><a href="#"><i class="zmdi zmdi-chevron-left"></i> prev</a></li>
                                        <li><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li class="active">4</li>
                                        <li>..</li>
                                        <li><a href="#">8</a></li>
                                        <li><a href="#">9</a></li>
                                        <li><a href="#">next<i class="zmdi zmdi-chevron-right"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
                <!--shop area end-->
                
                

                <!--<div class="newsletter_section ptb-80">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-5 col-md-12">
                                <div class="newsletter_text">
                                    <h2>Get All Updates</h2>
                                    <p>Sign up our newsleter today. Also get allert for new product.</p>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-12">
                                <div class="newsletter_form">
                                    <form action="#">
                                        <input type="email" placeholder="Type your email">
                                        <button type="submit">Subscribe</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>-->
                <!--Newsletter section end -->
                
                <?php 
$data['page'] = 'about';
$data['contact_detail'] = $contact_detail;
$this->load->view('footer_view', $data);