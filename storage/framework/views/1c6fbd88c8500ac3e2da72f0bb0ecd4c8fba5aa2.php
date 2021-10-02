<!-- Products content  -->
<!-- <?php if(!empty($result['category_section']) and count($result['category_section'])>0): ?>

  <?php $__currentLoopData = $result['category_section']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <section class="categories-content pro-content">
        <div class="container">
          <div class="products-area">
            <div class="row justify-content-center">
              <div class="col-12 col-lg-6">
                <div class="pro-heading-title">
                  <h2> 
                    
                    <?php echo e($item->categories_name); ?>

                  </h2>
                  <p>
                    <?php echo stripslashes($item->categories_description); ?>
                    </p>
                  </div>
                </div>
            </div>
          
          </div>
        </div>
      <div class="row">
        <div class="container">
        
        
          <?php if($item->products['success']==1): ?>
              <div class="categories-carousel-js">         
                
                    <?php $__currentLoopData = $item->products['product_data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$products): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                    <div class="slick ">
                    
                      <?php echo $__env->make('web.common.product', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>               

                  </div>
                </div>
             
            <?php endif; ?>
          </div>
        </div>          
          
      </section>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php endif; ?> --><?php /**PATH /var/www/html/food/resources/views/web/product-sections/Category_section.blade.php ENDPATH**/ ?>