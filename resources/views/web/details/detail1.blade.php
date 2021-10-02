<div class="container-fuild">
  <nav aria-label="breadcrumb">
      <div class="container">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ URL::to('/')}}">@lang('website.Home')</a></li>

              @if(!empty($result['category_name']) and !empty($result['sub_category_name']))
                <li class="breadcrumb-item active"><a href="{{ URL::to('/shop?category='.$result['category_slug'])}}">{{$result['category_name']}}</a></li>
                <li class="breadcrumb-item active"><a href="{{ URL::to('/shop?category='.$result['sub_category_slug'])}}">{{$result['sub_category_name']}}</a></li>
              @elseif(!empty($result['category_name']) and empty($result['sub_category_name']))
                <li class="breadcrumb-item active"><a href="{{ URL::to('/shop?category='.$result['category_slug'])}}">{{$result['category_name']}}</a></li>
              @endif
              @if($result['detail']['product_data'])
              <li class="breadcrumb-item active">{{$result['detail']['product_data'][0]->products_name}}</li>
              @endif
          </ol>
      </div>
    </nav>
</div> 

<section >
@if($result['detail']['product_data'])
  <!-- <div class="container">
    <div class="page-heading-title">
        <h2> {{$result['detail']['product_data'][0]->products_name}} 
        </h2>         
    </div>
</div> -->
<!--
<section class="product-page real">
  <div class="container"> 
    <div class="row">
      <div class="col-12 col-lg-6  ">
          <div class="slider-wrapper pd2">
              <div class="slider-for">
                @if(!empty($result['detail']['product_data'][0]->products_video_link))
                <a class="slider-for__item ex1 fancybox-button iframe">
                  {!! $result['detail']['product_data'][0]->products_video_link !!}                 
                </a>
                @endif
				@if(!empty($result['detail']['product_data'][0]->default_images))
                <a class="slider-for__item ex1 fancybox-button" href="{{asset('').$result['detail']['product_data'][0]->default_images }}" data-fancybox-group="fancybox-button">
                  <img src="{{asset('').$result['detail']['product_data'][0]->default_images }}" alt="Zoom Image" />
                </a>
           
                @foreach( $result['detail']['product_data'][0]->images as $key=>$images )
                  @if($images->image_type == 'LARGE')

                  <a class="slider-for__item ex1 fancybox-button" href="{{asset('').$images->image_path }}" data-fancybox-group="fancybox-button" >
                    <img src="{{asset('').$images->image_path }}" alt="Zoom Image" />
                  </a>
                  
                  @elseif($images->image_type == 'ACTUAL')
                  <a class="slider-for__item ex1 fancybox-button" href="{{asset('').$images->image_path }}" data-fancybox-group="fancybox-button">
                    <img src="{{asset('').$images->image_path }}" alt="Zoom Image" />
                  </a>
                  @endif
                @endforeach
				 @endif
              </div>
            
              <div class="slider-nav">
                @if(!empty($result['detail']['product_data'][0]->products_video_link))
                <div class="slider-nav__item">
                  <img src="{{asset('web/images/miscellaneous/video-thumbnail.jpg')}}" alt="Zoom Image"/>
                </div>
                @endif
				@if(!empty($result['detail']['product_data'][0]->default_images))
                <div class="slider-nav__item">
                  <img src="{{asset('').$result['detail']['product_data'][0]->default_thumb }}" alt="Zoom Image"/>
                </div>
            
                @foreach( $result['detail']['product_data'][0]->images as $key=>$images )
                  
                  @if($images->image_type == 'THUMBNAIL')
                    <div class="slider-nav__item">
                      <img src="{{asset('').$images->image_path }}" alt="Zoom Image"/>
                    </div>
                  @endif
                @endforeach
                 @endif
              </div>
            </div>
      </div>
      <div class="col-12 col-lg-6 d-none">
        <div class="general-product" data-aos="fade-up"
        data-aos-anchor-placement="top-bottom">
          <div class="container">
              <div class="product-m-carousel-js">
                <div class="col-12 col-md-12 col-lg-6">
                  <div class="product">
                    <article>
					@if(!empty($result['detail']['product_data'][0]->default_images))
                      <img src="{{asset('').$result['detail']['product_data'][0]->default_images  }}" class="img-fluid" alt="blogImage">
				  
                        <div class="over"></div>
                    </article>
                  </div>
                </div>

                @foreach( $result['detail']['product_data'][0]->images as $key=>$images )
                  @if($images->image_type == 'LARGE')

                  <div class="col-12 col-md-12 col-lg-6">
                    <div class="product">
                      <article>
                        <img src="{{asset('').$images->image_path }}" class="img-fluid" alt="blogImage">
                          <div class="over"></div>
                      </article>
                    </div>
                  </div>
                  
                  @elseif($images->image_type == 'ACTUAL')
                  <div class="col-12 col-md-12 col-lg-6">
                    <div class="product">
                      <article>
                        <img src="{{asset('').$images->image_path }}" class="img-fluid" alt="blogImage">
                          <div class="over"></div>
                      </article>
                    </div>
                  </div>
                  @endif
                @endforeach
