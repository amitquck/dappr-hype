<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('massDelete', \App\Models\Customer::class)): ?>
  <td><input id="<?php echo e($customer->id, false); ?>" type="checkbox" class="massCheck"></td>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\dappr-hype\resources\views/admin/partials/actions/customer/checkbox.blade.php ENDPATH**/ ?>