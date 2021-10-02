<?php $__env->startSection('content'); ?>
<!-- wishlist Content -->
<style>
.wishlist-content .media-main .media img {
    width: auto; !important;
    height: 160px;
    border: 1px solid #ddd;
    margin-right: 1rem;
}
.wishlist-content .media-main .media {
    padding: 20px 2px; !important;
}

.price span {
    color: #6c757d;
    text-decoration: line-through;
    margin-left: 10px;
    font-size: 1.075rem;
    line-height: 1.5;
	color: #6c757d !important;
}
h5 {

	text-align: center;
    line-height: 250px;
	
}

</style>

<!-- My Bookmark content -->

<main class="main-content">
	<!-- USER SLIDER -->
	<div class="container-fluid border-bottom">
        <div class="row px-3 mt-4 pt-2">
            <div class="col-12">
                <h2 class="section-title">Home Chefs</h2>
            </div>
        </div>
		<div class="user-slider-wrapper home-user-slider slider fav_homeChef my-4 mb-5 px-3">
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
    </div>

	<!-- Fav Recipies -->
	<div class="container-fluid">
            <div class="row px-3 mt-5">
                <div class="col-12">
                    <h2 class="section-title">My Favorite Recipes</h2>
                </div>
            </div>
    </div>
	<section class="product-list-wrapper mt-3">
			<div class="container-fluid">
				<!-- ====filter bar==== -- >
				
				<div class="row">
					<div class="col-12">
						<div class="index-filter-bar color-scheme-light minimal">
							  <form class="form-inline filterForm_Wrapper" action="<?php echo e(URL::to('/wishlist')); ?>" id="load_products_form">
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
                                                  <option value="special" <?php if(app('request')->input('type')=='special'): ?> selected <?php endif; ?>><?php echo app('translator')->get('website.Special Products'); ?></option-- >
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
					
					
					
						</div>
					</div>
				</div>
				<!-- ====filter bar row end==== -->
				<div class="row">
					<div class="col-12">
						<div class="product-list-wrapper">
							<div class="main_content_wrap">
                             <!-- ARTICLE -->
							 <?php $i=0;?>
							 <?php if(!empty($result['products']['product_data']) and count($result['products']['product_data'])>0): ?>
							<?php $__currentLoopData = $result['products']['product_data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$products): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php if($i>0): ?>
							<hr class="border-line">
							<?php endif; ?>
							<?php $i++; ?>
								<article class="article_wrapper pluto-post-box">
								<div class="remove_thisBookmarked"><a href="<?php echo e(URL::to("/UnlikeMyProduct")); ?>/<?php echo e($products->products_id); ?>"><i class="fa fa-times"></i></a> </div>
									<?php echo $__env->make('web.common.product', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
								</article>
                                <!-- ARTICLE -->
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<?php else: ?>
							<h5><?php echo app('translator')->get('website.No Record Found!'); ?></h5>
						<?php endif; ?>
								
							</div>
<?php
	if(!empty(app('request')->input('limit'))){
		$record = app('request')->input('limit');
	}else{
		$record = '15';
	}
?>
							<!-- LOAD MORE BUTTON -->
							<button class="load_more-btn d-block py-3 px-5 btn btn-white bg-white mx-auto" type="button" id="load_products"
<?php if(count($result['products']['product_data']) < $record ): ?>
	style="display:none !important"
<?php endif; ?>
><i class="icon-plus mr-3"></i><?php echo app('translator')->get('LOAD MORE POSTS'); ?></button>
						</div>
					</div>
				</div>
			</div>
		</section>
</main>



 <!-- <section class="wishlist-content my-4">
	<div class="container">
		<div class="row"> -->
			<!-- <div class="col-12 col-lg-3">
				<div class="heading">
						<h2>
								<?php echo app('translator')->get('website.My Account'); ?>
						</h2>
						<hr >
					</div>

				<ul class="list-group">
						<li class="list-group-item">
								<a class="nav-link" href="<?php echo e(URL::to('/profile')); ?>">
										<i class="fas fa-user"></i>
									<?php echo app('translator')->get('website.Profile'); ?>
								</a>
						</li>
						<li class="list-group-item">
								<a class="nav-link" href="<?php echo e(URL::to('/wishlist')); ?>">
										<i class="fas fa-heart"></i>
								 <?php echo app('translator')->get('website.Wishlist'); ?>
								</a>
						</li>
						<li class="list-group-item">
								<a class="nav-link" href="<?php echo e(URL::to('/orders')); ?>">
										<i class="fas fa-shopping-cart"></i>
									<?php echo app('translator')->get('website.Orders'); ?>
								</a>
						</li>
						<li class="list-group-item">
								<a class="nav-link" href="<?php echo e(URL::to('/shipping-address')); ?>">
										<i class="fas fa-map-marker-alt"></i>
								 <?php echo app('translator')->get('website.Shipping Address'); ?>
								</a>
						</li>
						<li class="list-group-item">
								<a class="nav-link" href="<?php echo e(URL::to('/logout')); ?>">
										<i class="fas fa-power-off"></i>
									<?php echo app('translator')->get('website.Logout'); ?>
								</a>
						</li>
					</ul>

			</div> -->
			<!-- <div class="col-12 col-lg-9 ">
					<div class="heading">
							<h2>
									<?php echo app('translator')->get('website.Wishlist'); ?>
							</h2>
							<hr >
						</div>

					<div class="col-12 media-main">
						<?php $i=0;?>
						<?php if(!empty($result['products']['product_data']) and count($result['products']['product_data'])>0): ?>
						<?php $__currentLoopData = $result['products']['product_data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$products): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
						<div class="product">
						<?php if($i>0): ?>
						<hr class="border-line">
						<?php endif; ?>
						<?php $i++; ?>
							<article>

								<div class="media">
									<img class="img-fluid" src="<?php echo e(asset('').$products->image_path); ?>" alt="<?php echo e($products->products_name); ?>">
									<div class="media-body">
									  <div class="row">
										<div class="col-12 col-md-8  texting">
										  <h4 class="title"><a href="<?php echo e(URL::to('/product-detail/'.$products->products_slug)); ?>"><?php echo e($products->products_name); ?></a></h4>
										  
										  
										  
										  

  
										  <div class="price"> 
											


			<?php

            if(!empty($products->discount_price)){
              $discount_price = $products->discount_price * session('currency_value');
            }
            if(!empty($products->flash_price)){
              $flash_price = $products->flash_price * session('currency_value');
            }
              $orignal_price = $products->products_price * session('currency_value');


             if(!empty($products->discount_price)){

              if(($orignal_price+0)>0){
                $discounted_price = $orignal_price-$discount_price;
                $discount_percentage = $discounted_price/$orignal_price*100;
                $discounted_price = $products->discount_price;

             }else{
               $discount_percentage = 0;
               $discounted_price = 0;
             }
            }
            else{
              $discounted_price = $orignal_price;
            }
            ?>
            <?php if(!empty($products->flash_price)): ?>
            <sub class="total_price"><?php echo e(Session::get('symbol_left')); ?><?php echo e($flash_price+0); ?><?php echo e(Session::get('symbol_right')); ?></sub>
            <span><?php echo e(Session::get('symbol_left')); ?><?php echo e($orignal_price+0); ?><?php echo e(Session::get('symbol_right')); ?> </span> 
            <?php elseif(!empty($products->discount_price)): ?>
            <price class="total_price"><?php echo e(Session::get('symbol_left')); ?><?php echo e($discount_price+0); ?><?php echo e(Session::get('symbol_right')); ?></price>
            <span><?php echo e(Session::get('symbol_left')); ?><?php echo e($orignal_price+0); ?><?php echo e(Session::get('symbol_right')); ?> </span> 
            <?php else: ?>
            <price class="total_price"><?php echo e(Session::get('symbol_left')); ?><?php echo e($orignal_price+0); ?><?php echo e(Session::get('symbol_right')); ?></price>
            <?php endif; ?>
										   </div>
										  <div class="wishlist-discription">
											<?=stripslashes($products->products_description)?>
										  </div>
										 
										  <div class="buttons">
											<?php if($products->products_type==0): ?>
											<?php if(!in_array($products->products_id,$result['cartArray'])): ?>
												<?php if($result['commonContent']['settings']['Inventory']): ?>
													<?php if($products->defaultStock < 0): ?>
														<button type="button" class="btn  btn-danger swipe-to-top" products_id="<?php echo e($products->products_id); ?>"><?php echo app('translator')->get('website.Out of Stock'); ?></button>
													<?php else: ?>
														<button type="button" class="btn  btn-secondary cart swipe-to-top" products_id="<?php echo e($products->products_id); ?>"><?php echo app('translator')->get('website.Add to Cart'); ?></button>
													<?php endif; ?>
												<?php else: ?>
													<button type="button" class="btn  btn-secondary cart swipe-to-top" products_id="<?php echo e($products->products_id); ?>"><?php echo app('translator')->get('website.Add to Cart'); ?></button>
												<?php endif; ?>
													
												<?php else: ?>
													<button type="button" class="btn btn-secondary active swipe-to-top"><?php echo app('translator')->get('website.Added'); ?></button>
												<?php endif; ?>
											<?php elseif($products->products_type==1): ?>
												<a class="btn  btn-secondary swipe-to-top" href="<?php echo e(URL::to('/product-detail/'.$products->products_slug)); ?>"><?php echo app('translator')->get('website.View Detail'); ?></a>
											<?php elseif($products->products_type==2): ?>
												<a href="<?php echo e($products->products_url); ?>" target="_blank" class="btn  btn-secondary swipe-to-top"><?php echo app('translator')->get('website.External Link'); ?></a>
											<?php endif; ?>
										  </div>
										</div>
										<div class="col-12 col-md-4 detail">
										  <div class="share"><a href="<?php echo e(URL::to("/UnlikeMyProduct")); ?>/<?php echo e($products->products_id); ?>"><?php echo app('translator')->get('website.Remove'); ?> &nbsp;<i class="fas fa-trash-alt"></i></a> </div>
										</div>
										</div>
									</div>									
								</div>								
							</article>
						</div>
						
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<?php else: ?>
							<h5><?php echo app('translator')->get('website.No Record Found!'); ?></h5>
						<?php endif; ?>
					</div>
					

				 ............the end..... -->
			<!--</div>
		</div>
	</div>
</section>  -->
<?php $__env->stopSection(); ?>


<script>//load more products

//sortby
document.getElementById('sortbytype').addEventListener('change',function(){
	jQuery("#load_products_form").submit();

});

//sortby
document.getElementById('sortbylimit').addEventListener('change',function(){
	jQuery("#load_products_form").submit();

});

//sortby
document.getElementById('category').addEventListener('change',function(){
	jQuery("#load_products_form").submit();

});


	jQuery(document).on('click', '#load_products', function(e){
	// jQuery('#loader').css('display','flex');
		$('#load_products').html("<img src='<?php echo e(asset('web/images/miscellaneous/ajax-loader.gif')); ?>' /> ");
		setTimeout(() => {
			var page_number = jQuery('#page_number').val();
			var total_record = jQuery('#total_record').val();
			var products_style = jQuery('#products_style').val();
			var pagelayout = jQuery('#pagelayout').val();
			
			var formData = jQuery("#load_products_form").serialize();
			jQuery.ajax({
			headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
				url: '<?php echo e(URL::to("/filterProducts")); ?>',
				type: "POST",
				data: formData,
				success: function (res) {
					if(jQuery.trim().res==0){
						jQuery('#load_products').hide();
						jQuery('#loaded_content').show();
					}else{
						page_number++;
						jQuery('#page_number').val(page_number);
						jQuery('#swap .row').append(res);
						jQuery('#swap2 .row').append(res);
						var record_limit = jQuery('#record_limit').val();
						var showing_record = page_number*record_limit;
						if(total_record<=showing_record){
							jQuery('.showing_record').html(total_record);
							jQuery('#load_products').hide();
							jQuery('#loaded_content').show();
						}else{
							jQuery('.showing_record').html(showing_record);
						}
					}

					
					if(pagelayout !== undefined){
						if(products_style == 'list'){
							jQuery( '#swap2 .col-12' ).removeClass( 'griding' );
							jQuery( '#swap2 .col-12' ).removeClass( 'col-md-6' );
							jQuery( '#swap2 .col-12' ).removeClass( 'col-lg-3' );
							jQuery( '#swap2 .col-12' ).addClass( 'listing' );

						}else{
							jQuery( '#swap2 .col-12' ).addClass( 'griding' );
							jQuery( '#swap2 .col-12' ).addClass( 'col-md-6' );
							jQuery( '#swap2 .col-12' ).addClass( 'col-lg-3' );
							jQuery( '#swap2 .col-12' ).removeClass( 'listing' );
						}
					}else{
						if(products_style == 'list'){
							jQuery( '#swap .col-12' ).removeClass( 'griding' );
							jQuery( '#swap .col-12' ).removeClass( 'col-lg-4' );
							jQuery( '#swap .col-12' ).removeClass( 'col-sm-6' );
							jQuery( '#swap .col-12' ).addClass( 'listing' );

						}else{
							jQuery( '#swap .col-12' ).removeClass( 'listing' );
							jQuery( '#swap .col-12' ).addClass( 'col-lg-4' );
							jQuery( '#swap .col-12' ).addClass( 'col-sm-6' );				
							jQuery( '#swap .col-12' ).addClass( 'griding' );
						}
					}

					

					$('#load_products').html('Load More');
				},
			});
		}, 300);
	});

</script>

<?php echo $__env->make('web.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\food2\resources\views/web/wishlist.blade.php ENDPATH**/ ?>