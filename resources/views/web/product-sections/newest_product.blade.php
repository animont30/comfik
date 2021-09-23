<!-- Products content -->
<!-- @if($result['products']['success']==1)

<section class="new-products-content" >
<div class="container">
<div class="products-area">
<div class="row justify-content-center">
<div class="col-12 col-lg-6">
<div class="pro-heading-title">
<h2> @lang('website.NEW ARRIVAL')
</h2>
<p>@lang('website.Newest Products Detail')
</p>
</div>
</div>
</div>
<div class="row">      
@if($result['products']['success']==1)
@foreach($result['products']['product_data'] as $key=>$products)
<div class="col-12 col-sm-6 col-lg-3">
 Product
{{-- @include('web.common.product') --}}
</div>
@endforeach
@endif

</div>
</div>
</div>  
</section>
@endif  -->

@if($result['products']['success']==1)
<section class="product-list-wrapper">
<div class="container-fluid">
<div class="row">
<div class="col-12">
<div class="product-list-wrapper">

<div class="main_content_wrap">
@if($result['products']['success']==1)
@foreach($result['products']['product_data'] as $key=>$products)
<!-- Product -->
<article class="article_wrapper pluto-post-box">
@include('web.common.product')
</article>
@endforeach
@endif
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
@if(count($result['products']['product_data']) < $record )
	style="display:none !important"
@endif
><i class="icon-plus mr-3"></i>@lang('LOAD MORE POSTS')</button>
							
</div>
</div>
</div>
</div>
</section>
@endif
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
		$('#load_products').html("<img src='{{ asset('web/images/miscellaneous/ajax-loader.gif') }}' /> ");
		setTimeout(() => {
			var page_number = jQuery('#page_number').val();
			var total_record = jQuery('#total_record').val();
			var products_style = jQuery('#products_style').val();
			var pagelayout = jQuery('#pagelayout').val();
			
			var formData = jQuery("#load_products_form").serialize();
			jQuery.ajax({
			headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
				url: '{{ URL::to("/filterProducts")}}',
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