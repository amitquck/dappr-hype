<?php
 $stylist_body_class = ' order_complete_place  ';
?>




<?php $__env->startSection('content'); ?>
  <!-- HEADER SECTION -->
  <?php echo $__env->make('theme::headers.order_detail', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <!-- CONTENT SECTION -->
  <?php echo $__env->make('theme::contents.order_complete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


  
  <!-- BROWSING ITEMS -->
  
<?php $__env->stopSection(); ?>

<?php echo $__env->make('theme::layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dappr-hype\public\themes\default/views/order_complete.blade.php ENDPATH**/ ?>