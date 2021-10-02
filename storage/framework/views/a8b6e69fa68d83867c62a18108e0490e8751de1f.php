
<?php $__env->startSection('content'); ?>

<div class="container-fuild">
  <nav aria-label="breadcrumb">
      <div class="container">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/')); ?>"><?php echo app('translator')->get('website.Home'); ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo app('translator')->get('website.My Orders'); ?></li>
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
                    <?php if(count($result['orders']) > 0): ?>
                    <?php $__currentLoopData = $result['orders']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orders): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				
                        <div class="col-lg-6 px-4">
                            <div class="pst_order_wrap d-flex my-4 align-items-stretch bg-white p-4">
                                <div class="order-img">
                                    <img src="<?php echo e(asset($orders->products[0]->image)); ?>" alt="order img">
                                </div>
                                <div class="order_content pl-5 pt-md-4">
                                    <h3>
									<?php echo e($orders->products[0]->products_name); ?>

                                    </h3>
                                    <small></small>
                                    <div class="order_price d-flex flex-wrap justify-content-between align-items-center">
                                        <h4><?php if($orders->currency == '$'): ?>
                                            <?php echo e($orders->currency); ?> <?php echo e($orders->order_price); ?> 
                                            <?php else: ?>
                                            <?php echo e($orders->currency); ?><?php echo e($orders->order_price * $orders->currency_value); ?> 
                                            <?php endif; ?></h4>
                                        <!-- <button class="btn">Repeat this order</button> -->
                                        <a class="btn" href="<?php echo e(URL::to('/repeatorder?products_id='.$orders->products[0]->products_id)); ?>">Repeat this order</a>
                                    </div>
                                    <div class="order_delivery_info">
                                        <span>Order Quantity: 4, </span>
                                        <span>Ordered Date: <?php echo e(date('d/m/Y', strtotime($orders->date_purchased))); ?> </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php else: ?>
                      <h3>
                          <?php echo app('translator')->get('website.No order is placed yet'); ?></h3>
                          
                      
                  <?php endif; ?>
                    </div>

                </div>
            </div>
        </div>
	</main>
     
<?php $__env->stopSection(); ?>

<?php echo $__env->make('web.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/food/resources/views/web/orders.blade.php ENDPATH**/ ?>