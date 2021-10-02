<?php $__env->startSection('content'); ?>

<!-- MAIN CONTENT -->
<?php

?>
<main class="main-content">
                <div class="container-fluid px-md-5">
                    <form  class="align-items-center form-validate" action="<?php echo e(URL::to('editMyRecipeSave')); ?>" method="post"enctype="multipart/form-data" > 
					 <?php echo e(csrf_field()); ?>

					 <input class="form-control" id="products_id" name="products_id" type="hidden" value="<?php echo e($Products->products_id); ?>">
                        <div class="row mb-5">
                            <div class="col-12">
                                <!-- UPLOAD RECIPE PHOTOGRAPH -->
                                <div class="contain_upload_pic" style="background-image:url(<?php echo e(asset('./images/media/2021/08/import-recipe.png')); ?>);">
                                    
                                    <div class="upload-main-wrapper">
                                        <div class="upload-wrapper">
                                            <input type="file" id="upload-file" name="file[]" multiple>
                                            <span class="file-upload-text">Upload your recipe potographs here</span>
                                            <div class="file-success-text"> <span>Successfully Uploaded</span></div>
                                        </div>
                                        <p id="file-upload-name"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END FIRST ROW -->
                        
                        <div class="row mt-5">
                            <div class="col-md-9 mx-auto upload_recipe_Wrapper">
                                <!-- upload recipe form -->
                                <div class="form-group">
                                    <label for="select-category">Food Type</label>
                                    <select class="form-control" id="select-category" name="food_type">
                                        <option selected value="">-- Select Category --</option>
                                        <?php $__currentLoopData = $result['manufacturers']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option  <?php if($Products->products_type == $m->manufacturers_id ): ?>
                                                                selected
                                                                <?php endif; ?> value="<?php echo e($m->manufacturers_id); ?>"><?php echo e($m->manufacturer_name); ?></option>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="niche-title">Provide a nice title for your recipe</label>
                                    <input type="text" class="form-control" id="products_name" name="products_name" value="<?php echo e($Products->products_name); ?>">
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group col-md-6 pr-lg-4">
                                        <label for="servingFor">Serving For</label>
                                        <select class="form-control" id="select-category" name="serving_for">
                                            <option selected value="">-- Select Serving --</option>
                                           <?php $__currentLoopData = $result['categories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<option   <?php if($Products->categories_id == $m->categories_id	 ): ?>
                                                                selected
                                                                <?php endif; ?>   value="<?php echo e($m->categories_id); ?>"><?php echo e($m->categories_name); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
									<div class="form-group col-md-3 mb-3 pl-lg-2">
                                        <label for="products_weight">Recipes Weight</label>
                                        <input type="text" class="form-control" id="products_weight" name="products_weight" value="<?php echo e($Products->products_weight); ?>" >
                                    </div>
                                    <div class="form-group col-md-3 mb-3 pl-lg-2">
                                        <label for="Unit"> .</label>
                                        <select class="form-control" id="products_weight_unit" name="products_weight_unit">
                                            <option  value="">-- Select Unit --</option>
                                            <option <?php echo e(($Products->products_weight_unit) == 'gm' ? 'selected' : ''); ?> value="gm"> Gm</option>
                                            <option value="kg" <?php echo e(($Products->products_weight_unit) == 'Kg' ? 'selected' : ''); ?> >Kg</option>
                                            <option>None</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-row align-items-center want_to_sell_wrap mb-4">
                                    <div class="form-group col-md-2 decre-mt">
                                        <div class="custom-control pr-lg-4">
                                            <label class="d-block mb-0 mt-1">Want to Sell?</label>
                                            <label class="switch">
                                                <input type="checkbox" name="products_sell" value="on">
                                                <span class="switch_toggle"></span>
                                            </label>
                                        </div>  
                                    </div>
                                    <div class="form-group col-md-7 recipe-sell-options decre-mt">
                                        <label class="d-block">Time to prepare and deliver the order </label>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="6hour" name="products_deliver_time" class="custom-control-input" value="6 Hours" <?php echo e($Products->products_deliver_time == '6 Hours' ? 'checked' : ''); ?>>
                                            <label class="custom-control-label ml-3" for="6hour">6 Hours</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline ml-3">
                                            <input type="radio" id="8hour" name="products_deliver_time" class="custom-control-input" value="12 Hours" <?php echo e($Products->products_deliver_time == '12 Hours' ? 'checked' : ''); ?>>
                                            <label class="custom-control-label ml-3" for="12hour">12 Hours</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline ml-3">
                                            <input type="radio" id="12hour" name="products_deliver_time" class="custom-control-input" value="24 Hours" <?php echo e($Products->products_deliver_time == '24 Hours' ? 'checked' : ''); ?>>
                                            <label class="custom-control-label ml-3" for="24hour">24 Hours</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 recipe-sell-options">
                                        <label for="setprice">Set a price for this item</label>
                                        <input type="text" class="form-control" placeholder="₹" id="setprice" name="setprice" value="<?php echo e($Products->products_price); ?>" >
                                    </div>
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="inputEmail4">Ingredients</label>
                                        <textarea name="ingredients" class="form-control" id="" cols="100%" rows="5"> <?php echo e($Products->products_listofingredients); ?></textarea>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="inputEmail4">Recipe</label>
                                        <textarea name="products_howtoprepare" id="" class="form-control" cols="100%" rows="10"> <?php echo e($Products->products_howtoprepare); ?></textarea>
                                    </div>
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="videourl">Video URL</label>
                                        <input type="url" class="form-control" name="videourl" id="videourl" value="<?php echo e($Products->products_video_link); ?>">
                                    </div>
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Submit Recipe</button>
                                    </div>
                                </div>
                                
                                
                            </div>
                            
                            
                        </div>
                        
                        
                    </form>
                </div>
                
            </main>
 <?php $__env->stopSection(); ?>

<?php echo $__env->make('web.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\GIT\comfik\resources\views/web/editMyRecipes.blade.php ENDPATH**/ ?>