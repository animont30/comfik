@extends('web.layout')
@section('content')
       <!-- End Header Content -->

       <!-- NOTIFICATION CONTENT -->
         @include('web.common.notifications')
      <!-- END NOTIFICATION CONTENT -->

       <!-- Carousel Content -->
       <?php  echo $final_theme['carousel'];  ?><pre><?php //print_r($result['categories']);?></pre>
       <!-- Fixed Carousel Content -->

      <!-- Banners Content -->
      <!-- USER SLIDER -->
		<div class="user-slider-wrapper home-user-slider slider my-4 mb-5 px-3">
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
      <!-- Products content -->
      <section class="product-list-wrapper mt-3 mb-3">
			<div class="container-fluid">
				<!-- ====filter bar==== -->
				<div class="row">
					<div class="col-12">
					
					
					  <form class="form-inline filterForm_Wrapper" action="{{ URL::to('/shop')}}" id="load_products_form">
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
                                                  <option value="special" @if(app('request')->input('type')=='special') selected @endif>@lang('website.Special Products')</option-->
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
										@foreach($result['categories'] as $cat)
										<div class="index-filter-option" data-filter-value="filter-cat-{{$cat->categories_id}}">{{$cat->categories_name}}</div>
										@endforeach
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
            @include($r)
      
      <?php

          }
       }
      
      ?>
@include('web.common.scripts.addToCompare')
@include('web.common.scripts.Like')
@endsection