@endif
                
                </div>  
          </div>
        </div>  
      </div>
      <div class="col-12 col-lg-6">
          <div class="row">
              <div class="col-12 col-md-12">
                <div class="badges">

                  <?php /*
                  //dd($result['detail']['product_data'][0]->flash_start_date);
                  $current_date = date("Y-m-d", strtotime("now"));

                  $string = substr($result['detail']['product_data'][0]->products_date_added, 0, strpos($result['detail']['product_data'][0]->products_date_added, ' '));
                  $date=date_create($string);
                  date_add($date,date_interval_create_from_date_string($web_setting[20]->value." days"));

                  $after_date = date_format($date,"Y-m-d");

                  if($after_date>=$current_date){
                    print '<span class="badge badge-info">';
                    print __('website.New');
                    print '</span>';
                  }*/
                ?>

                <?php
                $discount_percentage = 0;
                if(!empty($result['detail']['product_data'][0]->discount_price)){
                  $discount_price = $result['detail']['product_data'][0]->discount_price * session('currency_value');
                }
                $orignal_price = $result['detail']['product_data'][0]->products_price * session('currency_value');

                if(!empty($result['detail']['product_data'][0]->discount_price)){

                if(($orignal_price+0)>0){
                  $discounted_price = $orignal_price-$discount_price;
                  $discount_percentage = $discounted_price/$orignal_price*100;
                }else{
                  $discount_percentage = 0;
                  $discounted_price = 0;
                }
                ?>             
                
                <?php }
                
                ?>
                @if($discount_percentage>0)
                <span class="badge badge-danger"><?php /*echo (int)$discount_percentage;*/ ?>%</span>
                @endif
                @if($result['detail']['product_data'][0]->is_feature == 1)
                <span class="badge badge-success">@lang('website.Featured')</span>     
                @endif
                
                
              </div>

                <h5 class="pro-title">{{$result['detail']['product_data'][0]->products_name}}</h5>
          
          <div class="price">                     
            <?php /*

            if(!empty($result['detail']['product_data'][0]->discount_price)){
              $discount_price = $result['detail']['product_data'][0]->discount_price * session('currency_value');
            }
            if(!empty($result['detail']['product_data'][0]->flash_price)){
              $flash_price = $result['detail']['product_data'][0]->flash_price * session('currency_value');
            }
              $orignal_price = $result['detail']['product_data'][0]->products_price * session('currency_value');


             if(!empty($result['detail']['product_data'][0]->discount_price)){

              if(($orignal_price+0)>0){
                $discounted_price = $orignal_price-$discount_price;
                $discount_percentage = $discounted_price/$orignal_price*100;
                $discounted_price = $result['detail']['product_data'][0]->discount_price;

             }else{
               $discount_percentage = 0;
               $discounted_price = 0;
             }
            }
            else{
              $discounted_price = $orignal_price;
            }
            //  dd($result['currency_value']);*/
            ?>
            @if(!empty($result['detail']['product_data'][0]->flash_price))
            <sub class="total_price">{{Session::get('symbol_left')}}{{$flash_price}}{{Session::get('symbol_right')}}</sub>
            <span>{{Session::get('symbol_left')}}{{$orignal_price}}{{Session::get('symbol_right')}} </span> 

            @elseif(!empty($result['detail']['product_data'][0]->discount_price))
            <price class="total_price">{{Session::get('symbol_left')}}{{$discount_price}}{{Session::get('symbol_right')}}</price>
            <span>{{Session::get('symbol_left')}}{{$orignal_price}}{{Session::get('symbol_right')}} </span> 
            @else
            
            <price class="total_price">{{Session::get('symbol_left')}} {{ $orignal_price }} {{Session::get('symbol_right')}}</price>
            @endif
                               
            </div>

            <div class="pro-rating">
            <fieldset class="disabled-ratings">                                           
                <label class = "full fa @if($result['detail']['product_data'][0]->rating >= 1) active @endif" for="star1" title="@lang('website.meh_1_stars')"></label>
                <label class = "full fa @if($result['detail']['product_data'][0]->rating >= 2) active @endif" for="star_2" title="@lang('website.meh_2_stars')"></label>                                          
                <label class = "full fa @if($result['detail']['product_data'][0]->rating >= 3) active @endif" for="star_3" title="@lang('website.pretty_good_3_stars')"></label>                                          
                <label class = "full fa @if($result['detail']['product_data'][0]->rating >= 4) active @endif" for="star_4" title="@lang('website.pretty_good_4_stars')"></label>
                <label class = "full fa @if($result['detail']['product_data'][0]->rating >= 5) active @endif" for="star_5" title="@lang('website.awesome_5_stars')"></label>
      </fieldset>                                        
              <a href="#review" id="review-tabs" data-toggle="pill" role="tab" class="btn-link">{{$result['detail']['product_data'][0]->total_user_rated}} @lang('website.Reviews') </a>
            </div>

          <div class="pro-infos">
              <div class="pro-single-info"><b>@lang('website.Product ID') : </b>{{$result['detail']['product_data'][0]->products_id}}</div>
              <div class="pro-single-info"><b>@lang('website.Categroy')  : </b>
                <?php /*
                $cates = '';  
                ?>
                @foreach($result['detail']['product_data'][0]->categories as $key=>$category)
                    
                  <?php
                    $cates =  "<a href=".url('shop?category='.$category->categories_name).">".$category->categories_name."</a>";
                  ?>  
                  
                @endforeach
                <?php 
                echo $cates;*/
                ?>
                </div>
             
                <div class="pro-single-info"><b>@lang('website.Available') : </b>
              

                @if($result['detail']['product_data'][0]->products_type == 0)
                    @if($result['commonContent']['settings']['Inventory'])
                        @if($result['detail']['product_data'][0]->defaultStock < 0)
                        <span class="text-secondary">@lang('website.Out of Stock')</span>
                        @else
                        <span class="text-secondary">@lang('website.In stock')</span>
                        @endif
                    @else 
                      <span class="text-secondary">@lang('website.In stock')</span>    
                    @endif
                @endif

                @if($result['detail']['product_data'][0]->products_type == 1)
                <span class="text-secondary variable-stock"></span>
                @endif

                @if($result['detail']['product_data'][0]->products_type == 2)
                <span class="text-secondary">@lang('website.External')</span>
                @endif
              </div>-->
              <p class="d-none">
              @if($result['detail']['product_data'][0]->products_min_order>0)
                  
                    
                  <div class="pro-single-info d-none" id="min_max_setting3"><b>@lang('website.Min Order Limit') : </b>{{$result['detail']['product_data'][0]->products_min_order}}</div>
                    
                 
                @endif
               
                 
                    
                  <div class="pro-single-info d-none"  @if($result['detail']['product_data'][0]->products_max_stock==9999) style="display:none;" @endif id="min_max_setting2"><b>@lang('website.Max Order Limit') : </b>{{$result['detail']['product_data'][0]->products_max_stock}}</div>
                    
                 
                
                </p>
      <!--    </div>-->

          <form name="attributes" id="add-Product-form" method="post" >
            <input type="hidden" name="products_id" value="{{$result['detail']['product_data'][0]->products_id}}">

            <input type="hidden" name="products_price" id="products_price" value="@if(!empty($result['detail']['product_data'][0]->flash_price)) {{$result['detail']['product_data'][0]->flash_price+0}} @elseif(!empty($result['detail']['product_data'][0]->discount_price)){{$result['detail']['product_data'][0]->discount_price+0}}@else{{$result['detail']['product_data'][0]->products_price+0}}@endif">

            <input type="hidden" name="checkout" id="checkout_url" value="@if(!empty(app('request')->input('checkout'))) {{ app('request')->input('checkout') }} @else false @endif" >

            <input type="hidden" id="max_order" value="@if(!empty($result['detail']['product_data'][0]->products_max_stock)){{ $result['detail']['product_data'][0]->products_max_stock }}@else 0 @endif" >
             @if(!empty($result['cart']))
              <input type="hidden"  name="customers_basket_id" value="{{$result['cart'][0]->customers_basket_id}}" >
             @endif

          <!--
          @if(count($result['detail']['product_data'][0]->attributes)>0)
          <div class="pro-options row">
          <?php /*
              $index = 0;*/
          ?>
            @foreach( $result['detail']['product_data'][0]->attributes as $key=>$attributes_data )
            <?php /*
                $functionValue = 'function_'.$key++; */
            ?>
            <input type="hidden" name="option_name[]" value="{{ $attributes_data['option']['name'] }}" >
            <input type="hidden" name="option_id[]" value="{{ $attributes_data['option']['id'] }}" >
            <input type="hidden" name="{{ $functionValue }}" id="{{ $functionValue }}" value="0" >
            <input id="attributeid_<?=$index?>" type="hidden" value="">
            <input id="attribute_sign_<?=$index?>" type="hidden" value="">
            <input id="attributeids_<?=$index?>" type="hidden" name="attributeid[]" value="" >
            
              <div class="attributes col-12 col-md-4 box">
                  <label class="">{{ $attributes_data['option']['name'] }}</label>
                  <div class="select-control">
                  <select name="{{ $attributes_data['option']['id'] }}" onChange="getQuantity()" class="currentstock form-control attributeid_<?/*=$index++*/?>" attributeid = "{{ $attributes_data['option']['id'] }}">
                    @if(!empty($result['cart']))
                      @php
                        $value_ids = array();
                        foreach($result['cart'][0]->attributes as $values){
                            $value_ids[] = $values->options_values_id;
                        }
                      @endphp
                        @foreach($attributes_data['values'] as $values_data)
                          @if(!empty($result['cart']))
                          <option @if(in_array($values_data['id'],$value_ids)) selected @endif attributes_value="{{ $values_data['products_attributes_id'] }}" value="{{ $values_data['id'] }}" prefix = '{{ $values_data['price_prefix'] }}'  value_price ="{{ $values_data['price']+0 }}" >{{ $values_data['value'] }}</option>
                          @endif
                        @endforeach
                      @else
                      
                        @foreach($attributes_data['values'] as $values_data)
                        
                          <option @if($values_data['is_default']) selected @endif attributes_value="{{ $values_data['products_attributes_id'] }}" value="{{ $values_data['id'] }}" prefix = '{{ $values_data['price_prefix'] }}'  value_price ="{{ $values_data['price']+0 }}" >{{ $values_data['value'] }}</option>
                        @endforeach
                      @endif
                    </select>
                  </div> 
                </div>                 
            
            @endforeach
          </div>
          @endif
        
      
         @if(!empty($result['detail']['product_data'][0]->flash_start_date))
          <div class="countdown pro-timer" data-toggle="tooltip" data-placement="bottom" title="@lang('website.Countdown Timer')" id="counter_{{$result['detail']['product_data'][0]->products_id}}" >                               
            <span class="days">0<small>@lang('website.Days') </small></span>
            <span class="hours">0<small>@lang('website.Hours')</small></span>
            <span class="mintues">0<small>@lang('website.Minutes')</small></span>
            <span class="seconds">0<small>@lang('website.Seconds')</small></span>
          </div>
          @endif
          <div class="pro-counter" @if(!empty($result['detail']['product_data'][0]->flash_start_date) and $result['detail']['product_data'][0]->server_time < $result['detail']['product_data'][0]->flash_start_date ) style="display: none" @endif>
              <div class="input-group item-quantity">                    
                  {{-- <input type="text" id="quantity1" name="quantity" class="form-control" value="10">                       --}}
                  <input type="text" readonly name="quantity" class="form-control qty" value="@if(!empty($result['cart'])) {{$result['cart'][0]->customers_basket_quantity}} @else @if($result['detail']['product_data'][0]->products_min_order>0 and $result['detail']['product_data'][0]->defaultStock > $result['detail']['product_data'][0]->products_min_order) {{$result['detail']['product_data'][0]->products_min_order}} @else 1 @endif @endif" min="{{$result['detail']['product_data'][0]->products_min_order}}" max="{{$result['detail']['product_data'][0]->products_max_stock}}">    <span class="input-group-btn">
                  
                      <button type="button" class="quantity-plus1 btn qtyplus">
                          <i class="fas fa-plus"></i>
                      </button>
                  
                      <button type="button" class="quantity-minus1 btn qtyminus">
                          <i class="fas fa-minus"></i>
                      </button>
                  </span>
                </div>-->
                
                @if(!empty($result['detail']['product_data'][0]->flash_start_date) and $result['detail']['product_data'][0]->server_time < $result['detail']['product_data'][0]->flash_start_date )
                  @else
                    @if($result['detail']['product_data'][0]->products_type == 0)
                    
                      @if($result['commonContent']['settings']['Inventory'])
                          @if($result['detail']['product_data'][0]->defaultStock <= 0)
                            <!-- <button class="btn btn-lg swipe-to-top  btn-danger " type="button">@lang('website.Out of Stock')</button> -->
                          @else
                              <!-- <button class="btn btn-secondary btn-lg swipe-to-top add-to-Cart"  type="button" products_id="{{$result['detail']['product_data'][0]->products_id}}">@lang('website.Add to Cart')</button> -->
                          @endif
                      @else
                      <!-- <button class="btn btn-secondary btn-lg swipe-to-top add-to-Cart"  type="button" products_id="{{$result['detail']['product_data'][0]->products_id}}">@lang('website.Add to Cart')</button> -->
                      @endif

                    @else
                          @if($result['commonContent']['settings']['Inventory'])
                          <!-- <button class="btn btn-secondary btn-lg swipe-to-top  add-to-Cart stock-cart" hidden type="button" products_id="{{$result['detail']['product_data'][0]->products_id}}">@lang('website.Add to Cart')</button>
                          <button class="btn btn-danger btn btn-lg swipe-to-top  stock-out-cart" hidden type="button">@lang('website.Out of Stock')</button> -->
                          @else
                          <!-- <button class="btn btn-secondary btn-lg swipe-to-top  add-to-Cart"  type="button" products_id="{{$result['detail']['product_data'][0]->products_id}}">@lang('website.Add to Cart')</button> -->
                          @endif
                    @endif
                  @endif
                  <!--
                  @if($result['detail']['product_data'][0]->products_type == 2)
                    <a href="{{$result['detail']['product_data'][0]->products_url}}" target="_blank" class="btn btn-secondary btn-lg swipe-to-top">@lang('website.External Link')</a>
                  @endif               
        
           </div> -->
          
        </form>
        <!--
          <div class="pro-sub-buttons">
              <div class="buttons">
                  <button class="btn btn-link is_liked" products_id="<?=$result['detail']['product_data'][0]->products_id?>" style="padding-left: 0;"><i class="fas fa-heart"></i> @lang('website.Add to Wishlist') </button>
                  <button type="button" class="btn btn-link" onclick="myFunction3({{$result['detail']['product_data'][0]->products_id}})"><i class="fas fa-align-right"></i>@lang('website.Add to Compare')</button>
              
              </div> -->
              <!-- AddToAny BEGIN -->
            <!--  <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                <a class="a2a_button_facebook"></a>
                <a class="a2a_button_twitter"></a>
                <a class="a2a_button_email"></a>
                </div>
                <script async src="https://static.addtoany.com/menu/page.js"></script>
                 AddToAny END -->
              <!--
          </div>
          
          </div>
        </div>
          <div class="row">
              <div class="col-12 col-md-12">
                <div class="nav nav-pills" role="tablist">
                  <a class="nav-link nav-item  active" href="#description" id="description-tab" data-toggle="pill" role="tab">@lang('website.Descriptions')</a> 
                  <a class="nav-link nav-item" href="#review" id="review-tab" data-toggle="pill" role="tab" >@lang('website.Reviews')</a>
                </div> 
                <div class="tab-content">
                  <div role="tabpanel" class="tab-pane fade active show" id="description" aria-labelledby="description-tab">
                    <?/*=stripslashes($result['detail']['product_data'][0]->products_description)*/?>                        
                  </div>  
                  <div role="tabpanel" class="tab-pane fade " id="review" aria-labelledby="review-tab">
                    <div class="reviews">
                      @if(isset($result['detail']['product_data'][0]->reviewed_customers))
                        <div class="review-bubbles">
                            <h2>
                              @lang('website.Customer Reviews')
                            </h2>                            
                              @foreach($result['detail']['product_data'][0]->reviewed_customers as $key=>$rev)
                              <div class="review-bubble-single">
                                  <div class="review-bubble-bg">
                                      <div class="pro-rating">
                                        <fieldset class="disabled-ratings">                                           
                                          <label class = "full fa @if($rev->reviews_rating >= 5) active @endif" for="star_5" title="@lang('website.awesome_5_stars')"></label>
                                          <label class = "full fa @if($rev->reviews_rating >= 4) active @endif" for="star_4" title="@lang('website.pretty_good_4_stars')"></label>                                          
                                          <label class = "full fa @if($rev->reviews_rating >= 3) active @endif" for="star_3" title="@lang('website.pretty_good_3_stars')"></label>                                          
                                          <label class = "full fa @if($rev->reviews_rating >= 2) active @endif" for="star_2" title="@lang('website.meh_2_stars')"></label>
                                           <label class = "full fa @if($rev->reviews_rating >= 1) active @endif" for="star1" title="@lang('website.meh_1_stars')"></label>
                                        </fieldset>                                          
                                      </div>
                                      <h4>{{$rev->customers_name}}</h4>
                                      <span>{{date("d-M-Y", strtotime($rev->created_at))}}</span>
                                      <p>{{$rev->reviews_text}}</p>
                                  </div>
                                  
                              </div>
                              @endforeach                            
                        </div>
                        @endif
                        @if(Auth::guard('customer')->check())
                        <div class="write-review">
                          <form id="idForm">
                            {{csrf_field()}}
                            <input value="{{$result['detail']['product_data'][0]->products_id}}" type="hidden" name="products_id">
                          <h2>@lang('website.Write a Review')</h2>
                          <div class="write-review-box">
                              <div class="from-group row mb-3">
                                  <div class="col-12"> <label for="inlineFormInputGroup2">@lang('website.Rating')</label></div>
                                  <div class="pro-rating col-12">

                                    <fieldset class="ratings">
                                      
                                      <input type="radio" id="star5" name="rating" value="5" class="rating"/>
                                      <label class = "full fa" for="star5" title="@lang('website.awesome_5_stars')"></label>

                                      <input type="radio" id="star4" name="rating" value="4" class="rating"/>
                                      <label class="full fa" for="star4" title="@lang('website.pretty_good_4_stars')"></label>

                                      <input type="radio" id="star3" name="rating" value="3" class="rating"/>
                                      <label class = "full fa" for="star3" title="@lang('website.pretty_good_3_stars')"></label>

                                      <input type="radio" id="star2" name="rating" value="2" class="rating"/>
                                      <label class="full fa" for="star2" title="@lang('website.meh_2_stars')"></label>

                                      <input type="radio" id="star1" name="rating" value="1" class="rating"/>
                                      <label class = "full fa" for="star1" title="@lang('website.meh_1_stars')"></label> 
                                    
                                  </fieldset>                                     
                                      
                                  </div>
                              </div>                              
                             
                                <div class="from-group row mb-3">
                                    <div class="col-12"> <label for="inlineFormInputGroup3">@lang('website.Review')</label></div>
                                    <div class="input-group col-12">                                      
                                      <textarea name="reviews_text" id="reviews_text" class="form-control" id="inlineFormInputGroup3" placeholder="@lang('website.Write Your Review')"></textarea>
                                    </div>
                                </div>

                                <div class="alert alert-danger" hidden id="review-error" role="alert">
                                 @lang('website.Please enter your review')
                                </div>

                                <div class="from-group">
                                    <button type="submit" id="review_button" disabled class="btn btn-secondary swipe-to-top">@lang('website.Submit')</button>                                    
                                </div>
                          </div>
                          
                        </form>
                        </div>
                        @endif
                    </div>

                      
                  </div> 
              </div>
          </div>      
      
        </div>

      </div>
    </div>
  </div>
