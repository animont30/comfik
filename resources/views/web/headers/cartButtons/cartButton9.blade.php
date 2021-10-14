<?php $qunatity=0; ?>

@foreach($result['commonContent']['cart'] as $cart_data)

    <?php $qunatity += $cart_data->customers_basket_quantity; ?>
@endforeach

<button id="dropdownCartButton" class="btn dropdown-toggle" type="button" id="headerOneCartButton"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" > 
    <div class="cart-left">
     <i class="fas fa-shopping-bag"></i>
     <span class="badge badge-danger">{{ $qunatity }}</span>
    </div>
 
       <!-- <div class="cart-right d-flex flex-column align-self-end ml-13">
         <span class="title-cart">@lang('website.My Cart')</span>
         <span class="cart-item"> @lang('website.items')</span>
       </div> -->
   </button> 
   @if(count($result['commonContent']['cart'])>0)

<div class="shopping-cart shopping-cart-empty dropdown-menu dropdown-menu-right p-4" aria-labelledby="dropdownCartButton_1">
    <ul class="shopping-cart-items list-unstyled">
        <?php
            $total_amount=0;
            $qunatity=0;
        ?>
        @foreach($result['commonContent']['cart'] as $cart_data)

        <?php
                     $total_amount += $cart_data->final_price*$cart_data->customers_basket_quantity;
                    $qunatity 	  += $cart_data->customers_basket_quantity; ?>
        <li class="d-flex align-items-center justify-content-between mb-2">
            <div class="item-thumb">
               <div class="image">
              
                @if(!empty($cart_data->image))
                    <img class="img-fluid" src="{{asset('').$cart_data->image}}" alt="{{$cart_data->products_name}}"/>
                    @else
                    <img src="{{asset('/product_img/product_'.$cart_data->products_id.'/'.$cart_data->products_images ?? '')}}" alt="{{$cart_data->products_name}}" /> 
                 @endif
                </div>
            </div>
            <div class="item-detail pl-2">
                <h3 class="item-name">{{$cart_data->products_name}}</h3>
                <div class="item-s">{{$cart_data->customers_basket_quantity}} x {{Session::get('symbol_left')}}{{$cart_data->final_price*session('currency_value')}}{{Session::get('symbol_right')}}
                <a href="{{ URL::to('/deleteCart?id='.$cart_data->customers_basket_id)}}"><i class="fas fa-trash"></i></a></div>
           </div>
        </li>
        @endforeach
        <li class="border-top mt-3">
            <span class="item-summary mini-cart-total my-4 d-block text-right font-weight-bold">@lang('website.SubTotal')&nbsp;:&nbsp;<span>{{Session::get('symbol_left')}}{{ $total_amount*session('currency_value') }}{{Session::get('symbol_right')}}</span>
            </span>
        </li>
    
        <li>
              <a class="btn btn-link btn-block btn-secondary" href="{{ URL::to('/viewcart')}}">@lang('website.View Cart')</a>
              <a class="btn btn-secondary btn-block swipe-to-top" href="{{ URL::to('/checkout')}}">@lang('website.Checkout')</a>     
       </li>
 </ul>

</div>

@else

<div class="shopping-cart shopping-cart-empty dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
    <ul class="shopping-cart-items py-5">
        <li>@lang('website.You have no items in your shopping cart')</li>
    </ul>
</div>
@endif

   <!--
<script src="https://code.jquery.com/jquery-1.9.1.js"></script>
<script src="https://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
-->