<?php if($result['products']['success']==1): ?>
	<?php $__currentLoopData = $result['products']['product_data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$products): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<div class="col-12 griding" >
		<?php echo $__env->make('web.common.product', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	</div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <input id="filter_total_record" type="hidden" value="<?php echo e($result['products']['total_record']); ?>">

    <?php if(count($result['products']['product_data'])> 0 and $result['limit'] > $result['products']['total_record']): ?>
		<style>
			#load_products{
				display: none;
			}
			#loaded_content{
				display: block !important;
			}
			#loaded_content_empty{
				display: none !important;
			}
        </style>
    <?php endif; ?>
    <?php elseif(count($result['products']['product_data'])==0 or $result['products']['success']==0): ?>
		<style>
            #load_products{
                display: none;
            }
            #loaded_content{
                display: none !important;
            }
            #loaded_content_empty{
                display: block !important;
            }
        </style>
    <?php endif; ?>
<?php /**PATH /var/www/html/food/resources/views/web/filterproducts.blade.php ENDPATH**/ ?>