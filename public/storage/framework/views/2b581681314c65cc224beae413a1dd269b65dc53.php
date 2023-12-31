<section>
  <div class="container full-width">
    <div class="row">
      <?php if($products->count()): ?>
        <div class="col-md-3 bg-light">
          <?php echo $__env->make('theme::contents.product_list_sidebar_filters', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div><!-- /.col-sm-2 -->

        <div class="col-md-9" style="padding-left: 15px;">
          <?php echo $__env->make('theme::contents.product_list', ['colum' => 4], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div><!-- /.col-sm-10 -->
      <?php else: ?>
        <div class="col-sm-12">
          <div class="clearfix space50"></div>
          <p class="lead text-center space50">
            <span class="space50"><?php echo app('translator')->get('theme.no_product_found'); ?></span><br />
          <div class="space50 text-center">
            <a href="<?php echo e(url('categories'), false); ?>" class="btn btn-primary btn-sm flat"><?php echo app('translator')->get('theme.button.choose_from_categories'); ?></a>
          </div>
          </p>
          <div class="clearfix space50"></div>
        </div><!-- /.col-sm-12 -->
      <?php endif; ?>
    </div><!-- /.row -->
  </div><!-- /.container -->
</section>
<?php /**PATH C:\wamp64\www\hype-dappr\public\themes\default/views/contents/search_results.blade.php ENDPATH**/ ?>