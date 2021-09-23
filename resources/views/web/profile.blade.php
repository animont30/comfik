@extends('web.layout')
@section('content')

<div class="container-fuild">
  <nav aria-label="breadcrumb">
    <div class="container">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ URL::to('/')}}">@lang('website.Home')</a></li>
        <li class="breadcrumb-item active" aria-current="page">@lang('website.myProfile')</li>

      </ol>
    </div>
  </nav>
</div> 

<div class="main-content">
<div class="container-fluid px-0">
                    <form name="updateMyProfile" class="align-items-center form-validate" enctype="multipart/form-data" action="{{ URL::to('updateMyProfile')}}" method="post">
                        <div class="row mb-5">
                            <div class="col-12">
                               <!-- PROFILE IMAGE CONTAIN -->
                               <div class="profile_photos_wrapper">
                                    <div class="inner_wall_container">
									@if(auth()->guard('customer')->user()->wallimage!='')
										<img src="{{ auth()->guard('customer')->user()->wallimage }}"/>
									@else
                                        <span class="icon-plus"></span>
                                        <h3>Upload Wall Background</h3>
                                        <h5>Best Size 1600x400</h5>
									@endif
                                    </div>
                               </div>
                               <div class="author_profile_pic">
                                <!--span class="icon-plus"></span>
                                <h3>Best Size : <br> 300x300</h3-->
                                <!-- <img src="assets/images/review.jpg" alt=""> -->
								@if(auth()->guard('customer')->user()->avatar!='')
										<img src="{{ auth()->guard('customer')->user()->avatar }}" width="300px" />
									@endif
                               </div>
                            </div>
                        </div>
                        <!-- END FIRST ROW -->
                        <!-- ALert messages -->
                            @csrf
                            @if( count($errors) > 0)
                                @foreach($errors->all() as $error)
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                        <span class="sr-only">@lang('website.Error'):</span>
                                        {{ $error }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endforeach
                            @endif

                            @if(session()->has('error'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session()->get('error') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            @if(Session::has('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                    <span class="sr-only">@lang('website.Error'):</span>
                                    {{ session()->get('error') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            @if(Session::has('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                    <span class="sr-only">@lang('website.Error'):</span>
                                    {!! session('loginError') !!}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            @if(session()->has('success') )
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session()->get('success') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                        <!-- Alert messages end -->
                        <div class="row mt-3 px-3">
                            <div class="col-md-8 col-lg-5 mx-auto  mt-5 pt-3 upload_recipe_Wrapper">
                                <!-- upload recipe form -->
                                <div class="form-group row mb-0">
                                  <div class="form-group col-lg-6">
                                    <label for="your-name">First Name</label>
                                    <input type="text" required name="customers_firstname" class="form-control field-validate" id="inputName" value="{{ auth()->guard('customer')->user()->first_name }}">
                                    </div>
                                    <div class="form-group col-lg-6">
                                    <label for="your-name">Last Name</label>
                                    <input type="text" required name="customers_lastname" placeholder="@lang('website.Last Name')" class="form-control field-validate" id="lastName" value="{{ auth()->guard('customer')->user()->last_name }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="niche-title">Enter E-mail</label>
                                    <input type="email" class="form-control" placeholder="user@domain.com" id="niche-title" value="{{ auth()->guard('customer')->user()->email }}" readonly>
                                </div>
								<div class="form-group">
                                    <label class="d-block">Join As </label>
									@if(auth()->guard('customer')->user()->role_id=='3') 
                                    <div class="custom-control custom-radio custom-control-inline">
                                       
                                        <label class=" ml-3" for="role">Home Chef</label>
                                    </div>
									@endif
									@if(auth()->guard('customer')->user()->role_id=='2')
                                    <div class="custom-control custom-radio custom-control-inline ml-3">
                                        
                                        <label class=" ml-3" for="role">Foodie</label>
                                    </div>
									 @endif
                                </div>
                                <div class="form-group">
                                    <label for="mobile-number">Enter Mobile No.</label>
                                    <input  name="customers_telephone" type="tel"  placeholder="@lang('website.Phone Number')" value="{{ auth()->guard('customer')->user()->phone }}" class="form-control phone-validate">
                                </div>
								
								<div class="form-group">
                                    <label for="niche-title">Profile Image</label>
									@if(auth()->guard('customer')->user()->avatar!='')
										<img src="{{ auth()->guard('customer')->user()->avatar }}" width="150px" />
									@endif
                                    <input type="file" class="form-control" name="picture"  id="niche-title">
									
									<input type="hidden" name="customers_old_picture" value="{{ auth()->guard('customer')->user()->avatar }}" />
                                </div>

								<div class="form-group">
                                    <label for="niche-title">Wall Image</label>
									@if(auth()->guard('customer')->user()->wallimage!='')
										<img src="{{ auth()->guard('customer')->user()->wallimage }}" width="150px" />
									@endif
                                    <input type="file" class="form-control" name="wallimage"  id="niche-title">
									
									<input type="hidden" name="customers_old_wallimage" value="{{ auth()->guard('customer')->user()->wallimage }}" />
                                </div>

                                

                                <div class="form-group">
                                    <label>Enter Your Speciality</label>
                                    <input type="text" class="form-control" name="customers_speciality" value="{{ auth()->guard('customer')->user()->speciality }}">
                                </div>
                                <div class="form-group">
                                    <label>Enter Locality</label>
                                    <input type="text" class="form-control" name="customers_locality" value="{{ auth()->guard('customer')->user()->locality }}">
                                </div>
                                <div class="form-group">
                                    <label>Enter District</label>
                                    <input type="text" class="form-control" name="customers_district" value="{{ auth()->guard('customer')->user()->district }}">
                                </div>
                                <div class="form-group">
                                    <label>Enter Pincode</label>
                                    <input type="text" class="form-control" name="customers_pincode" value="{{ auth()->guard('customer')->user()->pincode }}">
                                </div>   
                                <div class="form-group">
                                    <label>Tell us more about yourself</label>
                                    <textarea type="text" class="form-control" name="customers_biodata" rows="6" cols="8"> {{ auth()->guard('customer')->user()->biodata }}</textarea>
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
            <h3>{{ substr(auth()->guard('customer')->user()->first_name, 0, 1)}}</h3>
            <div class="media-body">
              <div class="row">
                <div class="col-12 col-sm-4 col-md-6">
                  <h4>{{auth()->guard('customer')->user()->first_name}} {{auth()->guard('customer')->user()->last_name}}<br>
                  <small>@lang('website.Phone'): {{ auth()->guard('customer')->user()->phone }} </small></h4>
                </div>
                <div class="col-12 col-sm-8 col-md-6 detail">                  
                  <p class="mb-0">@lang('website.E-mail'):<span>{{auth()->guard('customer')->user()->email}}</span></p>
                </div>
                </div>
            </div>
            
        </div>
    </div> -->

       <!-- <div class="col-12 col-lg-3">
           <div class="heading">
               <h2>
                   @lang('website.My Account')
               </h2>
               <hr >
             </div>

           <ul class="list-group">
               <li class="list-group-item">
                   <a class="nav-link" href="{{ URL::to('/profile')}}">
                       <i class="fas fa-user"></i>
                     @lang('website.Profile')
                   </a>
               </li>
               <li class="list-group-item">
                   <a class="nav-link" href="{{ URL::to('/wishlist')}}">
                       <i class="fas fa-heart"></i>
                    @lang('website.Wishlist')
                   </a>
               </li>
               <li class="list-group-item">
                   <a class="nav-link" href="{{ URL::to('/orders')}}">
                       <i class="fas fa-shopping-cart"></i>
                     @lang('website.Orders')
                   </a>
               </li>
               <li class="list-group-item">
                   <a class="nav-link" href="{{ URL::to('/shipping-address')}}">
                       <i class="fas fa-map-marker-alt"></i>
                    @lang('website.Shipping Address')
                   </a>
               </li>
               <li class="list-group-item">
                   <a class="nav-link" href="{{ URL::to('/logout')}}">
                       <i class="fas fa-power-off"></i>
                     @lang('website.Logout')
                   </a>
               </li>
               <li class="list-group-item">
                   <a class="nav-link" href="{{ URL::to('/change-password')}}">
                       <i class="fas fa-unlock-alt"></i>
                     @lang('website.Change Password')
                   </a>
               </li>
             </ul>
       </div> -->
       <!-- <div class="col-12 col-lg-9 ">
           <div class="heading">
               <h2>
                   @lang('website.Personal Information')
               </h2>
               <hr >
             </div>
             <form name="updateMyProfile" class="align-items-center form-validate" enctype="multipart/form-data" action="{{ URL::to('updateMyProfile')}}" method="post">
               @csrf
                @if( count($errors) > 0)
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                            <span class="sr-only">@lang('website.Error'):</span>
                            {{ $error }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endforeach
                @endif

                @if(session()->has('error'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session()->get('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @if(Session::has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        <span class="sr-only">@lang('website.Error'):</span>
                        {{ session()->get('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @if(Session::has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        <span class="sr-only">@lang('website.Error'):</span>
                        {!! session('loginError') !!}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @if(session()->has('success') )
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session()->get('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                 <div class="form-group row">
                   <label for="firstName" class="col-sm-2 col-form-label">@lang('website.First Name')</label>
                   <div class="col-sm-10">
                     <input type="text" required name="customers_firstname" class="form-control field-validate" id="inputName" value="{{ auth()->guard('customer')->user()->first_name }}" placeholder="@lang('website.First Name')">
                   </div>
                 </div>
                 <div class="form-group row">
                   <label for="lastName" class="col-sm-2 col-form-label">@lang('website.Last Name')</label>
                   <div class="col-sm-10">
                     <input type="text" required name="customers_lastname" placeholder="@lang('website.Last Name')" class="form-control field-validate" id="lastName" value="{{ auth()->guard('customer')->user()->last_name }}">
                   </div>
                 </div>

                 <div class="form-group row">
                  <label for="inputPassword" class="col-sm-2 col-form-label">@lang('website.Gender')</label>
                  <div class="from-group  select-control col-sm-4 ">
                 
                      <select class="form-control " name="gender" required id="exampleSelectGender1">
                        <option value="0" @if(auth()->guard('customer')->user()->gender == 0) selected @endif>@lang('website.Male')</option>
                        <option value="1"  @if(auth()->guard('customer')->user()->gender == 1) selected @endif>@lang('website.Female')</option>
                      </select> 
                
                  </div>
                  <label for="inputPassword" class="col-sm-2 col-form-label">@lang('website.DOB')</label>
                  <div class=" col-sm-4">
                      <div class="input-group date">
                        <input readonly name="customers_dob" type="text" id="customers_dob" data-provide="datepicker" class="form-control" placeholder="@lang('website.Date of Birth')" value="{{ auth()->guard('customer')->user()->dob }}" aria-label="date-picker" aria-describedby="date-picker-addon1">
                          
                          <div class="input-group-prepend">
                              <span class="input-group-text" id="date-picker-addon1"><i class="fas fa-calendar-alt"></i></span>
                            </div>
                        </div>

                      
                      
                  </div>
                </div>

                <div class="form-group row">
                  <label for="inputPassword" class="col-sm-2 col-form-label">@lang('website.Phone')</label>
                  <div class="col-sm-10">
                    <input name="customers_telephone" type="tel"  placeholder="@lang('website.Phone Number')" value="{{ auth()->guard('customer')->user()->phone }}" class="form-control phone-validate">
                  </div>
                </div>                
                <button type="submit" class="btn btn-secondary swipe-to-top">@lang('website.Update')</button>
             </form>

          ............the end..... -->
       <!-- </div>
     </div>
    </div>
  </section>
</div>
 </section> -->
 @endsection
