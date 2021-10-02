<!-- contact Content -->
<style>
.contact-content .contact-info li {
    width: 100%;
    text-overflow: ellipsis;
    overflow: hidden;
    white-space: nowrap;
}
</style>
<div class="container-fuild">
  <nav aria-label="breadcrumb">
      <div class="container">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/')); ?>"><?php echo app('translator')->get('website.Home'); ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo app('translator')->get('website.Contact Us'); ?></li>
          </ol>
      </div>
    </nav>
</div> 

<section class="pro-content">
        
  <div class="container">
    <div class="page-heading-title">
        <h2> <?php echo app('translator')->get('website.Contact Us'); ?> 
        </h2>
     
        </div>
</div>

<section class="contact-content">

  <div class="container"> 
    <div class="row">
      <div class="col-12 col-sm-12">
        <div class="row">
            <div class="col-12 col-lg-8">
              
                <div class="form-start">
                  <?php if(session()->has('success') ): ?>
                     <div class="alert alert-success">
                         <?php echo e(session()->get('success')); ?>

                     </div>
                  <?php endif; ?>
                  <form enctype="multipart/form-data" action="<?php echo e(URL::to('/processContactUs')); ?>" method="post">
                    <input name="_token" value="<?php echo e(csrf_token()); ?>" type="hidden">
                      <label class="first-label" for="email"><?php echo app('translator')->get('website.Full Name'); ?></label>
                      <div class="input-group"> 
                        
                        <input type="text" class="form-control" id="name" name="name" placeholder="<?php echo app('translator')->get('website.Please enter your name'); ?>" aria-describedby="inputGroupPrepend" required>
                        <div class="help-block error-content invalid-feedback" hidden><?php echo app('translator')->get('website.Please enter your name'); ?></div>
                      
                      </div>
                      <label for="email"><?php echo app('translator')->get('website.Email'); ?></label>
                      <div class="input-group">                     
                          <input type="email"  name="email" class="form-control" id="validationCustomUsername" placeholder="<?php echo app('translator')->get('website.Enter Email here'); ?>.." aria-describedby="inputGroupPrepend" required>
                          <div class="help-block error-content invalid-feedback" hidden><?php echo app('translator')->get('website.Please enter your valid email address'); ?></div>
                      </div>  
                      <label for="email"><?php echo app('translator')->get('website.Message'); ?></label>
                      <textarea type="text" name="message"  placeholder="<?php echo app('translator')->get('website.write your message here'); ?>..." rows="5" cols="56"></textarea>
                      <div class="help-block error-content invalid-feedback" hidden><?php echo app('translator')->get('website.Please enter your message'); ?></div>

                      <button type="submit" class="btn btn-secondary swipe-to-top"><?php echo app('translator')->get('website.Submit'); ?> <i class="fas fa-location-arrow"></i>                 
                     
                    </form>
                </div>
          </div>    
          <div class="col-12 col-lg-4 contact-main">
            <div class="row">
              <div class="col-6">
                  
                  <ul class="contact-logo pl-0 mb-0">
                    <li> <i class="fas fa-mobile-alt"></i><br><?php echo app('translator')->get('website.CONTACT US'); ?> </li>
                    <li> <i class="fas fa-map-marker"></i><br><?php echo app('translator')->get('website.ADDRESS'); ?>
                    </li>
                    <li> <i class="fas fa-envelope"></i><br><?php echo app('translator')->get('website.EMAIL ADDRESS'); ?> </li>
                    <li> <i class="fas fa-tty"></i><br><phone dir="ltr"><?php echo app('translator')->get('website.FAX'); ?></phone></li>
                  </ul>
              </div>  
              <div class="col-6 right">
                <ul class="contact-info  pl-0 mb-0">
                  <li><font>
                    <a href="#" dir="ltr"><br><?php echo e($result['commonContent']['setting'][11]->value); ?></a>
                  </font> </li>
                  <li> <font><a href="#"><?php echo app('translator')->get('website.Ecommerce'); ?><br><?php echo app('translator')->get('website.Demo Store 3654123'); ?></a></font></li>
                  <li> <font><a href="mailto:<?php echo e($result['commonContent']['setting'][3]->value); ?>"><br><?php echo e($result['commonContent']['setting'][3]->value); ?></a> </font></li>
                  <li><font><a href="#" dir="ltr"><br><?php echo e($result['commonContent']['setting'][11]->value); ?></a> </font></li>
                </ul>
              </div>  
            </div>
              
             
             <p style="margin-top:30px;"">
              <?php echo app('translator')->get('website.Contact us text'); ?>
             </p>
          </div>
       
           
        </div>
      </div>
    </div>
    
  </div>

</section>

</section><?php /**PATH /var/www/html/food/resources/views/web/contacts/contact2.blade.php ENDPATH**/ ?>