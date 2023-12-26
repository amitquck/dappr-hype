<?php $__env->startComponent('mail::message'); ?>
#<?php echo e(trans('notifications.ticket_replied.greeting', ['user' => $user]), false); ?>


<?php echo trans('notifications.ticket_replied.message', ['reply' => $reply->reply]); ?>


<?php $__env->startComponent('mail::button', ['url' => $url, 'color' => 'blue']); ?>
<?php echo e(trans('notifications.ticket_replied.button_text'), false); ?>

<?php echo $__env->renderComponent(); ?>

<?php echo $__env->make('admin.mail.ticket._ticket_detail_panel', ['ticket_detail' => $reply->repliable], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo e(trans('messages.thanks'), false); ?>,<br>
<?php if($reply->user->isFromPlatform()): ?>
<?php echo e($reply->user->getName(), false); ?><br>
<?php endif; ?>
<?php echo e(get_platform_title(), false); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH C:\wamp64\www\hype-dappr\resources\views/admin/mail/ticket/replied.blade.php ENDPATH**/ ?>