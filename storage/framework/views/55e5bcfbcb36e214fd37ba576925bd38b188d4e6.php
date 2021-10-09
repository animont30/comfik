<div class="container-fuild">
  <nav aria-label="breadcrumb">
      <div class="container">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/')); ?>"><?php echo app('translator')->get('website.Home'); ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo app('translator')->get('website.Shopping cart'); ?></li>
          </ol>
      </div>
    </nav>
</div>

<section class="pro-content">
  <div class="container">
    <div class="page-heading-title">
        <h2><?php echo app('translator')->get('website.Shopping cart'); ?></h2>           
    </div>
  </div>
<?php if(!empty($result['cart'])): ?>
<section class=" cart-content">
      <div class="container">
      <div class="row">

      <div class="col-12 col-sm-12 cart-area cart-page-one">
        <?php if(session()->has('message')): ?>
           <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo e(session()->get('message')); ?>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           </div>
       <?php endif; ?>
       <?php if($result['commonContent']['settings']['Inventory']): ?>
       <?php if(session::get('out_of_stock') == 1): ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <?php echo app('translator')->get('website.Cart out stock'); ?> 
               <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
        <?php endif; ?>
        <?php endif; ?>
        
        <?php if(session::get('min_order') == 1): ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <?php echo app('translator')->get('website.Cart min order'); ?> <?php echo e(session::get('min_order_value')); ?>

               <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
        <?php endif; ?>

        <?php if(session::get('max_order') == 1): ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <?php echo app('translator')->get('website.Cart max order'); ?>   <?php echo e(session::get('max_order_value')); ?>

               <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
        <?php endif; ?>
        
        <?php if(session::get('min_order_price') == 1): ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <?php echo app('translator')->get('website.Min order Price'); ?>   <?php echo e(session::get('min_order_price_value')); ?>

               <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
        <?php endif; ?>
        <?php if(session::get('coupon_usage_per_user_limit') == 1): ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <?php echo app('translator')->get('website.Coupon Removed'); ?>
               <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
        <?php endif; ?>
        <div class="row">
