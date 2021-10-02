<?php $__env->startSection('content'); ?>

<div class="container-fuild">
  <nav aria-label="breadcrumb">
    <div class="container">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/')); ?>"><?php echo app('translator')->get('website.Home'); ?></a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo app('translator')->get('website.myProfile'); ?></li>

      </ol>
    </div>
  </nav>
</div> 

<div class="main-content">
<div class="container-fluid px-0">
                    <form name="updateMyProfile" class="align-items-center form-validate" enctype="multipart/form-data" action="<?php echo e(URL::to('updateMyProfile')); ?>" method="post">
                        <div class="row mb-5">
                            <div class="col-12">
                               <!-- PROFILE IMAGE CONTAIN -->
                               <div class="profile_photos_wrapper">
                                    <div class="inner_wall_container">
									<?php if(auth()->guard('customer')->user()->wallimage!=''): ?>
										<img src="<?php echo e(auth()->guard('customer')->user()->wallimage); ?>"/>
									<?php else: ?>
                                        <span class="icon-plus"></span>
                                        <h3>Upload Wall Background</h3>
                                        <h5>Best Size 1600x400</h5>
									<?php endif; ?>
                                    </div>
                               </div>
                               <div class="author_profile_pic">
                                <!--span class="icon-plus"></span>
                                <h3>Best Size : <br> 300x300</h3-->
                                <!-- <img src="assets/images/review.jpg" alt=""> -->
								<?php if(auth()->guard('customer')->user()->avatar!=''): ?>
										<img src="<?php echo e(auth()->guard('customer')->user()->avatar); ?>" width="300px" />
									<?php endif; ?>
                               </div>
                            </div>
                        </div>
                        <!-- END FIRST ROW -->
                        <!-- ALert messages -->
                            <?php echo csrf_field(); ?>
                            <?php if( count($errors) > 0): ?>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                        <span class="sr-only"><?php echo app('translator')->get('website.Error'); ?>:</span>
                                        <?php echo e($error); ?>

                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>

                            <?php if(session()->has('error')): ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <?php echo e(session()->get('error')); ?>

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif; ?>

                            <?php if(Session::has('error')): ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                    <span class="sr-only"><?php echo app('translator')->get('website.Error'); ?>:</span>
                                    <?php echo e(session()->get('error')); ?>

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif; ?>

                            <?php if(Session::has('error')): ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                    <span class="sr-only"><?php echo app('translator')->get('website.Error'); ?>:</span>
                                    <?php echo session('loginError'); ?>

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif; ?>

                            <?php if(session()->has('success') ): ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <?php echo e(session()->get('success')); ?>

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif; ?>
                        <!-- Alert messages end -->
                        <div class="row mt-3 px-3">
                            <div class="col-md-8 col-lg-5 mx-auto  mt-5 pt-3 upload_recipe_Wrapper">
                                <!-- upload recipe form -->
                                <div class="form-group row mb-0">
                                  <div class="form-group col-lg-6">
                                    <label for="your-name">First Name</label>
                                    <input type="text" required name="customers_firstname" class="form-control field-validate" id="inputName" value="<?php echo e(auth()->guard('customer')->user()->first_name); ?>">
                                    </div>
                                    <div class="form-group col-lg-6">
                                    <label for="your-name">Last Name</label>
                                    <input type="text" required name="customers_lastname" placeholder="<?php echo app('translator')->get('website.Last Name'); ?>" class="form-control field-validate" id="lastName" value="<?php echo e(auth()->guard('customer')->user()->last_name); ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="niche-title">Enter E-mail</label>
                                    <input type="email" class="form-control" placeholder="user@domain.com" id="niche-title" value="<?php echo e(auth()->guard('customer')->user()->email); ?>" readonly>
                                </div>
								<div class="form-group">
                                    <label class="d-block">Join As </label>
									<?php if(auth()->guard('customer')->user()->role_id=='3'): ?> 
                                    <div class="custom-control custom-radio custom-control-inline">
                                       
                                        <label class=" ml-3" for="role">Home Chef</label>
                                    </div>
									<?php endif; ?>
									<?php if(auth()->guard('customer')->user()->role_id=='2'): ?>
                                    <div class="custom-control custom-radio custom-control-inline ml-3">
                                        
                                        <label class=" ml-3" for="role">Foodie</label>
                                    </div>
									 <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label for="mobile-number">Enter Mobile No.</label>
                                    <input  name="customers_telephone" type="tel"  placeholder="<?php echo app('translator')->get('website.Phone Number'); ?>" value="<?php echo e(auth()->guard('customer')->user()->phone); ?>" class="form-control phone-validate">
                                </div>
								
								<div class="form-group">
                                    <label for="niche-title">Profile Image</label>
									<?php if(auth()->guard('customer')->user()->avatar!=''): ?>
										<img src="<?php echo e(auth()->guard('customer')->user()->avatar); ?>" width="150px" />
									<?php endif; ?>
                                    <input type="file" class="form-control" name="picture"  id="niche-title">
									
									<input type="hidden" name="customers_old_picture" value="<?php echo e(auth()->guard('customer')->user()->avatar); ?>" />
                                </div>

								<div class="form-group">
                                    <label for="niche-title">Wall Image</label>
									<?php if(auth()->guard('customer')->user()->wallimage!=''): ?>
										<img src="<?php echo e(auth()->guard('customer')->user()->wallimage); ?>" width="150px" />
									<?php endif; ?>
                                    <input type="file" class="form-control" name="wallimage"  id="niche-title">
									
									<input type="hidden" name="customers_old_wallimage" value="<?php echo e(auth()->guard('customer')->user()->wallimage); ?>" />
                                </div>

                                

                                <div class="form-group">
                                    <label>Enter Your Speciality</label>
                                    <input type="text" class="form-control" name="customers_speciality" value="<?php echo e(auth()->guard('customer')->user()->speciality); ?>">
                                </div>
                                <div class="form-group">
                                    <label>Enter Locality</label>
                                    <input type="text" class="form-control" name="customers_locality" value="<?php echo e(auth()->guard('customer')->user()->locality); ?>">
                                </div>
                                <div class="form-group">
                                    <label>Enter District</label>
                                    <input type="text" class="form-control" name="customers_district" value="<?php echo e(auth()->guard('customer')->user()->district); ?>">
                                </div>
                                <div class="form-group">
                                    <label>Enter Pincode</label>
                                    <input type="text" class="form-control" name="customers_pincode" value="<?php echo e(auth()->guard('customer')->user()->pincode); ?>">
                                </div>   
                                <div class="form-group">
                                    <label>Tell us more about yourself</label>
                                    <textarea type="text" class="form-control" name="customers_biodata" rows="6" cols="8"> <?php echo e(auth()->guard('customer')->user()->biodata); ?></textarea>
                                </div>                           

                                <div class="form-row">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Update Profile</button>
                                    </div>
                                </div>
                                
                                
                            </div>
                            
                            
                        </div>
                        
                        
                    </form>
                </div>
