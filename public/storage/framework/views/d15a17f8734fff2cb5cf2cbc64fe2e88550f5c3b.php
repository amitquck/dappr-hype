<?php $__env->startSection('content'); ?>
  <?php echo Form::model($product, ['method' => 'POST', 'route' => ['admin.catalog.product.update', $product->id], 'files' => true, 'id' => 'form-ajax-upload', 'data-toggle' => 'validator']); ?>


  <?php echo $__env->make('admin.product._form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-script'); ?>
  <?php echo $__env->make('plugins.dropzone-upload', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\hype-dappr\resources\views/admin/product/edit.blade.php ENDPATH**/ ?>