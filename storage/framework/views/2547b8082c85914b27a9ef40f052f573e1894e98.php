<p class="feature__items-price-new box-price-new">
  <?php echo get_formated_price($item->current_sale_price(), config('system_settings.decimals', 2)); ?>

</p>
<?php if($item->hasOffer()): ?>
  <p class="feature__items-price-old box-price-old">
    <?php echo get_formated_price($item->sale_price, config('system_settings.decimals', 2)); ?>

  </p>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\dappr-hype\public\themes\default/views/partials/_home_pricing.blade.php ENDPATH**/ ?>