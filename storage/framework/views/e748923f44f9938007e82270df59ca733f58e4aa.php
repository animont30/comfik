<!-- //footer style Six -->
 <!-- <footer id="footerSix"  class="footer-area footer-six footer-desktop d-none d-lg-block d-xl-block">
    
    <div class="container-fluid p-0">
      <div class="search-content">
          <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 align-self-center">
                    <div class="newsletter">
                        <h5><?php echo app('translator')->get('website.Subscribe for Newsletter'); ?></h5>
                        <div class="block">
                       
                <form class="form-inline mailchimp-form" action="<?php echo e(url('subscribeMail')); ?>" >
                  <div class="search-field-module">  
                    <div class="search-field-wrap">
                        <input type="email" name="email" class="email" placeholder="<?php echo app('translator')->get('website.Your email address here'); ?>" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="<?php echo app('translator')->get('website.Your email address here'); ?>">
                        <button class="btn btn-secondary swipe-to-top mailchimp-btn" type="submit" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="<?php echo app('translator')->get('website.Subscribe'); ?>">
                          <?php echo app('translator')->get('website.Subscribe'); ?></button>
                    </div>
                  </div>
                </form>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
  </div>

    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-3">
          <div class="single-footer">
            <h5><?php echo app('translator')->get('website.About Store'); ?></h5>
            <div class="row">
              <div class="col-12 col-lg-8">
                <hr>
              </div>
            </div>
            <ul class="contact-list  pl-0 mb-0">
              <li> <i class="fas fa-map-marker"></i><span><?php echo e($result['commonContent']['setting'][4]->value); ?> <?php echo e($result['commonContent']['setting'][5]->value); ?> <?php echo e($result['commonContent']['setting'][6]->value); ?>, <?php echo e($result['commonContent']['setting'][7]->value); ?> <?php echo e($result['commonContent']['setting'][8]->value); ?></span> </li>
              <li> <i class="fas fa-phone"></i><span dir="ltr">(<?php echo e($result['commonContent']['setting'][11]->value); ?>)</span> </li>
              <li> <i class="fas fa-envelope"></i><span> <a href="mailto:<?php echo e($result['commonContent']['setting'][3]->value); ?>"><?php echo e($result['commonContent']['setting'][3]->value); ?></a> </span> </li>

            </ul>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
          <div class="footer-block">
              <div class="single-footer single-footer-left">
                <h5><?php echo app('translator')->get('website.Our Services'); ?></h5>
                <div class="row">
                    <div class="col-12 col-lg-8">
                      <hr>
                    </div>
                  </div>
                <ul class="links-list pl-0 mb-0">
                <li> <a href="<?php echo e(URL::to('/')); ?>"><i class="fa fa-angle-right"></i><?php echo app('translator')->get('website.Home'); ?></a> </li>
                <li> <a href="<?php echo e(URL::to('/shop')); ?>"><i class="fa fa-angle-right"></i><?php echo app('translator')->get('website.Shop'); ?></a> </li>
                <li> <a href="<?php echo e(URL::to('/orders')); ?>"><i class="fa fa-angle-right"></i><?php echo app('translator')->get('website.Orders'); ?></a> </li>
                <li> <a href="<?php echo e(URL::to('/viewcart')); ?>"><i class="fa fa-angle-right"></i><?php echo app('translator')->get('website.Shopping Cart'); ?></a> </li>
                <li> <a href="<?php echo e(URL::to('/wishlist')); ?>"><i class="fa fa-angle-right"></i><?php echo app('translator')->get('website.Wishlist'); ?></a> </li>
                </ul>
              </div>

          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
          <div class="single-footer single-footer-right">
            <h5><?php echo app('translator')->get('website.Information'); ?></h5>
            <div class="row">
                <div class="col-12 col-lg-8">
                  <hr>
                </div>
              </div>
            <ul class="links-list pl-0 mb-0">
              <?php if(count($result['commonContent']['pages'])): ?>
                  <?php $__currentLoopData = $result['commonContent']['pages']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <li> <a href="<?php echo e(URL::to('/page?name='.$page->slug)); ?>"><i class="fa fa-angle-right"></i><?php echo e($page->name); ?></a> </li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>
                  <li> <a href="<?php echo e(URL::to('/contact')); ?>"><i class="fa fa-angle-right"></i><?php echo app('translator')->get('website.Contact Us'); ?></a> </li>
            </ul>
          </div>
        </div>

        <div class="col-12 col-lg-3">
          <div class="single-footer">
            <?php if(!empty($result['commonContent']['setting'][89]) and $result['commonContent']['setting'][89]->value==1): ?>
              <div class="newsletter">
                  <h5><?php echo app('translator')->get('website.Subscribe for Newsletter'); ?></h5>
                  <div class="row">
                      <div class="col-12 col-lg-8">
                        <hr>
                      </div>
                    </div>
                  <div class="block">
                      <form class="form-inline">
                          <div class="search">
                            <input type="email" name="email" id="email" placeholder="<?php echo app('translator')->get('website.Your email address here'); ?>">
                            <button type="button" id="subscribe" class="btn btn-secondary"><?php echo app('translator')->get('website.Subscribe'); ?></button>
                              <?php echo app('translator')->get('website.Subscribe'); ?>
                              </button>
                              <button class="btn-secondary fas fa-location-arrow" type="submit">
                              </button>
                              <div class="alert alert-success alert-dismissible success-subscribte" role="alert" style="opacity: 500; display: none;"></div>

                              <div class="alert alert-danger alert-dismissible error-subscribte" role="alert" style="opacity: 500; display: none;"></div>
                          </div>
                        </form>
                  </div>
              </div>
              <?php endif; ?>
              <div class="socials">
                  <h5><?php echo app('translator')->get('website.Follow Us'); ?></h5>
                  <div class="row">
                      <div class="col-12 col-lg-8">
                        <hr>
                      </div>
                    </div>
                  <ul class="list">
                    <li>
                        <?php if(!empty($result['commonContent']['setting'][50]->value)): ?>
                          <a href="<?php echo e($result['commonContent']['setting'][50]->value); ?>" class="fab fa-facebook-f" target="_blank"></a>
                          <?php else: ?>
                            <a href="#" class="fab fa-facebook-f"></a>
                          <?php endif; ?>
                      </li>
                      <li>
                      <?php if(!empty($result['commonContent']['setting'][52]->value)): ?>
                          <a href="<?php echo e($result['commonContent']['setting'][52]->value); ?>" class="fab fa-twitter" target="_blank"></a>
                      <?php else: ?>
                          <a href="#" class="fab fa-twitter"></a>
                      <?php endif; ?></li>
                      <li>
                      <?php if(!empty($result['commonContent']['setting'][51]->value)): ?>
                          <a href="<?php echo e($result['commonContent']['setting'][51]->value); ?>"  target="_blank"><i class="fab fa-google"></i></a>
                      <?php else: ?>
                          <a href="#"><i class="fab fa-google"></i></a>
                      <?php endif; ?>
                      </li>
                      <li>
                      <?php if(!empty($result['commonContent']['setting'][53]->value)): ?>
                          <a href="<?php echo e($result['commonContent']['setting'][53]->value); ?>" class="fab fa-linkedin-in" target="_blank"></a>
                      <?php else: ?>
                          <a href="#" class="fab fa-linkedin-in"></a>
                      <?php endif; ?>
                      </li>
                  </ul>
                  <div class="footer-image">
                    <img class="img-fluid" src="<?php echo e(asset('web/images/miscellaneous/payments.png')); ?>">
                  </div>
              </div>

          </div>
        </div>
      </div>
    </div>

    <div class="container-fluid p-0">
      <div class="copyright-content">
          <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                  <div class="footer-info">
                    © <?php echo app('translator')->get('website.Copy Rights'); ?>.  <a href="<?php echo e(url('/page?name=refund-policy')); ?>"><?php echo app('translator')->get('website.Privacy'); ?></a>&nbsp;&bull;&nbsp;<a href="<?php echo e(url('/page?name=term-services')); ?>"><?php echo app('translator')->get('website.Terms'); ?></a>
                  </div>
                    
                </div>
            </div>
          </div>
        </div>
  </div>
