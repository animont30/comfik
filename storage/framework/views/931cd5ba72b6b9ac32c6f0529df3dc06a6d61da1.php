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
                                <h2 class="section-title"> <?php echo e($result['author']->first_name); ?> <?php echo e($result['author']->last_name); ?> Recipes</h2>
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
											<a href="" class="wrap_img_art">
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
										
										
										<div class="author-contain d-flex justify-content-between">
											<div class="author-social-wrap author-selfIn-list d-flex align-items-center justify-content-between">
												<div class="social-item text-center">
													<a class="btn btn-primary" style="width: 100%; " href="<?php echo e(URL::to('/editrecipeimg/'.$prod->id)); ?>">Edit Recipe</a>
												</div>
												<div class="social-item text-center">
													<a class="btn btn-danger" style="width: 100%;" href="<?php echo e(URL::to('/deleterecipeimg/'.$prod->id)); ?>">Delete Recipe</a>
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
<?php echo $__env->make('web.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\GIT\comfik\resources\views/web/myrecipes-img.blade.php ENDPATH**/ ?>