</section>

</section>-->

<!-- New design start here -->

<div class="container-fluid px-5 mt-2 mt-lg-5 pt-5">
                    <div class="row align-items-center">
                        <div class="col-sm-12 col-lg-5">
                            <div class="single-recipe-detail">
                                <div class="title_with_ratting_contain d-md-flex align-items-md-center">
                                    <h2>{{$result['detail']['product_data'][0]->products_name}}</h2>

                                    <!-- REVIEW RATTING STAR -->
                                    <div class="single-post-ratting position-relative pro-rating">
                                        <!-- <div class="contain_ratting">
                                            <input type="radio" name="stars" id="star-null" />
                                            <input type="radio" name="stars" id="star-1" />
                                            <input type="radio" name="stars" id="star-2" />
                                            <input type="radio" name="stars" id="star-3" />
                                            <input type="radio" name="stars" id="star-4" checked />
                                            <input type="radio" name="stars" id="star-5" />
                                            <section class="rec_ratWrap">
                                                <label for="star-1">
                                                    <svg width="255" height="240" viewBox="0 0 51 48">
                                                        <path d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z" />
                                                    </svg>
                                                </label>
                                                <label for="star-2">
                                                    <svg width="255" height="240" viewBox="0 0 51 48">
                                                        <path d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z" />
                                                    </svg>
                                                </label>
                                                <label for="star-3">
                                                    <svg width="255" height="240" viewBox="0 0 51 48">
                                                        <path d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z" />
                                                    </svg>
                                                </label>
                                                <label for="star-4">
                                                    <svg width="255" height="240" viewBox="0 0 51 48">
                                                        <path d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z" />
                                                    </svg>
                                                </label>
                                                <label for="star-5">
                                                    <svg width="255" height="240" viewBox="0 0 51 48">
                                                        <path d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z" />
                                                    </svg>
                                                </label>
                                            </section>
                                        </div> -->
                                        <fieldset class="disabled-ratings p-0 border-0">                                           
                                          <label class = "full fa @if($result['detail']['product_data'][0]->rating >= 1) active @endif" for="star1" title="@lang('website.meh_1_stars')"></label>
                                          <label class = "full fa @if($result['detail']['product_data'][0]->rating >= 2) active @endif" for="star_2" title="@lang('website.meh_2_stars')"></label>                                          
                                          <label class = "full fa @if($result['detail']['product_data'][0]->rating >= 3) active @endif" for="star_3" title="@lang('website.pretty_good_3_stars')"></label>                                          
                                          <label class = "full fa @if($result['detail']['product_data'][0]->rating >= 4) active @endif" for="star_4" title="@lang('website.pretty_good_4_stars')"></label>
                                          <label class = "full fa @if($result['detail']['product_data'][0]->rating >= 5) active @endif" for="star_5" title="@lang('website.awesome_5_stars')"></label>
                                </fieldset>
                                    </div>
                                </div>
                                
                                <div class="recipe_contain_social mt-4 d-flex flex-row align-items-center">
                                    <div class="rec_social_item mr-4">
                                        <!-- <a href="#" title="Likes">
                                            <img src="{{asset('./images/media/2021/08/heart-red.png')}}" alt="Heart Icon">
                                            <span>549</span>
                                        </a> -->
                                        <button class="is_liked" products_id="<?=$result['detail']['product_data'][0]->products_id?>" style="padding-left: 0;">
                                        <img src="{{asset('./images/media/2021/08/heart-red.png')}}" alt="Heart Icon">
                                            <span>{{$result['detail']['product_data'][0]->products_liked}}</span>
                                        </button>
                                    </div>
                                    <div class="rec_social_item mr-4">
                                        <a href="#review-tab" title="Comment">
                                            <img src="{{asset('./images/media/2021/08/comment.png')}}" alt="Comment Icon">
                                            <span>{{$result['detail']['product_data'][0]->total_user_rated}} Review</span>
                                        </a>
                                    </div>
                                    <div class="rec_social_item mr-4">
                                        <a href="#" title="Forward">
                                            <img src="{{asset('./images/media/2021/08/forward.png')}}" alt="Forward Icon">
                                            <span>{{$result['detail']['product_data'][0]->products_ordered}}</span>
                                        </a>
                                    </div>
                                    <div class="rec_social_item">
                                        <img src="{{asset('./images/media/2021/08/view.png')}}" alt="Views Icon">
                                        <span>{{$result['detail']['product_data'][0]->products_viewed}} Views</span>
                                    </div>
									
									
				
                                </div>
                            </div>
                        </div>
						
						
						
						
                        <div class="col-sm-12 col-lg-7">
                            <div class="single-recipe-detail d-flex align-items-end flex-column">
                                <div class="recipe-author-info d-flex flex-column flex-md-row align-items-start align-items-md-center">
                                    <div class="author-img">
									@if(!empty($result['author']->avatar))
													<img src="{{asset($result['author']->avatar)}}" alt="author image" class="img-fluid">
												@else
													<img src="{{asset('./images/media/2020/11/OimK016812.png')}}" alt="author image" class="img-fluid">
												@endif
                                        
                                    </div>
                                    <div class="post-created-details">
                                        <h5><a href="#">By {{$result['author']->first_name}} {{$result['author']->last_name}}</a>, {{$result['author']->locality}} on {{$result['detail']['product_data'][0]->created_at}} In <a href="{{ URL::to('/shop?category='.$result['category_slug'])}}">{{$result['category_name']}}</a>.</h5>
                                        <div class="contain-recipe-sharings d-flex align-items-center">
                                            <div class="item-shareing d-flex align-items-center">
                                                <img src="{{asset('./images/media/2021/08/recipe.png')}}" alt="recipes icon">
                                                <span>{{$result['totalrecipes']}}  Recipes</span>
                                            </div>
                                            <div class="item-shareing d-flex align-items-center">
                                                <img src="{{asset('./images/media/2021/08/users.png')}}" alt="Users icon">
                                                <span>{{$result['totalordered']}} Orders</span>
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                        <!-- row -->
                    </div>
                    <!--  =====RECIPE CONTENT=====  -->
                    <div class="row mt-4">
                        <div class="col-12 col-lg-6">
                                <div class="recipe_featured_img d-flex align-items-start flex-column flex-md-row mt-3">
                                    <div class="contain_thumbs d-flex flex-row flex-md-column">
                                    <div class="thumb_item">@if(!empty($result['detail']['product_data'][0]->default_images ))<img src="{{asset('').$result['detail']['product_data'][0]->default_images }}" alt="Zoom Image" class="pick"/>
									@else
										<img src="{{asset('/product_img/product_'.$result['products_images'][0]->products_id.'/'.$result['products_images'][0]->image ?? '')}}" alt="Zoom Image" class="pick"/>
									@endif</div> 
									@if(!empty($result['detail']['product_data'][0]->images ))
                                    @foreach( $result['detail']['product_data'][0]->images as $key=>$images )
                                      @if($images->image_type == 'THUMBNAIL')
                                       <div class="thumb_item"><img src="{{asset('').$images->image_path }}" alt="Zoom Image" class="pick"/></div> 
                                       @endif
                                        @endforeach
										@else
											@foreach($result['products_images'] as $images ) 
									
                                       <div class="thumb_item"><img src="{{asset('/product_img/product_'.$images->products_id.'/'.$images->image ?? '')}}" alt="Zoom Image" class="pick"/></div>                                      
                                        @endforeach
										@endif
                                    </div>
									
                                    <div class="contain_featured_img">
									@if(!empty($result['detail']['product_data'][0]->default_images ))
                                    <img src="{{asset('').$result['detail']['product_data'][0]->default_images }}" class="img-fluid" alt="Featured Image">
								@endif
									@if(!empty($result['detail']['product_data'][0]->images ))
                                    @foreach( $result['detail']['product_data'][0]->images as $key=>$images )
                                      @if($images->image_type == 'LARGE')
                                        <img src="{{asset('').$images->image_path }}" class="img-fluid" alt="Featured Image">
                                        
                                        @elseif($images->image_type == 'ACTUAL')
                                        <img src="{{asset('').$images->image_path }}" class="img-fluid" alt="Featured Image">
                                        @endif
                                        @endforeach
                                         @else
										<img src="{{asset('/product_img/product_'.$result['products_images'][0]->products_id.'/'.$result['products_images'][0]->image ?? '')}}" alt="Zoom Image" class="pick"/>
									@endif 

                                        <!-- @if(!empty($result['detail']['product_data'][0]->products_video_link))
                                          <a class="slider-for__item ex1 fancybox-button iframe">
                                          {!! $result['detail']['product_data'][0]->products_video_link !!}
                                          <iframe src="{{!! $result['detail']['product_data'][0]->products_video_link !!}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>                 
                                          </a>
                                          @endif -->

                                        

                                    </div>
                                </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="single-recipe-des-contain">
                                <div class="recipe_description">
                                    <?=stripslashes($result['detail']['product_data'][0]->products_description)?>
                                            
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- === ORDER NOW CONTAIN === -->
                    <div class="row">
                        <div class="col-12">
                            <div class="order_now_main_wrapper py-4 py-lg-2 mt-5 d-flex flex-column flex-lg-row justify-content-between align-items-center">
                                <div class="ordered_recipe_title d-flex justify-content-between flex-column flex-lg-row  align-items-center">
                                    <h2>{{$result['detail']['product_data'][0]->products_name}}</h2>
                                    <p>Order this Serving for 
                                    @if($result['detail']['product_data'][0]->products_min_order>0)
                                   <!-- <b>Min :</b>{{$result['detail']['product_data'][0]->products_min_order}} -->
                                    @endif
                                    <span  @if($result['detail']['product_data'][0]->products_max_stock==9999) style="display:none;" @endif id="min_max_setting2">Max {{$result['detail']['product_data'][0]->products_max_stock}}</span>
                                    Person only in<br>Delivery Within 24 Hours</p>
                                </div>
                                <div class="order-now-box d-flex align-items-center  flex-column flex-lg-row  justify-content-around text-center mt-4 mt-md-0 py-4 px-4">
                                    <img src="{{asset('./images/media/2021/08/buzzer.png')}}" alt="Buzzer icon" class="mb-3">
                                    <div class="wrap_priceSinglePost">
                                    <?php

                                        if(!empty($result['detail']['product_data'][0]->discount_price)){
                                          $discount_price = $result['detail']['product_data'][0]->discount_price * session('currency_value');
                                        }
                                        if(!empty($result['detail']['product_data'][0]->flash_price)){
                                          $flash_price = $result['detail']['product_data'][0]->flash_price * session('currency_value');
                                        }
                                          $orignal_price = $result['detail']['product_data'][0]->products_price * session('currency_value');


                                        if(!empty($result['detail']['product_data'][0]->discount_price)){

                                          if(($orignal_price+0)>0){
                                            $discounted_price = $orignal_price-$discount_price;
                                            $discount_percentage = $discounted_price/$orignal_price*100;
                                            $discounted_price = $result['detail']['product_data'][0]->discount_price;

                                        }else{
                                          $discount_percentage = 0;
                                          $discounted_price = 0;
                                        }
                                        }
                                        else{
                                          $discounted_price = $orignal_price;
                                        }
                                        //  dd($result['currency_value']);
                                        ?>
                                        @if(!empty($result['detail']['product_data'][0]->flash_price))
                                        <h3>{{Session::get('symbol_left')}}{{$flash_price}}{{Session::get('symbol_right')}}</h3>
                                        <span>{{Session::get('symbol_left')}}{{$orignal_price}}{{Session::get('symbol_right')}} </span> 

                                        @elseif(!empty($result['detail']['product_data'][0]->discount_price))
                                        <h3>{{Session::get('symbol_left')}}{{$discount_price}}{{Session::get('symbol_right')}}</h3>
                                        <span>{{Session::get('symbol_left')}}{{$orignal_price}}{{Session::get('symbol_right')}} </span> 
                                        @else
                                        
                                        <h3>{{Session::get('symbol_left')}} {{ $orignal_price }} {{Session::get('symbol_right')}}</h3>
                                        @endif
                                        <!-- <h3>₹549 </h3> -->
                                    </div>
                                    <!-- ORDER QUANTITY -->
                                    <div class="quantity_wrapper">
                                        <div class="qty-input">
                                            <button class="qty-count qty-count--minus" data-action="minus" type="button">-</button>
                                            {{-- <input type="text" id="quantity1" name="quantity" class="form-control quantity-minus1 btn qtyminus" value="10">--}}
                                            <input type="text" readonly name="quantity" class="product-qty form-control qty" value="@if(!empty($result['cart'])) {{$result['cart'][0]->customers_basket_quantity}} @else @if($result['detail']['product_data'][0]->products_min_order>0 and $result['detail']['product_data'][0]->defaultStock > $result['detail']['product_data'][0]->products_min_order) {{$result['detail']['product_data'][0]->products_min_order}} @else 1 @endif @endif" min="{{$result['detail']['product_data'][0]->products_min_order}}" max="{{$result['detail']['product_data'][0]->products_max_stock}}">
                                            <button class="qty-count qty-count--add quantity-plus1 btn qtyplus" data-action="add" type="button">+</button>
                                        </div>
                                    </div>
                                    
                                    @if(!empty($result['detail']['product_data'][0]->flash_start_date) and $result['detail']['product_data'][0]->server_time < $result['detail']['product_data'][0]->flash_start_date )
                                      @else
                                        @if($result['detail']['product_data'][0]->products_type == 0)
                                        
                                          @if($result['commonContent']['settings']['Inventory'])
                                              @if($result['detail']['product_data'][0]->defaultStock <= 0)
                                                <button class="btn btn-lg swipe-to-top  btn-danger " type="button">@lang('website.Out of Stock')</button>
                                              @else
                                                  <button class="btn btn-secondary btn-lg swipe-to-top add-to-Cart"  type="button" products_id="{{$result['detail']['product_data'][0]->products_id}}">@lang('website.Order Now')</button>
                                              @endif
                                          @else
                                          <button class="btn btn-secondary btn-lg swipe-to-top add-to-Cart"  type="button" products_id="{{$result['detail']['product_data'][0]->products_id}}">@lang('website.Order Now')</button>
                                          @endif

                                        @else
                                              @if($result['commonContent']['settings']['Inventory'])
                                              <button class="btn btn-secondary btn-lg swipe-to-top  add-to-Cart stock-cart" hidden type="button" products_id="{{$result['detail']['product_data'][0]->products_id}}">@lang('website.Order Now')</button>
                                              <button class="btn btn-danger btn btn-lg swipe-to-top  stock-out-cart" hidden type="button">@lang('website.Out of Stock')</button>
                                              @else
                                              <button class="btn btn-secondary btn-lg swipe-to-top  add-to-Cart"  type="button" products_id="{{$result['detail']['product_data'][0]->products_id}}">@lang('website.Order Now')</button>
                                              @endif
                                        @endif
                                      @endif
  
                                    
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>

				
				
				<!-- Reviews-->
			
				<div class="container-fluid px-5 mt-5 mb-4">
				 <div class="row">
              <div class="col-12 col-md-12">
                <div class="nav nav-pills" role="tablist">
                  
                  <a class="nav-link nav-item" href="#review" id="review-tab" data-toggle="pill" role="tab" >@lang('website.Reviews')</a>
                </div> 
                <div class="tab-content">
                  
                  <div role="tabpanel" class="tab-pane fade active show" id="review" aria-labelledby="review-tab">
                    <div class="reviews">
                      @if(isset($result['detail']['product_data'][0]->reviewed_customers))
                        <div class="review-bubbles">
                            <h2>
                              @lang('website.Customer Reviews')
                            </h2>                            
                              @foreach($result['detail']['product_data'][0]->reviewed_customers as $key=>$rev)
                              <div class="review-bubble-single">
                                  <div class="review-bubble-bg">
                                      <div class="pro-rating">
                                        <fieldset class="disabled-ratings">                                           
                                          <label class = "full fa @if($rev->reviews_rating >= 5) active @endif" for="star_5" title="@lang('website.awesome_5_stars')"></label>
                                          <label class = "full fa @if($rev->reviews_rating >= 4) active @endif" for="star_4" title="@lang('website.pretty_good_4_stars')"></label>                                          
                                          <label class = "full fa @if($rev->reviews_rating >= 3) active @endif" for="star_3" title="@lang('website.pretty_good_3_stars')"></label>                                          
                                          <label class = "full fa @if($rev->reviews_rating >= 2) active @endif" for="star_2" title="@lang('website.meh_2_stars')"></label>
                                           <label class = "full fa @if($rev->reviews_rating >= 1) active @endif" for="star1" title="@lang('website.meh_1_stars')"></label>
                                        </fieldset>                                          
                                      </div>
                                      <h4>{{$rev->customers_name}}</h4>
                                      <span>{{date("d-M-Y", strtotime($rev->created_at))}}</span>
                                      <p>{{$rev->reviews_text}}</p>
                                  </div>
                                  
                              </div>
                              @endforeach                            
                        </div>
                        @endif
                        @if(Auth::guard('customer')->check())
                        <div class="write-review mt-5">
                          <form id="idForm">
                            {{csrf_field()}}
                            <input value="{{$result['detail']['product_data'][0]->products_id}}" type="hidden" name="products_id">
                          <h2>@lang('website.Write a Review')</h2>
                          <div class="write-review-box">
                              <div class="from-group row mb-3">
                                  <div class="col-12"> <label for="inlineFormInputGroup2">@lang('website.Rating')</label></div>
                                  <div class="pro-rating col-12">

                                    <fieldset class="ratings">
                                      
                                      <input type="radio" id="star5" name="rating" value="5" class="rating"/>
                                      <label class = "full fa" for="star5" title="@lang('website.awesome_5_stars')"></label>

                                      <input type="radio" id="star4" name="rating" value="4" class="rating"/>
                                      <label class="full fa" for="star4" title="@lang('website.pretty_good_4_stars')"></label>

                                      <input type="radio" id="star3" name="rating" value="3" class="rating"/>
                                      <label class = "full fa" for="star3" title="@lang('website.pretty_good_3_stars')"></label>

                                      <input type="radio" id="star2" name="rating" value="2" class="rating"/>
                                      <label class="full fa" for="star2" title="@lang('website.meh_2_stars')"></label>

                                      <input type="radio" id="star1" name="rating" value="1" class="rating"/>
                                      <label class = "full fa" for="star1" title="@lang('website.meh_1_stars')"></label> 
                                    
                                  </fieldset>                                     
                                      
                                  </div>
                              </div>                              
                             
                                <div class="from-group row mb-3">
                                    <div class="col-12"> <label for="inlineFormInputGroup3">@lang('website.Review')</label></div>
                                    <div class="input-group col-8 mb-4">                                      
                                      <textarea name="reviews_text" id="reviews_text" rows="5" cols="8" class="form-control" id="inlineFormInputGroup3" placeholder="@lang('website.Write Your Review')"></textarea>
                                    </div>
                                </div>

                                <div class="alert alert-danger" hidden id="review-error" role="alert">
                                 @lang('website.Please enter your review')
                                </div>

                                <div class="from-group">
                                    <button type="submit" id="review_button" disabled class="btn btn-secondary swipe-to-top">@lang('website.Submit')</button>                                    
                                </div>
                          </div>
                          
                        </form>
                        </div>
                        @endif
                    </div>

                      
                  </div> 
              </div>
          </div>      
      
        </div>
        </div>
