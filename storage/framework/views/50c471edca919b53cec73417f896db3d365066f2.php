<?php $__env->startSection('content'); ?>

<!-- MAIN CONTENT -->
<main class="main-content">
    <section class="product-list-wrapper mb-5 border-bottom mt-5">
        <div class="container-fluid">
            
            <!-- product listing start here -->
            <div class="row">
                <div class="col-12">
                   
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
							 <?php $__currentLoopData = $result['products']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
							 
							 
								<article class="article_wrapper pluto-post-box">
									<div class="post-body">
										<div class="post-media-body">
											<a href="<?php echo e(URL::to('/product-detail/'.$prod->products_slug)); ?>" class="wrap_img_art">
												<div class="product_img_contain position-relative"> 
                                                <img src="<?php echo e(asset('/product_img/product_'.$prod->products_id.'/'.$prod->image ?? '')); ?>" alt="" /> 
                                                <div class="figure-shade">
													<!-- <span class="icon-eye"></span> -->
												</div>
                                                </div>
											</a>
											<div class="contain_ratting">
												<fieldset class="disabled-ratings">
      </fieldset>        
										    </div>
										</div>
										<div class="post-content-body">
											<h4 class="post-title entry-title"><a href="<?php echo e(URL::to('/product-detail')); ?>"><?php echo e($prod->products_name); ?></a></h4>
											<div class="post-content entry-summary position-relative">
												<p> <?php echo e(substr(strip_tags($prod->products_listofingredients),0,100)); ?>... </p>
												<div class="read-more-link"><a href="<?php echo e(URL::to('/product-detail')); ?>">Read More</a></div>
												<?php if($prod->products_price > 0): ?>
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
													<sapn class="d-block count-num"><?php echo e($prod->total_user_rated ?? ''); ?></sapn>
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
										<div class="author-contain d-flex justify-content-between">
											<div class="author-social-wrap author-selfIn-list d-flex align-items-center justify-content-between">
												<div class="social-item text-center">
													<a class="btn btn-primary" style="width: 100%; " href="<?php echo e(URL::to('/editMyRecipe/'.$prod->products_id)); ?>">Edit </a>
												</div>
												<div class="social-item text-center">
													<a class="btn btn-danger" style="width: 100%;" href="<?php echo e(URL::to('/deleteMyRecipe/'.$prod->products_id)); ?>">Delete </a>
												</div>
												<div class="social-item text-center">
													<a class="btn btn-primary" style="width: 100%; " href="<?php echo e(URL::to('/myrecipeimg/'.$prod->products_id)); ?>"> img</a>
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
		
		
		</div>
            </div>

        </div>
    </section>


</main>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\GIT\comfik\resources\views/web/myrecipes.blade.php ENDPATH**/ ?>