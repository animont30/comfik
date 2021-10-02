
<?php $__env->startSection('content'); ?>

<div class="container-fuild">
  <nav aria-label="breadcrumb">
      <div class="container">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/')); ?>"><?php echo app('translator')->get('website.Home'); ?></a></li>
            <li class="breadcrumb-item active"><a href="<?php echo e(URL::to('/orders')); ?>"><?php echo app('translator')->get('website.orders'); ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo app('translator')->get('website.Order information'); ?></li>
          </ol>
      </div>
    </nav>
</div> 

<!--My Order Content -->
<section class="order-two-content pro-content">
  <div class="container">
    <div class="page-heading-title">
        <h2>   <?php echo app('translator')->get('website.Order information'); ?>
        </h2>
     
        </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-12 col-lg-3 ">
      <div class="heading">
          <h2>
              <?php echo app('translator')->get('website.My Account'); ?>
          </h2>
          <hr >
        </div>

        <?php if(Auth::guard('customer')->check()): ?>
        <ul class="list-group">
            <li class="list-group-item">
                <a class="nav-link" href="<?php echo e(URL::to('/profile')); ?>">
                    <i class="fas fa-user"></i>
                  <?php echo app('translator')->get('website.Profile'); ?>
                </a>
            </li>
            <li class="list-group-item">
                <a class="nav-link" href="<?php echo e(URL::to('/wishlist')); ?>">
                    <i class="fas fa-heart"></i>
                 <?php echo app('translator')->get('website.Wishlist'); ?>
                </a>
            </li>
            <li class="list-group-item">
                <a class="nav-link" href="<?php echo e(URL::to('/orders')); ?>">
                    <i class="fas fa-shopping-cart"></i>
                  <?php echo app('translator')->get('website.Orders'); ?>
                </a>
            </li>
            <li class="list-group-item">
                <a class="nav-link" href="<?php echo e(URL::to('/shipping-address')); ?>">
                    <i class="fas fa-map-marker-alt"></i>
                 <?php echo app('translator')->get('website.Shipping Address'); ?>
                </a>
            </li>
            <li class="list-group-item">
                <a class="nav-link" href="<?php echo e(URL::to('/logout')); ?>">
                    <i class="fas fa-power-off"></i>
                  <?php echo app('translator')->get('website.Logout'); ?>
                </a>
            </li>
          </ul>
          <?php elseif(!empty(session('guest_checkout')) and session('guest_checkout') == 1): ?>
          <ul class="list-group">
            <li class="list-group-item">
                <a class="nav-link" href="<?php echo e(URL::to('/orders')); ?>">
                    <i class="fas fa-shopping-cart"></i>
                  <?php echo app('translator')->get('website.Orders'); ?>
                </a>
            </li>
          </ul>
          <?php endif; ?>
    </div>
    <div class="col-12 col-lg-9 ">
        <!-- Main content -->
  <section class="invoice" style="margin: 15px;">
      <!-- title row -->
      <?php if(session()->has('message')): ?>
       <div class="col-md-12">
       <div class="row">
      	<div class="alert alert-success alert-dismissible">
           <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
           <h4><i class="icon fa fa-check"></i> <?php echo e(trans('labels.Successlabel')); ?></h4>
            <?php echo e(session()->get('message')); ?>

        </div>
        </div>
        </div>
        <?php endif; ?>
        <?php if(session()->has('error')): ?>
        <div class="col-md-12">
      	<div class="row">
        	<div class="alert alert-warning alert-dismissible">
               <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
               <h4><i class="icon fa fa-warning"></i> <?php echo e(trans('labels.WarningLabel')); ?></h4>
                <?php echo e(session()->get('error')); ?>

            </div>
          </div>
         </div>
        <?php endif; ?>
      <div class="row">
        <div class="col-md-12">
          <h2 class="page-header" style="padding-bottom: 25px; margin-top:0;">
            <i class="fa fa-globe"></i> <?php echo e(trans('labels.OrderID')); ?># <?php echo e($data['orders_data'][0]->orders_id); ?>  
            
            <small style="display: inline-block" class="label label-primary">
            <?php if($data['orders_data'][0]->ordered_source == 1): ?>
            <?php echo e(trans('labels.Website')); ?>

            <?php else: ?>
            <?php echo e(trans('labels.Application')); ?>

            <?php endif; ?>
            </small>
            <small style="display: inline-block"><?php echo e(trans('labels.OrderedDate')); ?>: <?php echo e(date('m/d/Y', strtotime($data['orders_data'][0]->date_purchased))); ?></small>
            <?php if($data['orders_data'][0]->orders_status_id == 7 ): ?>
              <?php if($data['current_boy']): ?>
              <button type="button" data-toggle="modal" data-target="#trackmodal" class="btn btn-success pull-right" style="margin-right: 5px;"><i class="fa fa-location-arrow"></i> <?php echo e(trans('labels.Track Order')); ?></button>
              

              <!-- Modal -->
              <div id="trackmodal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-body" id="googleMap" style="height: 400px">
                    </div>
                  </div>

                </div>
              </div>
              
              <?php endif; ?>
            <?php endif; ?>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          <?php echo e(trans('labels.CustomerInfo')); ?>:
          <address>
            <strong><?php echo e($data['orders_data'][0]->customers_name); ?></strong><br>
            <?php echo e($data['orders_data'][0]->customers_street_address); ?> <br>
            <?php echo e($data['orders_data'][0]->customers_city); ?>, <?php echo e($data['orders_data'][0]->customers_state); ?> <?php echo e($data['orders_data'][0]->customers_postcode); ?>, <?php echo e($data['orders_data'][0]->customers_country); ?><br>
            <?php echo e(trans('labels.Phone')); ?>: <?php echo e($data['orders_data'][0]->customers_telephone); ?><br>
            <?php echo e(trans('labels.Email')); ?>: <?php echo e($data['orders_data'][0]->email); ?>

          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <?php echo e(trans('labels.ShippingInfo')); ?>

          <address>
            <strong><?php echo e($data['orders_data'][0]->delivery_name); ?></strong><br>
            <?php echo e($data['orders_data'][0]->delivery_street_address); ?> <br>
            <?php echo e($data['orders_data'][0]->delivery_city); ?>, <?php echo e($data['orders_data'][0]->delivery_state); ?> <?php echo e($data['orders_data'][0]->delivery_postcode); ?>, <?php echo e($data['orders_data'][0]->delivery_country); ?><br>

            <strong><?php echo e(trans('labels.Phone')); ?>: </strong><?php echo e($data['orders_data'][0]->delivery_phone); ?><br>
           <strong> <?php echo e(trans('labels.ShippingMethod')); ?>:</strong> <?php echo e($data['orders_data'][0]->shipping_method); ?> <br>
           <strong> <?php echo e(trans('labels.ShippingCost')); ?>:</strong> 
           <?php if(!empty($data['orders_data'][0]->shipping_cost)): ?> 
            <?php if(!empty($result['commonContent']['currency']->symbol_left) && $result['commonContent']['currency']->symbol_left == $data['orders_data'][0]->currency): ?>  <?php echo e($data['orders_data'][0]->currency); ?>  <?php echo e($data['orders_data'][0]->shipping_cost  * $data['orders_data'][0]->currency_value); ?> <?php else: ?>  <?php echo e($data['orders_data'][0]->shipping_cost  * $data['orders_data'][0]->currency_value); ?>  <?php echo e($data['orders_data'][0]->currency); ?> <?php endif; ?><br>
            <?php else: ?> --- <?php endif; ?> <br>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
         <?php echo e(trans('labels.BillingInfo')); ?>

          <address>
            <strong><?php echo e($data['orders_data'][0]->billing_name); ?></strong><br>
            <?php echo e($data['orders_data'][0]->billing_street_address); ?> <br>
            <strong><?php echo e(trans('labels.Phone')); ?>: </strong><?php echo e($data['orders_data'][0]->billing_phone); ?><br>
            <?php echo e($data['orders_data'][0]->billing_city); ?>, <?php echo e($data['orders_data'][0]->billing_state); ?> <?php echo e($data['orders_data'][0]->billing_postcode); ?>, <?php echo e($data['orders_data'][0]->billing_country); ?><br>
          </address>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <!-- Table row -->
      <div class="row">
        <div class="col-md-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th><?php echo e(trans('labels.Qty')); ?></th>
              <th><?php echo e(trans('labels.Image')); ?></th>
              <th><?php echo e(trans('labels.ProductName')); ?></th>
              <th><?php echo e(trans('labels.ProductModal')); ?></th>
              <th><?php echo e(trans('labels.Options')); ?></th>
              <th><?php echo e(trans('labels.Price')); ?></th>
            </tr>
            </thead>
            <tbody>

            <?php $__currentLoopData = $data['orders_data'][0]->data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $products): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <tr>
                <td><?php echo e($products->products_quantity); ?></td>
                <td >
                   <img src="<?php echo e(asset('').$products->image); ?>" width="60px"> <br>
                </td>
                <td  width="30%">
                    <?php echo e($products->products_name); ?><br>
                </td>
                <td>
                    <?php echo e($products->products_model); ?>

                </td>
                <td>
                <?php $__currentLoopData = $products->attribute; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attributes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                	<b><?php echo e(trans('labels.Name')); ?>:</b> <?php echo e($attributes->products_options); ?><br>
                    <b><?php echo e(trans('labels.Value')); ?>:</b> <?php echo e($attributes->products_options_values); ?><br>
                    <b><?php echo e(trans('labels.Price')); ?>:</b> 
                    <?php if(!empty($result['commonContent']['currency']->symbol_left) && $result['commonContent']['currency']->symbol_left == $data['orders_data'][0]->currency): ?>  <?php echo e($data['orders_data'][0]->currency); ?>  <?php echo e($attributes->options_values_price * $data['orders_data'][0]->currency_value); ?> <?php else: ?>  <?php echo e($attributes->options_values_price * $data['orders_data'][0]->currency_value); ?>  <?php echo e($data['orders_data'][0]->currency); ?> <?php endif; ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></td>


                <td>
                  
                <?php if(!empty($result['commonContent']['currency']->symbol_left) && $result['commonContent']['currency']->symbol_left == $data['orders_data'][0]->currency): ?>  <?php echo e($data['orders_data'][0]->currency); ?>  <?php echo e($products->final_price  * $data['orders_data'][0]->currency_value); ?> <?php else: ?>  <?php echo e($products->final_price  * $data['orders_data'][0]->currency_value); ?>  <?php echo e($data['orders_data'][0]->currency); ?> <?php endif; ?><br>
                  </td>
             </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>
          </table>
        </div>
        <!-- /.col -->

      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-md-7">
          <p class="lead" style="margin-bottom:10px"><?php echo e(trans('labels.PaymentMethods')); ?>:</p>
          <p class="text-muted well well-sm no-shadow" style="text-transform:capitalize">
           	<?php echo e(str_replace('_',' ', $data['orders_data'][0]->payment_method)); ?>

          </p>
          <?php if(!empty($data['orders_data'][0]->coupon_code)): ?>
              <p class="lead" style="margin-bottom:10px"><?php echo e(trans('labels.Coupons')); ?>:</p>
                <table class="text-muted well well-sm no-shadow stripe-border table table-striped" style="text-align: center; ">
                	<tr>
                        <th style="text-align: center; "><?php echo e(trans('labels.Code')); ?></th>
                        <th style="text-align: center; "><?php echo e(trans('labels.Amount')); ?></th>
                    </tr>
                	<?php $__currentLoopData = json_decode($data['orders_data'][0]->coupon_code); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $couponData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    	<tr>
                        	<td><?php echo e($couponData->code); ?></td>
                            <td><?php echo e($couponData->amount); ?>


                                <?php if($couponData->discount_type=='percent_product'): ?>
                                    (<?php echo e(trans('labels.Percent')); ?>)
                                <?php elseif($couponData->discount_type=='percent'): ?>
                                    (<?php echo e(trans('labels.Percent')); ?>)
                                <?php elseif($couponData->discount_type=='fixed_cart'): ?>
                                    (<?php echo e(trans('labels.Fixed')); ?>)
                                <?php elseif($couponData->discount_type=='fixed_product'): ?>
                                    (<?php echo e(trans('labels.Fixed')); ?>)
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</table>
               <!-- <?php echo e($data['orders_data'][0]->coupon_code); ?>-->

          <?php endif; ?>
          <!-- <img src="../../dist/img/credit/visa.png" alt="Visa">
          <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
          <img src="../../dist/img/credit/american-express.png" alt="American Express">
          <img src="../../dist/img/credit/paypal2.png" alt="Paypal">-->

		  <p class="lead" style="margin-bottom:10px"><?php echo e(trans('labels.Orderinformation')); ?>:</p>
          <p class="text-muted well well-sm no-shadow" style="text-transform:capitalize; word-break:break-all;">
           <?php if(trim($data['orders_data'][0]->order_information) != '[]' or !empty($data['orders_data'][0]->order_information)): ?>
           		<?php echo e($data['orders_data'][0]->order_information); ?>

           <?php endif; ?>
          </p>
        </div>
        <!-- /.col -->
        <div class="col-md-5">
          <!--<p class="lead"></p>-->

          <div class="table-responsive ">
            <table class="table order-table">
              <tr>
                <th style="width:50%"><?php echo e(trans('labels.Subtotal')); ?>:</th>
                <td>
                <?php if(!empty($result['commonContent']['currency']->symbol_left) && $result['commonContent']['currency']->symbol_left == $data['orders_data'][0]->currency): ?>  <?php echo e($data['orders_data'][0]->currency); ?>  <?php echo e($data['subtotal']  * $data['orders_data'][0]->currency_value); ?> <?php else: ?>  <?php echo e($data['subtotal']  * $data['orders_data'][0]->currency_value); ?>  <?php echo e($data['orders_data'][0]->currency); ?> <?php endif; ?><br>

                  </td>
              </tr>
              <tr>
                <th><?php echo e(trans('labels.Tax')); ?>:</th>
                <td>
                <?php if(!empty($result['commonContent']['currency']->symbol_left) && $result['commonContent']['currency']->symbol_left == $data['orders_data'][0]->currency): ?>  <?php echo e($data['orders_data'][0]->currency); ?>  <?php echo e($data['orders_data'][0]->total_tax   * $data['orders_data'][0]->currency_value); ?> <?php else: ?>  <?php echo e($data['orders_data'][0]->total_tax   * $data['orders_data'][0]->currency_value); ?>  <?php echo e($data['orders_data'][0]->currency); ?> <?php endif; ?><br>

                  </td>
              </tr>
              <tr>
                <th><?php echo e(trans('labels.ShippingCost')); ?>:</th>
                <td>
                <?php if(!empty($result['commonContent']['currency']->symbol_left) && $result['commonContent']['currency']->symbol_left == $data['orders_data'][0]->currency): ?>  <?php echo e($data['orders_data'][0]->currency); ?>  <?php echo e($data['orders_data'][0]->shipping_cost  * $data['orders_data'][0]->currency_value); ?> <?php else: ?>  <?php echo e($data['orders_data'][0]->shipping_cost  * $data['orders_data'][0]->currency_value); ?>  <?php echo e($data['orders_data'][0]->currency); ?> <?php endif; ?><br>
                  </td>
              </tr>
              <?php if(!empty($data['orders_data'][0]->coupon_code)): ?>
              <tr>
                <th><?php echo e(trans('labels.DicountCoupon')); ?>:</th>
                <td>
                <?php if(!empty($result['commonContent']['currency']->symbol_left) && $result['commonContent']['currency']->symbol_left == $data['orders_data'][0]->currency): ?>  <?php echo e($data['orders_data'][0]->currency); ?>  <?php echo e($data['orders_data'][0]->coupon_amount  * $data['orders_data'][0]->currency_value); ?> <?php else: ?>  <?php echo e($data['orders_data'][0]->coupon_amount  * $data['orders_data'][0]->currency_value); ?>  <?php echo e($data['orders_data'][0]->currency); ?> <?php endif; ?><br>                  
              </tr>
              <?php endif; ?>
              <tr>
                <th><?php echo e(trans('labels.Total')); ?>:</th>
                <td>
                <?php if(!empty($result['commonContent']['currency']->symbol_left) && $result['commonContent']['currency']->symbol_left == $data['orders_data'][0]->currency): ?>  <?php echo e($data['orders_data'][0]->currency); ?>  <?php echo e($data['orders_data'][0]->order_price  * $data['orders_data'][0]->currency_value); ?> <?php else: ?>  <?php echo e($data['orders_data'][0]->order_price  * $data['orders_data'][0]->currency_value); ?>  <?php echo e($data['orders_data'][0]->currency); ?> <?php endif; ?><br>

                  </td>
              </tr>
            </table>
          </div>

        </div>
   

        <div class="col-md-12">
          <p class="lead"><?php echo e(trans('labels.OrderHistory')); ?></p>
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th><?php echo e(trans('labels.Date')); ?></th>
                  <th><?php echo e(trans('labels.Status')); ?></th>
                  <th><?php echo e(trans('labels.Comments')); ?></th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $data['orders_status_history']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orders_status_history): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
							<?php
								$date = new DateTime($orders_status_history->date_added);
								$status_date = $date->format('d-m-Y');
								print $status_date;
							?>
                        </td>
                        <td>
                        	<?php if($orders_status_history->orders_status_id==1): ?>
                            	<span class="label label-warning">
                            <?php elseif($orders_status_history->orders_status_id==2): ?>
                                <span class="label label-success">
                            <?php elseif($orders_status_history->orders_status_id==3): ?>
                                 <span class="label label-danger">
                            <?php else: ?>
                                 <span class="label label-primary">
                            <?php endif; ?>
                            <?php echo e($orders_status_history->orders_status_name); ?>

                                 </span>
                        </td>
                        <td style="text-transform: initial;"><?php echo e($orders_status_history->comments); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
          </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->


    </section>
  <!-- /.content -->
    </div>
  </div>