<!-- Other Recipes slider-->
  <section class="product-content section_leftHeading">
  <div class="general-product">
    <div class="container-fluid px-md-5 mt-5 pt-4">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-12">
                    <h2>Other Recipes from this Chef</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="other-recipe-slider slider mt-4">
          <!-- recipe 1 -->
              
              @foreach($result['simliar_products']['product_data'] as $key=>$products)
                @if($result['detail']['product_data'][0]->products_id != $products->products_id)
                <div class="slik mx-0">                   
                <article class="article_wrapper pluto-post-box"> 
                  @include('web.common.product')
                  </article>  
                  </div>  
                @endif
                @endforeach 
          
    </div>
          </div>  
    </div>
  </div>  
</section>
<!-- Home Chef's On Board slider-->
<section class="container-fluid px-md-5 mt-5 section_leftHeading">
        <div class="row">
            <div class="col-12">
                <h2>Home Chef's On Board</h2>
            </div>
        </div>
        <div class="row">
          <div class="col-12">
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
          </div>
        </div>

<section>
@else
<div class="col-12">
<div class="container">
<h3>@lang('website.No Record Found!')</h3>
</div>
</div>
@endif

</section>



  <script>

    jQuery(document).ready(function(e) {
    
      @if(!empty($result['detail']['product_data'][0]->flash_start_date))
         @if( date("Y-m-d",$result['detail']['product_data'][0]->server_time) >= date("Y-m-d",$result['detail']['product_data'][0]->flash_start_date))
          var product_div_{{$result['detail']['product_data'][0]->products_id}} = 'product_div_{{$result['detail']['product_data'][0]->products_id}}';
        var  counter_id_{{$result['detail']['product_data'][0]->products_id}} = 'counter_{{$result['detail']['product_data'][0]->products_id}}';
        var inputTime_{{$result['detail']['product_data'][0]->products_id}} = "{{date('M d, Y H:i:s' ,$result['detail']['product_data'][0]->flash_expires_date)}}";
    
        // Set the date we're counting down to
        var countDownDate_{{$result['detail']['product_data'][0]->products_id}} = new Date(inputTime_{{$result['detail']['product_data'][0]->products_id}}).getTime();
    
        // Update the count down every 1 second
        var x_{{$result['detail']['product_data'][0]->products_id}} = setInterval(function() {
    
          // Get todays date and time
          var now = new Date().getTime();
    
          // Find the distance between now and the count down date
          var distance_{{$result['detail']['product_data'][0]->products_id}} = countDownDate_{{$result['detail']['product_data'][0]->products_id}} - now;
    
          // Time calculations for days, hours, minutes and seconds
          var days_{{$result['detail']['product_data'][0]->products_id}} = Math.floor(distance_{{$result['detail']['product_data'][0]->products_id}} / (1000 * 60 * 60 * 24));
          var hours_{{$result['detail']['product_data'][0]->products_id}} = Math.floor((distance_{{$result['detail']['product_data'][0]->products_id}} % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
          var minutes_{{$result['detail']['product_data'][0]->products_id}} = Math.floor((distance_{{$result['detail']['product_data'][0]->products_id}} % (1000 * 60 * 60)) / (1000 * 60));
          var seconds_{{$result['detail']['product_data'][0]->products_id}} = Math.floor((distance_{{$result['detail']['product_data'][0]->products_id}} % (1000 * 60)) / 1000);
          var days_text = "@lang('website.Days')";
          // Display the result in the element with id="demo"
          document.getElementById(counter_id_{{$result['detail']['product_data'][0]->products_id}}).innerHTML = "<span class='days'>"+days_{{$result['detail']['product_data'][0]->products_id}} + "<small>@lang('website.Days')</small></span> <span class='hours'>" + hours_{{$result['detail']['product_data'][0]->products_id}} + "<small>@lang('website.Hours')</small></span> <span class='mintues'> "
          + minutes_{{$result['detail']['product_data'][0]->products_id}} + "<small>@lang('website.Minutes')</small></span> <span class='seconds'>" + seconds_{{$result['detail']['product_data'][0]->products_id}} + "<small>@lang('website.Seconds')</small></span> ";
    
          // If the count down is finished, write some text
          if (distance_{{$result['detail']['product_data'][0]->products_id}} < 0) {
          clearInterval(x_{{$result['detail']['product_data'][0]->products_id}});
          //document.getElementById(counter_id_{{$result['detail']['product_data'][0]->products_id}}).innerHTML = "EXPIRED";
          document.getElementById('product_div_{{$result['detail']['product_data'][0]->products_id}}').remove();
          }
        }, 1000);
           @endif
       @endif
    
  
    });
    </script>

    
    