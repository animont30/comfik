
<!--<div class="product product11">
  <article>
    <div class="thumb">
      <div class="badges">
        <?php 
        $current_date = date("Y-m-d", strtotime("now"));

        $string = substr($products->products_date_added, 0, strpos($products->products_date_added, ' '));
        $date=date_create($string);
        date_add($date,date_interval_create_from_date_string($web_setting[20]->value." days"));
        $after_date = date_format($date,"Y-m-d");
        /*if($after_date>=$current_date){
          print '<span class="badge badge-info">';
          print __('website.New');
          print '</span>';
        }*/
        ?> 
          <?php
        if(!empty($products->discount_price)){
          $discount_price = $products->discount_price * session('currency_value');
        }
        $orignal_price = $products->products_price * session('currency_value');

        if(!empty($products->discount_price)){

        if(($orignal_price+0)>0){
          $discounted_price = $orignal_price-$discount_price;
          $discount_percentage = $discounted_price/$orignal_price*100;
        }else{
          $discount_percentage = 0;
          $discounted_price = 0;
        }
        ?>
      
        <span class="badge badge-danger"  data-toggle="tooltip" data-placement="bottom" title="<?php  echo (int)$discount_percentage; ?>% <?php echo app('translator')->get('website.off'); ?>"><?php /* echo (int)$discount_percentage; */ ?>%</span>
        <?php }?>
        
      
      <?php if($products->is_feature == 1): ?>
        <span class="badge badge-success"><?php echo app('translator')->get('website.Featured'); ?></span>                                            
      <?php endif; ?>   
      </div>
      <div class="producthover ">
        <div class="icons">         
         

          <a href="javascript:void(0)" class="icon active swipe-to-top is_liked" products_id="<?= $products->products_id?>" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="<?php echo app('translator')->get('website.Wishlist'); ?>">
            <i class="fas fa-heart"></i>
          </a>

          <div class="icon swipe-to-top modal_show" products_id ="<?php echo e($products->products_id); ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo app('translator')->get('website.Quick View'); ?>">
            <i class="fas fa-eye"></i>
          </div>
          <a onclick="myFunction3(<?php echo e($products->products_id); ?>)" class="btn-secondary icon swipe-to-top" data-toggle="tooltip" data-placement="bottom" title="<?php echo app('translator')->get('website.Compare'); ?>">
            <i class="fas fa-align-right" data-fa-transform="rotate-90"></i>
          </a>
        
        </div>
        
      </div>

      <img class="img-fluid" src="<?php echo e(asset('').$products->image_path); ?>" alt="<?php echo e($products->products_name); ?>">
    </div>
    
    <div class="content">
      <span class="tag">
        <?php 
        /*
        $cat_name = '';
        foreach($products->categories as $key=>$category){
            $cat_name = $category->categories_name;
        }              
               
        */
       ?>                                 
      </span>
      <h5 class="title"><a href="<?php echo e(URL::to('/product-detail/'.$products->products_slug)); ?>"><?php echo e($products->products_name); ?></a></h5>
      <p>
        <?php
         /* $descriptions = strip_tags($products->products_name);
          echo stripslashes($descriptions);*/
        ?>
      </p>
      <div class="price">                     
        <?php if(!empty($products->discount_price)): ?>
          <?php echo e(Session::get('symbol_left')); ?>&nbsp;<?php echo e($discount_price+0); ?>&nbsp;<?php echo e(Session::get('symbol_right')); ?>

          <span> <?php echo e(Session::get('symbol_left')); ?><?php echo e($orignal_price+0); ?><?php echo e(Session::get('symbol_right')); ?></span>
        <?php else: ?>
          <?php echo e(Session::get('symbol_left')); ?>&nbsp;<?php echo e($orignal_price+0); ?>&nbsp;<?php echo e(Session::get('symbol_right')); ?>

        <?php endif; ?>                         
      </div>  

      <div class="pro-counter">
          <div class="input-group item-quantity">
            
            <input name="products_<?php echo e($products->products_id); ?>" type="text" readonly value="<?php echo e($products->products_min_order); ?>" class="form-control qty products_<?php echo e($products->products_id); ?>" max="<?php echo e($products->products_max_stock); ?>" min="<?php echo e($products->products_min_order); ?>" >
            <span class="input-group-btn">
                <button type="button" value="quantity" class="quantity-plus1 btn qtypluscart" data-type="plus" data-field="">
                    <i class="fas fa-plus"></i>
                </button>
            
                <button type="button" value="quantity" class="quantity-minus1 btn qtyminuscart" data-type="minus" data-field="">
                    <i class="fas fa-minus"></i>
                </button>
            </span>
          </div>
      -->
      <!-- <div class="d__none">
          <?php if($products->products_type==0): ?>
            <?php if($result['commonContent']['settings']['Inventory']): ?>
                <?php if($products->defaultStock<=0): ?>
                  <button type="button" class="btn-secondary btn icon swipe-to-top" products_id="<?php echo e($products->products_id); ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo app('translator')->get('website.Out of Stock'); ?>"><i class="fas fa-shopping-bag"></i></button>
                <?php else: ?>
                <button type="button" class="btn-secondary btn icon swipe-to-top cart" products_id="<?php echo e($products->products_id); ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo app('translator')->get('website.Add to Cart'); ?>"><i class="fas fa-shopping-bag"></i></button>
                <?php endif; ?>
            <?php else: ?>
                <button type="button" class="btn-secondary btn icon swipe-to-top cart" products_id="<?php echo e($products->products_id); ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo app('translator')->get('website.Add to Cart'); ?>"><i class="fas fa-shopping-bag"></i></button>
            <?php endif; ?>
          <?php else: ?>
            <a class="btn-secondary btn icon swipe-to-top cart" href="<?php echo e(URL::to('/product-detail/'.$products->products_slug)); ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo app('translator')->get('website.View Detail'); ?>"><i class="fas fa-shopping-bag"></i></a>
          <?php endif; ?>  
          </div>   -->
      <!--</div>
    </div>
  </article>
