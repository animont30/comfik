
<?php $__env->startSection('content'); ?>

<!-- MAIN CONTENT -->
<main class="main-content">
    <section class="product-list-wrapper mb-5 border-bottom mt-5">
        <div class="container-fluid">
            
            <!-- product listing start here -->
            <div class="row">
                <div class="col-12">
                   <?php if($result['products']['success'] == '1'): ?>
        <section class="product-list-wrapper mt-4 px-md-5">
			<div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <h2 class="section-title"><?php echo e($result['author']->first_name); ?> <?php echo e($result['author']->last_name); ?> Recipes</h2>
								<pre><?php //print_r($result['products']);?></pre>
                            </div>
                        </div>
                    </div>
                </div>
				<div class="row">
					<div class="col-12">
						<div class="product-list-wrapper">
							<div class="main_content_wrap">
                             <!-- ARTICLE -->
							 <?php $__currentLoopData = $result['products']['product_data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
							 
								<article class="article_wrapper pluto-post-box">
									<div class="post-body">
										<div class="post-media-body">
											<a href="<?php echo e(URL::to('/product-detail/'.$prod->products_slug)); ?>" class="wrap_img_art">
												<div class="product_img_contain position-relative"> 
                                                <img src="<?php echo e(asset($prod->image_path)); ?>" alt="" /> 
                                                <div class="figure-shade">
													<!-- <span class="icon-eye"></span> -->
												</div>
                                                </div>
											</a>
											<div class="contain_ratting">
												<fieldset class="disabled-ratings">                                           
                <label class = "full fa <?php if($prod->rating >= 1): ?> active <?php endif; ?>" for="star1" title="<?php echo app('translator')->get('website.meh_1_stars'); ?>"></label>
                <label class = "full fa <?php if($prod->rating >= 2): ?> active <?php endif; ?>" for="star_2" title="<?php echo app('translator')->get('website.meh_2_stars'); ?>"></label>                                          
                <label class = "full fa <?php if($prod->rating >= 3): ?> active <?php endif; ?>" for="star_3" title="<?php echo app('translator')->get('website.pretty_good_3_stars'); ?>"></label>                                          
                <label class = "full fa <?php if($prod->rating >= 4): ?> active <?php endif; ?>" for="star_4" title="<?php echo app('translator')->get('website.pretty_good_4_stars'); ?>"></label>
                <label class = "full fa <?php if($prod->rating >= 5): ?> active <?php endif; ?>" for="star_5" title="<?php echo app('translator')->get('website.awesome_5_stars'); ?>"></label>
      </fieldset>        
										    </div>
										</div>
										<div class="post-content-body">
											<h4 class="post-title entry-title"><a href="<?php echo e(URL::to('/product-detail/'.$prod->products_slug)); ?>"><?php echo e($prod->products_name); ?></a></h4>
											<div class="post-content entry-summary position-relative">
												<p> <?php echo e(substr(strip_tags($prod->products_description),0,200)); ?>... </p>
												<div class="read-more-link"><a href="<?php echo e(URL::to('/product-detail/'.$prod->products_slug)); ?>">Read More</a></div>
												<?php if($prod->products_price>0): ?>
												<div class="recipes-buzzer-wrap position-absolute">
													<a href="javascript:void(0);">
														<img src="<?php echo e(asset('./images/media/2021/08/buzzer.png')); ?>" alt="Buzzer icon">
													</a>
												</div>
												<?php endif; ?>
											</div>
											<div class="order-item-wrap mt-3">
												<ul class="wrap-order-badge">
												  <li class="item">
												  
													<a href="javascript:void(0);" class="cart swipe-to-top" products_id="<?php echo e($prod->products_id); ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo app('translator')->get('website.Add to Cart'); ?>">Order this item</a>         
													</li>
												  <li class="item"></li>
												  <li class="item card_product_price">₹<?php echo e($prod->products_price); ?></li>
												</ul>
											  </div>

										</div>
										<div class="author-contain d-flex justify-content-between">
											<div class="author-social-wrap author-selfIn-list d-flex align-items-center justify-content-between">
												<div class="social-item text-center">
													<img src="<?php echo e(asset('./images/media/2021/08/view.png')); ?>" alt="View icon">
													<sapn class="d-block count-num"><?php echo e($prod->products_viewed); ?></sapn>
												</div>
												<div class="social-item text-center">
													<img src="<?php echo e(asset('./images/media/2021/08/comment.png')); ?>" alt="Comment icon">
													<sapn class="d-block count-num"><?php echo e($prod->total_user_rated); ?></sapn>
												</div>
												<div class="social-item text-center">
													<img src="<?php echo e(asset('./images/media/2021/08/forward.png')); ?>" alt="Forward icon">
													<sapn class="d-block count-num"><?php echo e($prod->products_liked); ?></sapn>
												</div>
                                                <div class="social-item text-center">
													<img src="<?php echo e(asset('./images/media/2021/08/order-red.png')); ?>" alt="Order icon">
													<sapn class="d-block count-num"><?php echo e($prod->products_ordered); ?> Times</sapn>
												</div>
											</div>
										</div>
									</div>
								</article>
                                <!-- ARTICLE -->
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</div>

							<!-- LOAD MORE BUTTON -->

						</div>
					</div>
				</div>
			</div>
		</section>
		<?php endif; ?>;
		
		</div>
            </div>

        </div>
    </section>


</main>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/food/resources/views/web/myrecipes.blade.php ENDPATH**/ ?>