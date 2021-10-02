<!-- Products content -->
<!-- <?php if($result['products']['success']==1): ?>

<section class="new-products-content" >
<div class="container">
<div class="products-area">
<div class="row justify-content-center">
<div class="col-12 col-lg-6">
<div class="pro-heading-title">
<h2> <?php echo app('translator')->get('website.NEW ARRIVAL'); ?>
</h2>
<p><?php echo app('translator')->get('website.Newest Products Detail'); ?>
</p>
</div>
</div>
</div>
<div class="row">      
<?php if($result['products']['success']==1): ?>
<?php $__currentLoopData = $result['products']['product_data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$products): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="col-12 col-sm-6 col-lg-3">
 Product

</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

</div>
</div>
</div>  
</section>
<?php endif; ?>  -->

<?php if($result['products']['success']==1): ?>
<section class="product-list-wrapper">
<div class="container-fluid">
<div class="row">
<div class="col-12">
<div class="product-list-wrapper">

<div class="main_content_wrap">
<?php if($result['products']['success']==1): ?>
<?php $__currentLoopData = $result['products']['product_data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$products): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<!-- Product -->
<article class="article_wrapper pluto-post-box">
<?php echo $__env->make('web.common.product', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</article>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
</div>
<!-- LOAD MORE BUTTON -->

<?php
	if(!empty(app('request')->input('limit'))){
		$record = app('request')->input('limit');
	}else{
		$record = '15';
	}
?>
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
<?php endif; ?>
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

</script><?php /**PATH C:\xampp\htdocs\food2\resources\views/web/product-sections/newest_product.blade.php ENDPATH**/ ?>