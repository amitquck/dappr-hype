<?php $__env->startComponent('mail::message'); ?>
#<?php echo e(trans('notifications.email_verification.greeting', ['user' => $user->getName()]), false); ?>


<?php echo e(trans('notifications.email_verification.message'), false); ?>

<br/>

<?php $__env->startComponent('mail::button', ['url' => $url, 'color' => 'blue']); ?>
<?php echo e(trans('notifications.email_verification.button_text'), false); ?>

<?php echo $__env->renderComponent(); ?>

<?php echo e(trans('messages.thanks'), false); ?>,<br>
<?php echo e(get_platform_title(), false); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH C:\xampp\htdocs\hype-dappr\resources\views/admin/mail/auth/send_verification_email.blade.php ENDPATH**/ ?>