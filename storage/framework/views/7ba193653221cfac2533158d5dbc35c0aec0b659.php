  <!-- Shop Page One content -->
 <div class="container-fuild">
    <nav aria-label="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
			
              <?php if(!empty($result['category_name']) and !empty($result['sub_category_name'])): ?>
              <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/')); ?>"><?php echo app('translator')->get('website.Home'); ?></a></li>
              <li  class="breadcrumb-item"><a href="<?php echo e(URL::to('/shop')); ?>"><?php echo app('translator')->get('website.Shop'); ?></a></li>
             <li  class="breadcrumb-item"><a href="<?php echo e(URL::to('/shop?category='.$result['category_slug'])); ?>"><?php echo e($result['category_name']); ?></a></li>
             <li  class="breadcrumb-item active"><?php echo e($result['sub_category_name']); ?></li>
             <?php elseif(!empty($result['category_name']) and empty($result['sub_category_name'])): ?>
             <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/')); ?>"><?php echo app('translator')->get('website.Home'); ?></a></li>
             <li  class="breadcrumb-item active"><a href="<?php echo e(URL::to('/shop')); ?>"><?php echo app('translator')->get('website.Shop'); ?></a></li>

             <li class="breadcrumb-item active"><?php echo e($result['category_name']); ?></li>
             <?php else: ?>
             <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/')); ?>"><?php echo app('translator')->get('website.Home'); ?></a></li>
             <li class="breadcrumb-item active"><?php echo app('translator')->get('website.Shop'); ?></li>
             <?php endif; ?>
            </ol>
        </div>
      </nav>
  </div> 
  
   
     
    <section class="pro-content">
          <div class="container">
              <!-- <div class="page-heading-title">
                  <h2> <?php echo app('translator')->get('website.Shop'); ?>  
                  </h2>
              
                  </div> -->
          </div>
          
          <section class="shop-content shop-two">
                  
            <div class="container">
                <div class="row">
                   <!--  <div class="col-12 col-lg-3  d-lg-block d-xl-block right-menu"> 
                    <div class="right-menu-categories">
                       
                     </div>
  
              

  
              <?php if(!empty($result['categories'])): ?>
             <form enctype="multipart/form-data" name="filters" id="test" method="get">
               <input type="hidden" name="min_price" id="min_price" value="0">
               <input type="hidden" name="max_price" id="max_price" value="<?php echo e($result['filters']['maxPrice']); ?>">
               <?php if(app('request')->input('category')): ?>
                <input type="hidden" name="category" value="<?php echo e(app('request')->input('category')); ?>">
               <?php endif; ?>
               <?php if(app('request')->input('filters_applied')==1): ?>
               <input type="hidden" name="filters_applied" id="filters_applied" value="1">
               <input type="hidden" name="options" id="options" value="<?php echo implode(',',$result['filter_attribute']['options'])?>">
               <input type="hidden" name="options_value" id="options_value" value="<?php echo implode(',' , $result['filter_attribute']['option_values'])?>">
               <?php else: ?>
               <input type="hidden" name="filters_applied" id="filters_applied" value="0">
               <?php endif; ?>
               <div class="range-slider-main" >
                 <h2><?php echo app('translator')->get('website.Price Range'); ?> </h2>
                 <div class="wrapper">
                     <div class="range-slider">
                         <input onChange="getComboA(this)" name="price" type="text" class="js-range-slider" value="" />
                     </div>
                     <div class="extra-controls form-inline">
                       <div class="form-group">
                           <span>
                             <?php if(session('symbol_left') != null): ?>
                             <font><?php echo e(session('symbol_left')); ?></font>
                             <?php else: ?>
                             <font><?php echo e(session('symbol_right')); ?></font>
                             <?php endif; ?>
                                 <input type="text"  class="js-input-from form-control" value="0" />
                           </span>
                               <font>-</font>
                               <span>
                                 <?php if(session('symbol_left') != null): ?>
                                 <font><?php echo e(session('symbol_left')); ?></font>
                                 <?php else: ?>
                                 <font><?php echo e(session('symbol_right')); ?></font>
                                 <?php endif; ?>
                                   <input  type="text" class="js-input-to form-control" value="0" />
                                   <input  type="hidden" class="maximum_price" value="<?php echo e($result['filters']['maxPrice']); ?>">
                                   </span>
                     </div>
                       </div>
                 </div>
               </div>                       
               
               
               <?php echo $__env->make('web.common.scripts.slider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                     <?php if(count($result['filters']['attr_data'])>0): ?>
                     <?php $__currentLoopData = $result['filters']['attr_data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$attr_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <div class="color-range-main">
                       <h1 <?php if(count($result['filters']['attr_data'])==$key+1): ?> last <?php endif; ?>><?php echo e($attr_data['option']['name']); ?></h1>
                         <div class="block">
                                <div class="card-body">
                                 <ul class="list" style="list-style:none; padding: 0px;">
                                     <?php $__currentLoopData = $attr_data['values']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$values): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <li >
                                         <div class="form-check">
                                           <label class="form-check-label">
                                             <input class="form-check-input filters_box" name="<?php echo e($attr_data['option']['name']); ?>[]" type="checkbox" value="<?php echo e($values['value']); ?>" 								 									<?php
                                             if(!empty($result['filter_attribute']['option_values']) and in_array($values['value_id'],$result['filter_attribute']['option_values'])) print 'checked';
                                             ?>>
                                             <?php echo e($values['value']); ?>

                                           </label>
                                         </div>
                                     </li>
                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 </ul>
                             </div>
                         </div>
  
                       </div>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     <?php endif; ?>
                     <div class="color-range-main">
  
                     <div class="alret alert-danger" id="filter_required">
                     </div>
  
                     <div class="button">
                     <?php
                 $url = '';
                       if(isset($_REQUEST['category'])){
                   $url = "?category=".$_REQUEST['category'];
                   $sign = '&';
                 }else{
                   $sign = '?';
                 }
                 if(isset($_REQUEST['search'])){
                   $url.= $sign."search=".$_REQUEST['search'];
                 }
               ?>
                   <a href="<?php echo e(URL::to('/shop')); ?>" class="btn btn-dark" id="apply_options"> <?php echo app('translator')->get('website.Reset'); ?> </a>
                      <?php if(app('request')->input('filters_applied')==1): ?>
                        <button type="button" class="btn btn-secondary" id="apply_options_btn"> <?php echo app('translator')->get('website.Apply'); ?></button>
                     <?php else: ?> -->
                   <!--<button type="button" class="btn btn-secondary" id="apply_options_btn" disabled> <?php echo app('translator')->get('website.Apply'); ?></button>-->
                     <!-- <button type="button" class="btn btn-secondary" id="apply_options_btn" > <?php echo app('translator')->get('website.Apply'); ?></button>
                     <?php endif; ?>
                 </div>
               </div>
                     <?php if(count($result['commonContent']['homeBanners'])>0): ?>
                      <?php $__currentLoopData = ($result['commonContent']['homeBanners']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $homeBanners): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <?php if($homeBanners->type==7): ?>
                         <div class="img-main">
                             <a href="<?php echo e($homeBanners->banners_url); ?>" ><img class="img-fluid" src="<?php echo e(asset('').$homeBanners->path); ?>"></a>
                         </div>
                       <?php endif; ?>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     <?php endif; ?>
               </form>
               <?php endif; ?>
                    
  
              <?php if(!empty($result['commonContent']['manufacturers']) and count($result['commonContent']['manufacturers'])>0): ?>
              <div class="range-slider-main">
                  <a class=" main-manu" data-toggle="collapse" href="#brands" role="button" aria-expanded="true" aria-controls="men-cloth">
                    <?php echo app('translator')->get('website.Brands'); ?>   
                  </a>
                  <div class="sub-manu collapse show multi-collapse" id="brands">
                    
                    <ul class="unorder-list">
                      <?php $__currentLoopData = $result['commonContent']['manufacturers']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <li class="list-item">
                      <a class="brands-btn list-item" href="<?php echo e(URL::to('/shop?brand='.$item->manufacturer_name)); ?>" role="button"><i class="fas fa-angle-right"></i><?php echo e($item->manufacturer_name); ?></a>
                    </li>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>    
                  </div> 
              </div> 
              <?php endif; ?>               
  
              </div> -->
                  <div class="col-12 col-lg-12 ">
                    <?php if($result['products']['success']==1): ?>
                      <div class="products-area">
                        <!-- <div class="top-bar mb-5">
                            <div class="row">
                                <div class="col-12 col-lg-12">
                                    <div class="row align-items-center">
                                        <div class="col-12 col-lg-6">
                                          <div class="block">
                                              <label><?php echo app('translator')->get('website.Display'); ?></label>
                                              <div class="buttons">
                                                <a href="javascript:void(0);" id="grid"><i class="fas fa-th-large"></i></a>
                                                <a href="javascript:void(0);" id="list"><i class="fas fa-list"></i></a>
                                                </div>
                                          </div>
                                        </div> 
                                        <div class="col-12 col-lg-6">
                                          
  
                                          <form class="form-inline justify-content-end" id="load_products_form">
                                          <input type="hidden" name="min_price"  value="0">
                                          <input type="hidden" name="max_price"  value="<?php echo e($result['filters']['maxPrice']); ?>">
                                          <?php if(isset($_GET['price'])): ?>
                                          <input type="hidden" name="price"  value="<?php echo e($_GET['price']); ?>">
                                          <?php endif; ?>
                                            <input type="hidden" value="1" name="page_number" id="page_number">
                                            <?php if(!empty(app('request')->input('search'))): ?>
                                             <input type="hidden"  name="search" value="<?php echo e(app('request')->input('search')); ?>">
                                            <?php endif; ?>
                                            <?php if(!empty(app('request')->input('category'))): ?>
                                             <input type="hidden"  name="category" value="<?php if(app('request')->input('category')!='all'): ?><?php echo e(app('request')->input('category')); ?> <?php endif; ?>">
                                            <?php endif; ?>
                                             <input type="hidden"  name="load_products" value="1">
  
                                             <input type="hidden"  name="products_style" id="products_style" value="grid">
               
                                            
                                            <div class="form-group">
                                                <label><?php echo app('translator')->get('website.Sort'); ?></label>
                                                <div class="select-control">
                                                <select name="type" id="sortbytype" class="form-control">
                                                  <option value="desc" <?php if(app('request')->input('type')=='desc'): ?> selected <?php endif; ?>><?php echo app('translator')->get('website.Newest'); ?></option>
                                                  <option value="atoz" <?php if(app('request')->input('type')=='atoz'): ?> selected <?php endif; ?>><?php echo app('translator')->get('website.A - Z'); ?></option>
                                                  <option value="ztoa" <?php if(app('request')->input('type')=='ztoa'): ?> selected <?php endif; ?>><?php echo app('translator')->get('website.Z - A'); ?></option>
                                                  <option value="hightolow" <?php if(app('request')->input('type')=='hightolow'): ?> selected <?php endif; ?>><?php echo app('translator')->get('website.Price: High To Low'); ?></option>
                                                  <option value="lowtohigh" <?php if(app('request')->input('type')=='lowtohigh'): ?> selected <?php endif; ?>><?php echo app('translator')->get('website.Price: Low To High'); ?></option>
                                                  <option value="topseller" <?php if(app('request')->input('type')=='topseller'): ?> selected <?php endif; ?>><?php echo app('translator')->get('website.Top Seller'); ?></option>
                                                  <option value="special" <?php if(app('request')->input('type')=='special'): ?> selected <?php endif; ?>><?php echo app('translator')->get('website.Special Products'); ?></option>
                                                  <option value="mostliked" <?php if(app('request')->input('type')=='mostliked'): ?> selected <?php endif; ?>><?php echo app('translator')->get('website.Most Liked'); ?></option>
                                                </select>
                                                </div>
                                              </div>
  
               
                                              
                                              <div class="form-group">
                                                <label><?php echo app('translator')->get('website.Limit'); ?></label>
                                                <div class="select-control">
                                                  <select class="form-control"name="limit"id="sortbylimit">
                                                    <option value="15" <?php if(app('request')->input('limit')=='15'): ?> selected <?php endif; ?>>15</option>
                                                    <option value="30" <?php if(app('request')->input('limit')=='30'): ?> selected <?php endif; ?>>30</option>
                                                    <option value="60" <?php if(app('request')->input('limit')=='60'): ?> selected <?php endif; ?>>60</option>
                                                  </select>
                                                  </div>
                                                </div>
                      
                                                 
                                              </div>
                                    </div>
                                  
                                </div>
                            </div>
                        </div> -->
                       
                        <!-- Filter Bar -->
                         <!-- Products content -->
                          <section class="product-list-wrapper mb-5 pb-5 border-bottom">
                          <div class="container-fluid">
                            <!-- ====filter bar==== -->
                            <div class="row">
                              <div class="col-12">
							  	  <form class="form-inline filterForm_Wrapper" action="<?php echo e(URL::to('/shop')); ?>" id="load_products_form">
                                          <input type="hidden" name="min_price"  value="0">
                                          <input type="hidden" name="max_price"  value="10000">
                                          <?php if(isset($_GET['price'])): ?>
                                          <input type="hidden" name="price"  value="<?php echo e($_GET['price']); ?>">
                                          <?php endif; ?>
                                            <input type="hidden" value="1" name="page_number" id="page_number">
                                            <?php if(!empty(app('request')->input('search'))): ?>
                                             <input type="hidden"  name="search" value="<?php echo e(app('request')->input('search')); ?>">
                                            <?php endif; ?>
                                          
											<div class="form-group">
												<label><?php echo app('translator')->get('Category'); ?></label>
												<div class="select-control">
													<select name="category" id="category" class="form-control">
													<option value="all"
													<?php if(empty(app('request')->input('category'))): ?>
														selected="selected"
													<?php endif; ?>
													>All</option>
													<?php $__currentLoopData = $result['categories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<option value="<?php echo e($cat->slug); ?>"
														 <?php if(app('request')->input('category') == $cat->slug): ?>
															 selected="selected"
														 <?php endif; ?>

														><?php echo e($cat->categories_name); ?></option>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
													</select>
												</div>
											</div>
                                             <input type="hidden"  name="load_products" value="1">
  
                                             <input type="hidden"  name="products_style" id="products_style" value="grid">
               
                                            
                                            <div class="form-group">
                                                <label><?php echo app('translator')->get('website.Sort'); ?></label>
                                                <div class="select-control">
                                                <select name="type" id="sortbytype" class="form-control">
                                                  <option value="desc" <?php if(app('request')->input('type')=='desc'): ?> selected <?php endif; ?>><?php echo app('translator')->get('website.Newest'); ?></option>
                                                  <option value="atoz" <?php if(app('request')->input('type')=='atoz'): ?> selected <?php endif; ?>><?php echo app('translator')->get('website.A - Z'); ?></option>
                                                  <option value="ztoa" <?php if(app('request')->input('type')=='ztoa'): ?> selected <?php endif; ?>><?php echo app('translator')->get('website.Z - A'); ?></option>
                                                  <option value="hightolow" <?php if(app('request')->input('type')=='hightolow'): ?> selected <?php endif; ?>><?php echo app('translator')->get('website.Price: High To Low'); ?></option>
                                                  <option value="lowtohigh" <?php if(app('request')->input('type')=='lowtohigh'): ?> selected <?php endif; ?>><?php echo app('translator')->get('website.Price: Low To High'); ?></option>
                                                  <!--option value="topseller" <?php if(app('request')->input('type')=='topseller'): ?> selected <?php endif; ?>><?php echo app('translator')->get('website.Top Seller'); ?></option>
                                                  <option value="special" <?php if(app('request')->input('type')=='special'): ?> selected <?php endif; ?>><?php echo app('translator')->get('website.Special Products'); ?></option-->
                                                  <option value="mostliked" <?php if(app('request')->input('type')=='mostliked'): ?> selected <?php endif; ?>><?php echo app('translator')->get('website.Most Liked'); ?></option>
                                                </select>
                                                </div>
                                              </div>
  
               
                                              
                                              <div class="form-group">
                                                <label><?php echo app('translator')->get('website.Limit'); ?></label>
                                                <div class="select-control">
                                                  <select class="form-control"name="limit"id="sortbylimit">
                                                    <option value="15" <?php if(app('request')->input('limit')=='15'): ?> selected <?php endif; ?>>15</option>
                                                    <option value="30" <?php if(app('request')->input('limit')=='30'): ?> selected <?php endif; ?>>30</option>
                                                    <option value="60" <?php if(app('request')->input('limit')=='60'): ?> selected <?php endif; ?>>60</option>
                                                  </select>
                                                  </div>
                                                </div>
                      </form>
					
					
                                <!--div class="index-filter-bar color-scheme-light minimal">
                                  <div class="index-sort-w">
                                    <div class="index-sort-label"><i class=""></i><span>Order By</span></div>
                                    <div class="index-sort-options">
                                      <button data-sort-value="likes" value="mostliked" <?php if(app('request')->input('type')=='mostliked'): ?> selected <?php endif; ?> class="index-sort-option index-sort-hearts inactive">Most Likes</button>
                                      <button data-sort-value="views" class="index-sort-option index-sort-views inactive">Most Views</button>
                                    </div>
                                  </div>
                                  <div class="index-filter-w">
                                    <div class="index-filter-label"><span>Category</span></div>
                                    <div class="index-filter-categories-select">
                                      <div class="index-filter-select-selected">
                                        <div class="index-filter-select-placeholder">Select Category...</div>
                                      </div>
                                      <div class="index-filter-options">
                                      
                                        <div class="index-filter-option" data-filter-value="filter-cat-18">Desserts</div>
                                        <div class="index-filter-option" data-filter-value="filter-cat-23">Main Dish</div>
                                        <div class="index-filter-option" data-filter-value="filter-cat-25">Pasta</div>
                                        <div class="index-filter-option" data-filter-value="filter-cat-28">Vegeterian</div>
                                      </div>
                                    </div>
                                    <div class="index-filter-sub-label">Format</div>
                                    <div class="index-filter-formats">
                                      <div class="index-filter-format inactive" data-filter-value="standard"> <i class="icon-file-text2"></i>
                                        <div class="os-filter-tooltip">standard</div>
                                      </div>
                                      <div class="index-filter-format inactive" data-filter-value="gallery"> <i class="icon-stack"></i>
                                        <div class="os-filter-tooltip">gallery</div>
                                      </div>
                                      <div class="index-filter-format inactive" data-filter-value="video"> <i class="icon-film"></i>
                                        <div class="os-filter-tooltip">video</div>
                                      </div>
                                    </div>
                                    <div class="index-clear-filter-w">
                                      <button class="index-clear-filter-btn"> <span>Clear Filters</span></button>
                                    </div>
                                  </div>
                                </div-->
                              </div>
                            </div>
                            
                          </div>
                        </section>

                        <section id="swap" class="shop-content mt-2" >
                              <div class="products-area">
                                  <div class="row">  
                                    <?php if($result['products']['success'] == 1): ?>
								
                                      <?php $__currentLoopData = $result['products']['product_data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$products): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>    
	
                                      
                                      <?php 
                                       // $is_status = false;
                                        if(!empty($products->categories)){
                                          foreach($products->categories as $key=>$category){
                                              if($category->categories_status == 1)
                                                $is_status = true;                                         
                                          } 
                                        }
                                        
                                      //  if($is_status == true)
									  {
                                        ?>
                                   
                                      <div class="col-12 col-lg-4 col-sm-6 griding">
                                      <article class="article_wrapper pluto-post-box"> 
									  
                                        <?php echo $__env->make('web.common.product', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </article>
                                      </div>
                                        <?php }?>

                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                    <div class="col-12 col-lg-4 col-sm-6 griding">
                                    <br>
                                    <h3><?php echo app('translator')->get('website.No Record Found!'); ?></h3></div>
                                    <?php endif; ?>
                                    <?php echo $__env->make('web.common.scripts.addToCompare', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                      
                                  </div>
                              </div> 
                        </section>  
                      </div>
                      
                      <?php if($result['categories_status'] == 1): ?>
                        <div class="pagination justify-content-between ">
                              <input id="record_limit" type="hidden" value="<?php echo e($result['limit']); ?>">
                              <input id="total_record" type="hidden" value="<?php echo e($result['products']['total_record']); ?>">
                              <label for="staticEmail" class="col-form-label"> <?php echo app('translator')->get('website.Showing'); ?>&nbsp;<span class="showing_record"><?php echo e($result['limit']); ?></span>&nbsp;<?php echo app('translator')->get('website.of'); ?>&nbsp;<span class="showing_total_record"><?php echo e($result['products']['total_record']); ?></span> &nbsp;<?php echo app('translator')->get('website.results'); ?></label>
                              
                            <div class=" justify-content-end col-6">
                              
                           <?php
                                if(!empty(app('request')->input('limit'))){
                                    $record = app('request')->input('limit');
                                }else{
                                    $record = '15';
                                }
                            ?>
                            <button class="btn btn-dark" type="button" id="load_products"
                            <?php if(count($result['products']['product_data']) < $record ): ?>
                                style="display:none"
                            <?php endif; ?>
                            ><?php echo app('translator')->get('website.Load More'); ?></button>
                          </div>
                        </div>
                      <?php endif; ?>
                    <?php else: ?>
                    <h3><?php echo app('translator')->get('website.No Record Found!'); ?></h3>
                    <?php endif; ?>
                  </form>
  
                  </div>
              
                                
  
                  </div>
                </div>
              
            </div>
            <?php echo $__env->make('web.common.scripts.shop_page_load_products', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </section> 
     
    </section>
    
   </section>
  
  
  <?php /**PATH C:\xampp\htdocs\GIT\comfik\resources\views/web/shop-pages/shop1.blade.php ENDPATH**/ ?>