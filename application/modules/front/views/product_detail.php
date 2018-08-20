Breadcrumb start-->
<div class="ast_pagetitle">
<div class="ast_img_overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="page_title">
                    <h2>shop single</h2>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <ul class="breadcrumb">
                    <li><a href="index.html">home</a></li>
                    <li>//</li>
                    <li><a href="about.html">shop single</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--Breadcrumb end--> 

    

<!-- product Description section Start -->
<div class="ast_proSingle_wrapper ast_toppadder70 ast_bottompadder40">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product_detail_wrap">
                    <!-- product details Start -->
                    <div class="product_detail_cover">
                        <div class="row">
                            <div class="col-sm-4 col-xs-12">
                                <div class="product_slider">
                                    <!-- slides -->
                                    <div class="pro_slides_carousel">
                                        <?php   
                                        if(!empty($products[0]->images)){
                                            $images = explode(',',$products[0]->images);
                                            foreach ($images as $value) {?>
                                        <div class="slick_item">
                                            <img src="<?php echo base_url('asset/uploads/'.$value)?>" class="img-responsive" />
                                        </div>
                                        <?php }}?>
                                    </div>
                                    
                                    <!-- slides -->
                                    <!-- Indicators -->
                                    <div class="pro_slider_thumbs">
                                        <?php   
                                        if(!empty($products[0]->images)){
                                            $images = explode(',',$products[0]->images);
                                            foreach ($images as $value) {?>
                                         <div class="pro_thumb">
                                            <img src="<?php echo base_url('asset/uploads/'.trim($value))?>" class="img-responsive" />
                                        </div>

                                        <?php }}?>
                                    </div>
                                    <!-- Indicators -->
                                </div>
                            </div>
                            <div class="col-sm-8 col-xs-12">
                                <div class="product_description">
                                    <h3><?php if(!empty($products[0]->name)){ echo strtoupper($products[0]->name);}?></h3>
                                    <div class="product_rating">
                                        <span class="ref_number">Ref No. <?php if(!empty($products[0]->ref_no)){ echo $products[0]->ref_no;}?></span>
                                        <span class="rating_star">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star-o" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                    <p>
                                        <?php if(!empty($products[0]->description)){ echo strtoupper($products[0]->description);}?>
                                    </p>
                                    <div class="stock_details">8 In Stock</div>
                                    <div class="prod_quantity">QTY <input type="number" name="quantity" id="quantity" value="1" min="1" /></div>
                                    <div class="product_buy">
                                        <button type="button" class="buy_btn ast_btn" value="Buy Now">Buy Now</button>
                                        <a href="#" class="ad_wishlist">Add To Wishlist 
                                            <i class="fa fa-heart-o" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- product details End -->
                    <!-- product description tabs -->
                    <div class="product_desc_tabs">
                        <ul class="tabs">
                            <li class="tab-link current" data-tab="tab-1">descriptions</li>
                            <!-- <li class="tab-link" data-tab="tab-2">reviews</li> -->
                        </ul>
                        <div class="product_tab_content">
                            <div id="tab-1" class="tab_content current">
                                <h4>Description</h4>
                                <p>
                                <?php if(!empty($products[0]->brief_description)){ echo strtoupper($products[0]->brief_description);}?>
                                    
                                </p>
                                <!-- <h4>Features</h4>
                                <p>
                                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit 
                                </p> -->
                            </div>
                           <!--  <div id="tab-2" class="tab_content">
                                <h4>review</h4>
                                <p>there are no reviews yet</p>
                                <h4>add a review</h4>
                                <p>Your email address will not be published.</p>
                                <form class="ast_review_form">
                                    <textarea placeholder="Your Review" rows="6"></textarea>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <input type="text" placeholder="Your Name">
                                        </div>  
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <input type="text" placeholder="Your Email">
                                        </div>
                                    </div>
                                    <a href="#" class="ast_btn">submit</a>                                  
                                </form>
                            </div> -->
                        </div>
                    </div>
                    <!-- product description tabs -->
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="ast_related_pro ast_toppadder70">
                    <div class="ast_heading">
                        <h1>related  <span>products</span></h1>
                    </div>  
                    <div class="owl-carousel owl-theme">
                        <div class="item">
                            <div class="ast_product_section">
                                <div class="ast_product_image">
                                    <a href="shop_single.html"><img src="images/content/Products/Gemstone.jpg" class="img-responsive"></a>
                                </div>
                                <div class="ast_product_info">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <h4 class="ast_shop_title"><a href="shop_single.html">gemstones</a></h4>
                                    <p>$30.00</p>
                                    <div class="ast_info_bottom">
                                        <a href="#" class="ast_add_cart ast_btn">add to cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="ast_product_section">
                                <div class="ast_product_image">
                                    <a href="shop_single.html"><img src="images/content/Products/Navgrah.jpg" class="img-responsive"></a>
                                </div>
                                <div class="ast_product_info">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <h4 class="ast_shop_title"><a href="shop_single.html">navgraha Yantra</a></h4>
                                    <p>$30.00</p>
                                    <div class="ast_info_bottom">
                                        <a href="#" class="ast_add_cart ast_btn">add to cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="ast_product_section">
                                <div class="ast_product_image">
                                    <a href="shop_single.html"><img src="images/content/Products/Rudhrakhsa.jpg" class="img-responsive"></a>
                                </div>
                                <div class="ast_product_info">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <h4 class="ast_shop_title"><a href="shop_single.html">rudraksha</a></h4>
                                    <p>$30.00</p>
                                    <div class="ast_info_bottom">
                                        <a href="#" class="ast_add_cart ast_btn">add to cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="ast_product_section">
                                <div class="ast_product_image">
                                    <a href="shop_single.html"><img src="images/content/Products/Fengshui.jpg" class="img-responsive"></a>
                                </div>
                                <div class="ast_product_info">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <h4 class="ast_shop_title"><a href="shop_single.html">fang shui</a></h4>
                                    <p>$30.00</p>
                                    <div class="ast_info_bottom">
                                        <a href="#" class="ast_add_cart ast_btn">add to cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
<!-- product Description section End --> 

<!-- Download wrapper start-->
<div class="ast_download_wrapper ast_toppadder70 ast_bottompadder70">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-10 col-xs-12 col-lg-offset-2 col-md-offset-2 col-sm-offset-1 col-xs-offset-0">
                <div class="ast_heading">
                    <h1>Download our <span>Mobile App</span></h1>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected hummer.</p>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-lg-offset-3 col-md-offset-3">
                <div class="ast_download_box">
                    <ul>
                        <li><a href="#"><img src="images/content/download1.png" alt="Download" title="Download"></a></li>
                        <li><a href="#"><img src="images/content/download2.png" alt="Download" title="Download"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Download wrapper End