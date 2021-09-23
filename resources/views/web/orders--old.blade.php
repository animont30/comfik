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
				
                        <div class="col-lg-6 px-4">
                            <div class="pst_order_wrap d-flex my-4 align-items-stretch bg-white p-4">
                                <div class="order-img">
                                    <img src="{{asset($orders->products[0]->image)}}" alt="order img">
                                </div>
                                <div class="order_content pl-5 pt-md-4">
                                    <h3>
									{{$orders->products[0]->products_name}}
                                    </h3>
                                    <small></small>
                                    <div class="order_price d-flex flex-wrap justify-content-between align-items-center">
                                        <h4>@if($orders->currency == '$')
                                            {{ $orders->currency }} {{ $orders->order_price  }} 
                                            @else
                                            {{ $orders->order_price * $orders->currency_value }} {{ $orders->currency }}
                                            @endif</h4>
                                        <!-- <button class="btn">Repeat this order</button> -->
                                        <a class="btn" href="{{ URL::to('/view-order/'.$orders->orders_id)}}">Repeat this order</a>
                                    </div>
                                    <div class="order_delivery_info">
                                        <span>Order Quantity: 4, </span>
                                        <span>Ordered Date: {{ date('d/m/Y', strtotime($orders->date_purchased))}} </span>
                                    </div>
                                </div>
                            </div>
                        </div>
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
     <!--My Order Content -->
      <section class="order-one-content pro-content">
      <div class="container">
        <div class="row">
          <div class="col-12 col-lg-3  d-none d-lg-block d-xl-block">
            <div class="heading">
                <h2>
                    @lang('website.My Account')
                </h2>
                <hr >
              </div>
            @if(Auth::guard('customer')->check())
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
              @elseif(!empty(session('guest_checkout')) and session('guest_checkout') == 1)
              <ul class="list-group">
                <li class="list-group-item">
                    <a class="nav-link" href="{{ URL::to('/orders')}}">
                        <i class="fas fa-shopping-cart"></i>
                      @lang('website.Orders')
                    </a>
                </li>
              </ul>
              @endif
          </div>
          <div class="col-12 col-lg-9 ">
              <div class="heading">
                  <h2>
                      @lang('website.My Orders')
                  </h2>
                  <hr >
                </div>

                {{-- 
                @if(session()->has('message'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                         {{ session()->get('message') }}
                    </div>

                @endif --}}

              <table class="table order-table">

                <thead>
                  <tr class="d-flex">
                    <th class="col-12 col-md-2">@lang('website.Order ID')</th>
                    <th class="col-12 col-md-2">@lang('website.Order Date')</th>
                    <th class="col-12 col-md-2">@lang('website.Price')</th>
                    <th class="col-12 col-md-3" >@lang('website.Status')</th>
                    <th class="col-12 col-md-3" > Detail</th>

                  </tr>
                </thead>
                <tbody>
                  @if(count($result['orders']) > 0)
                  @foreach( $result['orders'] as $orders)
                  <tr class="d-flex">
                    <td class="col-12 col-md-2">{{$orders->orders_id}}</td>
                    <td class="col-12 col-md-2">
                      {{ date('d/m/Y', strtotime($orders->date_purchased))}}
                    </td>
                    <td class="col-12 col-md-2">
                     {{--  @if($orders->currency == '$')
                      {{ $orders->currency }} {{ $orders->order_price  }} 
                      @else
                      {{ $orders->order_price * $orders->currency_value }} {{ $orders->currency }}
                      @endif --}}
                    </td>
                    <td class="col-12 col-md-3">
                        @if($orders->orders_status_id == '2') 
                              <span class="badge badge-success">{{$orders->orders_status}}</span> -->
                               &nbsp;&nbsp;/&nbsp;&nbsp;

                              <form action="{{ URL::to('/updatestatus')}}" method="post" onSubmit="return returnOrder();" style="display: inline-block">
                              <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                              <input type="hidden" name="orders_id" value="{{$orders->orders_id}}">
                              <input type="hidden" name="orders_status_id" value="4">
                              <button type="submit" class="badge badge-danger" style="text-transform:capitalize; cursor:pointer">{{$orders->orders_status}}) </button>
                              </form> 
							  @else
                          @if($orders->orders_status_id == '3')
                            <span class="badge badge-danger">{{$orders->orders_status}} </span>
                          @elseif($orders->orders_status_id == '4')
                            <span class="badge badge-danger">{{$orders->orders_status}} </span>                                                
                          @else
                            <span class="badge badge-primary">{{$orders->orders_status}}</span>
                            &nbsp;&nbsp;/&nbsp;&nbsp;

                            <form action="{{ URL::to('/updatestatus')}}" method="post" onSubmit="return cancelOrder();" style="display: inline-block">
                            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                            <input type="hidden" name="orders_id" value="{{$orders->orders_id}}">
                            <input type="hidden" name="orders_status" value="3">
                            <input type="hidden" name="old_orders_status" value="{{ $orders->orders_status_id }}">
                            <button type="submit" class="badge badge-danger" style="text-transform:capitalize; cursor:pointer">@lang('website.cancel order') </button>
                            </form>

                            @endif
                        @endif
                    </td>
                    <td align="right" class="col-12 col-md-3"><a href="{{ URL::to('/view-order/'.$orders->orders_id)}}">@lang('website.View Order')</a></td>
                  </tr>
                  @endforeach
                  @else
                      <tr>
                          <td colspan="4">@lang('website.No order is placed yet')
                          </td>
                      </tr>
                  @endif
                </tbody>
              </table>
        
          </div>
        </div>
      </div>
    </section> -->

@endsection
