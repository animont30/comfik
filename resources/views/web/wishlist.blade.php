@extends('web.layout')
@section('content')
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
			@foreach($result['authors'] as $author)
			<div class="user-item">
				<div class="userImg position-relative"> 
				@if(!empty($author->avatar))
					<img src="{{asset($author->avatar)}}" alt="user image" class="img-fluid">
				@else
					<img src="{{asset('images/media/2020/11/OimK016812.png')}}" alt="user image" class="img-fluid">
				@endif
					<div class="overlay_user_contain d-flex align-item-center justify-content-center flex-column">
						<div class="recipes d-flex"> <img src="{{asset('./images/media/2021/08/recipes.png')}}" alt="Recipes icons"> <span>{{$author->totalrecipes}}</span> </div>
						<div class="likes pt-2">
							<a href="{{ URL::to('/author/'.$author->id)}}" title="Like" class=" d-flex"> <img src="{{asset('./images/media/2021/08/heart.png')}}" alt="Heart icon"> <span>{{$author->totallikes}}</span> </a>
						</div>
					</div>
				</div>
				<div class="user_detail">
					<h5><a href="{{ URL::to('/author/'.$author->id)}}" title="User name">{{$author->first_name}} {{$author->last_name}} </a></h5> <span>{{$author->totalrecipes}} Recipes</span> <span>{{$author->district}}</span> </div>
			</div>
			@endforeach
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
							  <form class="form-inline filterForm_Wrapper" action="{{ URL::to('/wishlist')}}" id="load_products_form">
                                          <input type="hidden" name="min_price"  value="0">
                                          <input type="hidden" name="max_price"  value="10000">
                                          @if(isset($_GET['price']))
                                          <input type="hidden" name="price"  value="{{ $_GET['price'] }}">
                                          @endif
                                            <input type="hidden" value="1" name="page_number" id="page_number">
                                            @if(!empty(app('request')->input('search')))
                                             <input type="hidden"  name="search" value="{{ app('request')->input('search') }}">
                                            @endif
                                          
											<div class="form-group">
												<label>@lang('Category')</label>
												<div class="select-control">
													<select name="category" id="category" class="form-control">
													<option value="all"
													@if(empty(app('request')->input('category')))
														selected="selected"
													@endif
													>All</option>
													@foreach($result['categories'] as $cat)
														<option value="{{$cat->categories_id}}"
														 @if(app('request')->input('category') == $cat->categories_id)
															 selected="selected"
														 @endif

														>{{$cat->categories_name}}</option>
													@endforeach
													</select>
												</div>
											</div>
                                             <input type="hidden"  name="load_products" value="1">
  
                                             <input type="hidden"  name="products_style" id="products_style" value="grid">
               
                                            
                                            <div class="form-group">
                                                <label>@lang('website.Sort')</label>
                                                <div class="select-control">
                                                <select name="type" id="sortbytype" class="form-control">
                                                  <option value="desc" @if(app('request')->input('type')=='desc') selected @endif>@lang('website.Newest')</option>
                                                  <option value="atoz" @if(app('request')->input('type')=='atoz') selected @endif>@lang('website.A - Z')</option>
                                                  <option value="ztoa" @if(app('request')->input('type')=='ztoa') selected @endif>@lang('website.Z - A')</option>
                                                  <option value="hightolow" @if(app('request')->input('type')=='hightolow') selected @endif>@lang('website.Price: High To Low')</option>
                                                  <option value="lowtohigh" @if(app('request')->input('type')=='lowtohigh') selected @endif>@lang('website.Price: Low To High')</option>
                                                  <!--option value="topseller" @if(app('request')->input('type')=='topseller') selected @endif>@lang('website.Top Seller')</option>
                                                  <option value="special" @if(app('request')->input('type')=='special') selected @endif>@lang('website.Special Products')</option-- >
                                                  <option value="mostliked" @if(app('request')->input('type')=='mostliked') selected @endif>@lang('website.Most Liked')</option>
                                                </select>
                                                </div>
                                              </div>
  
               
                                              
                                              <div class="form-group">
                                                <label>@lang('website.Limit')</label>
                                                <div class="select-control">
                                                  <select class="form-control"name="limit"id="sortbylimit">
                                                    <option value="15" @if(app('request')->input('limit')=='15') selected @endif>15</option>
                                                    <option value="30" @if(app('request')->input('limit')=='30') selected @endif>30</option>
                                                    <option value="60" @if(app('request')->input('limit')=='60') selected @endif>60</option>
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
							 @if(!empty($result['products']['product_data']) and count($result['products']['product_data'])>0)
							@foreach($result['products']['product_data'] as $key=>$products)
							@if($i>0)
							<hr class="border-line">
							@endif
							<?php $i++; ?>
								<article class="article_wrapper pluto-post-box">
								<div class="remove_thisBookmarked"><a href="{{ URL::to("/UnlikeMyProduct")}}/{{$products->products_id}}"><i class="fa fa-times"></i></a> </div>
									@include('web.common.product')
								</article>
                                <!-- ARTICLE -->
								@endforeach
						@else
							<h5>@lang('website.No Record Found!')</h5>
						@endif
								
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
@if(count($result['products']['product_data']) < $record )
	style="display:none !important"
