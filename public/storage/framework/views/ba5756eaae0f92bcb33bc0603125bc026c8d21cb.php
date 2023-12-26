<div class="modal-dialog modal-md">
    <div class="modal-content">
        <?php echo Form::model($ticket, ['method' => 'POST', 'route' => ['admin.support.ticket.storeReply', $ticket->id], 'files' => true, 'id' => 'form', 'data-toggle' => 'validator']); ?>

        <div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <?php echo e(trans('app.reply'), false); ?>

        </div>
        <div class="modal-body">
            <?php echo $__env->make('admin.ticket._status_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php echo $__env->make('admin.partials._reply', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <p class="help-block">* <?php echo e(trans('app.form.required_fields'), false); ?></p>
        </div>
        <div class="modal-footer">
            <?php echo Form::submit(trans('app.reply'), ['class' => 'btn btn-flat btn-new']); ?>

        </div>
        <?php echo Form::close(); ?>

    </div> <!-- / .modal-content -->
</div> <!-- / .modal-dialog --><?php /**PATH C:\wamp64\www\hype-dappr\resources\views/admin/ticket/_reply.blade.php ENDPATH**/ ?>