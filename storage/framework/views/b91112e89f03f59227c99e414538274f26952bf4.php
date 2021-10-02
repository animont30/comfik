<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1> <?php echo e(trans('labels.EditProduct')); ?> <small><?php echo e(trans('labels.EditProduct')); ?>...</small> </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo e(URL::to('admin/dashboard/this_month')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(trans('labels.breadcrumb_dashboard')); ?></a></li>
            <li><a href="<?php echo e(URL::to('admin/products/display')); ?>"><i class="fa fa-database"></i> <?php echo e(trans('labels.ListingAllProducts')); ?></a></li>
            <li class="active"><?php echo e(trans('labels.EditProduct')); ?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->

        <!-- /.row -->

        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><?php echo e(trans('labels.EditProduct')); ?> </h3>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                    <div class="row">
                            <div class="col-xs-12">
                                <?php if(session()->has('message.level')): ?>
                                    <div class="alert alert-<?php echo e(session('message.level')); ?> alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <?php echo session('message.content'); ?>

                                    </div>
                                <?php endif; ?>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="box box-info">
                                    <!-- /.box-header -->
                                    <!-- form start -->
                                    <div class="box-body">
                                        <?php if( count($errors) > 0): ?>
                                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="alert alert-danger" role="alert">
                                            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                            <span class="sr-only">Error:</span>
                                            <?php echo e($error); ?>

                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>

                                        <?php echo Form::open(array('url' =>'admin/products/update', 'method'=>'post', 'class' => 'form-horizontal form-validate', 'enctype'=>'multipart/form-data')); ?>

                                        <?php echo Form::hidden('id', $result['product'][0]->products_id, array('class'=>'form-control', 'id'=>'id')); ?>

                                        <div class="row">
										<input type="hidden" name="products_type" value="<?php echo e($result['product'][0]->products_type); ?>"/>
                                           
                                            <div class="col-xs-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-2 col-md-3 control-label"><?php echo e(trans('labels.Manufacturers')); ?> </label>
                                                    <div class="col-sm-10 col-md-8">
                                                        <select class="form-control" name="manufacturers_id">
                                                            <option value=""><?php echo e(trans('labels.Choose Manufacturer')); ?></option>
                                                            <?php $__currentLoopData = $result['manufacturer']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $manufacturer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option <?php if($result['product'][0]->manufacturers_id == $manufacturer->id ): ?>
                                                                selected
                                                                <?php endif; ?>
                                                                value="<?php echo e($manufacturer->id); ?>"><?php echo e($manufacturer->name); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                        <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                                                            <?php echo e(trans('labels.ChooseManufacturerText')); ?>.</span>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                            <div class="col-xs-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-2 col-md-2 control-label"><?php echo e(trans('labels.Category')); ?></label>
                                                    <div class="col-sm-10 col-md-9">
                                                    <?php print_r($result['categories']); ?>
                                                        <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                                                            <?php echo e(trans('labels.ChooseCatgoryText')); ?>.</span>
                                                        <span class="help-block hidden"><?php echo e(trans('labels.textRequiredFieldMessage')); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                           
                                            <div class="col-xs-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-2 col-md-3 control-label"><?php echo e(trans('labels.Status')); ?> </label>
                                                    <div class="col-sm-10 col-md-8">
                                                        <select class="form-control" name="products_status">
                                                            <option value="1" <?php if($result['product'][0]->products_status==1): ?> selected <?php endif; ?> ><?php echo e(trans('labels.Active')); ?></option>
                                                            <option value="0" <?php if($result['product'][0]->products_status==0): ?> selected <?php endif; ?>><?php echo e(trans('labels.Inactive')); ?></option>
                                                        </select>
                                                        <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                                                            <?php echo e(trans('labels.SelectStatus')); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                            <div class="col-xs-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-2 col-md-3 control-label"><?php echo e(trans('labels.ProductsPrice')); ?></label>
                                                    <div class="col-sm-10 col-md-8">
                                                        <?php echo Form::text('products_price', $result['product'][0]->products_price, array('class'=>'form-control number-validate', 'id'=>'products_price')); ?>

                                                        <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                                                            <?php echo e(trans('labels.ProductPriceText')); ?>

                                                        </span>
                                                        <span class="help-block hidden"><?php echo e(trans('labels.ProductPriceText')); ?></span>
                                                    </div>
                                                </div>
                                            </div>

                                            

                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-2 col-md-3 control-label"><?php echo e(trans('labels.Min Order Limit')); ?></label>
                                                    <div class="col-sm-10 col-md-8">
                                                        <?php echo Form::text('products_min_order', $result['product'][0]->products_min_order, array('class'=>'form-control field-validate number-validate', 'id'=>'products_min_order')); ?>

                                                        <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                                                            <?php echo e(trans('labels.Min Order Limit Text')); ?>

                                                        </span>
                                                        <span class="help-block hidden"><?php echo e(trans('labels.Min Order Limit Text')); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-2 col-md-3 control-label"><?php echo e(trans('labels.Max Order Limit')); ?></label>
                                                    <div class="col-sm-10 col-md-8">
                                                        <?php echo Form::text('products_max_stock', $result['product'][0]->products_max_stock, array('class'=>'form-control field-validate number-validate', 'id'=>'products_max_stock')); ?>

                                                        <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                                                            <?php echo e(trans('labels.Max Order Limit Text')); ?>

                                                        </span>
                                                        <span class="help-block hidden"><?php echo e(trans('labels.Max Order Limit Text')); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-2 col-md-3 control-label"><?php echo e(trans('labels.ProductsWeight')); ?></label>
                                                    <div class="col-sm-10 col-md-4">
                                                        <?php echo Form::text('products_weight', $result['product'][0]->products_weight, array('class'=>'form-control field-validate number-validate', 'id'=>'products_weight')); ?>

                                                        <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                                                            <?php echo e(trans('labels.RequiredTextForWeight')); ?>

                                                        </span>

                                                    </div>
                                                    <div class="col-sm-10 col-md-4" style="padding-left: 0;">
                                                        <select class="form-control" name="products_weight_unit">
                                                            
                                                            <option value="gm" <?php if($result['product'][0]->products_weight_unit=='gm'): ?> selected <?php endif; ?>>Gm</option>
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            
                                        </div>

                                        <div class="row">


                                            <div class="col-xs-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-2 col-md-3 control-label"><?php echo e(trans('labels.slug')); ?> </label>
                                                    <div class="col-sm-10 col-md-8">
                                                        <input type="hidden" name="old_slug" value="<?php echo e($result['product'][0]->products_slug); ?>">
                                                        <input type="text" name="slug" class="form-control field-validate" value="<?php echo e($result['product'][0]->products_slug); ?>">
                                                        <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;margin-top: 0;"><?php echo e(trans('labels.slugText')); ?></span>
                                                        <span class="help-block hidden"><?php echo e(trans('labels.textRequiredFieldMessage')); ?></span>
                                                    </div>
                                                </div>
                                            </div>


                                           
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-2 col-md-3 control-label"><?php echo e(trans('labels.Image')); ?> </label>
                                                    <div class="col-sm-10 col-md-4">

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="Modalmanufactured" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" id="closemodal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                                        <h3 class="modal-title text-primary" id="myModalLabel">Choose Image </h3>
                                                                    </div>

                                                                    <div class="modal-body manufacturer-image-embed">
                                                                        <?php if(isset($allimage)): ?>
                                                                        <select class="image-picker show-html " name="image_id" id="select_img">
                                                                            <option value=""></option>
                                                                            <?php $__currentLoopData = $allimage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <option data-img-src="<?php echo e(asset($image->path)); ?>" class="imagedetail" data-img-alt="<?php echo e($key); ?>" value="<?php echo e($image->id); ?>"> <?php echo e($image->id); ?> </option>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        </select>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <a href="<?php echo e(url('admin/media/add')); ?>" target="_blank" class="btn btn-primary pull-left"><?php echo e(trans('labels.Add Image')); ?></a>
                                                                        <button type="button" class="btn btn-default refresh-image"><i class="fa fa-refresh"></i></button>
                                                                        <button type="button" class="btn btn-primary" id="selected" data-dismiss="modal">Done</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="imageselected">
                                                            <?php echo Form::button(trans('labels.Add Image'), array('id'=>'newImage','class'=>"btn btn-primary ", 'data-toggle'=>"modal", 'data-target'=>"#Modalmanufactured" )); ?>

                                                            <br>
                                                            <div id="selectedthumbnail" class="selectedthumbnail col-md-5"> </div>
                                                            <div class="closimage">
                                                                <button type="button" class="close pull-left image-close " id="image-close"
                                                                  style="display: none; position: absolute;left: 105px; top: 54px; background-color: black; color: white; opacity: 2.2; " aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;"><?php echo e(trans('labels.UploadProductImageText')); ?></span>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label for="name" class="col-sm-2 col-md-3 control-label"></label>
                                                    <div class="col-sm-10 col-md-4">
                                                        <?php echo Form::hidden('oldImage', $result['product'][0]->products_image , array('id'=>'oldImage', 'class'=>'field-validate ')); ?>

                                                        <img src="<?php echo e(asset($result['product'][0]->path)); ?>" alt="" width=" 100px">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                       

                                        <hr>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="tabbable tabs-left">
                                                    <ul class="nav nav-tabs">
                                                        <?php
                                                        $i = 0;
                                                        ?>
                                                        <?php $__currentLoopData = $result['languages']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$languages): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li class="<?php if($i==0): ?> active <?php endif; ?>"><a href="#product_<?=$languages->languages_id?>" data-toggle="tab"><?=$languages->name?></a></li>
                                                        <?php
                                                        $i++;
                                                        ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>
                                                    <div class="tab-content">
                                                        <?php
                                                        $j = 0;
                                                        ?>
                                                        <?php $__currentLoopData = $result['description']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$description_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div style="margin-top: 15px;" class="tab-pane <?php if($j==0): ?> active <?php endif; ?>" id="product_<?=$description_data['languages_id']?>">
                                                            <?php
                                                            $j++;
                                                            ?>
                                                            <div class="form-group">
                                                                <label for="name" class="col-sm-2 col-md-3 control-label"><?php echo e(trans('labels.ProductName')); ?> (<?php echo e($description_data['language_name']); ?>)</label>
                                                                <div class="col-sm-10 col-md-4">
                                                                    <input type="text" name="products_name_<?=$description_data['languages_id']?>" class="form-control field-validate" value='<?php echo e($description_data['products_name']); ?>'>
                                                                    <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                                                                        <?php echo e(trans('labels.EnterProductNameIn')); ?> <?php echo e($description_data['language_name']); ?> </span>
                                                                    <span class="help-block hidden"><?php echo e(trans('labels.textRequiredFieldMessage')); ?></span>

                                                                </div>
                                                            </div>

                                                            <div class="form-group external_link" style="display: none">
                                                                <label for="name" class="col-sm-2 col-md-3 control-label"><?php echo e(trans('labels.External URL')); ?> (<?php echo e($description_data['language_name']); ?>)</label>
                                                                <div class="col-sm-10 col-md-4">
                                                                    <input type="text" name="products_url_<?=$description_data['languages_id']?>" class="form-control products_url" value='<?php echo e($description_data['products_url']); ?>'>
                                                                    <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                                                                        <?php echo e(trans('labels.External URL Text')); ?> (<?php echo e($description_data['language_name']); ?>) </span>
                                                                    <span class="help-block hidden"><?php echo e(trans('labels.textRequiredFieldMessage')); ?></span>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="name" class="col-sm-2 col-md-3 control-label"><?php echo e(trans('labels.Description')); ?> (<?php echo e($description_data['language_name']); ?>)</label>
                                                                <div class="col-sm-10 col-md-8">
                                                                    <textarea id="editor<?=$description_data['languages_id']?>" name="products_description_<?=$description_data['languages_id']?>" class="form-control"
                                                                      rows="5"><?php echo e(stripslashes($description_data['products_description'])); ?></textarea>

                                                                    <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                                                                        <?php echo e(trans('labels.EnterProductDetailIn')); ?> <?php echo e($description_data['language_name']); ?></span> </div>
                                                            </div>
															<div class="form-group">
                                                                <label for="name" class="col-sm-2 col-md-3 control-label"><?php echo e(trans('labels.ListofIngredients')); ?> (<?php echo e($description_data['language_name']); ?>)</label>
                                                                <div class="col-sm-10 col-md-8">
                                                                    <textarea id="editor1<?=$description_data['languages_id']?>" name="products_listofingredients_<?=$description_data['languages_id']?>" class="form-control"
                                                                      rows="5"><?php echo e(stripslashes($description_data['products_listofingredients'])); ?></textarea>

                                                                    <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                                                                        <?php echo e(trans('labels.EnterProductDetailIn')); ?> <?php echo e($description_data['language_name']); ?></span> </div>
                                                            </div>
															<div class="form-group">
                                                                <label for="name" class="col-sm-2 col-md-3 control-label"><?php echo e(trans('labels.Howtoprepare')); ?> (<?php echo e($description_data['language_name']); ?>)</label>
                                                                <div class="col-sm-10 col-md-8">
                                                                    <textarea id="editor2<?=$description_data['languages_id']?>" name="products_howtoprepare_<?=$description_data['languages_id']?>" class="form-control"
                                                                      rows="5"><?php echo e(stripslashes($description_data['products_howtoprepare'])); ?></textarea>

                                                                    <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                                                                        <?php echo e(trans('labels.EnterProductDetailIn')); ?> <?php echo e($description_data['language_name']); ?></span> </div>
                                                            </div>

                                                        </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer text-center">
                                            <button type="submit" class="btn btn-primary pull-right" id="normal-btn"><?php echo e(trans('labels.Save_And_Continue')); ?> <i class="fa fa-angle-right 2x"></i></button>
                                        </div>

                                        <!-- /.box-footer -->
                                        <?php echo Form::close(); ?>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Main row -->

        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<script src="<?php echo asset('admin/plugins/jQuery/jQuery-2.2.0.min.js'); ?>"></script>
<script type="text/javascript">
    $(function() {

        //for multiple languages
        <?php $__currentLoopData = $result['languages']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $languages): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor<?php echo e($languages->languages_id); ?>');
		 CKEDITOR.replace('editor1<?php echo e($languages->languages_id); ?>');
		  CKEDITOR.replace('editor2<?php echo e($languages->languages_id); ?>');
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();

    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\food2\resources\views/admin/products/edit.blade.php ENDPATH**/ ?>