@endif
><i class="icon-plus mr-3"></i>@lang('LOAD MORE POSTS')</button>
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
								@lang('website.My Account')
						</h2>
						<hr >
					</div>

				<ul class="list-group">
						<li class="list-group-item">
								<a class="nav-link" href="{{ URL::to('/profile')}}">
										<i class="fas fa-user"></i>
									@lang('website.Profile')
								</a>
						</li>
						<li class="list-group-item">
								<a class="nav-link" href="{{ URL::to('/wishlist')}}">
										<i class="fas fa-heart"></i>
								 @lang('website.Wishlist')
								</a>
						</li>
						<li class="list-group-item">
								<a class="nav-link" href="{{ URL::to('/orders')}}">
										<i class="fas fa-shopping-cart"></i>
									@lang('website.Orders')
								</a>
						</li>
						<li class="list-group-item">
								<a class="nav-link" href="{{ URL::to('/shipping-address')}}">
										<i class="fas fa-map-marker-alt"></i>
								 @lang('website.Shipping Address')
								</a>
						</li>
						<li class="list-group-item">
								<a class="nav-link" href="{{ URL::to('/logout')}}">
										<i class="fas fa-power-off"></i>
									@lang('website.Logout')
								</a>
						</li>
					</ul>

			</div> -->
			<!-- <div class="col-12 col-lg-9 ">
					<div class="heading">
							<h2>
									@lang('website.Wishlist')
							</h2>
							<hr >
						</div>

					<div class="col-12 media-main">
						<?php $i=0;?>
						@if(!empty($result['products']['product_data']) and count($result['products']['product_data'])>0)
						@foreach($result['products']['product_data'] as $key=>$products)  
						<div class="product">
						@if($i>0)
						<hr class="border-line">
						@endif
						<?php $i++; ?>
							<article>

								<div class="media">
									<img class="img-fluid" src="{{asset('').$products->image_path}}" alt="{{$products->products_name}}">
									<div class="media-body">
									  <div class="row">
										<div class="col-12 col-md-8  texting">
										  <h4 class="title"><a href="{{ URL::to('/product-detail/'.$products->products_slug)}}">{{$products->products_name}}</a></h4>
										  
										  
										  
										  

  
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
            @if(!empty($products->flash_price))
            <sub class="total_price">{{Session::get('symbol_left')}}{{$flash_price+0}}{{Session::get('symbol_right')}}</sub>
            <span>{{Session::get('symbol_left')}}{{$orignal_price+0}}{{Session::get('symbol_right')}} </span> 
            @elseif(!empty($products->discount_price))
            <price class="total_price">{{Session::get('symbol_left')}}{{$discount_price+0}}{{Session::get('symbol_right')}}</price>
            <span>{{Session::get('symbol_left')}}{{$orignal_price+0}}{{Session::get('symbol_right')}} </span> 
            @else
            <price class="total_price">{{Session::get('symbol_left')}}{{$orignal_price+0}}{{Session::get('symbol_right')}}</price>
            @endif
										   </div>
										  <div class="wishlist-discription">
											<?=stripslashes($products->products_description)?>
										  </div>
										 
										  <div class="buttons">
											@if($products->products_type==0)
											@if(!in_array($products->products_id,$result['cartArray']))
												@if($result['commonContent']['settings']['Inventory'])
													@if($products->defaultStock < 0)
														<button type="button" class="btn  btn-danger swipe-to-top" products_id="{{$products->products_id}}">@lang('website.Out of Stock')</button>
													@else
														<button type="button" class="btn  btn-secondary cart swipe-to-top" products_id="{{$products->products_id}}">@lang('website.Add to Cart')</button>
													@endif
												@else
													<button type="button" class="btn  btn-secondary cart swipe-to-top" products_id="{{$products->products_id}}">@lang('website.Add to Cart')</button>
												@endif
													
												@else
													<button type="button" class="btn btn-secondary active swipe-to-top">@lang('website.Added')</button>
												@endif
											@elseif($products->products_type==1)
												<a class="btn  btn-secondary swipe-to-top" href="{{ URL::to('/product-detail/'.$products->products_slug)}}">@lang('website.View Detail')</a>
											@elseif($products->products_type==2)
												<a href="{{$products->products_url}}" target="_blank" class="btn  btn-secondary swipe-to-top">@lang('website.External Link')</a>
											@endif
										  </div>
										</div>
										<div class="col-12 col-md-4 detail">
										  <div class="share"><a href="{{ URL::to("/UnlikeMyProduct")}}/{{$products->products_id}}">@lang('website.Remove') &nbsp;<i class="fas fa-trash-alt"></i></a> </div>
										</div>
										</div>
									</div>									
								</div>								
							</article>
						</div>
						
						@endforeach
						@else
							<h5>@lang('website.No Record Found!')</h5>
						@endif
					</div>
					

				 ............the end..... -->
			<!--</div>
		</div>
	</div>
</section>  -->
@endsection


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
