<?php $__env->startComponent('mail::message'); ?>
#<?php echo e(trans('notifications.ticket_assigned.greeting', ['user' => $ticket->assignedTo->getName()]), false); ?>


<?php echo e(trans('notifications.ticket_assigned.message', ['ticket_id' => $ticket->id, 'subject' => $ticket->subject]), false); ?>

<br/>

<?php $__env->startComponent('mail::button', ['url' => $url, 'color' => 'blue']); ?>
<?php echo e(trans('notifications.ticket_assigned.button_text'), false); ?>

<?php echo $__env->renderComponent(); ?>

<?php echo $__env->make('admin.mail.ticket._ticket_detail_panel', ['ticket_detail' => $ticket], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo e(trans('messages.thanks'), false); ?>,<br>
<?php echo e(get_platform_title(), false); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH C:\wamp64\www\hype-dappr\resources\views/admin/mail/ticket/assigned.blade.php ENDPATH**/ ?>