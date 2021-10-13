<!-- <?php echo $__env->make('web.headers.fixedHeader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>  -->

 <!-- CUSTOM HEADER -->
 <header class="bg-white shadow-sm">
		<div class="header-topbar container-fluid d-flex justify-content-between align-items-center">
			<div class="topbar-left-column d-flex align-items-center">
				<div class="logo-wrap">
        <a href="<?php echo e(URL::to('/')); ?>" class="logo" data-toggle="tooltip" data-placement="bottom" title="<?php echo app('translator')->get('website.logo'); ?>">
            <?php if($result['commonContent']['settings']['sitename_logo']=='name'): ?>
            <?=stripslashes($result['commonContent']['settings']['website_name'])?>
            <?php endif; ?>
        
            <?php if($result['commonContent']['settings']['sitename_logo']=='logo'): ?>
            <img class="img-fluid logo-img" src="<?php echo e(asset('').$result['commonContent']['settings']['website_logo']); ?>" alt="<?=stripslashes($result['commonContent']['settings']['website_name'])?>">
            <?php endif; ?>
            </a>
      </div>
				<div class="header-search d-none d-lg-block ml-4">
					<form class="form-inline form-search-header" action="<?php echo e(URL::to('/shop')); ?>" method="get">
						<div class="input-group">
            <input  type="search" class="form-control" name="search" placeholder="<?php echo app('translator')->get('website.Search entire store here'); ?>..." data-toggle="tooltip" data-placement="bottom" title="<?php echo app('translator')->get('website.Search Products'); ?>" value="<?php echo e(app('request')->input('search')); ?>">
							<div class="input-group-prepend">
								<!-- <a href="#" title="Search" class="pt-3"> <span class="input-group-text" id="basic-addon1">
                  <span class="icon-search"></span> </span>
								</a> -->
                <button class="btn" data-toggle="tooltip" 
                      data-placement="bottom" title="<?php echo app('translator')->get('website.Search Products'); ?>">
                      <i class="fa fa-search"></i></button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="topbar-right-column d-flex align-items-center">
				<div class="topbar-menu d-flex align-items-center ">
					<div class=" d-none d-lg-block">
					<ul class="d-flex align-items-center list-unstyled">
						<li><a href="<?php echo e(url('/page?name=about-us')); ?>" class="top_links" title="About us">About Us</a></li>
						<li><a href="<?php echo e(url('/page?name=home-chef')); ?>" class="top_links" title="Home Chef">Home Chef</a></li>
					</ul>
					</div>
					<ul class="d-flex align-items-center list-unstyled">
						<li class="d-none"><a href="<?php echo e(URL::to('/login')); ?>" class="top_links" title="Login"><?php echo app('translator')->get('website.Login'); ?></a></li>
						
						
						<?php if(auth()->guard('customer')->check()){ ?>
						<li class="profile_dropdown d-block position-relative">
							<a href="#" class="top_links d-flex align-items-center header_avatar" title="User name">
							<?php if(auth()->guard('customer')->user()->avatar!=''): ?>
								<img src="<?php echo e(asset(auth()->guard('customer')->user()->avatar)); ?>"  />
							<?php else: ?>
								<img src="<?php echo e(asset('./images/media/2021/08/user-icon.png')); ?>" alt="User image">
									<?php endif; ?>
							
							<span class="pl-3 d-none d-md-block">
							<?php if(auth()->guard('customer')->check()){ ?><?php echo e(auth()->guard('customer')->user()->first_name); ?>&nbsp;! <?php }?>
							</span>
							</a>
							<ul class="Prof-dropdown-menu">
								
								<li><a class="drop-item" href="<?php echo e(url('dashboard')); ?>" title="Dashboard">Dashboard</a></li>
								<li><a class="drop-item" href="<?php echo e(url('wishlist')); ?>" title="My Bookmarks">My Bookmarks</a></li>
								<li><a class="drop-item" href="<?php echo e(url('profile')); ?>" title="Edit Profile">Edit Profile</a></li>
								<li><a class="drop-item" href="<?php echo e(url('orders')); ?>" title="Past Orders">Past Orders</a></li>
								<li><a class="drop-item" href="<?php echo e(URL::to('/viewcart')); ?>" title="View Cart">View Cart</a></li>
								<!--li><a class="drop-item" href="<?php echo e(URL::to('/reviews')); ?>" title="Reviews">Reviews</a></li-->
								<?php if(auth()->guard('customer')->user()->role_id=='3'): ?> 
								<li><a class="drop-item" href="<?php echo e(url('myrecipes')); ?>" title="My Recipes">My Recipes</a></li>
								<li><a class="drop-item" href="<?php echo e(url('uploadrecipes')); ?>" title="Upload a Recipe">Upload a Recipe</a></li>
								<?php endif; ?>
								<li><a class="drop-item" href="<?php echo e(url('change-password')); ?>" title="Change Password">Change Password</a></li>
								<li><a class="drop-item" href="<?php echo e(url('logout')); ?>" title="Logout"><?php echo app('translator')->get('website.Logout'); ?></a></li>
								<?php }else{ ?>
								<!-- <li><a class="drop-item" href="<?php echo e(URL::to('/login')); ?>" title="Logout"><?php echo app('translator')->get('website.Login'); ?></a></li> -->
								<?php } ?>
							</ul>
						</li>
						<?php if(auth()->guard('customer')->check()){ ?> <?php }?>
						
						<?php if(auth()->guard('customer')->check()){ ?>
						<?php }
						else{ ?>
						<li class=" list-unstyled mr-4"><a class="top_links" href="<?php echo e(URL::to('/login')); ?>" title="Login">Login</a></li>
						<li class="position-relative list-unstyled">
							<a href="#" class="top_links join-btn bg-info radius px-4 py-2 mr-4 text-white" title="Join Us"> Join</a>
							<div class="header-join-form">
								<div class="wrap_join_form h-100">
									<form name="signup" enctype="multipart/form-data"action="<?php echo e(URL::to('/signupProcess')); ?>" method="post"  class="join-us-header-form-contain d-block form-validate">
									
									<?php echo e(csrf_field()); ?>

										<div class="form-group mb-3">
											<input  name="firstName" type="text" class="form-control field-validate" id="firstName" placeholder="<?php echo app('translator')->get('Name'); ?>" value="<?php echo e(old('firstName')); ?>" required>
										<span class="form-text text-muted error-content" hidden><?php echo app('translator')->get('website.Please enter your first name'); ?></span>
										</div>
										<div class="form-group mb-3">
											<input  name="email" type="text" class="form-control email-validate" id="inlineFormInputGroup" placeholder="Email" required value="<?php echo e(old('email')); ?>">
											<span class="form-text text-muted error-content" hidden><?php echo app('translator')->get('website.Please enter your valid email address'); ?></span>
										
										</div>
										<div class="form-group mt-4 mb-3">
											<input  name="phone" type="text" class="form-control phone-validate" id="phone" placeholder="<?php echo app('translator')->get('Valid phone number'); ?>" value="<?php echo e(old('phone')); ?>" maxlength="10">
													<span class="form-text text-muted error-content" hidden><?php echo app('translator')->get('website.Please enter your valid phone number'); ?></span>
										</div>
										<div class="form-group mt-4 mb-3"><input name="password" id="password" type="password" class="form-control password"  placeholder="<?php echo app('translator')->get('Your password'); ?>"  required >
												<span class="form-text text-muted error-content" hidden><?php echo app('translator')->get('website.Please enter your password'); ?></span>
										</div>
										<div class="form-group mt-4 mb-3"><input type="password" class="form-control password" id="re_password" name="re_password" placeholder="Confirm Password">
													<span class="form-text text-muted error-content" hidden><?php echo app('translator')->get('website.Please re-enter your password'); ?></span>
													<span class="form-text text-muted re-password-content" hidden><?php echo app('translator')->get('website.Password does not match the confirm password'); ?></span>
										</div>
										<div class="form-group mt-4 mb-1">
										<label>Join As</label>
										</div>
										<div class="form-check form-check-inline mb-4">
											<input class="form-check-input" type="radio" name="role" id="HomeChef" value="3" <?php if(!empty(old('role')) and old('role')==3): ?> checked <?php endif; ?>>
											<label class="form-check-label" for="role">Home Chef</label>
										  </div>
										  <div class="form-check form-check-inline">
											<input class="form-check-input" type="radio" name="role" id="inlineRadio2" value="2" <?php if((!empty(old('role')) and old('role')==2)|| empty(old('role'))): ?> checked <?php endif; ?>>
											<label class="form-check-label" for="role">Foodie</label>
										  </div>
										  <div class="form-group mt-2">
											<button type="submit" class="btn btn-primary w-100">Submit</button>
										  </div>
										  <span class="d-block text-center my-2">Or Sign-in With</span>
										  <div class="sign-with-gb d-flex justify-content-around align-items-center">
											  <a href="<?php echo e(url('login/facebook')); ?>" class="social_btn_sign">
												<img src="<?php echo e(asset('./images/media/2021/08/social/facebook.png')); ?>" alt="Facebook">
												<span>Facebook</span>
											  </a>
											  <a href="<?php echo e(url('login/google')); ?>" class="social_btn_sign">
												<img src="<?php echo e(asset('./images/media/2021/08/social/google.png')); ?>" alt="Google">
												<span>Google</span>
											  </a>
										  </div>
									</form>

									<div class="complete-profile-panel h-100 d-none text-center">
										<div class="cotain_inner_completed h-100 d-flex flex-column align-items-center justify-content-around">
										<div class="completed-sign">
											<img src="assets/images/success.png" alt="Completed Sign">
											<p class="mt-3 pt-3">You have successfully created<br>
												your account with us.</p>
										</div>
										<a href="#" class="w-100 btn btn-primary">Complete Your Profile Now</a>
									</div>
									</div>
								</div>
							</div>
						</li>
						<?php } ?>
						
					</ul>
				</div>
				<div class="topbar-social-widget">
					<ul class="d-flex list-unstyled m-0 p-0">
						<li class="social-item dropdown head-cart-content">
						<?php echo $__env->make('web.headers.cartButtons.cartButton9', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
						</li>
					</ul>
				</div>
				<div class="topbar-social-widget d-none d-md-block">
					<ul class="d-flex list-unstyled">
						<li class="social-item"><a href="https://www.addtoany.com/add_to/facebook?linkurl=http%3A%2F%2F209.97.146.230%2Ffood%2Fpublic%2F&amp;linkname="    target="_blank" class="social-link" title="Facebook"><img src="<?php echo e(asset('./images/media/2021/08/social/facebook.svg')); ?>" alt="Facebook"></a></li>
						<li class="social-item"><a href="https://www.addtoany.com/add_to/instagram?linkurl=http%3A%2F%2F209.97.146.230%2Ffood%2Fpublic%2F&amp;linkname="    target="_blank" class="social-link" title="Instagram"><img src="<?php echo e(asset('./images/media/2021/08/social/instagram.svg')); ?>" alt="Instagram"></a></li>
						<li class="social-item"><a href="https://www.addtoany.com/add_to/pinterest?linkurl=http%3A%2F%2F209.97.146.230%2Ffood%2Fpublic%2F&amp;linkname="    target="_blank" class="social-link" title="Pinterest"><img src="<?php echo e(asset('./images/media/2021/08/social/pinterest.svg')); ?>" alt="Pinterest"></a></li>
						<li class="social-item"><a href="https://www.addtoany.com/add_to/twitter?linkurl=http%3A%2F%2F209.97.146.230%2Ffood%2Fpublic%2F&amp;linkname="    target="_blank" class="social-link" title="Twitter"><img src="<?php echo e(asset('./images/media/2021/08/social/twitter.svg')); ?>" alt="Twitter"></a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="header-main-menu">
			<nav class="navbar navbar-expand-lg navbar-light bg-white">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
				<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <form class="form-inline d-block my-3 mx-3 d-lg-none form-search-header" action="<?php echo e(URL::to('/shop')); ?>" method="get">
						<div class="input-group">
            <input  type="search" class="form-control" name="search" placeholder="<?php echo app('translator')->get('website.Search entire store here'); ?>..." data-toggle="tooltip" data-placement="bottom" title="<?php echo app('translator')->get('website.Search Products'); ?>" value="<?php echo e(app('request')->input('search')); ?>">
							<div class="input-group-prepend">
								<!-- <a href="#" title="Search" class="pt-3"> <span class="input-group-text" id="basic-addon1">
                  <span class="icon-search"></span> </span>
								</a> -->
                <button class="btn swipe-to-top" data-toggle="tooltip" 
                      data-placement="bottom" title="<?php echo app('translator')->get('website.Search Products'); ?>">
                      <i class="fa fa-search"></i></button>
							</div>
						</div>
					</form>
          
          
					<div class="navbar-nav">
					 <?php echo $__env->make('web.common.shopCategories', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                       <?php    shopCategories(); ?>  
					   
					   
            <!-- <a class="nav-item nav-link active" href="#">Sindhi Food</a>
			 <a class="nav-item nav-link" href="#">Parsi Food</a>
			  <a class="nav-item nav-link" href="#">Konkani Food</a>
			   <a class="nav-item nav-link" href="#">Awadhi Food</a>
			    <a class="nav-item nav-link" href="#">Rajasthani Food</a>
				 <a class="nav-item nav-link" href="#">Haidrabad Food</a>
				  <a class="nav-item nav-link" href="#">Punjabi Food</a>
				   <a class="nav-item nav-link" href="#">Gujraati Food</a>
				    <a class="nav-item nav-link" href="#">Maharashtriyan Food</a> -->
		 </div>
					<div class="topbar-menu d-block d-lg-none my-3 py-3 border-bottom border-top ">
						<ul class="d-flex list-unstyled">
							<li><a href="<?php echo e(url('/page?name=about-us')); ?>" class="top_links d-block pb-2" title="About us">About Us</a></li>
							<li><a href="<?php echo e(url('/page?name=home-chef')); ?>" class="top_links d-block pb-2">Home Chef</a></li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
	</header><?php /**PATH C:\xampp\htdocs\GIT\comfik\resources\views/web/headers/headerNine.blade.php ENDPATH**/ ?>