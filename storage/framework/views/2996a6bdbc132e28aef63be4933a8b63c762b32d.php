<?php
  $date = date('d-m-Y');
  
  $notificationdata = $notification->data;
  $notificationcreate_adate = date('d-m-Y', strtotime($notification->created_at));
    foreach ($notificationdata as $key => $value) {
    if($key == 'email')
    {
      $customer_data = DB::select('select * from customers where email = "'.$value.'" order by id desc');
      foreach ($customer_data as $key => $customer_datavalue) { 
        ?>
           <a href="javascript:void(0)" data-link="<?php echo e(route('admin.admin.customer.show', $customer_datavalue->id), false); ?>" class="ajax-modal-btn modal-btn"><i class="fa fa-bell-o text-aqua"></i>&nbsp;New Client</a>
        <?php
      }
    }
    }

  

?>





<?php /**PATH C:\xampp\htdocs\dappr-hype\resources\views/admin/partials/notifications/registered.blade.php ENDPATH**/ ?>