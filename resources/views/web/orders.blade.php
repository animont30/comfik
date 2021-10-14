@extends('web.layout')
@section('content')

<div class="container-fuild">
  <nav aria-label="breadcrumb">
      <div class="container">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ URL::to('/')}}">@lang('website.Home')</a></li>
            <li class="breadcrumb-item active" aria-current="page">@lang('website.My Orders')</li>
          </ol>
      </div>
    </nav>
</div> 


<main class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-10 mx-auto mt-5 px-5 py-4 px-md-0">
                    <!-- Past Orders list -->
                    <div class="row">
                       
                    @if(count($result['orders']) > 0)
                    @foreach( $result['orders'] as $orders)
				        @if(!empty($orders->products[0]))
                        <div class="col-lg-6 px-4">
                            <div class="pst_order_wrap d-flex my-4 align-items-stretch bg-white p-4">
                          
                                <div class="order-img">
                               
                                    <a href="{{ URL::to('/product-detail/'.$orders->products[0]->products_slug)}}" class="wrap_img_art" title="">
                                    @if(!empty($orders->products[0]->image))
                                    <img src="{{asset($orders->products[0]->image)}}" alt="order img">
                                    @else
                                   <img src="{{asset('/product_img/product_'.$orders->products[0]->products_id.'/'.$orders->products[0]->products_image ?? '')}}" alt="{{$products->products_name}}" /> 
                                @endif
                                </a>
                                   
                                </div>
                                
                                <div class="order_content pl-5 pt-md-4">
                                    <h3>
									<a href="{{ URL::to('/product-detail/'.$orders->products[0]->products_slug)}}" title="">{{$orders->products[0]->products_name}} </a>
                                    </h3>
                                    <small></small>
                                    <div class="order_price d-flex flex-wrap justify-content-between align-items-center">
                                        <h4>@if($orders->currency == '$')
                                            {{ $orders->currency }} {{ $orders->products[0]->products_price  }} 
                                            @else
                                            {{ $orders->currency }}{{ $orders->products[0]->products_price * $orders->currency_value }} 
                                            @endif</h4>
                                        <!-- <button class="btn">Repeat this order</button> -->
                                        <a class="btn" href="{{ URL::to('/repeatorder?products_id='.$orders->products[0]->products_id)}}">Repeat this order</a>
                                        
                                        <a href="{{url('/view-order/'.$orders->orders_id)}}" class="btn-link d-block w-100 text-left mt-4"><b>@lang('website.Order Detail')</b></a>
                                    </div>

                                    <span>Order Status: {{$orders->orders_status}}</span>
                                    <div class="order_delivery_info">
                                        <span>Order Quantity: {{$orders->products[0]->products_quantity}} </span>
                                        <span>Ordered Date: {{ date('d/m/Y', strtotime($orders->date_purchased))}} </span>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                  @else
                      <h3>
                          @lang('website.No order is placed yet')</h3>
                          
                      
                  @endif
                    </div>

                </div>
            </div>
        </div>
	</main>
     
@endsection
