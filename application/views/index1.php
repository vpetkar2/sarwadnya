<?php
include('inc/header.php');
?>
                <!-- slider-area-start -->
                <div class="slider_wrapper">
                    <div class="slider-active owl-carousel">
                        <!--Single Slide-->
                        
                        	<?php //fecth the data of category for show on admin panel//
									$stmt201 = $db_con->prepare("SELECT * FROM `slider_tb` order by id desc");
									$stmt201->execute();
								$count201 = $stmt201->rowCount();    
								$i=1;
								//Fetching rows
								while($row201=$stmt201->fetch(PDO::FETCH_ASSOC))
							{
								
								//Extract data
									extract($row201);
									
									$id=$id;
									$title=$title;
									$subtitle=$subtitle;
									$description=$description;
									 $image=$image;
								    
									
									?>
                        <div class="single__slider bg-opacity" style="background-image:url(assets/img/slide/1.jpg)">
                            <div class="container">
                                <div class="row align-items-center">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="slider-content slider-text-animation">
                                            <h1><?php echo $title;?></h1>
                                            <h2><?php echo $subtitle;?> </h2>
                                            <p><?php echo $description;?> . </p>
                                            <a href="#">Buy Now</a>									
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="slider_layer_image">
                                            <img src="<?php echo $image;?>" alt="">
                                        </div>
                                    </div>
                                </div>	
                            </div>
                        </div>
                        
                     
                        <!--Single slide end--> 
                           <?php
                        
							}
							
							?>
                        
                    </div>
                </div>
                <!-- slider-area-end -->
           
               <!--Banner area start-->
                <div class="banner_area pt-50">
                    <div class="banner_area_inner d-flex">
                        <div class="col_4">
                            <div class="single_banner">
                                <a href="#"><img src="assets/img/banner/1.jpg" alt=""></a>
                            </div>
                        </div>
                        <div class="col_4">
                            <div class="single_banner">
                                <a href="#"><img src="assets/img/banner/2.jpg" alt=""></a>
                            </div>
                        </div>
                        <div class="col_4">
                            <div class="single_banner">
                                <a href="#"><img src="assets/img/banner/3.jpg" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
               <!--Banner area end-->
               
               
                <!--Hot Deal product start-->
                <div class="hot_details_product pt-110 pb-107">
                    <div class="container">
                        <div class="row align-items-end">
                            <div class="col-lg-3 col-md-3 col-12">
                                <div class="section_title">
                                    <h2>Hot Deals</h2>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9">
                                <div class="nav product_tab_menu justify-content-end" role="tablist">
                                    <a class="active" href="#hot_all" data-toggle="tab" role="tab" aria-selected="true" aria-controls="hot_all">All</a>
                                    <a href="#hot_bike" data-toggle="tab" role="tab" aria-selected="false" aria-controls="hot_bike">Bike</a>
                                    <a href="#hot_tiar" data-toggle="tab" role="tab" aria-selected="false" aria-controls="hot_tiar">Tiar</a>
                                    <a href="#hot_parts" data-toggle="tab" role="tab" aria-selected="false" aria-controls="hot_parts">Parts</a>
                                    <a href="#hot_wheel" data-toggle="tab" role="tab" aria-selected="false" aria-controls="hot_wheel">Wheel</a>
                                    <a href="#hot_light" data-toggle="tab" role="tab" aria-selected="false" aria-controls="hot_light">Light</a>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-60">
                            <div class="col-lg-9 col-md-12 ">
                                <div class="tab-content">
                                    <div class="tab-pane active show fade" id="hot_all" role="tabpanel">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6">
                                                <div class="single__product">
                                                    <div class="produc_thumb">
                                                        <a href="product-details.php"><img src="assets/img/product/1.png" alt=""></a>
                                                    </div>
                                                    <div class="product_hover">
                                                        <div class="product_action">
                                                            <a href="#" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                            <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                            <a href="#" title="Compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                                        </div>
                                                        <div class="product__desc">
                                                            <h3><a href="product-details.php">Gasoline Scooter A9</a></h3>
                                                            <div class="price_amount">
                                                                <span class="current_price">$2999.99</span>
                                                                <span class="discount_price">-08%</span>
                                                                <span class="old_price">$3700.00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="single__product">
                                                    <div class="produc_thumb">
                                                        <a href="product-details.php"><img src="assets/img/product/2.png" alt=""></a>
                                                    </div>
                                                    <div class="product_hover">
                                                        <div class="product_action">
                                                            <a href="#" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                            <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                            <a href="#" title="Compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                                        </div>
                                                        <div class="product__desc">
                                                            <h3><a href="product-details.php">Alloy Shimano z3</a></h3>
                                                            <div class="price_amount">
                                                                <span class="current_price">$2999.99</span>
                                                                <span class="discount_price">-08%</span>
                                                                <span class="old_price">$3700.00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="single__product">
                                                    <div class="produc_thumb">
                                                        <a href="product-details.php"><img src="assets/img/product/3.png" alt=""></a>
                                                    </div>
                                                    <div class="product_hover">
                                                        <div class="product_action">
                                                            <a href="#" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                            <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                            <a href="#" title="Compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                                        </div>
                                                        <div class="product__desc">
                                                            <h3><a href="product-details.php">Full Slev Shirt</a></h3>
                                                            <div class="price_amount">
                                                                <span class="current_price">$2999.99</span>
                                                                <span class="discount_price">-08%</span>
                                                                <span class="old_price">$3700.00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="single__product">
                                                    <div class="produc_thumb">
                                                        <a href="product-details.php"><img src="assets/img/product/4.png" alt=""></a>
                                                    </div>
                                                    <div class="product_hover">
                                                        <div class="product_action">
                                                            <a href="#" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                            <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                            <a href="#" title="Compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                                        </div>
                                                        <div class="product__desc">
                                                            <h3><a href="product-details.php">Soffer Pro x33</a></h3>
                                                            <div class="price_amount">
                                                                <span class="current_price">$2999.99</span>
                                                                <span class="discount_price">-08%</span>
                                                                <span class="old_price">$3700.00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="single__product">
                                                    <div class="produc_thumb">
                                                        <a href="product-details.php"><img src="assets/img/product/5.png" alt=""></a>
                                                    </div>
                                                    <div class="product_hover">
                                                        <div class="product_action">
                                                            <a href="#" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                            <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                            <a href="#" title="Compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                                        </div>
                                                        <div class="product__desc">
                                                            <h3><a href="product-details.php">Full Slev Hudy</a></h3>
                                                            <div class="price_amount">
                                                                <span class="current_price">$2999.99</span>
                                                                <span class="discount_price">-08%</span>
                                                                <span class="old_price">$3700.00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="single__product">
                                                    <div class="produc_thumb">
                                                        <a href="product-details.php"><img src="assets/img/product/6.png" alt=""></a>
                                                    </div>
                                                    <div class="product_hover">
                                                        <div class="product_action">
                                                            <a href="#" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                            <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                            <a href="#" title="Compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                                        </div>
                                                        <div class="product__desc">
                                                            <h3><a href="product-details.php">Alloy Shimano z3</a></h3>
                                                            <div class="price_amount">
                                                                <span class="current_price">$2999.99</span>
                                                                <span class="discount_price">-08%</span>
                                                                <span class="old_price">$3700.00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="hot_bike" role="tabpanel">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6">
                                                <div class="single__product">
                                                    <div class="produc_thumb">
                                                        <a href="product-details.php"><img src="assets/img/product/1.png" alt=""></a>
                                                    </div>
                                                    <div class="product_hover">
                                                        <div class="product_action">
                                                            <a href="#" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                            <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                            <a href="#" title="Compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                                        </div>
                                                        <div class="product__desc">
                                                            <h3><a href="product-details.php">Tandem Beach Cruiser</a></h3>
                                                            <div class="price_amount">
                                                                <span class="current_price">$2999.99</span>
                                                                <span class="discount_price">-08%</span>
                                                                <span class="old_price">$3700.00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="single__product">
                                                    <div class="produc_thumb">
                                                        <a href="product-details.php"><img src="assets/img/product/2.png" alt=""></a>
                                                    </div>
                                                    <div class="product_hover">
                                                        <div class="product_action">
                                                            <a href="#" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                            <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                            <a href="#" title="Compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                                        </div>
                                                        <div class="product__desc">
                                                            <h3><a href="product-details.php">Soffer Pro x33</a></h3>
                                                            <div class="price_amount">
                                                                <span class="current_price">$2999.99</span>
                                                                <span class="discount_price">-08%</span>
                                                                <span class="old_price">$3700.00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="single__product">
                                                    <div class="produc_thumb">
                                                        <a href="product-details.php"><img src="assets/img/product/3.png" alt=""></a>
                                                    </div>
                                                    <div class="product_hover">
                                                        <div class="product_action">
                                                            <a href="#" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                            <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                            <a href="#" title="Compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                                        </div>
                                                        <div class="product__desc">
                                                            <h3><a href="product-details.php">Soffer Pro x33</a></h3>
                                                            <div class="price_amount">
                                                                <span class="current_price">$2999.99</span>
                                                                <span class="discount_price">-08%</span>
                                                                <span class="old_price">$3700.00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="single__product">
                                                    <div class="produc_thumb">
                                                        <a href="product-details.php"><img src="assets/img/product/4.png" alt=""></a>
                                                    </div>
                                                    <div class="product_hover">
                                                        <div class="product_action">
                                                            <a href="#" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                            <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                            <a href="#" title="Compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                                        </div>
                                                        <div class="product__desc">
                                                            <h3><a href="product-details.php">Soffer Pro x33</a></h3>
                                                            <div class="price_amount">
                                                                <span class="current_price">$2999.99</span>
                                                                <span class="discount_price">-08%</span>
                                                                <span class="old_price">$3700.00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="single__product">
                                                    <div class="produc_thumb">
                                                        <a href="product-details.php"><img src="assets/img/product/5.png" alt=""></a>
                                                    </div>
                                                    <div class="product_hover">
                                                        <div class="product_action">
                                                            <a href="#" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                            <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                            <a href="#" title="Compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                                        </div>
                                                        <div class="product__desc">
                                                            <h3><a href="product-details.php">Soffer Pro x33</a></h3>
                                                            <div class="price_amount">
                                                                <span class="current_price">$2999.99</span>
                                                                <span class="discount_price">-08%</span>
                                                                <span class="old_price">$3700.00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="single__product">
                                                    <div class="produc_thumb">
                                                        <a href="product-details.php"><img src="assets/img/product/6.png" alt=""></a>
                                                    </div>
                                                    <div class="product_hover">
                                                        <div class="product_action">
                                                            <a href="#" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                            <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                            <a href="#" title="Compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                                        </div>
                                                        <div class="product__desc">
                                                            <h3><a href="product-details.php">Soffer Pro x33</a></h3>
                                                            <div class="price_amount">
                                                                <span class="current_price">$2999.99</span>
                                                                <span class="discount_price">-08%</span>
                                                                <span class="old_price">$3700.00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="hot_tiar" role="tabpanel">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6">
                                                <div class="single__product">
                                                    <div class="produc_thumb">
                                                        <a href="product-details.php"><img src="assets/img/product/1.png" alt=""></a>
                                                    </div>
                                                    <div class="product_hover">
                                                        <div class="product_action">
                                                            <a href="#" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                            <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                            <a href="#" title="Compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                                        </div>
                                                        <div class="product__desc">
                                                            <h3><a href="product-details.php">Soffer Pro x33</a></h3>
                                                            <div class="price_amount">
                                                                <span class="current_price">$2999.99</span>
                                                                <span class="discount_price">-08%</span>
                                                                <span class="old_price">$3700.00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="single__product">
                                                    <div class="produc_thumb">
                                                        <a href="product-details.php"><img src="assets/img/product/2.png" alt=""></a>
                                                    </div>
                                                    <div class="product_hover">
                                                        <div class="product_action">
                                                            <a href="#" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                            <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                            <a href="#" title="Compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                                        </div>
                                                        <div class="product__desc">
                                                            <h3><a href="product-details.php">Soffer Pro x33</a></h3>
                                                            <div class="price_amount">
                                                                <span class="current_price">$2999.99</span>
                                                                <span class="discount_price">-08%</span>
                                                                <span class="old_price">$3700.00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="single__product">
                                                    <div class="produc_thumb">
                                                        <a href="product-details.php"><img src="assets/img/product/3.png" alt=""></a>
                                                    </div>
                                                    <div class="product_hover">
                                                        <div class="product_action">
                                                            <a href="#" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                            <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                            <a href="#" title="Compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                                        </div>
                                                        <div class="product__desc">
                                                            <h3><a href="product-details.php">Soffer Pro x33</a></h3>
                                                            <div class="price_amount">
                                                                <span class="current_price">$2999.99</span>
                                                                <span class="discount_price">-08%</span>
                                                                <span class="old_price">$3700.00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="single__product">
                                                    <div class="produc_thumb">
                                                        <a href="product-details.php"><img src="assets/img/product/4.png" alt=""></a>
                                                    </div>
                                                    <div class="product_hover">
                                                        <div class="product_action">
                                                            <a href="#" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                            <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                            <a href="#" title="Compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                                        </div>
                                                        <div class="product__desc">
                                                            <h3><a href="product-details.php">Soffer Pro x33</a></h3>
                                                            <div class="price_amount">
                                                                <span class="current_price">$2999.99</span>
                                                                <span class="discount_price">-08%</span>
                                                                <span class="old_price">$3700.00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="single__product">
                                                    <div class="produc_thumb">
                                                        <a href="product-details.php"><img src="assets/img/product/5.png" alt=""></a>
                                                    </div>
                                                    <div class="product_hover">
                                                        <div class="product_action">
                                                            <a href="#" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                            <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                            <a href="#" title="Compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                                        </div>
                                                        <div class="product__desc">
                                                            <h3><a href="product-details.php">Soffer Pro x33</a></h3>
                                                            <div class="price_amount">
                                                                <span class="current_price">$2999.99</span>
                                                                <span class="discount_price">-08%</span>
                                                                <span class="old_price">$3700.00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="single__product">
                                                    <div class="produc_thumb">
                                                        <a href="product-details.php"><img src="assets/img/product/6.png" alt=""></a>
                                                    </div>
                                                    <div class="product_hover">
                                                        <div class="product_action">
                                                            <a href="#" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                            <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                            <a href="#" title="Compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                                        </div>
                                                        <div class="product__desc">
                                                            <h3><a href="product-details.php">Soffer Pro x33</a></h3>
                                                            <div class="price_amount">
                                                                <span class="current_price">$2999.99</span>
                                                                <span class="discount_price">-08%</span>
                                                                <span class="old_price">$3700.00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="hot_parts" role="tabpanel">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6">
                                                <div class="single__product">
                                                    <div class="produc_thumb">
                                                        <a href="product-details.php"><img src="assets/img/product/1.png" alt=""></a>
                                                    </div>
                                                    <div class="product_hover">
                                                        <div class="product_action">
                                                            <a href="#" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                            <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                            <a href="#" title="Compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                                        </div>
                                                        <div class="product__desc">
                                                            <h3><a href="product-details.php">Soffer Pro x33</a></h3>
                                                            <div class="price_amount">
                                                                <span class="current_price">$2999.99</span>
                                                                <span class="discount_price">-08%</span>
                                                                <span class="old_price">$3700.00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="single__product">
                                                    <div class="produc_thumb">
                                                        <a href="product-details.php"><img src="assets/img/product/2.png" alt=""></a>
                                                    </div>
                                                    <div class="product_hover">
                                                        <div class="product_action">
                                                            <a href="#" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                            <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                            <a href="#" title="Compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                                        </div>
                                                        <div class="product__desc">
                                                            <h3><a href="product-details.php">Soffer Pro x33</a></h3>
                                                            <div class="price_amount">
                                                                <span class="current_price">$2999.99</span>
                                                                <span class="discount_price">-08%</span>
                                                                <span class="old_price">$3700.00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="single__product">
                                                    <div class="produc_thumb">
                                                        <a href="product-details.php"><img src="assets/img/product/3.png" alt=""></a>
                                                    </div>
                                                    <div class="product_hover">
                                                        <div class="product_action">
                                                            <a href="#" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                            <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                            <a href="#" title="Compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                                        </div>
                                                        <div class="product__desc">
                                                            <h3><a href="product-details.php">Soffer Pro x33</a></h3>
                                                            <div class="price_amount">
                                                                <span class="current_price">$2999.99</span>
                                                                <span class="discount_price">-08%</span>
                                                                <span class="old_price">$3700.00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="single__product">
                                                    <div class="produc_thumb">
                                                        <a href="product-details.php"><img src="assets/img/product/4.png" alt=""></a>
                                                    </div>
                                                    <div class="product_hover">
                                                        <div class="product_action">
                                                            <a href="#" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                            <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                            <a href="#" title="Compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                                        </div>
                                                        <div class="product__desc">
                                                            <h3><a href="product-details.php">Soffer Pro x33</a></h3>
                                                            <div class="price_amount">
                                                                <span class="current_price">$2999.99</span>
                                                                <span class="discount_price">-08%</span>
                                                                <span class="old_price">$3700.00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="single__product">
                                                    <div class="produc_thumb">
                                                        <a href="product-details.php"><img src="assets/img/product/5.png" alt=""></a>
                                                    </div>
                                                    <div class="product_hover">
                                                        <div class="product_action">
                                                            <a href="#" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                            <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                            <a href="#" title="Compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                                        </div>
                                                        <div class="product__desc">
                                                            <h3><a href="product-details.php">Soffer Pro x33</a></h3>
                                                            <div class="price_amount">
                                                                <span class="current_price">$2999.99</span>
                                                                <span class="discount_price">-08%</span>
                                                                <span class="old_price">$3700.00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="single__product">
                                                    <div class="produc_thumb">
                                                        <a href="product-details.php"><img src="assets/img/product/6.png" alt=""></a>
                                                    </div>
                                                    <div class="product_hover">
                                                        <div class="product_action">
                                                            <a href="#" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                            <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                            <a href="#" title="Compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                                        </div>
                                                        <div class="product__desc">
                                                            <h3><a href="product-details.php">Soffer Pro x33</a></h3>
                                                            <div class="price_amount">
                                                                <span class="current_price">$2999.99</span>
                                                                <span class="discount_price">-08%</span>
                                                                <span class="old_price">$3700.00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="hot_wheel" role="tabpanel">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6">
                                                <div class="single__product">
                                                    <div class="produc_thumb">
                                                        <a href="product-details.php"><img src="assets/img/product/1.png" alt=""></a>
                                                    </div>
                                                    <div class="product_hover">
                                                        <div class="product_action">
                                                            <a href="#" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                            <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                            <a href="#" title="Compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                                        </div>
                                                        <div class="product__desc">
                                                            <h3><a href="product-details.php">Soffer Pro x33</a></h3>
                                                            <div class="price_amount">
                                                                <span class="current_price">$2999.99</span>
                                                                <span class="discount_price">-08%</span>
                                                                <span class="old_price">$3700.00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="single__product">
                                                    <div class="produc_thumb">
                                                        <a href="product-details.php"><img src="assets/img/product/2.png" alt=""></a>
                                                    </div>
                                                    <div class="product_hover">
                                                        <div class="product_action">
                                                            <a href="#" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                            <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                            <a href="#" title="Compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                                        </div>
                                                        <div class="product__desc">
                                                            <h3><a href="product-details.php">Soffer Pro x33</a></h3>
                                                            <div class="price_amount">
                                                                <span class="current_price">$2999.99</span>
                                                                <span class="discount_price">-08%</span>
                                                                <span class="old_price">$3700.00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="single__product">
                                                    <div class="produc_thumb">
                                                        <a href="product-details.php"><img src="assets/img/product/3.png" alt=""></a>
                                                    </div>
                                                    <div class="product_hover">
                                                        <div class="product_action">
                                                            <a href="#" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                            <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                            <a href="#" title="Compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                                        </div>
                                                        <div class="product__desc">
                                                            <h3><a href="product-details.php">Soffer Pro x33</a></h3>
                                                            <div class="price_amount">
                                                                <span class="current_price">$2999.99</span>
                                                                <span class="discount_price">-08%</span>
                                                                <span class="old_price">$3700.00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="single__product">
                                                    <div class="produc_thumb">
                                                        <a href="product-details.php"><img src="assets/img/product/4.png" alt=""></a>
                                                    </div>
                                                    <div class="product_hover">
                                                        <div class="product_action">
                                                            <a href="#" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                            <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                            <a href="#" title="Compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                                        </div>
                                                        <div class="product__desc">
                                                            <h3><a href="product-details.php">Soffer Pro x33</a></h3>
                                                            <div class="price_amount">
                                                                <span class="current_price">$2999.99</span>
                                                                <span class="discount_price">-08%</span>
                                                                <span class="old_price">$3700.00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="single__product">
                                                    <div class="produc_thumb">
                                                        <a href="product-details.php"><img src="assets/img/product/5.png" alt=""></a>
                                                    </div>
                                                    <div class="product_hover">
                                                        <div class="product_action">
                                                            <a href="#" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                            <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                            <a href="#" title="Compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                                        </div>
                                                        <div class="product__desc">
                                                            <h3><a href="product-details.php">Soffer Pro x33</a></h3>
                                                            <div class="price_amount">
                                                                <span class="current_price">$2999.99</span>
                                                                <span class="discount_price">-08%</span>
                                                                <span class="old_price">$3700.00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="single__product">
                                                    <div class="produc_thumb">
                                                        <a href="product-details.php"><img src="assets/img/product/6.png" alt=""></a>
                                                    </div>
                                                    <div class="product_hover">
                                                        <div class="product_action">
                                                            <a href="#" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                            <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                            <a href="#" title="Compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                                        </div>
                                                        <div class="product__desc">
                                                            <h3><a href="product-details.php">Soffer Pro x33</a></h3>
                                                            <div class="price_amount">
                                                                <span class="current_price">$2999.99</span>
                                                                <span class="discount_price">-08%</span>
                                                                <span class="old_price">$3700.00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="hot_light" role="tabpanel">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6">
                                                <div class="single__product">
                                                    <div class="produc_thumb">
                                                        <a href="product-details.php"><img src="assets/img/product/1.png" alt=""></a>
                                                    </div>
                                                    <div class="product_hover">
                                                        <div class="product_action">
                                                            <a href="#" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                            <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                            <a href="#" title="Compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                                        </div>
                                                        <div class="product__desc">
                                                            <h3><a href="product-details.php">Soffer Pro x33</a></h3>
                                                            <div class="price_amount">
                                                                <span class="current_price">$2999.99</span>
                                                                <span class="discount_price">-08%</span>
                                                                <span class="old_price">$3700.00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="single__product">
                                                    <div class="produc_thumb">
                                                        <a href="product-details.php"><img src="assets/img/product/2.png" alt=""></a>
                                                    </div>
                                                    <div class="product_hover">
                                                        <div class="product_action">
                                                            <a href="#" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                            <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                            <a href="#" title="Compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                                        </div>
                                                        <div class="product__desc">
                                                            <h3><a href="product-details.php">Soffer Pro x33</a></h3>
                                                            <div class="price_amount">
                                                                <span class="current_price">$2999.99</span>
                                                                <span class="discount_price">-08%</span>
                                                                <span class="old_price">$3700.00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="single__product">
                                                    <div class="produc_thumb">
                                                        <a href="product-details.php"><img src="assets/img/product/3.png" alt=""></a>
                                                    </div>
                                                    <div class="product_hover">
                                                        <div class="product_action">
                                                            <a href="#" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                            <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                            <a href="#" title="Compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                                        </div>
                                                        <div class="product__desc">
                                                            <h3><a href="product-details.php">Soffer Pro x33</a></h3>
                                                            <div class="price_amount">
                                                                <span class="current_price">$2999.99</span>
                                                                <span class="discount_price">-08%</span>
                                                                <span class="old_price">$3700.00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="single__product">
                                                    <div class="produc_thumb">
                                                        <a href="product-details.php"><img src="assets/img/product/4.png" alt=""></a>
                                                    </div>
                                                    <div class="product_hover">
                                                        <div class="product_action">
                                                            <a href="#" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                            <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                            <a href="#" title="Compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                                        </div>
                                                        <div class="product__desc">
                                                            <h3><a href="product-details.php">Soffer Pro x33</a></h3>
                                                            <div class="price_amount">
                                                                <span class="current_price">$2999.99</span>
                                                                <span class="discount_price">-08%</span>
                                                                <span class="old_price">$3700.00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="single__product">
                                                    <div class="produc_thumb">
                                                        <a href="product-details.php"><img src="assets/img/product/5.png" alt=""></a>
                                                    </div>
                                                    <div class="product_hover">
                                                        <div class="product_action">
                                                            <a href="#" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                            <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                            <a href="#" title="Compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                                        </div>
                                                        <div class="product__desc">
                                                            <h3><a href="product-details.php">Soffer Pro x33</a></h3>
                                                            <div class="price_amount">
                                                                <span class="current_price">$2999.99</span>
                                                                <span class="discount_price">-08%</span>
                                                                <span class="old_price">$3700.00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="single__product">
                                                    <div class="produc_thumb">
                                                        <a href="product-details.php"><img src="assets/img/product/6.png" alt=""></a>
                                                    </div>
                                                    <div class="product_hover">
                                                        <div class="product_action">
                                                            <a href="#" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                            <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                            <a href="#" title="Compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                                        </div>
                                                        <div class="product__desc">
                                                            <h3><a href="product-details.php">Soffer Pro x33</a></h3>
                                                            <div class="price_amount">
                                                                <span class="current_price">$2999.99</span>
                                                                <span class="discount_price">-08%</span>
                                                                <span class="old_price">$3700.00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-lg-3 col-md-12">
                                <div class="single_banner long_hot_detals d-lg-none">
                                    <a href="#"><img src="assets/img/banner/banner_tab_1.jpg" alt="Shop Banner"></a>
                                </div>
                                <div class="single_banner long_hot_detals d-none d-lg-block">
                                    <a href="#"><img src="assets/img/banner/4.jpg" alt="Shop Banner"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Hot Deal product end-->  
                
                                          
                <!--Hot Deal product start-->
                <div class="hot_details_product pb-110">
                    <div class="container">
                        <div class="row align-items-end">
                            <div class="col-lg-3 col-md-3 col-12">
                                <div class="section_title">
                                    <h2>Best Product</h2>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9">
                                <div class="nav product_tab_menu justify-content-end" role="tablist">
                                    <a class="active" href="#best_all" data-toggle="tab" role="tab" aria-selected="true" aria-controls="best_all">All</a>
                                    <a href="#best_bike" data-toggle="tab" role="tab" aria-selected="false" aria-controls="best_bike">Bike</a>
                                    <a href="#best_tiar" data-toggle="tab" role="tab" aria-selected="false" aria-controls="best_tiar">Tiar</a>
                                    <a href="#best_parts" data-toggle="tab" role="tab" aria-selected="false" aria-controls="best_parts">Parts</a>
                                    <a href="#best_wheel" data-toggle="tab" role="tab" aria-selected="false" aria-controls="best_wheel">Wheel</a>
                                    <a href="#best_light" data-toggle="tab" role="tab" aria-selected="false" aria-controls="best_light">Light</a>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-60">
                            <div class="col-lg-9 col-md-12 ">
                                <div class="tab-content">
                                    <div class="tab-pane active show fade" id="best_all" role="tabpanel">
                                        <div class="row carousel_product owl-carousel">
                                            <div class="col-lg-4 col-md-6">
                                                <div class="single__product">
                                                    <div class="produc_thumb">
                                                        <a href="product-details.php"><img src="assets/img/product/1.png" alt=""></a>
                                                    </div>
                                                    <div class="product_hover">
                                                        <div class="product_action">
                                                            <a href="#" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                            <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                            <a href="#" title="Compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                                        </div>
                                                        <div class="product__desc">
                                                            <h3><a href="product-details.php">Soffer Pro x33</a></h3>
                                                            <div class="price_amount">
                                                                <span class="current_price">$2999.99</span>
                                                                <span class="discount_price">-08%</span>
                                                                <span class="old_price">$3700.00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="single__product">
                                                    <div class="produc_thumb">
                                                        <a href="product-details.php"><img src="assets/img/product/2.png" alt=""></a>
                                                    </div>
                                                    <div class="product_hover">
                                                        <div class="product_action">
                                                            <a href="#" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                            <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                            <a href="#" title="Compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                                        </div>
                                                        <div class="product__desc">
                                                            <h3><a href="product-details.php">Soffer Pro x33</a></h3>
                                                            <div class="price_amount">
                                                                <span class="current_price">$2999.99</span>
                                                                <span class="discount_price">-08%</span>
                                                                <span class="old_price">$3700.00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="single__product">
                                                    <div class="produc_thumb">
                                                        <a href="product-details.php"><img src="assets/img/product/3.png" alt=""></a>
                                                    </div>
                                                    <div class="product_hover">
                                                        <div class="product_action">
                                                            <a href="#" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                            <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                            <a href="#" title="Compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                                        </div>
                                                        <div class="product__desc">
                                                            <h3><a href="product-details.php">Soffer Pro x33</a></h3>
                                                            <div class="price_amount">
                                                                <span class="current_price">$2999.99</span>
                                                                <span class="discount_price">-08%</span>
                                                                <span class="old_price">$3700.00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="best_bike" role="tabpanel">
                                        <div class="row carousel_product owl-carousel">
                                            <div class="col-lg-4 col-md-6">
                                                <div class="single__product">
                                                    <div class="produc_thumb">
                                                        <a href="product-details.php"><img src="assets/img/product/1.png" alt=""></a>
                                                    </div>
                                                    <div class="product_hover">
                                                        <div class="product_action">
                                                            <a href="#" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                            <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                            <a href="#" title="Compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                                        </div>
                                                        <div class="product__desc">
                                                            <h3><a href="product-details.php">Soffer Pro x33</a></h3>
                                                            <div class="price_amount">
                                                                <span class="current_price">$2999.99</span>
                                                                <span class="discount_price">-08%</span>
                                                                <span class="old_price">$3700.00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="single__product">
                                                    <div class="produc_thumb">
                                                        <a href="product-details.php"><img src="assets/img/product/2.png" alt=""></a>
                                                    </div>
                                                    <div class="product_hover">
                                                        <div class="product_action">
                                                            <a href="#" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                            <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                            <a href="#" title="Compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                                        </div>
                                                        <div class="product__desc">
                                                            <h3><a href="product-details.php">Soffer Pro x33</a></h3>
                                                            <div class="price_amount">
                                                                <span class="current_price">$2999.99</span>
                                                                <span class="discount_price">-08%</span>
                                                                <span class="old_price">$3700.00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="single__product">
                                                    <div class="produc_thumb">
                                                        <a href="product-details.php"><img src="assets/img/product/4.png" alt=""></a>
                                                    </div>
                                                    <div class="product_hover">
                                                        <div class="product_action">
                                                            <a href="#" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                            <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                            <a href="#" title="Compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                                        </div>
                                                        <div class="product__desc">
                                                            <h3><a href="product-details.php">Soffer Pro x33</a></h3>
                                                            <div class="price_amount">
                                                                <span class="current_price">$2999.99</span>
                                                                <span class="discount_price">-08%</span>
                                                                <span class="old_price">$3700.00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="best_tiar" role="tabpanel">
                                        <div class="row carousel_product owl-carousel">
                                            <div class="col-lg-4 col-md-6">
                                                <div class="single__product">
                                                    <div class="produc_thumb">
                                                        <a href="product-details.php"><img src="assets/img/product/1.png" alt=""></a>
                                                    </div>
                                                    <div class="product_hover">
                                                        <div class="product_action">
                                                            <a href="#" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                            <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                            <a href="#" title="Compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                                        </div>
                                                        <div class="product__desc">
                                                            <h3><a href="product-details.php">Soffer Pro x33</a></h3>
                                                            <div class="price_amount">
                                                                <span class="current_price">$2999.99</span>
                                                                <span class="discount_price">-08%</span>
                                                                <span class="old_price">$3700.00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="single__product">
                                                    <div class="produc_thumb">
                                                        <a href="product-details.php"><img src="assets/img/product/2.png" alt=""></a>
                                                    </div>
                                                    <div class="product_hover">
                                                        <div class="product_action">
                                                            <a href="#" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                            <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                            <a href="#" title="Compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                                        </div>
                                                        <div class="product__desc">
                                                            <h3><a href="product-details.php">Soffer Pro x33</a></h3>
                                                            <div class="price_amount">
                                                                <span class="current_price">$2999.99</span>
                                                                <span class="discount_price">-08%</span>
                                                                <span class="old_price">$3700.00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="single__product">
                                                    <div class="produc_thumb">
                                                        <a href="product-details.php"><img src="assets/img/product/4.png" alt=""></a>
                                                    </div>
                                                    <div class="product_hover">
                                                        <div class="product_action">
                                                            <a href="#" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                            <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                            <a href="#" title="Compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                                        </div>
                                                        <div class="product__desc">
                                                            <h3><a href="product-details.php">Soffer Pro x33</a></h3>
                                                            <div class="price_amount">
                                                                <span class="current_price">$2999.99</span>
                                                                <span class="discount_price">-08%</span>
                                                                <span class="old_price">$3700.00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="best_parts" role="tabpanel">
                                        <div class="row ">
                                            <div class="col-lg-4 col-md-6">
                                                <div class="single__product">
                                                    <div class="produc_thumb">
                                                        <a href="product-details.php"><img src="assets/img/product/1.png" alt=""></a>
                                                    </div>
                                                    <div class="product_hover">
                                                        <div class="product_action">
                                                            <a href="#" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                            <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                            <a href="#" title="Compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                                        </div>
                                                        <div class="product__desc">
                                                            <h3><a href="product-details.php">Soffer Pro x33</a></h3>
                                                            <div class="price_amount">
                                                                <span class="current_price">$2999.99</span>
                                                                <span class="discount_price">-08%</span>
                                                                <span class="old_price">$3700.00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="single__product">
                                                    <div class="produc_thumb">
                                                        <a href="product-details.php"><img src="assets/img/product/2.png" alt=""></a>
                                                    </div>
                                                    <div class="product_hover">
                                                        <div class="product_action">
                                                            <a href="#" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                            <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                            <a href="#" title="Compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                                        </div>
                                                        <div class="product__desc">
                                                            <h3><a href="product-details.php">Soffer Pro x33</a></h3>
                                                            <div class="price_amount">
                                                                <span class="current_price">$2999.99</span>
                                                                <span class="discount_price">-08%</span>
                                                                <span class="old_price">$3700.00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="single__product">
                                                    <div class="produc_thumb">
                                                        <a href="product-details.php"><img src="assets/img/product/4.png" alt=""></a>
                                                    </div>
                                                    <div class="product_hover">
                                                        <div class="product_action">
                                                            <a href="#" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                            <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                            <a href="#" title="Compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                                        </div>
                                                        <div class="product__desc">
                                                            <h3><a href="product-details.php">Soffer Pro x33</a></h3>
                                                            <div class="price_amount">
                                                                <span class="current_price">$2999.99</span>
                                                                <span class="discount_price">-08%</span>
                                                                <span class="old_price">$3700.00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="best_wheel" role="tabpanel">
                                        <div class="row carousel_product owl-carousel">
                                            <div class="col-lg-4 col-md-6">
                                                <div class="single__product">
                                                    <div class="produc_thumb">
                                                        <a href="product-details.php"><img src="assets/img/product/1.png" alt=""></a>
                                                    </div>
                                                    <div class="product_hover">
                                                        <div class="product_action">
                                                            <a href="#" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                            <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                            <a href="#" title="Compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                                        </div>
                                                        <div class="product__desc">
                                                            <h3><a href="product-details.php">Soffer Pro x33</a></h3>
                                                            <div class="price_amount">
                                                                <span class="current_price">$2999.99</span>
                                                                <span class="discount_price">-08%</span>
                                                                <span class="old_price">$3700.00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="single__product">
                                                    <div class="produc_thumb">
                                                        <a href="product-details.php"><img src="assets/img/product/2.png" alt=""></a>
                                                    </div>
                                                    <div class="product_hover">
                                                        <div class="product_action">
                                                            <a href="#" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                            <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                            <a href="#" title="Compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                                        </div>
                                                        <div class="product__desc">
                                                            <h3><a href="product-details.php">Soffer Pro x33</a></h3>
                                                            <div class="price_amount">
                                                                <span class="current_price">$2999.99</span>
                                                                <span class="discount_price">-08%</span>
                                                                <span class="old_price">$3700.00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="single__product">
                                                    <div class="produc_thumb">
                                                        <a href="product-details.php"><img src="assets/img/product/4.png" alt=""></a>
                                                    </div>
                                                    <div class="product_hover">
                                                        <div class="product_action">
                                                            <a href="#" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                            <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                            <a href="#" title="Compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                                        </div>
                                                        <div class="product__desc">
                                                            <h3><a href="product-details.php">Soffer Pro x33</a></h3>
                                                            <div class="price_amount">
                                                                <span class="current_price">$2999.99</span>
                                                                <span class="discount_price">-08%</span>
                                                                <span class="old_price">$3700.00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="best_light" role="tabpanel">
                                        <div class="row carousel_product owl-carousel">
                                            <div class="col-lg-4 col-md-6">
                                                <div class="single__product">
                                                    <div class="produc_thumb">
                                                        <a href="product-details.php"><img src="assets/img/product/1.png" alt=""></a>
                                                    </div>
                                                    <div class="product_hover">
                                                        <div class="product_action">
                                                            <a href="#" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                            <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                            <a href="#" title="Compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                                        </div>
                                                        <div class="product__desc">
                                                            <h3><a href="product-details.php">Soffer Pro x33</a></h3>
                                                            <div class="price_amount">
                                                                <span class="current_price">$2999.99</span>
                                                                <span class="discount_price">-08%</span>
                                                                <span class="old_price">$3700.00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="single__product">
                                                    <div class="produc_thumb">
                                                        <a href="product-details.php"><img src="assets/img/product/2.png" alt=""></a>
                                                    </div>
                                                    <div class="product_hover">
                                                        <div class="product_action">
                                                            <a href="#" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                            <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                            <a href="#" title="Compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                                        </div>
                                                        <div class="product__desc">
                                                            <h3><a href="product-details.php">Soffer Pro x33</a></h3>
                                                            <div class="price_amount">
                                                                <span class="current_price">$2999.99</span>
                                                                <span class="discount_price">-08%</span>
                                                                <span class="old_price">$3700.00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="single__product">
                                                    <div class="produc_thumb">
                                                        <a href="product-details.php"><img src="assets/img/product/4.png" alt=""></a>
                                                    </div>
                                                    <div class="product_hover">
                                                        <div class="product_action">
                                                            <a href="#" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                            <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                            <a href="#" title="Compare"><i class="zmdi zmdi-refresh-alt"></i></a>
                                                        </div>
                                                        <div class="product__desc">
                                                            <h3><a href="product-details.php">Soffer Pro x33</a></h3>
                                                            <div class="price_amount">
                                                                <span class="current_price">$2999.99</span>
                                                                <span class="discount_price">-08%</span>
                                                                <span class="old_price">$3700.00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-lg-3 col-12 hot_righr_sidebar">
                                <div class="single_banner long_hot_detals d-lg-none">
                                    <a href="#"><img src="assets/img/banner/banner_tab_2.png" alt="Shop Banner"></a>
                                </div>
                                <div class="single_banner  d-lg-block d-none">
                                    <a href="#"><img src="assets/img/banner/5.jpg" alt="Shop Banner"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Hot Deal product end-->
                
                
                <!--Banner product section-->
           
                <!--Banner product section end-->
                
                
                <!--Full Width  banner start-->
                <div class="full_width_banner pb-110">
                    <div class="single_banner">
                        <a href="#"><img src="assets/img/banner/8.jpg" alt="Shop Banner"></a>
                    </div>
                </div>
                <!--Full Width Banner end-->
               
                <!--Latest Post start
                <div class="latest_post pb-70">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="section_title">
                                    <h2>Latest News</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-60">
                            <div class="col-lg-4 col-md-6">
                                <div class="single_blog_post mb-40">
                                    <div class="post_thumbnail">
                                        <a href="blog-details.php"><img src="assets/img/blog/1.jpg" alt=""></a>
                                    </div>
                                    <div class="post_content_meta">
                                        <div class="post_meta">
                                            <ul>            
                                                <li>Posted March 20.</li>
                                                <li>400+ View </li>
                                                <li><a href="#"> 20+ Like</a></li>
                                            </ul>
                                        </div>
                                        <div class="blog_post_desc">
                                            <h2><a href="blog-details.php">Froome racing to spoil Yates’s pink Giro dream</a></h2>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry... </p>
                                        </div>
                                        <div class="read_more_btn">
                                            <a href="blog-details.php">Read More <span><i class="zmdi zmdi-arrow-right"></i></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="single_blog_post mb-40">
                                    <div class="post_thumbnail">
                                        <a href="blog-details.php"><img src="assets/img/blog/2.jpg" alt=""></a>
                                    </div>
                                    <div class="post_content_meta">
                                        <div class="post_meta">
                                            <ul>            
                                                <li>Posted March 20.</li>
                                                <li>400+ View </li>
                                                <li><a href="#"> 20+ Like</a></li>
                                            </ul>
                                        </div>
                                        <div class="blog_post_desc">
                                            <h2><a href="blog-details.php">Sed ut perspiciatis unde omnis iste natus sit</a></h2>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry... </p>
                                        </div>
                                        <div class="read_more_btn">
                                            <a href="blog-details.php">Read More <span><i class="zmdi zmdi-arrow-right"></i></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="single_blog_post mb-40">
                                    <div class="post_thumbnail">
                                        <a href="blog-details.php"><img src="assets/img/blog/3.jpg" alt=""></a>
                                    </div>
                                    <div class="post_content_meta">
                                        <div class="post_meta">
                                            <ul>            
                                                <li>Posted March 20.</li>
                                                <li>400+ View </li>
                                                <li><a href="#"> 20+ Like</a></li>
                                            </ul>
                                        </div>
                                        <div class="blog_post_desc">
                                            <h2><a href="blog-details.php">Quis autem vel eum tempore voluptate</a></h2>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry... </p>
                                        </div>
                                        <div class="read_more_btn">
                                            <a href="blog-details.php">Read More <span><i class="zmdi zmdi-arrow-right"></i></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
                <!--Latest Post end-->
                
                <!--Newsletter section start -->
                <div class="newsletter_section ptb-80">
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
                </div>
                <!--Newsletter section end -->
                
                <!--Footer start-->
               <?php
include('inc/footer.php');
?>