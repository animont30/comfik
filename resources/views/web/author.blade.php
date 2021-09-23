@extends('web.layout')
@section('content')

<!-- MAIN CONTENT -->
<main class="main-content">
        <div class="author-banner-contain">
		@if(!empty($result['author']->wallimage))
			<img src="{{asset($result['author']->wallimage)}}" alt="banner image">
		@else
            <img src="{{asset('./images/media/2021/08/banner.jpg')}}" alt="banner image">
		@endif
        </div>

        <!-- ABOUT AUTHOR -->
        <div class="container about_author_main_wrapper mb-5">
            <div class="row">
                <div class="col-md-3">
                    <div class="author_pic">
                        <img src="{{asset($result['author']->avatar)}}" alt="Author Image">
                    </div>
                    <div class="author_social_handles pl-md-3 my-4">
                      <!-- AddToAny BEGIN -->
						<div class="a2a_kit a2a_kit_size_32 a2a_default_style">
						<a class="a2a_dd" href="https://www.addtoany.com/share"></a>
						<a class="a2a_button_facebook"></a>
						<a class="a2a_button_twitter"></a>
						<a class="a2a_button_pinterest"></a>
						<a class="a2a_button_email"></a>
						</div>
						<script async src="https://static.addtoany.com/menu/page.js"></script>
						<!-- AddToAny END -->
                    </div>
					@if($result['products']['success'] == '1')
                    <div class="author_comunity_wrap pl-md-3">
                        <div class="comu_item">
                            <img src="{{asset('./images/media/2021/08/recipe.png')}}" alt="Recipes">
                            <span> {{count($result['products']['product_data']) }} Recipes</span>
                        </div>
                        <div class="comu_item">
                            <img src="{{asset('./images/media/2021/08/heart-red.png')}}" alt="Likes">
                            <span> {{$result['totallikes']}} Homechef Likes</span>
                        </div>
                        <div class="comu_item">
                            <img src="{{asset('./images/media/2021/08/comment.png')}}" alt="Reviews icon">
                            <span>{{$result['totalreviews']}} Reviews</span>
                        </div>
                        <div class="comu_item">
                            <img src="{{asset('./images/media/2021/08/users.png')}}" alt="Followers">
                            <span>{{$result['totalviewed']}} Viewed</span>
                        </div>
                        <div class="comu_item">
                            <img src="{{asset('./images/media/2021/08/forward.png')}}" alt="Shared">
                            <span>{{$result['totalordered']}} times ordered</span>
                        </div>
                    </div>
					@endif
                </div>
                <div class="col-md-9">
                    <div class="about_author_wrapper py-3">
                        <h2>{{$result['author']->first_name}} {{$result['author']->last_name}}<span> ,{{$result['author']->locality}} {{$result['author']->district}}</span></h2>
                        <p>{{$result['author']->biodata}}</p>
                    </div>
                </div>
            </div>
        </div>

		@if($result['products']['success'] == '1')
        <section class="product-list-wrapper mt-4 px-md-5">
			<div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <h2 class="section-title">{{$result['author']->first_name}} {{$result['author']->last_name}} Recipes</h2>
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
							 @foreach($result['products']['product_data'] as $prod) 
							 
								<article class="article_wrapper pluto-post-box">
									<div class="post-body">
										<div class="post-media-body">
											<a href="{{ URL::to('/product-detail/'.$prod->products_slug)}}" class="wrap_img_art">
												<div class="product_img_contain position-relative"> 
                                                <img src="{{asset($prod->image_path)}}" alt="" /> 
                                                <div class="figure-shade">
													<!-- <span class="icon-eye"></span> -->
												</div>
                                                </div>
											</a>
											<div class="contain_ratting">
												<fieldset class="disabled-ratings">                                           
                <label class = "full fa @if($prod->rating >= 1) active @endif" for="star1" title="@lang('website.meh_1_stars')"></label>
                <label class = "full fa @if($prod->rating >= 2) active @endif" for="star_2" title="@lang('website.meh_2_stars')"></label>                                          
                <label class = "full fa @if($prod->rating >= 3) active @endif" for="star_3" title="@lang('website.pretty_good_3_stars')"></label>                                          
                <label class = "full fa @if($prod->rating >= 4) active @endif" for="star_4" title="@lang('website.pretty_good_4_stars')"></label>
                <label class = "full fa @if($prod->rating >= 5) active @endif" for="star_5" title="@lang('website.awesome_5_stars')"></label>
      </fieldset>        
										    </div>
										</div>
										<div class="post-content-body">
											<h4 class="post-title entry-title"><a href="{{ URL::to('/product-detail/'.$prod->products_slug)}}">{{$prod->products_name}}</a></h4>
											<div class="post-content entry-summary position-relative">
												<p> {{substr(strip_tags($prod->products_description),0,200)}}... </p>
												<div class="read-more-link"><a href="{{ URL::to('/product-detail/'.$prod->products_slug)}}">Read More</a></div>
												@if($prod->products_price>0)
												<div class="recipes-buzzer-wrap position-absolute">
													<a href="javascript:void(0);">
														<img src="{{asset('./images/media/2021/08/buzzer.png')}}" alt="Buzzer icon">
													</a>
												</div>
												@endif
											</div>
											<div class="order-item-wrap mt-3">
												<ul class="wrap-order-badge">
												  <li class="item">
												  
													<a href="javascript:void(0);" class="cart swipe-to-top" products_id="{{$prod->products_id}}" data-toggle="tooltip" data-placement="bottom" title="@lang('website.Add to Cart')">Order this item</a>         
													</li>
												  <li class="item"></li>
												  <li class="item card_product_price">₹{{$prod->products_price}}</li>
												</ul>
											  </div>

										</div>
										<div class="author-contain d-flex justify-content-between">
											<div class="author-social-wrap author-selfIn-list d-flex align-items-center justify-content-between">
												<div class="social-item text-center">
													<img src="{{asset('./images/media/2021/08/view.png')}}" alt="View icon">
													<sapn class="d-block count-num">{{$prod->products_viewed}}</sapn>
												</div>
												<div class="social-item text-center">
													<img src="{{asset('./images/media/2021/08/comment.png')}}" alt="Comment icon">
													<sapn class="d-block count-num">{{$prod->total_user_rated}}</sapn>
												</div>
												<div class="social-item text-center">
													<img src="{{asset('./images/media/2021/08/forward.png')}}" alt="Forward icon">
													<sapn class="d-block count-num">{{$prod->products_liked}}</sapn>
												</div>
                                                <div class="social-item text-center">
													<img src="{{asset('./images/media/2021/08/order-red.png')}}" alt="Order icon">
													<sapn class="d-block count-num">{{$prod->products_ordered}} Times</sapn>
												</div>
											</div>
										</div>
									</div>
								</article>
                                <!-- ARTICLE -->
								@endforeach
							</div>

							<!-- LOAD MORE BUTTON -->

						</div>
					</div>
				</div>
			</div>
		</section>
		@endif;
    </main>
 @endsection