</footer> -->

<!-- FOOTER -->
<footer class="footer-comfik bg-white">
		<div class="contain_footer_links">
			<ul class="list-unstyled d-flex flex-wrap justify-content-center">
      <?php if(count($result['commonContent']['pages'])): ?>
                  <?php $__currentLoopData = $result['commonContent']['pages']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <li> <a href="<?php echo e(URL::to('/page?name='.$page->slug)); ?>" class="footer-link"><?php echo e($page->name); ?></a> </li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>
                  <li> <a href="<?php echo e(URL::to('/contact')); ?>" class="footer-link"></i><?php echo app('translator')->get('website.Contact Us'); ?></a> </li>
				<!-- <li><a href="#" class="footer-link">Terms Of Services</a></li>
				<li><a href="#" class="footer-link">Privacy Policy</a></li>
				<li><a href="#" class="footer-link">Help</a></li>
				<li><a href="#" class="footer-link">Iphone App</a></li>
				<li><a href="#" class="footer-link">Users</a></li>
				<li><a href="#" class="footer-link"> Collections</a></li>
				<li><a href="#" class="footer-link"> Today</a></li>
				<li><a href="#" class="footer-link"> Explore</a></li> -->
			</ul>
		</div>

    <!-- <div class="container-fluid p-0 pb-3 pt-3">
      <div class="copyright-content">
          <div class="container">
            <div class="row align-items-center">
                <div class="col-12 text-center"> 
                  <div class="footer-info">
                    © <?php echo app('translator')->get('website.Copy Rights'); ?>.
                  </div>
                    
                </div>
            </div>
          </div>
        </div>
  </div> -->
	</footer>
<?php /**PATH /var/www/html/food/resources/views/web/footers/footer6.blade.php ENDPATH**/ ?>