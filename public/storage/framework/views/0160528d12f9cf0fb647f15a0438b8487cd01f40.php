<div class="row">
  <div class="col-md-6 nopadding-right">
    <div class="form-group">
      <?php echo Form::label('status', trans('app.form.status').'*'); ?>

      <?php echo Form::select('status', $statuses , isset($ticket) ? $ticket->status : Null, ['class' => 'form-control select2-normal', 'placeholder' => trans('app.placeholder.status'), 'required']); ?>

      <div class="help-block with-errors"></div>
    </div>
  </div>
  <div class="col-md-6 nopadding-left">
    <div class="form-group">
      <?php echo Form::label('priority', trans('app.form.priority').'*'); ?>

      <?php echo Form::select('priority', $priorities , isset($ticket) ? $ticket->priority : Null, ['class' => 'form-control select2-normal', 'placeholder' => trans('app.placeholder.priority'), 'required']); ?>

      <div class="help-block with-errors"></div>
    </div>
  </div>
</div><?php /**PATH C:\wamp64\www\hype-dappr\resources\views/admin/ticket/_status_form.blade.php ENDPATH**/ ?>