
<?php $__env->startSection('content'); ?>
<!-- cart Content -->
<?php $r =   'web.carts.cart' . $final_theme['cart']; ?>
<?php echo $__env->make($r, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('web.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/food/resources/views/web/carts/viewcart.blade.php ENDPATH**/ ?>