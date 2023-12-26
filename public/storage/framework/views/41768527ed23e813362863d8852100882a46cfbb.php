<?php $__env->startComponent('mail::panel'); ?>
<?php echo e(trans('messages.ticket_id') . ': #' . $ticket_detail->id, false); ?><br/>
<?php echo e(trans('messages.category') . ': ' . $ticket_detail->category->name, false); ?><br/>
<?php echo e(trans('messages.subject') . ': ' . $ticket_detail->subject, false); ?><br/>
<?php echo trans('messages.prioriy') . ': ' . $ticket_detail->priorityLevel(); ?><br/>
<?php echo trans('messages.status') . ': ' . $ticket_detail->statusName(); ?>

<?php echo $__env->renderComponent(); ?>
<br/><?php /**PATH C:\wamp64\www\hype-dappr\resources\views/admin/mail/ticket/_ticket_detail_panel.blade.php ENDPATH**/ ?>