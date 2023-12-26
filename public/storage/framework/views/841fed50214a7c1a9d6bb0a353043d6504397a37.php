<div class="modal-dialog modal-md">
    <div class="modal-content">
        <?php echo Form::open(['route' => ['admin.support.ticket.assign', $ticket], 'files' => true, 'id' => 'form', 'class' => 'form-horizontal', 'data-toggle' => 'validator']); ?>

        <div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        	<?php echo e(trans('app.assign'), false); ?>

        </div>
        <div class="modal-body">
            <div class="col-md-12">
                <div class="form-group">
                  <?php echo Form::label('assigned_to', trans('app.form.assign_to')); ?>

                  <?php echo Form::select('assigned_to', $users , $ticket->assigned_to, ['class' => 'form-control select2', 'placeholder' => trans('app.placeholder.select'), 'required']); ?>

                  <div class="help-block with-errors"></div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <?php echo Form::submit(trans('app.form.save'), ['class' => 'btn btn-flat btn-new']); ?>

        </div>
        <?php echo Form::close(); ?>

    </div> <!-- / .modal-content -->
</div> <!-- / .modal-dialog -->

<?php /**PATH C:\wamp64\www\hype-dappr\resources\views/admin/ticket/_assign.blade.php ENDPATH**/ ?>