</div>



<!-- OLD Profile fields -->
<!-- Profile Content -->
<!-- <section class="pro-content">

<section class="profile-content">
  <div class="container">
    <div class="row">

      <div class="col-12 media-main">
        <div class="media">
            <h3><?php echo e(substr(auth()->guard('customer')->user()->first_name, 0, 1)); ?></h3>
            <div class="media-body">
              <div class="row">
                <div class="col-12 col-sm-4 col-md-6">
                  <h4><?php echo e(auth()->guard('customer')->user()->first_name); ?> <?php echo e(auth()->guard('customer')->user()->last_name); ?><br>
                  <small><?php echo app('translator')->get('website.Phone'); ?>: <?php echo e(auth()->guard('customer')->user()->phone); ?> </small></h4>
                </div>
                <div class="col-12 col-sm-8 col-md-6 detail">                  
                  <p class="mb-0"><?php echo app('translator')->get('website.E-mail'); ?>:<span><?php echo e(auth()->guard('customer')->user()->email); ?></span></p>
                </div>
                </div>
            </div>
            
        </div>
    </div> -->

       <!-- <div class="col-12 col-lg-3">
           <div class="heading">
               <h2>
                   <?php echo app('translator')->get('website.My Account'); ?>
               </h2>
               <hr >
             </div>

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
               <li class="list-group-item">
                   <a class="nav-link" href="<?php echo e(URL::to('/change-password')); ?>">
                       <i class="fas fa-unlock-alt"></i>
                     <?php echo app('translator')->get('website.Change Password'); ?>
                   </a>
               </li>
             </ul>
       </div> -->
       <!-- <div class="col-12 col-lg-9 ">
           <div class="heading">
               <h2>
                   <?php echo app('translator')->get('website.Personal Information'); ?>
               </h2>
               <hr >
             </div>
             <form name="updateMyProfile" class="align-items-center form-validate" enctype="multipart/form-data" action="<?php echo e(URL::to('updateMyProfile')); ?>" method="post">
               <?php echo csrf_field(); ?>
                <?php if( count($errors) > 0): ?>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                            <span class="sr-only"><?php echo app('translator')->get('website.Error'); ?>:</span>
                            <?php echo e($error); ?>

                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

                <?php if(session()->has('error')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php echo e(session()->get('error')); ?>

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>

                <?php if(Session::has('error')): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        <span class="sr-only"><?php echo app('translator')->get('website.Error'); ?>:</span>
                        <?php echo e(session()->get('error')); ?>

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>

                <?php if(Session::has('error')): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        <span class="sr-only"><?php echo app('translator')->get('website.Error'); ?>:</span>
                        <?php echo session('loginError'); ?>

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>

                <?php if(session()->has('success') ): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php echo e(session()->get('success')); ?>

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>

                 <div class="form-group row">
                   <label for="firstName" class="col-sm-2 col-form-label"><?php echo app('translator')->get('website.First Name'); ?></label>
                   <div class="col-sm-10">
                     <input type="text" required name="customers_firstname" class="form-control field-validate" id="inputName" value="<?php echo e(auth()->guard('customer')->user()->first_name); ?>" placeholder="<?php echo app('translator')->get('website.First Name'); ?>">
                   </div>
                 </div>
                 <div class="form-group row">
                   <label for="lastName" class="col-sm-2 col-form-label"><?php echo app('translator')->get('website.Last Name'); ?></label>
                   <div class="col-sm-10">
                     <input type="text" required name="customers_lastname" placeholder="<?php echo app('translator')->get('website.Last Name'); ?>" class="form-control field-validate" id="lastName" value="<?php echo e(auth()->guard('customer')->user()->last_name); ?>">
                   </div>
                 </div>

                 <div class="form-group row">
                  <label for="inputPassword" class="col-sm-2 col-form-label"><?php echo app('translator')->get('website.Gender'); ?></label>
                  <div class="from-group  select-control col-sm-4 ">
                 
                      <select class="form-control " name="gender" required id="exampleSelectGender1">
                        <option value="0" <?php if(auth()->guard('customer')->user()->gender == 0): ?> selected <?php endif; ?>><?php echo app('translator')->get('website.Male'); ?></option>
                        <option value="1"  <?php if(auth()->guard('customer')->user()->gender == 1): ?> selected <?php endif; ?>><?php echo app('translator')->get('website.Female'); ?></option>
                      </select> 
                
                  </div>
                  <label for="inputPassword" class="col-sm-2 col-form-label"><?php echo app('translator')->get('website.DOB'); ?></label>
                  <div class=" col-sm-4">
                      <div class="input-group date">
                        <input readonly name="customers_dob" type="text" id="customers_dob" data-provide="datepicker" class="form-control" placeholder="<?php echo app('translator')->get('website.Date of Birth'); ?>" value="<?php echo e(auth()->guard('customer')->user()->dob); ?>" aria-label="date-picker" aria-describedby="date-picker-addon1">
                          
                          <div class="input-group-prepend">
                              <span class="input-group-text" id="date-picker-addon1"><i class="fas fa-calendar-alt"></i></span>
                            </div>
                        </div>

                      
                      
                  </div>
                </div>

                <div class="form-group row">
                  <label for="inputPassword" class="col-sm-2 col-form-label"><?php echo app('translator')->get('website.Phone'); ?></label>
                  <div class="col-sm-10">
                    <input name="customers_telephone" type="tel"  placeholder="<?php echo app('translator')->get('website.Phone Number'); ?>" value="<?php echo e(auth()->guard('customer')->user()->phone); ?>" class="form-control phone-validate">
                  </div>
                </div>                
                <button type="submit" class="btn btn-secondary swipe-to-top"><?php echo app('translator')->get('website.Update'); ?></button>
             </form>

          ............the end..... -->
       <!-- </div>
     </div>
    </div>
  </section>
</div>
 </section> -->
 <?php $__env->stopSection(); ?>

<?php echo $__env->make('web.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\food2\resources\views/web/profile.blade.php ENDPATH**/ ?>