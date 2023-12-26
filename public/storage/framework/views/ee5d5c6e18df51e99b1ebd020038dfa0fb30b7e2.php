<div class="modal-dialog modal-sm">
  <div class="modal-content">
    <?php echo Form::model($paypalExpress, ['method' => 'PUT', 'route' => ['admin.setting.paypalExpress.update', $paypalExpress], 'id' => 'form', 'data-toggle' => 'validator']); ?>

    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <?php echo e(trans('app.form.config') . ' PayPal Express', false); ?>

    </div>
    <div class="modal-body">
        <div class="form-group">
          <?php echo Form::label('sandbox', trans('app.form.environment') . '*', ['class' => 'with-help']); ?>

          <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.config_payment_environment'), false); ?>"></i>
          <?php echo Form::select('sandbox', ['1' => trans('app.test'), '0' => trans('app.live')], null, ['class' => 'form-control select2-normal', 'required']); ?>

          <div class="help-block with-errors"></div>
        </div>

        <div class="form-group">
          <?php echo Form::label('account', trans('app.form.paypal_express_account') . '*', ['class' => 'with-help']); ?>

          <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.config_paypal_express_account'), false); ?>"></i>
          <?php echo Form::text('account', Null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.paypal_express_account'), 'required']); ?>

          <div class="help-block with-errors"></div>
        </div>

        <div class="form-group">
          <?php echo Form::label('client_id', trans('app.form.paypal_express_client_id') . '*', ['class' => 'with-help']); ?>

          <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.config_paypal_express_client_id'), false); ?>"></i>
          <?php echo Form::text('client_id', Null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.paypal_express_client_id'), 'required']); ?>

          <div class="help-block with-errors"></div>
        </div>

        <div class="form-group">
          <?php echo Form::label('secret', trans('app.form.paypal_express_secret') . '*', ['class' => 'with-help']); ?>

          <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.config_paypal_express_secret'), false); ?>"></i>
          <?php echo Form::text('secret', Null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.paypal_express_secret'), 'required']); ?>

          <div class="help-block with-errors"></div>
        </div>
    </div>
    <div class="modal-footer">
        <?php echo Form::submit(trans('app.update'), ['class' => 'btn btn-flat btn-new']); ?>

    </div>
    <?php echo Form::close(); ?>

  </div> <!-- / .modal-content -->
</div> <!-- / .modal-dialog --><?php /**PATH C:\xampp\htdocs\hype-dappr\resources\views/admin/config/payment-method/paypal_express.blade.php ENDPATH**/ ?>