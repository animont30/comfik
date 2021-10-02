<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header"><?php echo e(trans('labels.navigation')); ?></li>
        <li class="treeview <?php echo e(Request::is('admin/dashboard') ? 'active' : ''); ?>">
          <a href="<?php echo e(URL::to('admin/dashboard/this_month')); ?>">
            <i class="fa fa-dashboard"></i> <span><?php echo e(trans('labels.header_dashboard')); ?></span>
          </a>
        </li>
         
      <?php
        if($result['commonContent']['roles']!= null and $result['commonContent']['roles']->customers_view == 1){
      ?>
        <li class="treeview <?php echo e(Request::is('admin/customers/display') ? 'active' : ''); ?>  <?php echo e(Request::is('admin/customers/add') ? 'active' : ''); ?>  <?php echo e(Request::is('admin/customers/edit/*') ? 'active' : ''); ?> <?php echo e(Request::is('admin/customers/address/display/*') ? 'active' : ''); ?> <?php echo e(Request::is('admin/customers/filter') ? 'active' : ''); ?> ">
          <a href="<?php echo e(URL::to('admin/customers/display')); ?>">
            <i class="fa fa-users" aria-hidden="true"></i> <span><?php echo e(trans('labels.link_customers')); ?></span>
          </a>
        </li>
      <?php }        

        if($result['commonContent']['roles']!= null and $result['commonContent']['roles']->products_view == 1 or $result['commonContent']['roles']!= null and $result['commonContent']['roles']->categories_view == 1 ){
      ?>
        <li class="treeview <?php echo e(Request::is('admin/reviews/display') ? 'active' : ''); ?> <?php echo e(Request::is('admin/manufacturers/display') ? 'active' : ''); ?> <?php echo e(Request::is('admin/manufacturers/add') ? 'active' : ''); ?> <?php echo e(Request::is('admin/manufacturers/edit/*') ? 'active' : ''); ?> <?php echo e(Request::is('admin/units') ? 'active' : ''); ?> <?php echo e(Request::is('admin/addunit') ? 'active' : ''); ?> <?php echo e(Request::is('admin/editunit/*') ? 'active' : ''); ?> <?php echo e(Request::is('admin/products/display') ? 'active' : ''); ?> <?php echo e(Request::is('admin/products/add') ? 'active' : ''); ?> <?php echo e(Request::is('admin/products/edit/*') ? 'active' : ''); ?> <?php echo e(Request::is('admin/editattributes/*') ? 'active' : ''); ?> <?php echo e(Request::is('admin/products/attributes/display') ? 'active' : ''); ?>  <?php echo e(Request::is('admin/products/attributes/add') ? 'active' : ''); ?> <?php echo e(Request::is('admin/products/attributes/add/*') ? 'active' : ''); ?> <?php echo e(Request::is('admin/addinventory/*') ? 'active' : ''); ?> <?php echo e(Request::is('admin/addproductimages/*') ? 'active' : ''); ?> <?php echo e(Request::is('admin/categories/display') ? 'active' : ''); ?> <?php echo e(Request::is('admin/categories/add') ? 'active' : ''); ?> <?php echo e(Request::is('admin/categories/edit/*') ? 'active' : ''); ?> <?php echo e(Request::is('admin/categories/filter') ? 'active' : ''); ?> <?php echo e(Request::is('admin/products/inventory/display') ? 'active' : ''); ?>">
          <a href="#">
            <i class="fa fa-database"></i> <span><?php echo e(trans('labels.Catalog')); ?></span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <?php if($result['commonContent']['roles']!= null and $result['commonContent']['roles']->manufacturer_view == 1): ?>
              <li class="<?php echo e(Request::is('admin/manufacturers/display') ? 'active' : ''); ?> <?php echo e(Request::is('admin/manufacturers/add') ? 'active' : ''); ?> <?php echo e(Request::is('admin/manufacturers/edit/*') ? 'active' : ''); ?>"><a href="<?php echo e(URL::to('admin/manufacturers/display')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(trans('labels.link_manufacturer')); ?></a></li>
            <?php endif; ?>
            <?php if($result['commonContent']['roles']!= null and $result['commonContent']['roles']->categories_view == 1): ?>
              <li class="<?php echo e(Request::is('admin/categories/display') ? 'active' : ''); ?> <?php echo e(Request::is('admin/categories/add') ? 'active' : ''); ?> <?php echo e(Request::is('admin/categories/edit/*') ? 'active' : ''); ?> <?php echo e(Request::is('admin/categories/filter') ? 'active' : ''); ?>"><a href="<?php echo e(URL::to('admin/categories/display')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(trans('labels.link_main_categories')); ?></a></li>
            <?php endif; ?>

            <?php if($result['commonContent']['roles']!= null and $result['commonContent']['roles']->products_view == 1): ?>
              
              <li class="<?php echo e(Request::is('admin/units') ? 'active' : ''); ?> <?php echo e(Request::is('admin/addunit') ? 'active' : ''); ?> <?php echo e(Request::is('admin/editunit/*') ? 'active' : ''); ?> "><a href="<?php echo e(URL::to('admin/units')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(trans('labels.link_units')); ?></a></li>
              <li class="<?php echo e(Request::is('admin/products/display') ? 'active' : ''); ?> <?php echo e(Request::is('admin/products/add') ? 'active' : ''); ?> <?php echo e(Request::is('admin/products/edit/*') ? 'active' : ''); ?> <?php echo e(Request::is('admin/products/attributes/add/*') ? 'active' : ''); ?> <?php echo e(Request::is('admin/addinventory/*') ? 'active' : ''); ?> <?php echo e(Request::is('admin/addproductimages/*') ? 'active' : ''); ?>"><a href="<?php echo e(URL::to('admin/products/display')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(trans('labels.link_all_products')); ?></a></li>
              <?php if($result['commonContent']['setting']['Inventory'] == '1'): ?>
                <li class="<?php echo e(Request::is('admin/products/inventory/display') ? 'active' : ''); ?>"><a href="<?php echo e(URL::to('admin/products/inventory/display')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(trans('labels.inventory')); ?></a></li>
              <?php endif; ?>
            <?php endif; ?>
            <?php
              $status_check = DB::table('reviews')->where('reviews_read',0)->first();
              if($result['commonContent']['roles']!= null and $result['commonContent']['roles']->reviews_view == 1){
            ?>
              <li class="<?php echo e(Request::is('admin/reviews/display') ? 'active' : ''); ?>">
                <a href="<?php echo e(URL::to('admin/reviews/display')); ?>">
                  <i class="fa fa-circle-o" aria-hidden="true"></i> <span><?php echo e(trans('labels.reviews')); ?></span><?php if($result['commonContent']['new_reviews']>0): ?><span class="label label-success pull-right"><?php echo e($result['commonContent']['new_reviews']); ?> <?php echo e(trans('labels.new')); ?></span><?php endif; ?>
                </a>
              </li>
            <?php } ?>
          </ul>
        </li>
      <?php } ?>

      <?php
        if($result['commonContent']['roles']!= null and $result['commonContent']['roles']->orders_view == 1){
      ?>
        <li class="treeview <?php echo e(Request::is('admin/orderstatus') ? 'active' : ''); ?> <?php echo e(Request::is('admin/addorderstatus') ? 'active' : ''); ?> <?php echo e(Request::is('admin/editorderstatus/*') ? 'active' : ''); ?> <?php echo e(Request::is('admin/orders/display') ? 'active' : ''); ?> <?php echo e(Request::is('admin/orders/vieworder/*') ? 'active' : ''); ?>">
          <a href="#" ><i class="fa fa-list-ul" aria-hidden="true"></i> <span> <?php echo e(trans('labels.link_orders')); ?></span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
          <li class="<?php echo e(Request::is('admin/orderstatus') ? 'active' : ''); ?> <?php echo e(Request::is('admin/addorderstatus') ? 'active' : ''); ?> <?php echo e(Request::is('admin/editorderstatus/*') ? 'active' : ''); ?> "><a href="<?php echo e(URL::to('admin/orderstatus')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(trans('labels.link_order_status')); ?></a></li>
            <li class="<?php echo e(Request::is('admin/orders/display') ? 'active' : ''); ?> <?php echo e(Request::is('admin/orders/vieworder/*') ? 'active' : ''); ?>">
              <a href="<?php echo e(URL::to('admin/orders/display')); ?>" >
                <i class="fa fa-circle-o" aria-hidden="true"></i> <span> <?php echo e(trans('labels.link_orders')); ?></span>
              </a>
            </li>
          </ul>
        </li>
      <?php } ?>
      <?php
            if($result['commonContent']['roles']!= null and $result['commonContent']['roles']->reports_view == 1){
          ?>
        <li class="treeview <?php echo e(Request::is('admin/maxstock') ? 'active' : ''); ?> <?php echo e(Request::is('admin/minstock') ? 'active' : ''); ?> <?php echo e(Request::is('admin/inventoryreport') ? 'active' : ''); ?> <?php echo e(Request::is('admin/salesreport') ? 'active' : ''); ?> <?php echo e(Request::is('admin/couponreport') ? 'active' : ''); ?> <?php echo e(Request::is('admin/customers-orders-report') ? 'active' : ''); ?> <?php echo e(Request::is('admin/outofstock') ? 'active' : ''); ?> <?php echo e(Request::is('admin/statsproductspurchased') ? 'active' : ''); ?> <?php echo e(Request::is('admin/statsproductsliked') ? 'active' : ''); ?> <?php echo e(Request::is('admin/lowinstock') ? 'active' : ''); ?>">
          <a href="#">
            <i class="fa fa-file-text-o" aria-hidden="true"></i>
  <span><?php echo e(trans('labels.link_reports')); ?></span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <!-- <li class="<?php echo e(Request::is('admin/lowinstock') ? 'active' : ''); ?> "><a href="<?php echo e(URL::to('admin/lowinstock')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(trans('labels.link_products_low_stock')); ?></a></li> -->
            <?php if($result['commonContent']['setting']['Inventory'] == '1'): ?>
            <li class="<?php echo e(Request::is('admin/outofstock') ? 'active' : ''); ?> "><a href="<?php echo e(URL::to('admin/outofstock')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(trans('labels.link_out_of_stock_products')); ?></a></li>
            <li class="<?php echo e(Request::is('admin/inventoryreport') ? 'active' : ''); ?> "><a href="<?php echo e(URL::to('admin/inventoryreport')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(trans('labels.Inventory Report')); ?></a></li>
             <li class="<?php echo e(Request::is('admin/minstock') ? 'active' : ''); ?> "><a href="<?php echo e(URL::to('admin/minstock')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(trans('labels.Min Stock Report')); ?></a></li>
            <li class="<?php echo e(Request::is('admin/maxstock') ? 'active' : ''); ?> "><a href="<?php echo e(URL::to('admin/maxstock')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(trans('labels.Max Stock Report')); ?></a></li> 
            <?php endif; ?>
            <li class="<?php echo e(Request::is('admin/customers-orders-report') ? 'active' : ''); ?> "><a href="<?php echo e(URL::to('admin/customers-orders-report')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(trans('labels.link_customer_orders_total')); ?></a></li>
            
            <!-- <li class="<?php echo e(Request::is('admin/statsproductsliked') ? 'active' : ''); ?>"><a href="<?php echo e(URL::to('admin/statsproductsliked')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(trans('labels.link_products_liked')); ?></a></li> -->

            <li class="<?php echo e(Request::is('admin/couponreport') ? 'active' : ''); ?>"><a href="<?php echo e(URL::to('admin/couponreport')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(trans('labels.Coupon Report')); ?></a></li>
            <li class="<?php echo e(Request::is('admin/salesreport') ? 'active' : ''); ?>"><a href="<?php echo e(URL::to('admin/salesreport')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(trans('labels.Sales Report')); ?></a></li>
            
          </ul>
        </li>
      <?php } ?>
     
  
    
        <?php
          if($result['commonContent']['roles']!= null and $result['commonContent']['roles']->coupons_view ==1){
        ?>
        <li class="treeview <?php echo e(Request::is('admin/coupons/display') ? 'active' : ''); ?> <?php echo e(Request::is('admin/editcoupons/*') ? 'active' : ''); ?>">
          <a href="<?php echo e(URL::to('admin/coupons/display')); ?>" ><i class="fa fa-tablet" aria-hidden="true"></i> <span><?php echo e(trans('labels.link_coupons')); ?></span></a>
        </li>
      <?php } ?>
      <?php

        ?>
          <?php

        if($result['commonContent']['roles']!= null and $result['commonContent']['roles']->news_view == 1){
      ?>
        <li class="treeview <?php echo e(Request::is('admin/newscategories/display') ? 'active' : ''); ?> <?php echo e(Request::is('admin/newscategories/add') ? 'active' : ''); ?> <?php echo e(Request::is('admin/newscategories/edit/*') ? 'active' : ''); ?> <?php echo e(Request::is('admin/news/display') ? 'active' : ''); ?>  <?php echo e(Request::is('admin/news/add') ? 'active' : ''); ?>  <?php echo e(Request::is('admin/news/edit/*') ? 'active' : ''); ?>">
          <a href="#">
            <i class="fa fa-database" aria-hidden="true"></i>
<span>      <?php echo e(trans('labels.Blog')); ?></span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
          	<li class="<?php echo e(Request::is('admin/newscategories/display') ? 'active' : ''); ?> <?php echo e(Request::is('admin/newscategories/add') ? 'active' : ''); ?> <?php echo e(Request::is('admin/newscategories/edit/*') ? 'active' : ''); ?>"><a href="<?php echo e(URL::to('admin/newscategories/display')); ?>"><i class="fa fa-circle-o"></i><?php echo e(trans('labels.link_news_categories')); ?></a></li>
            <li class="<?php echo e(Request::is('admin/news/display') ? 'active' : ''); ?>  <?php echo e(Request::is('admin/news/add') ? 'active' : ''); ?>  <?php echo e(Request::is('admin/news/edit/*') ? 'active' : ''); ?>"><a href="<?php echo e(URL::to('admin/news/display')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(trans('labels.link_sub_news')); ?></a></li>
          </ul>
        </li>
      <?php } 
        if($result['commonContent']['roles']!= null and $result['commonContent']['roles']->general_setting_view == 1){
      ?>

        <li class="treeview <?php echo e(Request::is('admin/loginsetting') ? 'active' : ''); ?> <?php echo e(Request::is('admin/firebase') ? 'active' : ''); ?> <?php echo e(Request::is('admin/facebooksettings') ? 'active' : ''); ?> <?php echo e(Request::is('admin/setting') ? 'active' : ''); ?> <?php echo e(Request::is('admin/googlesettings') ? 'active' : ''); ?>  <?php echo e(Request::is('admin/alertsetting') ? 'active' : ''); ?>  ">
          <a href="#">
            <i class="fa fa-gears" aria-hidden="true"></i>
          <span> <?php echo e(trans('labels.link_general_settings')); ?></span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">            
            <li class="<?php echo e(Request::is('admin/setting') ? 'active' : ''); ?>"><a href="<?php echo e(URL::to('admin/setting')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(trans('labels.link_store_setting')); ?></a></li>
            
			<li class="<?php echo e(Request::is('admin/webpages') ? 'active' : ''); ?>  <?php echo e(Request::is('admin/addwebpage') ? 'active' : ''); ?>  <?php echo e(Request::is('admin/editwebpage/*') ? 'active' : ''); ?>"><a href="<?php echo e(URL::to('admin/webpages')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(trans('labels.content_pages')); ?></a></li>

           

            <li class="<?php echo e(Request::is('admin/seo') ? 'active' : ''); ?> "><a href="<?php echo e(URL::to('admin/seo')); ?>"><i class="fa fa-circle-o"></i> <?php echo e(trans('labels.seo content')); ?></a></li>
          </ul>
        </li>
      <?php } ?>
      <?php
?>
      <?php
     
        ?>

      <?php
     ?>

        <!-- cache clear -->
        <li class="treeview <?php echo e(Request::is('admin/dashboard') ? 'active' : ''); ?>">
          <a href="javascript:void(0)" class="clear-cache">
          <i class="fa fa-eraser" aria-hidden="true"></i> <span><?php echo e(trans('labels.Clear Cache')); ?></span>
          </a>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
<?php /**PATH C:\xampp\htdocs\GIT\comfik\resources\views/admin/common/sidebar.blade.php ENDPATH**/ ?>