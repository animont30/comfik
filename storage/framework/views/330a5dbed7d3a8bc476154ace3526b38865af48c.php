<!-- //banner eight -->
 <div class="banner-eight">

    <div class="container">
        <div class="group-banners">
            <div class="row">
              <div class="col-12 col-md-6">
                  <div class="row">
                      <div class="col-12">
                        <?php if(count($result['commonContent']['homeBanners'])>0): ?>
                         <?php $__currentLoopData = ($result['commonContent']['homeBanners']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $homeBanners): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($homeBanners->type==18): ?>
                          <figure class="banner-image imagespace">
                            <a href="<?php echo e($homeBanners->banners_url); ?>"><img class="img-fluid" src="<?php echo e(asset('').$homeBanners->path); ?>" alt="Banner Image"></a>
                          </figure>
                          <?php endif; ?>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        </div>
                      <div class="col-12 col-md-6">
                        <?php if(count($result['commonContent']['homeBanners'])>0): ?>
                         <?php $__currentLoopData = ($result['commonContent']['homeBanners']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $homeBanners): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($homeBanners->type==16): ?>
                          <figure class="banner-image ">
                            <a href="<?php echo e($homeBanners->banners_url); ?>"><img class="img-fluid" src="<?php echo e(asset('').$homeBanners->path); ?>" alt="Banner Image"></a>
                          </figure>
                          <?php endif; ?>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        </div>
                    <div class="col-12 col-md-6">
                      <?php if(count($result['commonContent']['homeBanners'])>0): ?>
                       <?php $__currentLoopData = ($result['commonContent']['homeBanners']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $homeBanners): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php if($homeBanners->type==17): ?>
                      <figure class="banner-image ">
                        <a href="<?php echo e($homeBanners->banners_url); ?>"><img class="img-fluid" src="<?php echo e(asset('').$homeBanners->path); ?>" alt="Banner Image"></a>
                      </figure>
                      <?php endif; ?>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    </div>

                  </div>
                </div>
                <div class="col-12 col-md-6">
                  <?php if(count($result['commonContent']['homeBanners'])>0): ?>
                   <?php $__currentLoopData = ($result['commonContent']['homeBanners']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $homeBanners): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php if($homeBanners->type==15): ?>
                  <figure class="banner-image ">
                    <a href="<?php echo e($homeBanners->banners_url); ?>"><img class="img-fluid" src="<?php echo e(asset('').$homeBanners->path); ?>" alt="Banner Image"></a>
                  </figure>
                  <?php endif; ?>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                </div>
            </div>
          </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\food2\resources\views/web/banners/banner8.blade.php ENDPATH**/ ?>