<style>        
      .table tbody {
      border-top: 2px solid #dee2e6;
}
</style>
          <div class="col-12 col-lg-12">
            <form method='POST' id="update_cart_form" action='<?php echo e(URL::to('/updateCart')); ?>' >
            <table class="table top-table">
              <?php
                $price = 0;
               ?>
              <?php $__currentLoopData = $result['cart']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $products): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php
              $price+= $products->final_price * $products->customers_basket_quantity;
              ?>
              <?php if($result['commonContent']['settings']['Inventory']): ?>
              <tbody  <?php if(session::get('out_of_stock') == 1 and session::get('out_of_stock_product') == $products->products_id ): ?>style="	box-shadow: 0 20px 50px rgba(0,0,0,.5); border:2px solid #FF9999;"<?php elseif(session::get('min_order') == 1 and session::get('min_order_product') == $products->products_id): ?>style="	box-shadow: 0 20px 50px rgba(0,0,0,.5); border:2px solid #FF9999;"<?php elseif(session::get('max_order') == 1 and session::get('max_order_product') == $products->products_id): ?>style="	box-shadow: 0 20px 50px rgba(0,0,0,.5); border:2px solid #FF9999;"<?php endif; ?>>
              <?php else: ?>
               
              <tbody  <?php if(session::get('min_order') == 1 and session::get('min_order_product') == $products->products_id): ?>style="	box-shadow: 0 20px 50px rgba(0,0,0,.5); border:2px solid #FF9999;"<?php elseif(session::get('max_order') == 1 and session::get('max_order_product') == $products->products_id): ?>style="	box-shadow: 0 20px 50px rgba(0,0,0,.5); border:2px solid #FF9999;"<?php endif; ?>>
              <?php endif; ?>
              
                  <input type="hidden" name="_token" id="csrf-token" value="<?php echo e(Session::token()); ?>" />
                  <input type="hidden" name="cart[]" value="<?php echo e($products->customers_basket_id); ?>">

                  <tr class="d-flex">
                  <td class="col-12 col-md-1">
                  <a href="<?php echo e(URL::to('/deleteCart?id='.$products->customers_basket_id)); ?>"  class="btn" >
                                  <span class="fas fa-times" id="cartDelete"></span>
                              </a> 
                  </td>
				  
                    <td class="col-12 col-md-2" >
					<?php if(!empty($products->image_path)): ?>
                      <a href="<?php echo e(URL::to('/product-detail/'.$products->products_slug)); ?>" class="cart-thumb">
                        <img class="img-fluid" src="<?php echo e(asset('').$products->image_path); ?>" alt="<?php echo e($products->products_name); ?>"/>
                        </a>
						<?php else: ?>
						<a href="<?php echo e(URL::to('/product-detail/'.$products->products_slug)); ?>" class="cart-thumb">
                        <img class="img-fluid" src="<?php echo e(asset('/product_img/product_'.$products->products_id.'/'.$products->image ?? '')); ?>" alt="<?php echo e($products->products_name); ?>"/>
                        </a>
						<?php endif; ?>
                    </td>
                      <td class="col-12 col-md-4 item-detail-left">
                        <div class="item-detail">
                            <span><small>

                              <?php
                              $cates = '';  
                              ?>
                              <?php $__currentLoopData = $products->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  
                                <?php
                                  $cates =  "<a href=".url('shop?category='.$category->categories_name).">".$category->categories_name."</a>";
                                ?>  
                                
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              <?php 
                              echo $cates;
                              ?>

                              
                            </small></span>
                            <h4><?php echo e($products->products_name); ?>

                            </h4>
                            <div class="item-attributes">
                              <?php if(isset($products->attributes)): ?>
                              <?php $__currentLoopData = $products->attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attributes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <small><b><?php echo e($attributes->attribute_name); ?>:</b> <?php echo e($attributes->attribute_value); ?></small>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              <?php endif; ?>
                            </div>

                            <div class="item-controls">
                                <!-- <a href="<?php echo e(url('/editcart/'.$products->customers_basket_id.'/'.$products->products_slug)); ?>"  class="btn" >
                                  <span class="fas fa-pencil-alt"></span>
                                </a>

                                <a href="<?php echo e(URL::to('/deleteCart?id='.$products->customers_basket_id)); ?>"  class="btn" >
                                  <span class="fas fa-times"></span>
                              </a> -->
                            </div>

                           
                          </div>                          

                      </td>
                      <?php
                      if(!empty($products->discount_price)){
                          $discount_price = $products->discount_price * session('currency_value');
                      }
                      if(!empty($products->final_price)){
                        $flash_price = $products->final_price * session('currency_value');
                      }
                      $orignal_price = $products->price * session('currency_value');
                      
                       if(!empty($products->discount_price)){

                        if(($orignal_price+0)>0){
                          $discounted_price = $orignal_price-$discount_price;
                          $discount_percentage = $discounted_price/$orignal_price*100;
                       }else{
                         $discount_percentage = 0;
                         $discounted_price = 0;
                     }
                   }
                   ?>
                  <td class="item-price col-12 col-md-1">
                    <?php if(!empty($products->final_price)): ?>
                    <?php echo e(Session::get('symbol_left')); ?><?php echo e($flash_price+0); ?><?php echo e(Session::get('symbol_right')); ?>

                    <?php elseif(!empty($products->discount_price)): ?>
                    <?php echo e(Session::get('symbol_left')); ?><?php echo e($discount_price+0); ?><?php echo e(Session::get('symbol_right')); ?>

                    <span> <?php echo e(Session::get('symbol_left')); ?><?php echo e($orignal_price+0); ?><?php echo e(Session::get('symbol_right')); ?></span>
                    <?php else: ?>
                    <?php echo e(Session::get('symbol_left')); ?><?php echo e($orignal_price+0); ?><?php echo e(Session::get('symbol_right')); ?>

                    <?php endif; ?>

                   </td>
                    <td class="col-12 col-md-2 Qty">                          
                        <div class="input-group item-quantity">                          
                            <input name="quantity[]" type="text" readonly value="<?php echo e($products->customers_basket_quantity); ?>" class="form-control qty" min="<?php echo e($products->min_order); ?>" max="<?php echo e($products->max_order); ?>">
                            <span class="input-group-btn ">
                                <button type="button" value="quantity" class="quantity-right-plus btn qtypluscart" data-type="plus" data-field="">                                  
                                    <span class="fas fa-plus"></span>
                                </button>
                                <button type="button" value="quantity" class="quantity-left-minus btn qtyminuscart" data-type="minus" data-field="">
                                    <span class="fas fa-minus"></span>
                                </button>            
                            </span> 
                        </div>
                    </td>
                    <td class="align-middle item-total col-12 col-md-2" align="center">
                      <span class="cart_price_<?php echo e($products->customers_basket_id); ?>">
                        <?php echo e(Session::get('symbol_left')); ?><?php echo e($products->final_price * $products->customers_basket_quantity * session('currency_value')); ?><?php echo e(Session::get('symbol_right')); ?>

                        </span>
                    </td>
                  </tr>
              </tbody>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
          </form>
        </div>
            

            <div class="col-12 col-lg-9 ">
              <?php if(!empty(session('coupon'))): ?>
              <div class="form-group">
                    <?php $__currentLoopData = session('coupon'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coupons_show): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <div class="alert alert-success">
                            <a href="<?php echo e(URL::to('/removeCoupon/'.$coupons_show->coupans_id)); ?>" class="close"><span aria-hidden="true">&times;</span></a>
                          <?php echo app('translator')->get('website.Coupon Applied'); ?> <?php echo e($coupons_show->code); ?>.<?php echo app('translator')->get('website.If you do note want to apply this coupon just click cross button of this alert.'); ?>
                        </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>                  
              <div class=" bottom-table">           
                <div class="col-12 col-lg-5">
                  <form id="apply_coupon" class="form-validate">
                  <div class="input-group ">
                    <input type="text" name="coupon_code" class="form-control" id="coupon_code" placeholder=" <?php echo app('translator')->get('website.Coupon Code'); ?>" aria-label="<?php echo app('translator')->get('messages.Coupon Code'); ?>" aria-describedby="coupon-code">

                      <div class="">
                        <button class="btn btn-secondary swipe-to-top" type="submit" id="coupon-code"><?php echo app('translator')->get('website.APPLY'); ?></button>
                      </div>                    
                  </div>
                  <div id="coupon_error" class="help-block" style="display: none;color:red;"></div>
                  <div  id="coupon_require_error" class="help-block" style="display: none;color:red;"><?php echo app('translator')->get('website.Please enter a valid coupon code'); ?></div>
                  </form>
                  
                </div>
                <div class="col-12 col-lg-7 align-right align-right2">   
                  <button class="btn btn-secondary swipe-to-top" id="update_cart"><?php echo app('translator')->get('website.Update Cart'); ?></button>
                </div>
               
              </div>
            </div>       
            
          <div class="col-12 col-lg-3">

              <table class="table right-table">
                <thead>
                  <tr>
                    <th scope="col" colspan="2" align="center"><?php echo app('translator')->get('website.Order Summary'); ?></th>                    
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row"><?php echo app('translator')->get('website.SubTotal'); ?></th>
                    <td align="right">
                      <?php
                      if(!empty(session('coupon_discount'))){
                        $coupon_amount = session('currency_value') * session('coupon_discount');  
                      }else{
                        $coupon_amount = 0;
                      }
                      ?>
                      <?php echo e(Session::get('symbol_left')); ?><?php echo e(session('currency_value') * $price+0); ?><?php echo e(Session::get('symbol_right')); ?>

                    </td>
                  </tr>

                  <tr>
                    <th scope="row"><?php echo app('translator')->get('website.Discount(Coupon)'); ?></th>
                    <td align="right"><?php echo e(Session::get('symbol_left')); ?><?php echo e(number_format((float)$coupon_amount, 2, '.', '')+0); ?><?php echo e(Session::get('symbol_right')); ?></td>
                  </tr>
                  <tr class="item-price">
                    <th scope="row"><?php echo app('translator')->get('website.Total'); ?></th>
                    <td align="right" ><?php echo e(Session::get('symbol_left')); ?><?php echo e(session('currency_value') * $price+0-number_format((float)$coupon_amount, 2, '.', '')); ?><?php echo e(Session::get('symbol_right')); ?></td>
                  </tr>

                  <tr>
                    <td colspan="2">
                      <a href="<?php echo e(URL::to('/checkout')); ?>" class="btn btn-secondary col-12 swipe-to-top"><?php echo app('translator')->get('website.proceedToCheckout'); ?></a>
                    </td>
             
                  </tr>
              
                </tbody>
                
              </table>

          </div>
        </div>
      </div>
    </div>

    </div>
  </section>
  <?php else: ?>
	    <section class=" cart-content">
            <div class="container">
			        <div class="row">
			           <div class="col-12 col-sm-12 cart-area cart-page-one">
			         <h3>  You have no items in your shopping cart.</h3>
			         </div>
				</div>
            </div>
        </section>
  <?php endif; ?>
</section>

<script>
  $(document).ready(function () {
    $('#cartDelete').click(function (e) { 
      <?php echo e(Session::forget('coupon_discount')); ?>

    });
  });
</script>
<?php /**PATH C:\xampp\htdocs\GIT\comfik\resources\views/web/carts/cart2.blade.php ENDPATH**/ ?>