</div>

-->
								<!-- ARTICLE -->
									<div class="post-body product_contain">
										<div class="post-top-share"> <i class="icon-plus share-activator"></i> <span class="share-activator-label share-activator caption">Share</span>
											<div class="os_social-head-w">
												<div class="os_social">
													<a class="os_social_twitter_share" href="https://www.addtoany.com/add_to/twitter?linkurl=<?php echo e(urlencode(URL::to('/product-detail/'.$products->products_slug))); ?>" target="_blank"> <img src="<?php echo e(asset('./images/media/2021/08/social/twitter.png')); ?>" title="Twitter" class="os_social" alt="Tweet about this on Twitter" /> </a>
													<a class="os_social_linkedin_share" href="https://www.addtoany.com/add_to/linkedin?linkurl=<?php echo e(urlencode(URL::to('/product-detail/'.$products->products_slug))); ?>" target="_blank"> <img src="<?php echo e(asset('./images/media/2021/08/social/linkedin.png')); ?>" title="Linkedin" class="os_social" alt="Share on LinkedIn" /> </a>
												</div>
											</div>
										</div>
										<div class="post-media-body">
											<a href="<?php echo e(URL::to('/product-detail/'.$products->products_slug)); ?>" class="wrap_img_art">
												<div class="product_img_contain position-relative"> 
                          
							 <?php if(!empty($products->image_path)): ?>
                               <img src="<?php echo e(asset('').$products->image_path); ?>" alt="<?php echo e($products->products_name); ?>" /> 
                            <?php else: ?>
                               <img src="<?php echo e(asset('/product_img/product_'.$products->products_id.'/'.$products->products_image ?? '')); ?>" alt="<?php echo e($products->products_name); ?>" /> 
                            <?php endif; ?>
                            <div class="figure-shade">
													<!-- <span class="icon-eye modal_show" products_id ="<?php echo e($products->products_id); ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo app('translator')->get('website.Quick View'); ?>"></span> -->
												</div>
                        </div>
											</a>
											<div class="contain_ratting">
												
												<fieldset class="disabled-ratings">                                           
												<label class = "full fa <?php if($products->rating >= 1): ?> active <?php endif; ?>" for="star1" title="<?php echo app('translator')->get('website.meh_1_stars'); ?>"></label>
												<label class = "full fa <?php if($products->rating >= 2): ?> active <?php endif; ?>" for="star_2" title="<?php echo app('translator')->get('website.meh_2_stars'); ?>"></label>                                          
												<label class = "full fa <?php if($products->rating >= 3): ?> active <?php endif; ?>" for="star_3" title="<?php echo app('translator')->get('website.pretty_good_3_stars'); ?>"></label>                                          
												<label class = "full fa <?php if($products->rating >= 4): ?> active <?php endif; ?>" for="star_4" title="<?php echo app('translator')->get('website.pretty_good_4_stars'); ?>"></label>
												<label class = "full fa <?php if($products->rating >= 5): ?> active <?php endif; ?>" for="star_5" title="<?php echo app('translator')->get('website.awesome_5_stars'); ?>"></label>
												</fieldset>        

										    </div>
										</div>
										<div class="post-content-body">
											<h4 class="post-title entry-title"><a href="<?php echo e(URL::to('/product-detail/'.$products->products_slug)); ?>"><?php echo e($products->products_name); ?></a></h4>
											<div class="post-content entry-summary position-relative">
												<p> <?php
                                $descriptions = strip_tags($products->products_name);
                                echo stripslashes($descriptions);
                              ?></p>
												<div class="read-more-link"><a href="<?php echo e(URL::to('/product-detail/'.$products->products_slug)); ?>">Read More</a></div>
												<?php if($orignal_price >0): ?>
												<div class="recipes-buzzer-wrap position-absolute">
													<a href="javascript:void(0);" title="link name">
														<img src="<?php echo e(asset('./images/media/2021/08/buzzer.png')); ?>" alt="Buzzer icon">
													</a>
												</div>
												<?php endif; ?>
											</div>
											<div class="order-item-wrap mt-3">
												<ul class="wrap-order-badge">
												  <li class="item">
													<!-- <a href="#" title="Order this item">Order this item</a>   -->
                          <?php if($products->products_type==0): ?>
							  <input type="hidden"  class=" qty" value="1" >
                              <?php if($result['commonContent']['settings']['Inventory']): ?>
                                  <?php if($products->defaultStock<=0): ?>
                                  <button type="button" products_id="<?php echo e($products->products_id); ?>" data-toggle="tooltip" data-placement="bottom" title="Out of Stock">Out this item</button>
                                  <?php else: ?>
                                  <button type="button" class="add-to-Cart cart" products_id="<?php echo e($products->products_id); ?>"  data-toggle="tooltip" data-placement="bottom" title="Order this item">Order this item</button>
                                  <?php endif; ?>
                              <?php else: ?>
                              <button type="button" class="add-to-Cart cart" products_id="<?php echo e($products->products_id); ?>" data-toggle="tooltip" data-placement="bottom" title="Order this item">Order this item</button>
                              <?php endif; ?>
                            <?php else: ?>
                            <button type="button" class="add-to-Cart cart" products_id="<?php echo e($products->products_id); ?>" data-toggle="tooltip" data-placement="bottom" title="Order this item">View this item</button>
                            <?php endif; ?>
                                    
													</li>
												  
												  <li class="item card_product_price">
                            <!-- ₹ -->
                            <?php if(!empty($products->discount_price)): ?>
                              <?php echo e(Session::get('symbol_left')); ?>&nbsp;<?php echo e($discount_price+0); ?>&nbsp;<?php echo e(Session::get('symbol_right')); ?>

                              <span> <?php echo e(Session::get('symbol_left')); ?><?php echo e($orignal_price+0); ?><?php echo e(Session::get('symbol_right')); ?></span>
                            <?php else: ?>
                              <?php echo e(Session::get('symbol_left')); ?>&nbsp;<?php echo e($orignal_price+0); ?>&nbsp;<?php echo e(Session::get('symbol_right')); ?>

                            <?php endif; ?>
                          </li>
												</ul>
											  </div>
										</div>
										<div class="author-contain d-flex justify-content-between">
											<div class="wrap-author d-flex align-items-center">
											
												<a href="<?php echo e(URL::to('/author/'.$products->user_id)); ?>" title="<?php echo e($products->first_name); ?> <?php echo e($products->last_name); ?>">
												<?php if(!empty($products->avatar)): ?>
													<img src="<?php echo e(asset($products->avatar)); ?>" alt="author image" class="img-fluid">
												<?php else: ?>
													<img src="<?php echo e(asset('./images/media/2020/11/OimK016812.png')); ?>" alt="author image" class="img-fluid">
												<?php endif; ?>
											</a>
												<div class="about-author">
													<a href="<?php echo e(URL::to('/author/'.$products->user_id)); ?>">
													<span>Prepared By</span>
													<h5><?php echo e($products->first_name); ?> <?php echo e($products->last_name); ?></h5>
												</a>
												</div>
											</div>
											<div class="author-social-wrap d-flex align-items-center justify-content-between">
												<div class="social-item text-center">
													<a href="javascript:void(0);" class="is_liked" products_id="<?php echo e($products->products_id); ?>" title="Like">
													<img src="<?php echo e(asset('./images/media/2021/08/heart-red.png')); ?>" alt="Likes icon">
													
													<sapn class="d-block count-num"><?php echo e($products->products_like); ?></sapn>
												</a>
												</div>
												<div class="social-item text-center">
													<a href="javascript:void(0);" title="Comment">
													<img src="<?php echo e(asset('./images/media/2021/08/comment.png')); ?>" alt="Comment icon">
													<sapn class="d-block count-num"><?php echo e($products->total_user_rated); ?></sapn>
												</a>
												</div>
												<div class="social-item text-center">
													<a href="javascript:void(0);" title="Users">
													<img src="<?php echo e(asset('./images/media/2021/08/users.png')); ?>" alt="Users icon">
													<sapn class="d-block count-num"><?php echo e($products->products_viewed); ?></sapn>
												</a>
												</div>
												<!-- <div class="social-item text-center">
													<a href="javascript:void(0);" title="Forward">
													<img src="<?php echo e(asset('./images/media/2021/08/forward.png')); ?>" alt="Forward icon">
													<sapn class="d-block count-num"><?php echo e($products->products_ordered); ?></sapn>
												</a>
												</div> -->
											</div>
										</div>
									</div>
								
                 <!-- ARTICLE --><?php /**PATH C:\xampp\htdocs\GIT\comfik\resources\views/web/common/product_card_style/16.blade.php ENDPATH**/ ?>