</div>

<div class="modal fade" id="mapModal" tabindex="-1" role="dialog" aria-modal="true">
       
  <div class="modal-dialog modal-dialog-centered modal-lg " role="document">
    <div class="modal-content">
        <div class="modal-body">

            <div class="container">
                <div class="row align-items-center">                   
             
                <div class="form-group">
<input type="text" id="pac-input" name="address_address" class="form-control map-input">
</div>
<div id="address-map-container" style="width:100%;height:400px; ">
<div style="width: 100%; height: 100%" id="map"></div>
</div>
              </div>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
            </div>
          </div>
          <div class="modal-footer">
   
   <button type="button" class="btn btn-primary" onclick="setUserLocation()"><i class="fas fa-location-arrow"></i></button>
   <button type="button" class="btn btn-secondary" onclick="saveAddress()">Save</button>
 </div>
    </div>
  </div>
  </div>
</section>

<script src="https://maps.googleapis.com/maps/api/js?key=<?=$result['commonContent']['settings']['google_map_api']?>&libraries=places&callback=initialize" async defer></script>
    <script>
      var markers;
      var myLatlng;
      var map;
      var geocoder;
     function setUserLocation(){
      if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            myLatlng = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            markers.setPosition(myLatlng);
            map.setCenter(myLatlng);

          }, function() {
          });
        } 
     } 
     function saveAddress(){
      var latlng = markers.getPosition();
      geocoder.geocode({'location': latlng}, function(results, status) {
          if (status === 'OK') {
            if (results[0]) {
             var street = "";
             var state = "";
             var country = "";
             var city = "";
             var postal_code = "";

                for (var i = 0; i < results[0].address_components.length; i++) {
                    for (var b = 0; b < results[0].address_components[i].types.length; b++) {
                        switch (results[0].address_components[i].types[b]) {
                            case 'locality':
                                city = results[0].address_components[i].long_name;
                                break;
                            case 'administrative_area_level_1':
                                state = results[0].address_components[i].long_name;
                                break;
                            case 'country':
                                country = results[0].address_components[i].long_name;
                                break;
                            case 'postal_code':
                              postal_code =  results[0].address_components[i].long_name; 
                              break;
                            case 'route':
                              if (street == "") {
                                street = results[0].address_components[i].long_name;
                              }
                            break;

                            case 'street_address':
                              if (street == "") {
                                street += ", " + results[0].address_components[i].long_name;
                              }
                            break;
                        }
                    }
                }
                $("#postcode").val(postal_code);
                $("#street").val(street);
                $("#city").val(city);

                $("#latitude").val(markers.getPosition().lat());
                $("#longitude").val(markers.getPosition().lng());

                // $("#entry_country_id").val(country);
               
                $("#location").val(latlng);

                $("#entry_country_id option").filter(function() {
                  //may want to use $.trim in here
                  return $(this).text() == country;
                }).prop('selected', true);
                if(getZones("no_loader")){
                  $("#entry_zone_id option").filter(function() {
                    //may want to use $.trim in here
                    return $(this).text() == state;
                  }).prop('selected', true);
                }
                $('#mapModal').modal('hide');

            } else {
              console.log('No results found');
            }
          } else {
            console.log('Geocoder failed due to: ' + status);
          }
        });
     }

     function initialize() {
      defaultPOS = {
              lat: <?=$result['commonContent']['setting'][127]->value?>,
              lng: <?=$result['commonContent']['setting'][128]->value?>
            };
      map = new google.maps.Map(document.getElementById('map'), {
          center: defaultPOS,
          zoom: 13,
          mapTypeId: 'roadmap'
        });
      geocoder = new google.maps.Geocoder;
      markers = new google.maps.Marker({
          map: map,
          draggable:true,
          position: defaultPOS
        });

        
        
        var infowindow = new google.maps.InfoWindow;
        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });

          searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }

          var bounds = new google.maps.LatLngBounds();

          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
            var icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };
            console.log(place.geometry.location);
            // Create a marker for each place.
            markers.setPosition(place.geometry.location);
            markers.setTitle(place.name);
            

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          map.fitBounds(bounds);
        });
      }

    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('web.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/food/resources/views/web/view-order.blade.php ENDPATH**/ ?>