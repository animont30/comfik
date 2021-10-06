<!-- @include('web.headers.fixedHeader')  -->

 <!-- CUSTOM HEADER -->
 <header class="bg-white shadow-sm">
		<div class="header-topbar container-fluid d-flex justify-content-between align-items-center">
			<div class="topbar-left-column d-flex align-items-center">
				<div class="logo-wrap">
        <a href="{{ URL::to('/')}}" class="logo" data-toggle="tooltip" data-placement="bottom" title="@lang('website.logo')">
            @if($result['commonContent']['settings']['sitename_logo']=='name')
            <?=stripslashes($result['commonContent']['settings']['website_name'])?>
            @endif
        
            @if($result['commonContent']['settings']['sitename_logo']=='logo')
            <img class="img-fluid logo-img" src="{{asset('').$result['commonContent']['settings']['website_logo']}}" alt="<?=stripslashes($result['commonContent']['settings']['website_name'])?>">
            @endif
            </a>
      </div>
				<div class="header-search d-none d-lg-block ml-4">
					<form class="form-inline form-search-header" action="{{ URL::to('/shop')}}" method="get">
						<div class="input-group">
            <input  type="search" class="form-control" name="search" placeholder="@lang('website.Search entire store here')..." data-toggle="tooltip" data-placement="bottom" title="@lang('website.Search Products')" value="{{ app('request')->input('search') }}">
							<div class="input-group-prepend">
								<!-- <a href="#" title="Search" class="pt-3"> <span class="input-group-text" id="basic-addon1">
                  <span class="icon-search"></span> </span>
								</a> -->
                <button class="btn" data-toggle="tooltip" 
                      data-placement="bottom" title="@lang('website.Search Products')">
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
						<li><a href="{{url('/page?name=about-us')}}" class="top_links" title="About us">About Us</a></li>
						<li><a href="#" class="top_links" title="Home Chef">Home Chef</a></li>
					</ul>
					</div>
					<ul class="d-flex align-items-center list-unstyled">
						<li class="d-none"><a href="{{ URL::to('/login')}}" class="top_links" title="Login">@lang('website.Login')</a></li>
						
						
						<?php if(auth()->guard('customer')->check()){ ?>
						<li class="profile_dropdown d-block position-relative">
							<a href="#" class="top_links d-flex align-items-center header_avatar" title="User name">
							@if(auth()->guard('customer')->user()->avatar!='')
								<img src="{{ asset(auth()->guard('customer')->user()->avatar) }}"  />
							@else
								<img src="{{asset('./images/media/2021/08/user-3.jpg')}}" alt="User image">
									@endif
							
							<span class="pl-3 d-none d-md-block">
							<?php if(auth()->guard('customer')->check()){ ?>{{auth()->guard('customer')->user()->first_name}}&nbsp;! <?php }?>
							</span>
							</a>
							<ul class="Prof-dropdown-menu">
								
								<li><a class="drop-item" href="{{url('dashboard')}}" title="Dashboard">Dashboard</a></li>
								<li><a class="drop-item" href="{{url('wishlist')}}" title="My Bookmarks">My Bookmarks</a></li>
								<li><a class="drop-item" href="{{url('profile')}}" title="Edit Profile">Edit Profile</a></li>
								<li><a class="drop-item" href="{{url('orders')}}" title="Past Orders">Past Orders</a></li>
								<li><a class="drop-item" href="{{ URL::to('/viewcart')}}" title="View Cart">View Cart</a></li>
								<!--li><a class="drop-item" href="{{ URL::to('/reviews')}}" title="Reviews">Reviews</a></li-->
								@if(auth()->guard('customer')->user()->role_id=='3') 
								<li><a class="drop-item" href="{{url('myrecipes')}}" title="My Recipes">My Recipes</a></li>
								<li><a class="drop-item" href="{{url('uploadrecipes')}}" title="Upload a Recipe">Upload a Recipe</a></li>
								@endif
								<li><a class="drop-item" href="{{url('change-password')}}" title="Change Password">Change Password</a></li>
								<li><a class="drop-item" href="{{url('logout')}}" title="Logout">@lang('website.Logout')</a></li>
								<?php }else{ ?>
								<!-- <li><a class="drop-item" href="{{ URL::to('/login')}}" title="Logout">@lang('website.Login')</a></li> -->
								<?php } ?>
							</ul>
						</li>
						<?php if(auth()->guard('customer')->check()){ ?> <?php }?>
						
						<?php if(auth()->guard('customer')->check()){ ?>
						<?php }
						else{ ?>
						<li class=" list-unstyled mr-4"><a class="top_links" href="{{ URL::to('/login')}}" title="Login">Login</a></li>
						<li class="position-relative list-unstyled">
							<a href="#" class="top_links join-btn bg-info radius px-4 py-2 mr-4 text-white" title="Join Us"> Join</a>
							<div class="header-join-form">
								<div class="wrap_join_form h-100">
									<form name="signup" enctype="multipart/form-data"action="{{ URL::to('/signupProcess')}}" method="post"  class="join-us-header-form-contain d-block form-validate">
									
									{{csrf_field()}}
										<div class="form-group mb-3">
											<input  name="firstName" type="text" class="form-control field-validate" id="firstName" placeholder="@lang('Name')" value="{{ old('firstName') }}" required>
										<span class="form-text text-muted error-content" hidden>@lang('website.Please enter your first name')</span>
										</div>
										<div class="form-group mb-3">
											<input  name="email" type="text" class="form-control email-validate" id="inlineFormInputGroup" placeholder="Email" required value="{{ old('email') }}">
											<span class="form-text text-muted error-content" hidden>@lang('website.Please enter your valid email address')</span>
										
										</div>
										<div class="form-group mt-4 mb-3">
											<input  name="phone" type="text" class="form-control phone-validate" id="phone" placeholder="@lang('Valid phone number')" value="{{ old('phone') }}" maxlength="10">
													<span class="form-text text-muted error-content" hidden>@lang('website.Please enter your valid phone number')</span>
										</div>
										<div class="form-group mt-4 mb-3"><input name="password" id="password" type="password" class="form-control password"  placeholder="@lang('Your password')"  required >
												<span class="form-text text-muted error-content" hidden>@lang('website.Please enter your password')</span>
										</div>
										<div class="form-group mt-4 mb-3"><input type="password" class="form-control password" id="re_password" name="re_password" placeholder="Confirm Password">
													<span class="form-text text-muted error-content" hidden>@lang('website.Please re-enter your password')</span>
													<span class="form-text text-muted re-password-content" hidden>@lang('website.Password does not match the confirm password')</span>
										</div>
										<div class="form-group mt-4 mb-1">
										<label>Join As</label>
										</div>
										<div class="form-check form-check-inline mb-4">
											<input class="form-check-input" type="radio" name="role" id="HomeChef" value="3" @if(!empty(old('role')) and old('role')==3) checked @endif>
											<label class="form-check-label" for="role">Home Chef</label>
										  </div>
										  <div class="form-check form-check-inline">
											<input class="form-check-input" type="radio" name="role" id="inlineRadio2" value="2" @if((!empty(old('role')) and old('role')==2)|| empty(old('role'))) checked @endif>
											<label class="form-check-label" for="role">Foodie</label>
										  </div>
										  <div class="form-group mt-2">
											<button type="submit" class="btn btn-primary w-100">Submit</button>
										  </div>
										  <span class="d-block text-center my-2">Or Sign-in With</span>
										  <div class="sign-with-gb d-flex justify-content-around align-items-center">
											  <a href="{{url('login/facebook')}}" class="social_btn_sign">
												<img src="{{asset('./images/media/2021/08/social/facebook.png')}}" alt="Facebook">
												<span>Facebook</span>
											  </a>
											  <a href="{{url('login/google')}}" class="social_btn_sign">
												<img src="{{asset('./images/media/2021/08/social/google.png')}}" alt="Google">
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
						@include('web.headers.cartButtons.cartButton9') 
						</li>
					</ul>
				</div>
				<div class="topbar-social-widget d-none d-md-block">
					<ul class="d-flex list-unstyled">
						<li class="social-item"><a href="https://www.addtoany.com/add_to/facebook?linkurl=http%3A%2F%2F209.97.146.230%2Ffood%2Fpublic%2F&amp;linkname="    target="_blank" class="social-link" title="Facebook"><img src="{{asset('./images/media/2021/08/social/facebook.svg')}}" alt="Facebook"></a></li>
						<li class="social-item"><a href="https://www.addtoany.com/add_to/instagram?linkurl=http%3A%2F%2F209.97.146.230%2Ffood%2Fpublic%2F&amp;linkname="    target="_blank" class="social-link" title="Instagram"><img src="{{asset('./images/media/2021/08/social/instagram.svg')}}" alt="Instagram"></a></li>
						<li class="social-item"><a href="https://www.addtoany.com/add_to/pinterest?linkurl=http%3A%2F%2F209.97.146.230%2Ffood%2Fpublic%2F&amp;linkname="    target="_blank" class="social-link" title="Pinterest"><img src="{{asset('./images/media/2021/08/social/pinterest.svg')}}" alt="Pinterest"></a></li>
						<li class="social-item"><a href="https://www.addtoany.com/add_to/twitter?linkurl=http%3A%2F%2F209.97.146.230%2Ffood%2Fpublic%2F&amp;linkname="    target="_blank" class="social-link" title="Twitter"><img src="{{asset('./images/media/2021/08/social/twitter.svg')}}" alt="Twitter"></a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="header-main-menu">
			<nav class="navbar navbar-expand-lg navbar-light bg-white">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
				<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <form class="form-inline d-block my-3 mx-3 d-lg-none form-search-header" action="{{ URL::to('/shop')}}" method="get">
						<div class="input-group">
            <input  type="search" class="form-control" name="search" placeholder="@lang('website.Search entire store here')..." data-toggle="tooltip" data-placement="bottom" title="@lang('website.Search Products')" value="{{ app('request')->input('search') }}">
							<div class="input-group-prepend">
								<!-- <a href="#" title="Search" class="pt-3"> <span class="input-group-text" id="basic-addon1">
                  <span class="icon-search"></span> </span>
								</a> -->
                <button class="btn swipe-to-top" data-toggle="tooltip" 
                      data-placement="bottom" title="@lang('website.Search Products')">
                      <i class="fa fa-search"></i></button>
							</div>
						</div>
					</form>
          
          
					<div class="navbar-nav">
					 @include('web.common.shopCategories')
                       @php    shopCategories(); @endphp  
					   
					   
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
							<li><a href="#" class="top_links d-block pb-2" title="About us">About Us</a></li>
							<li><a href="#" class="top_links d-block pb-2">Home Chef</a></li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
	</header>