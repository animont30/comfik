<!-- Products content -->
<!-- <?php if(!empty($result['commonContent']['categories'])): ?>
<section class="categories-content pro-content">
    <div class="container">
      <div class="products-area">
         <div class="row justify-content-center">
           <div class="col-12 col-lg-6">
             <div class="pro-heading-title">
               <h2> <?php echo app('translator')->get('website.PRODUCT CATEGORIES'); ?>
               </h2>
               <p>
                 <?php echo app('translator')->get('website.Categories Text For Home Page'); ?>
                </p>
               </div>
             </div>
         </div>
      
      </div>
    </div>
    <?php if($result['commonContent']['settings']['home_categories_img_icn'] == 'Image'): ?>
               

    <div class="general-product">
      <div class="container p-0">
        <div class="cat1-carousel-js">
    
    <?php $__currentLoopData = $result['commonContent']['categories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categories_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="cat-banner">
            
            <figure class="categories-image">
              <a href="<?php echo e(URL::to('/shop?category='.$categories_data->slug)); ?>">
                
                <img class="img-fluid" src="<?php echo e(asset('').$categories_data->path); ?>" alt="<?php echo e($categories_data->name); ?>">
                
                <div class="categories-title">
                  <h3><?php echo e($categories_data->name); ?></h3>
                </div>
              </a>
            </figure>

          </div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>
</div>
   <?php else: ?>
   <div class="general-product">
    <div class="container p-0">
      <div class="cat1-carousel-js">
        <?php $__currentLoopData = $result['commonContent']['categories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categories_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


      <div class="">
        <div class="cat-banner">
          <a href="<?php echo e(URL::to('/shop?category='.$categories_data->slug)); ?>">
          <figure class=" categories-icon">      
              <img class="img-fluid" src="<?php echo e(asset('').$categories_data->iconPath); ?>" alt="<?php echo e($categories_data->name); ?>">       
          
              <h3><?php echo e($categories_data->name); ?></h3>
          </figure>
          </a>
          
        </div>
      </div>

      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </div>
  </div>
  <?php endif; ?>
  </section>
  <?php endif; ?> --><?php /**PATH C:\xampp\htdocs\food2\resources\views/web/product-sections/categories.blade.php ENDPATH**/ ?>