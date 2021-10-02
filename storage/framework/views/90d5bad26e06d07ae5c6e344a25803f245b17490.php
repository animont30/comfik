
<?php $__env->startSection('content'); ?>
       <!-- End Header Content -->

       <!-- NOTIFICATION CONTENT -->
         <?php echo $__env->make('web.common.notifications', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <!-- END NOTIFICATION CONTENT -->

       <!-- Carousel Content -->
       <?php  echo $final_theme['carousel'];  ?><pre><?php //print_r($result['categories']);?></pre>
       <!-- Fixed Carousel Content -->

      <!-- Banners Content -->
      <!-- USER SLIDER -->
		<div class="user-slider-wrapper home-user-slider slider my-4 mb-5 px-3">
			<!-- USER-1 -->
			<?php $__currentLoopData = $result['authors']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div class="user-item">
				<div class="userImg position-relative"> 
				<?php if(!empty($author->avatar)): ?>
					<img src="<?php echo e(asset($author->avatar)); ?>" alt="user image" class="img-fluid">
				<?php else: ?>
					<img src="<?php echo e(asset('images/media/2020/11/OimK016812.png')); ?>" alt="user image" class="img-fluid">
				<?php endif; ?>
					<div class="overlay_user_contain d-flex align-item-center justify-content-center flex-column">
						<div class="recipes d-flex"> <img src="<?php echo e(asset('./images/media/2021/08/recipes.png')); ?>" alt="Recipes icons"> <span><?php echo e($author->totalrecipes); ?></span> </div>
						<div class="likes pt-2">
							<a href="<?php echo e(URL::to('/author/'.$author->id)); ?>" title="Like" class=" d-flex"> <img src="<?php echo e(asset('./images/media/2021/08/heart.png')); ?>" alt="Heart icon"> <span><?php echo e($author->totallikes); ?></span> </a>
						</div>
					</div>
				</div>
				<div class="user_detail">
					<h5><a href="<?php echo e(URL::to('/author/'.$author->id)); ?>" title="User name"><?php echo e($author->first_name); ?> <?php echo e($author->last_name); ?> </a></h5> <span><?php echo e($author->totalrecipes); ?> Recipes</span> <span><?php echo e($author->district); ?></span> </div>
			</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			
			</div>
      <!-- Products content -->
      <section class="product-list-wrapper mt-3 mb-3">
			<div class="container-fluid">
				<!-- ====filter bar==== -->
				<div class="row">
					<div class="col-12">
					
					
					  <form class="form-inline filterForm_Wrapper" action="<?php echo e(URL::to('/shop')); ?>" id="load_products_form">
                                          <input type="hidden" name="min_price"  value="0">
                                          <input type="hidden" name="max_price"  value="10000">
                                          <?php if(isset($_GET['price'])): ?>
                                          <input type="hidden" name="price"  value="<?php echo e($_GET['price']); ?>">
                                          <?php endif; ?>
                                            <input type="hidden" value="1" name="page_number" id="page_number">
                                            <?php if(!empty(app('request')->input('search'))): ?>
                                             <input type="hidden"  name="search" value="<?php echo e(app('request')->input('search')); ?>">
                                            <?php endif; ?>
                                          
											<div class="form-group">
												<label><?php echo app('translator')->get('Category'); ?></label>
												<div class="select-control">
													<select name="category" id="category" class="form-control">
													<option value="all"
													<?php if(empty(app('request')->input('category'))): ?>
														selected="selected"
													<?php endif; ?>
													>All</option>
													<?php $__currentLoopData = $result['categories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<option value="<?php echo e($cat->categories_id); ?>"
														 <?php if(app('request')->input('category') == $cat->categories_id): ?>
															 selected="selected"
														 <?php endif; ?>

														><?php echo e($cat->categories_name); ?></option>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
													</select>
												</div>
											</div>
                                             <input type="hidden"  name="load_products" value="1">
  
                                             <input type="hidden"  name="products_style" id="products_style" value="grid">
               
                                            
                                            <div class="form-group">
                                                <label><?php echo app('translator')->get('website.Sort'); ?></label>
                                                <div class="select-control">
                                                <select name="type" id="sortbytype" class="form-control">
                                                  <option value="desc" <?php if(app('request')->input('type')=='desc'): ?> selected <?php endif; ?>><?php echo app('translator')->get('website.Newest'); ?></option>
                                                  <option value="atoz" <?php if(app('request')->input('type')=='atoz'): ?> selected <?php endif; ?>><?php echo app('translator')->get('website.A - Z'); ?></option>
                                                  <option value="ztoa" <?php if(app('request')->input('type')=='ztoa'): ?> selected <?php endif; ?>><?php echo app('translator')->get('website.Z - A'); ?></option>
                                                  <option value="hightolow" <?php if(app('request')->input('type')=='hightolow'): ?> selected <?php endif; ?>><?php echo app('translator')->get('website.Price: High To Low'); ?></option>
                                                  <option value="lowtohigh" <?php if(app('request')->input('type')=='lowtohigh'): ?> selected <?php endif; ?>><?php echo app('translator')->get('website.Price: Low To High'); ?></option>
                                                  <!--option value="topseller" <?php if(app('request')->input('type')=='topseller'): ?> selected <?php endif; ?>><?php echo app('translator')->get('website.Top Seller'); ?></option>
                                                  <option value="special" <?php if(app('request')->input('type')=='special'): ?> selected <?php endif; ?>><?php echo app('translator')->get('website.Special Products'); ?></option-->
                                                  <option value="mostliked" <?php if(app('request')->input('type')=='mostliked'): ?> selected <?php endif; ?>><?php echo app('translator')->get('website.Most Liked'); ?></option>
                                                </select>
                                                </div>
                                              </div>
  
               
                                              
                                              <div class="form-group">
                                                <label><?php echo app('translator')->get('website.Limit'); ?></label>
                                                <div class="select-control">
                                                  <select class="form-control"name="limit"id="sortbylimit">
                                                    <option value="15" <?php if(app('request')->input('limit')=='15'): ?> selected <?php endif; ?>>15</option>
                                                    <option value="30" <?php if(app('request')->input('limit')=='30'): ?> selected <?php endif; ?>>30</option>
                                                    <option value="60" <?php if(app('request')->input('limit')=='60'): ?> selected <?php endif; ?>>60</option>
                                                  </select>
                                                  </div>
                                                </div>
                      </form>
					
					
					
						<!--div class="index-filter-bar color-scheme-light minimal">
							<div class="index-sort-w">
								<div class="index-sort-label"><i class=""></i><span>Order By</span></div>
								<div class="index-sort-options">
									<button data-sort-value="likes" class="index-sort-option index-sort-hearts inactive">Most Likes</button>
									<button data-sort-value="views" class="index-sort-option index-sort-views inactive">Most Views</button>
								</div>
							</div>
							<div class="index-filter-w">
								<div class="index-filter-label"><span>Category</span></div>
								<div class="index-filter-categories-select">
									<div class="index-filter-select-selected">
										<div class="index-filter-select-placeholder">Select Category...</div>
									</div>
									<div class="index-filter-options">
										<?php $__currentLoopData = $result['categories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<div class="index-filter-option" data-filter-value="filter-cat-<?php echo e($cat->categories_id); ?>"><?php echo e($cat->categories_name); ?></div>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</div>
								</div>
								<div class="index-filter-sub-label">Format</div>
								<div class="index-filter-formats">
									<div class="index-filter-format inactive" data-filter-value="standard"> <i class="icon-file-text2"></i>
										<div class="os-filter-tooltip">standard</div>
									</div>
									<div class="index-filter-format inactive" data-filter-value="gallery"> <i class="icon-stack"></i>
										<div class="os-filter-tooltip">gallery</div>
									</div>
									<div class="index-filter-format inactive" data-filter-value="video"> <i class="icon-film"></i>
										<div class="os-filter-tooltip">video</div>
									</div>
								</div>
								<div class="index-clear-filter-w">
									<button class="index-clear-filter-btn"> <span>Clear Filters</span></button>
								</div>
							</div>
						</div-->
					</div>
				</div>
				
			</div>
		</section>

      <?php

      $product_section_orders = json_decode($final_theme['product_section_order'], true);
      foreach ($product_section_orders as $product_section_order){
          if($product_section_order['status'] == 1)
          {
            //echo $product_section_order['file_name'].'<br>';
            $r =   'web.product-sections.' . $product_section_order['file_name'];
      
      ?>
            <?php echo $__env->make($r, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      
      <?php

          }
       }
      
      ?>
<?php echo $__env->make('web.common.scripts.addToCompare', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('web.common.scripts.Like', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('web.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/food/resources/views/web/index.blade.php ENDPATH**/ ?>