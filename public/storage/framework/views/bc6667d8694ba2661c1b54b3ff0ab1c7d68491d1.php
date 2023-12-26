<?php $__env->startComponent('mail::message'); ?>
#<?php echo e(trans('notifications.ticket_updated.greeting', ['user' => $ticket->user->getName()]), false); ?>


<?php echo e(trans('notifications.ticket_updated.message', ['ticket_id' => $ticket->id, 'subject' => $ticket->subject]), false); ?>

<br/>

<?php $__env->startComponent('mail::button', ['url' => $url, 'color' => 'blue']); ?>
<?php echo e(trans('notifications.ticket_updated.button_text'), false); ?>

<?php echo $__env->renderComponent(); ?>

<?php echo $__env->make('admin.mail.ticket._ticket_detail_panel', ['ticket_detail' => $ticket], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo e(trans('messages.thanks'), false); ?>,<br>
<?php echo e($ticket->assignedTo ? $ticket->assignedTo->getName() : '', false); ?><br>
<?php echo e(get_platform_title(), false); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH C:\wamp64\www\hype-dappr\resources\views/admin/mail/ticket/updated.blade.php ENDPATH**/ ?>