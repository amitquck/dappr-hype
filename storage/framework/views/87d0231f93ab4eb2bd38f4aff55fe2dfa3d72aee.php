<style>
    /* .fa-check,.a-times
    {
        position: relative;
    }
    .tooltip_text
    {
        position: absolute;
        top: 25px;
        left: 23px;
        font-size: 13px;

    }
    .tooltip_approve
    {
       background: #3c8dbc;
       padding: 2px;
       /* border-radius:5px;  */
    /* } */
    /* .tooltip_decline */
    /* { */
        /* left: 72px; */
        /* background: #3c8dbc; */
        /* padding: 2px; */
        /* border-radius:5px;  */
    /* } */
    .fa-check
    {
        position: absolute;
        left: 24px;
        top: 25px;
    }
   
    .fa-times
    {
        position: absolute;
        left: 63px;
        top: 25px;
    }

</style>


<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-8">
            <?php if($order->cancellation): ?>
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            <i class="fa fa-warning"></i>
                            <?php echo e(trans('app.' . $order->cancellation->request_type . '_request'), false); ?>                            
                        </h3>
                        <div class="box-tools pull-right"><?php echo $order->cancellation->statusName(); ?></div>
                    </div> <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-8">
                                

                                

                                <strong style="display: none"><?php echo e(trans('app.requested_items'), false); ?>:</strong> 
                                
                                <input type="checkbox" id="checkedAll" style="display: none"> 
                                
                                
                            </div>
                            <div class="col-sm-4 text-right">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('cancel', $order)): ?>
                                    <?php if($order->cancellation->isNew()): ?>                                        
                                        

                                        <?php echo Form::open([
                                            'route' => ['admin.order.cancellation.handle', $order, 'complete'],
                                            'method' => 'put',
                                            'class' => 'form-inline indent5',
                                        ]); ?>

                                        <input type="hidden" name="order_id_db" value="<?php echo e($order->cancellation->order_id, false); ?>">
                                        <input type="hidden" name="customer_id_db" value="<?php echo e($order->cancellation->customer_id, false); ?>">                                       
                                        <input type="hidden" name="approve_decline_item"  class="aprdecline" value="">
                                        <input type="hidden" name="approve_item" class="approve" value="">
                                        <input type="hidden" name="decline_item" class="decline" value="">
                                        <input type="hidden" name="pre_approve_item" value="<?php echo e($order->cancellation->approve_items, false); ?>">
                                        <input type="hidden" name="pre_decline_item" value="<?php echo e($order->cancellation->decline_item, false); ?>">
                                        <button class="btn btn-danger btn-sm confirm" type="submit">
                                            
                                            <i class="fa fa-check"></i>
                                            <?php echo e(trans('app.submit'), false); ?>

                                        </button>
                                        <?php echo Form::close(); ?>

                                    <?php endif; ?>
                                 
                                    <?php if($order->cancellation->inReview()): ?>
                                        <?php if(Auth::user()->isFromPlatform()): ?>
                                            <a href="javascript:void(0)"
                                                data-link="<?php echo e(route('admin.order.cancellation.create', $order), false); ?>"
                                                class='ajax-modal-btn btn btn-default btn-sm'>
                                                <?php echo e(trans('app.approve'), false); ?>

                                            </a>
                                        <?php else: ?>
                                            <span class="label label-info"><?php echo trans('app.waiting_for_approval'); ?></span>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>

                            <span class="spacer10"></span>

                            <div class="col-sm-12">
                                <table class="table table-sripe">
                                    <tbody id="items">                                       
                                        <?php if($order->cancellation->isPartial()): ?>
                                            <?php if($order->cancellation->isNew()): ?>
                                            <tr>
                                                <td><i class="fa fa-check text-success" title="Approve"></i></td>
                                                <td><i class="fa fa-times text-danger" title="Decline"></i></td>
                                            </tr>
                                            <?php endif; ?>
                                            <?php $__currentLoopData = $order->inventories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(in_array($item->id, $order->cancellation->items)): ?>
                                                    <tr>
                                                        
                                                        <td>
                                                            
                                                            <?php
                                                            $option_dec_st = $order->cancellation->decline_item;
                                                            $option_apr_st = $order->cancellation->approve_items;
                                                            $dec_arr =[];
                                                            $apr_arr = [];
                                                            $status_html = '';
                                                            $status_css ='';
                                                            $status_css1 ='';
                                                            $description_new_data ='';
                                                            $description_new_data_decode ='';
                                                            if($order->cancellation->isNew())
                                                            {
                                                            $status_css ='<input title="Approve" type="checkbox" class="checkSingle  approve'.$item->id.'" name="approve[]" value="'.$item->id.'" required>';

                                                            $status_css1 ='<input title="Decline" type="checkbox" class="checkSingle  decline'.$item->id.'" name="decline[]" value="'.$item->id.'" required>';
                                                            }

                                                            if(isset($option_dec_st) && $option_dec_st !='')
                                                            {
                                                                $dec_arr = explode(',',$option_dec_st);      
                                                                if(in_array($item->id,$dec_arr))
                                                                {
                                                                    $status_css ='';
                                                                    $status_html ='<span class="label label-danger">DECLINE</span>';
                                                                }                                                         
                                                            }
                                                            if(isset($option_apr_st) && $option_apr_st !='')
                                                            {
                                                                $apr_arr = explode(',', $option_apr_st);   
                                                                if(in_array($item->id, $apr_arr))
                                                                {
                                                                    $status_html ='<span class="label label-primary">APPROVE</span>';
                                                                    $status_css ='';
                                                                }                                                               
                                                            }
                                                            ?>
                                                            
                                                            <?php echo $status_css; ?>

                                                            
                                                        </td>
                                                        <td>
                                                            <?php echo $status_css1; ?>

                                                        </td>
                                                        <td>
                                                            
                                                            <img src="<?php echo e(get_product_img_src($item, 'tiny'), false); ?>"
                                                                class="img-circle img-md" alt="<?php echo e(trans('app.image'), false); ?>">
                                                        </td>
                                                        <td class="nopadding-right">
                                                            <?php
                                                                $item_details1 = explode(' - ', $item->pivot->item_description);
                                                                $unset_data = '';
                                                                $implode_data1 = '';
                                                                foreach ($item_details1 as $key => $value) {
                                                                    if ($value == 'Uni-sex' || $value == 'Female' || $value == 'Male') {
                                                                        unset($item_details1[$key]);
                                                                    }
                                                                }
                                                                $implode_data1 = implode(' - ', $item_details1);
                                                            ?>
                                                            
                                                            <?php echo e($item->brand . ' - ' . $implode_data1, false); ?>

                                                            <a href="<?php echo e(route('show.product', $item->slug), false); ?>"
                                                                target="_blank" class="indent5 small"><i
                                                                    class=" fa fa-external-link"></i></a>
                                                        </td>

                                                        <td class="nopadding-right">
                                                            <?php
                                                            $option = $order->cancellation->exchnage_return_option;
                                                            $data = json_decode($option, true);
                                                            foreach ($data as $key => $value) {
                                                                if ($item->id == $key && $value == 'exchange') {
                                                                    echo 'Exchange';
                                                                } elseif ($item->id == $key && $value == 'refund') {
                                                                    # code...
                                                                    echo 'Refund';
                                                                } else {
                                                                    echo '';
                                                                }
                                                            }
                                                            
                                                            ?>
                                                            
                                                        </td>
                                                        <td>
                                                            <?php 
                                                                $description_new_data = $order->cancellation->description_new;
                                                                $description_new_data_decode = json_decode($description_new_data, true);
                                                                // print_r($description_new_data_decode);
                                                                foreach ($description_new_data_decode as $key => $value){
                                                                    if ($item->id == $key)
                                                                    {
                                                                        echo $value;
                                                                    }
                                                                }

                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $option = $order->cancellation->exchnage_return_option;
                                                            $data = json_decode($option, true);
                                                            foreach ($data as $key => $value) {
                                                                if ($item->id == $key && $value == 'exchange') {
                                                                   $exchange_option = $order->cancellation->exchange_more_option;
                                                                   $exchange_data = json_decode($exchange_option, true);
                                                                   foreach ($exchange_data as $exckey => $excvalue) {                                                                    
                                                                        if($item->id == $exckey && $excvalue != 'null')     
                                                                        {
                                                                            echo ucfirst(str_replace("_"," ",$excvalue)); 
                                                                        }                                                               
                                                                   }                                                                
                                                                } elseif ($item->id == $key && $value == 'refund') {
                                                                    $refund_option = $order->cancellation->return_more_option;                                                                    
                                                                    $refund_data = json_decode($refund_option, true);
                                                                    foreach ($refund_data as $refkey => $refvalue) {
                                                                        if($item->id == $refkey && $refvalue != 'null')     
                                                                        {
                                                                            echo ucfirst(str_replace("_"," ",$refvalue)); 
                                                                            $refund_sub_option = $order->cancellation->return_more_sub_option;   
                                                                            $refund_sub_data = json_decode($refund_sub_option, true);
                                                                            foreach ($refund_sub_data as $refsubkey => $refsubvalue) {                                                                            
                                                                                if($item->id == $refsubkey && $refsubvalue != 'null')
                                                                                {
                                                                                    echo " ".ucfirst(str_replace("_"," ",$refsubvalue));
                                                                                }                                                                                 
                                                                            }
                                                                        }   
                                                                    }
                                                                } else {
                                                                    echo '';
                                                                }
                                                            }
                                                            
                                                            ?>
                                                        </td>

                                                        <td class="nopadding-right" width="10%">
                                                            <?php echo e(get_formated_currency($item->pivot->unit_price, 2), false); ?>

                                                        </td>
                                                        <td>x</td>
                                                        <td class="nopadding-right" width="10%">
                                                            <?php echo e($item->pivot->quantity, false); ?>

                                                        </td>
                                                        <td class="nopadding-right text-center" width="10%">
                                                            <?php echo e(get_formated_currency($item->pivot->quantity * $item->pivot->unit_price, 2), false); ?>

                                                        </td>
                                                        <td>  
                                                            <?php echo $status_html; ?>

                                                        </td>
                                                    </tr>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                            <tr id='empty-cart'>
                                                <td colspan="6"><?php echo e(trans('app.all_items'), false); ?></td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div> <!-- /.col-* -->
                        </div> <!-- /.row -->
                    </div> <!-- /.box-body -->
                </div> <!-- /.box -->
            <?php endif; ?>

            <div class="box">
                <div class="box-header with-border">

                    <h3 class="box-title">
                        <i class="fa fa-shopping-cart"></i> <?php echo e(trans('app.order') . ': ' . $order->order_number, false); ?>

                    </h3>

                    <?php if($order->dispute): ?>
                        <span class="label label-danger indent5"><?php echo e(trans('app.statuses.disputed'), false); ?></span>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('fulfill', $order)): ?>
                        <a data-link="<?php echo e(route('admin.order.deliveryboys', $order->id), false); ?>"
                            class="ajax-modal-btn btn btn-flat btn-default indent10" style="cursor: pointer;">
                            <i class="fa fa-user"></i> <?php echo e(trans('app.assign_deliveryboy'), false); ?>

                        </a>
                    <?php endif; ?>

                    <div class="box-tools pull-right">
                        <?php echo $order->orderStatus(); ?>

                    </div>

                </div> <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="well well-lg">
                                <span class="lead">
                                    <?php echo e(trans('app.payment') . ': ' . $order->paymentMethod->name, false); ?>

                                </span>

                                <span class="pull-right lead">
                                    <?php echo $order->paymentStatusName(); ?>

                                </span>
                            </div>
                        </div>
                    </div><!-- /.row -->

                    <div class="row">
                        <div class="col-md-12">
                            <h4><?php echo e(trans('app.order_details'), false); ?></h4>
                            <span class="spacer10"></span>

                            <table class="table table-sripe">
                                <tbody id="items">
                                    <?php if(count($order->inventories) > 0): ?>
                                        <?php $__currentLoopData = $order->inventories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td>
                                                    <img src="<?php echo e(get_product_img_src($item, 'tiny'), false); ?>"
                                                        class="img-circle img-md" alt="<?php echo e(trans('app.image'), false); ?>">
                                                </td>
                                                <td class="nopadding-right" width="55%">
                                                    
                                                    <?php
                                                                $item_details1 = explode(' - ', $item->pivot->item_description);
                                                                $unset_data = '';
                                                                $implode_data1 = '';
                                                                foreach ($item_details1 as $key => $value) {
                                                                    if ($value == 'Uni-sex' || $value == 'Female' || $value == 'Male') {
                                                                        unset($item_details1[$key]);
                                                                    }
                                                                }
                                                                $implode_data1 = implode(' - ', $item_details1);
                                                            ?>
                                                            
                                                            <?php echo e($item->brand . ' - ' . $implode_data1, false); ?>

                                                    <a href="<?php echo e(route('show.product', $item->slug), false); ?>" target="_blank"
                                                        class="indent5 small"><i class=" fa fa-external-link"></i></a>
                                                </td>
                                                <td class="nopadding-right text-right " width="15%">
                                                    <?php echo e(get_formated_currency($item->pivot->unit_price, 2), false); ?>

                                                </td>
                                                <td>&times;</td>
                                                <td class="nopadding text-left" width="10%">
                                                    <?php echo e($item->pivot->quantity, false); ?>

                                                </td>
                                                <td class="nopadding-right text-center" width="10%">
                                                    <?php echo e(get_formated_currency($item->pivot->quantity * $item->pivot->unit_price, 2), false); ?>

                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <tr id='empty-cart'>
                                            <td colspan="6"><?php echo e(trans('help.empty_cart'), false); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div><!-- /.row -->

                    <span class="spacer30"></span>

                    <div class="row">
                        <div class="col-md-6">
                            <dir class="spacer30"></dir>
                            <?php if($order->buyer_note): ?>
                                <?php echo e(trans('app.buyer_note'), false); ?>:
                                <blockquote>
                                    <?php echo $order->buyer_note; ?>

                                </blockquote>
                            <?php endif; ?>

                            <dir class="spacer30"></dir>
                            <?php if($order->admin_note): ?>
                                <?php echo e(trans('app.admin_note'), false); ?>:

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('fulfill', $order)): ?>
                                    <a href="javascript:void(0)" data-link="<?php echo e(route('admin.order.order.adminNote', $order), false); ?>"
                                        class='ajax-modal-btn btn btn-link'>
                                        <?php echo e(trans('app.edit'), false); ?>

                                    </a>
                                <?php endif; ?>

                                <blockquote>
                                    <?php echo $order->admin_note; ?>

                                </blockquote>
                            <?php else: ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('fulfill', $order)): ?>
                                    <dir class="spacer20"></dir>
                                    <a href="javascript:void(0)" data-link="<?php echo e(route('admin.order.order.adminNote', $order), false); ?>"
                                        class='ajax-modal-btn btn btn-link'>
                                        <?php echo e(trans('app.add_admin_note'), false); ?>

                                    </a>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-6" id="summary-block">
                            <table class="table">
                                <tr>
                                    <td class="text-right"><?php echo e(trans('app.total'), false); ?></td>
                                    <td class="text-right" width="40%">
                                        <?php echo e(get_formated_currency($order->total, 2), false); ?>

                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-right">
                                        <span><?php echo e(trans('app.discount'), false); ?></span>
                                    </td>
                                    <td class="text-right" width="40%"> &minus;
                                        <?php echo e(get_formated_currency($order->discount, 2), false); ?>

                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-right">
                                        <span><?php echo e(trans('app.shipping'), false); ?></span><br />
                                        <em class="small">
                                            <?php if($order->shippingRate): ?>
                                                <?php echo e(optional($order->shippingRate)->name, false); ?>

                                                <?php
                                                    $carrier_name = $order->carrier ? $order->carrier->name : ($order->shippingRate ? optional($order->shippingRate->carrier)->name : null);
                                                ?>
                                                <?php if($carrier_name): ?>
                                                    <small> <?php echo e(trans('app.by') . ' ' . $carrier_name, false); ?> </small>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <?php echo e(trans('app.custom_shipping'), false); ?>

                                            <?php endif; ?>
                                        </em>
                                    </td>
                                    <td class="text-right" width="40%">
                                        <?php echo e(get_formated_currency($order->shipping, 2), false); ?>

                                    </td>
                                </tr>

                                <?php if($order->shippingPackage): ?>
                                    <tr>
                                        <td class="text-right">
                                            <span><?php echo e(trans('app.packaging'), false); ?></span><br />
                                            <em class="small"><?php echo e(optional($order->shippingPackage)->name, false); ?></em>
                                        </td>
                                        <td class="text-right" width="40%">
                                            <?php echo e(get_formated_currency($order->packaging, 2), false); ?>

                                        </td>
                                    </tr>
                                <?php endif; ?>

                                <?php if($order->handling): ?>
                                    <tr>
                                        <td class="text-right"><?php echo e(trans('app.handling'), false); ?></td>
                                        <td class="text-right" width="40%">
                                            <?php echo e(get_formated_currency($order->handling, 2), false); ?>

                                        </td>
                                    </tr>
                                <?php endif; ?>

                                <tr>
                                    <td class="text-right"><?php echo e(trans('app.taxes'), false); ?> <br />
                                        <em class="small">
                                            <?php if($order->shippingZone): ?>
                                                <?php echo e(optional($order->shippingZone)->name, false); ?>

                                            <?php elseif($order->shippingRate): ?>
                                                <?php echo e(optional($order->shippingRate->shippingZone)->name, false); ?>

                                            <?php endif; ?>
                                            <?php echo e(get_formated_decimal($order->taxrate, true, 2), false); ?>%
                                        </em>
                                    </td>
                                    <td class="text-right" width="40%">
                                        <?php echo e(get_formated_currency($order->taxes, 2), false); ?>

                                    </td>
                                </tr>

                                <tr class="lead">
                                    <td class="text-right"><?php echo e(trans('app.grand_total'), false); ?></td>
                                    <td class="text-right" width="40%">
                                        <?php echo e(get_formated_currency($order->grand_total, 2), false); ?>

                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div><!-- /.row -->
                </div> <!-- /.box-body -->
            </div> <!-- /.box -->

            <?php
                $refunded_amt = $order->refundedSum();
            ?>

            <?php if($refunded_amt > 0): ?>
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4><i class="fa fa-warning"></i> <?php echo e(trans('app.alert'), false); ?>!</h4>
                    <?php echo trans('help.order_refunded', [
                        'amount' => get_formated_currency($refunded_amt, 2),
                        'total' => get_formated_currency($order->grand_total, 2),
                    ]); ?>

                </div>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('fulfill', $order)): ?>
                <div class="box">
                    <div class="box-body">
                        <div class="box-tools">
                            <?php if(Auth::user()->canManageOrderPayments()): ?>
                                <?php echo Form::open([
                                    'route' => ['admin.order.order.togglePaymentStatus', $order],
                                    'method' => 'put',
                                    'class' => 'inline',
                                ]); ?>

                                <button type="submit"
                                    class="confirm ajax-silent btn btn-lg btn-danger"><?php echo e($order->isPaid() ? trans('app.mark_as_unpaid') : trans('app.mark_as_paid'), false); ?></button>
                                <?php echo Form::close(); ?>


                                <?php if($order->isPaid()): ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('initiate', \App\Models\Refund::class)): ?>
                                        <a href="javascript:void(0)" data-link="<?php echo e(route('admin.support.refund.form', $order), false); ?>"
                                            class='ajax-modal-btn btn btn-flat btn-lg btn-default'>
                                            <?php echo e(trans('app.initiate_refund'), false); ?>

                                        </a>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endif; ?>

                            <div class="pull-right">
                                <a href="javascript:void(0)" data-link="<?php echo e(route('admin.order.order.edit', $order), false); ?>"
                                    class='ajax-modal-btn btn btn-flat btn-lg btn-default'>
                                    <?php echo e(trans('app.update_status'), false); ?>

                                </a>

                                <?php if($order->isFulfilled()): ?>
                                    <?php if (! ($order->isArchived())): ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('archive', $order)): ?>
                                            <?php echo Form::open([
                                                'route' => ['admin.order.order.archive', $order->id],
                                                'method' => 'delete',
                                                'class' => 'inline',
                                            ]); ?>

                                            <button type="submit" class="confirm ajax-silent btn btn-lg btn-default"><i
                                                    class="fa fa-archive text-muted"></i> <?php echo e(trans('app.order_archive'), false); ?></button>
                                            <?php echo Form::close(); ?>

                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <?php if (! ($order->isCanceled() || $order->cancellation)): ?>
                                        <?php if(!$order->cancellationFeeApplicable()): ?>
                                            <?php if(Auth::user()->isFromPlatform()): ?>
                                                <a href="javascript:void(0)"
                                                    data-link="<?php echo e(route('admin.order.cancellation.create', $order), false); ?>"
                                                    class='ajax-modal-btn btn btn-lg btn-warning'>
                                                    <?php echo e(trans('app.cancel_order'), false); ?>

                                                </a>
                                            <?php else: ?>
                                                <?php echo Form::open(['route' => ['admin.order.order.cancel', $order], 'method' => 'put', 'class' => 'inline']); ?>

                                                <button type="submit"
                                                    class="confirm ajax-silent btn btn-lg btn-warning"><?php echo e(trans('app.cancel_order'), false); ?></button>
                                                <?php echo Form::close(); ?>

                                            <?php endif; ?>
                                        <?php else: ?>
                                            <a href="javascript:void(0)"
                                                data-link="<?php echo e(route('admin.order.cancellation.create', $order), false); ?>"
                                                class='ajax-modal-btn btn btn-flat btn-lg btn-warning'>
                                                <?php echo e(trans('app.cancel_order'), false); ?>

                                            </a>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                    <?php if($order->deliver()): ?>
                                        <a href="javascript:void(0)"
                                            data-link="<?php echo e(route('admin.order.order.fulfillment', $order), false); ?>"
                                            class='ajax-modal-btn btn btn-flat btn-lg btn-primary'>
                                            <?php echo e(trans('app.fulfill_order'), false); ?>

                                        </a>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div> <!-- /.box-body -->
                </div> <!-- /.box -->
            <?php endif; ?>

            <?php echo $__env->make('admin.partials._activity_logs', ['logger' => $order], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div> <!-- /.col-md-8 -->

        <div class="col-md-4 nopadding-left">
            <?php if(Auth::user()->isFromPlatform()): ?>
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-map-marker"></i> <?php echo e(trans('app.shop'), false); ?></h3>
                        <div class="box-tools pull-right">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('secretLogin', $order->shop->owner)): ?>
                                <a href="<?php echo e(route('admin.user.secretLogin', $order->shop->owner->id), false); ?>"
                                    class="btn btn-link">
                                    <i class="fa fa-user-secret"></i>
                                    <?php echo e(trans('app.secret_login_merchant'), false); ?>

                                </a>
                            <?php endif; ?>
                        </div>
                    </div> <!-- /.box-header -->
                    <div class="box-body">
                        <img src="<?php echo e(get_storage_file_url(optional($order->shop->image)->path, 'mini'), false); ?>" class=""
                            alt="<?php echo e(trans('app.logo'), false); ?>">
                        <p class="indent10">
                            <?php if(Gate::allows('view', $order->shop)): ?>
                                <a href="javascript:void(0)"
                                    data-link="<?php echo e(route('admin.vendor.shop.show', $order->shop->id), false); ?>"
                                    class="ajax-modal-btn">
                                    <?php echo e($order->shop->name, false); ?>

                                </a>
                            <?php else: ?>
                                <span class="lead"><?php echo e($order->shop->name, false); ?></span>
                            <?php endif; ?>
                        </p>

                        <a href="<?php echo e(route('show.store', $order->shop->slug), false); ?>" target="_blank"
                            class="small pull-right">
                            <i class=" fa fa-external-link"></i> <?php echo e(trans('app.store_front'), false); ?>

                        </a>
                    </div>
                </div>
            <?php endif; ?>

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-user"></i> <?php echo e(trans('app.assigned_deliveryboy'), false); ?></h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa fa-minus"></i></button>
                    </div>
                </div> <!-- /.box-header -->
                <div class="box-body">
                    <p>
                        <img src="<?php echo e(get_avatar_src($order->deliveryBoy, 'tiny'), false); ?>" class="img-circle img-sm"
                            alt="<?php echo e(trans('app.avatar'), false); ?>">

                        <span class="admin-user-widget-title indent5">
                            
                            <?php echo e($order->deliveryBoy ? $order->deliveryBoy->getName() : trans('app.no_assigned_yet'), false); ?>

                            
                        </span>
                    </p>

                    <?php if($order->deliveryBoy): ?>
                        <span class="admin-user-widget-text text-muted">
                            <?php echo e(trans('app.email') . ': ' . $order->deliveryBoy->email, false); ?>

                        </span>
                    <?php endif; ?>
                </div>
            </div>

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-user-secret"></i> <?php echo e(trans('app.customer'), false); ?></h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa fa-minus"></i></button>
                    </div>
                </div> <!-- /.box-header -->
                <div class="box-body">
                    <p>
                        <img src="<?php echo e(get_avatar_src($order->customer, 'tiny'), false); ?>" class="img-circle img-sm"
                            alt="<?php echo e(trans('app.avatar'), false); ?>">

                        <span class="admin-user-widget-title indent5">
                            <?php if(config('system_settings.vendor_can_view_customer_info') && $order->customer_id): ?>
                                <a href="javascript:void(0)"
                                    data-link="<?php echo e(route('admin.admin.customer.show', $order->customer->id), false); ?>"
                                    class="ajax-modal-btn">
                                    <?php echo e($order->customer->getName(), false); ?>

                                </a>
                            <?php else: ?>
                                <?php echo e($order->customer->getName(), false); ?>

                            <?php endif; ?>

                            <?php if($order->email): ?>
                                <br /><small><?php echo e(trans('app.email') . ': ' . $order->email, false); ?></small>
                            <?php endif; ?>
                        </span>
                    </p>

                    <?php if($order->customer->email): ?>
                        <span class="admin-user-widget-text text-muted">
                            <?php echo e(trans('app.email') . ': ' . $order->customer->email, false); ?>

                        </span>
                    <?php endif; ?>

                    <span class="spacer10"></span>

                    <?php if($order->conversation): ?>
                        <a href="<?php echo e(route('admin.support.message.show', $order->conversation), false); ?>"
                            class="btn btn-sm btn-info btn-flat"><?php echo e(trans('app.view_conversations'), false); ?></a>
                    <?php else: ?>
                        
                        <a href="javascript:void(0)"
                            data-link="<?php echo e(route('admin.support.orderConversation.create', $order->id), false); ?>"
                            class="ajax-modal-btn btn btn-new btn-sm"><?php echo e(trans('app.send_message'), false); ?></a>
                    <?php endif; ?>

                    <a href="<?php echo e(route('admin.order.order.invoice', $order->id), false); ?>"
                        class="btn btn-sm btn-default btn-flat"><?php echo e(trans('app.invoice'), false); ?></a>

                    <?php if($order->dispute): ?>
                        <a href="<?php echo e(route('admin.support.dispute.show', $order->dispute), false); ?>"
                            class="btn btn-sm btn-danger btn-flat"><?php echo e(trans('app.view_dispute'), false); ?></a>
                    <?php endif; ?>

                    <?php if(is_incevio_package_loaded('pharmacy')): ?>
                        <fieldset>
                            <legend><i class="far fa-stethoscope"></i> <?php echo e(trans('pharmacy::lang.prescription'), false); ?>

                            </legend>
                        </fieldset>

                        <?php if(count($order->attachments)): ?>
                            <?php $__currentLoopData = $order->attachments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attachment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo e(route('attachment.download', $attachment), false); ?>">
                                    <i class="fa fa-file"></i> <?php echo e($attachment->name, false); ?>

                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    <?php endif; ?>

                    <fieldset>
                        <legend><?php echo e(strtoupper(trans('app.shipping_address')), false); ?></legend>
                    </fieldset>

                    <?php if($order->pickup()): ?>
                        <fieldset>
                            <legend><?php echo e(strtoupper(trans('app.pick_up_address')), false); ?></legend>
                        </fieldset>

                        <?php
                            $warehouseIds = [];
                        ?>

                        <?php $__currentLoopData = $order->inventories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $inventory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(!empty($inventory->warehouse)): ?>
                                <?php if(!in_array($inventory->warehouse_id, $warehouseIds)): ?>
                                    <?php
                                        $warehouseIds[] = $inventory->warehouse_id;
                                    ?>

                                    <?php echo address_str_to_html($inventory->warehouse->address->toString()); ?>

                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <fieldset>
                            <legend><?php echo e(strtoupper(trans('app.shipping_address')), false); ?></legend>
                        </fieldset>
                        <?php echo address_str_to_html($order->shipping_address); ?>


                        <iframe width="100%" height="150" frameborder="0" scrolling="no" marginheight="0"
                            marginwidth="0"
                            src="https://maps.google.com/maps?q=<?php echo e(urlencode(address_str_to_geocode_str($order->shipping_address)), false); ?>&output=embed"></iframe>

                        <fieldset>
                            <legend><?php echo e(strtoupper(trans('app.billing_address')), false); ?></legend>
                        </fieldset>

                        <?php if($order->shipping_address == $order->billing_address): ?>
                            <small>
                                <i class="fa fa-check-square-o"></i>
                                <?php echo Form::label('same_as_shipping_address', strtoupper(trans('app.same_as_shipping_address')), [
                                    'class' => 'indent5',
                                ]); ?>

                            </small>
                        <?php else: ?>
                            <?php echo address_str_to_html($order->billing_address); ?>

                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>

            <?php if($order->refunds->count()): ?>
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title"> <?php echo e(trans('app.refunds'), false); ?></h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i></button>
                        </div>
                    </div> <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-border">
                            <tbody>
                                <?php $__currentLoopData = $order->refunds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $refund): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($refund->created_at->diffForHumans(), false); ?></td>
                                        <td><?php echo e(get_formated_currency($refund->amount, 2), false); ?></td>
                                        <td><?php echo $refund->statusName(); ?></td>
                                        <td>
                                            <?php if($refund->isOpen()): ?>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('approve', $refund)): ?>
                                                    <a href="javascript:void(0)"
                                                        data-link="<?php echo e(route('admin.support.refund.response', $refund), false); ?>"
                                                        class="ajax-modal-btn"><i data-toggle="tooltip" data-placement="top"
                                                            title="<?php echo e(trans('app.response'), false); ?>"
                                                            class="fa fa-random"></i></a>&nbsp;
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php endif; ?>

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"> <?php echo e(trans('app.shipping'), false); ?></h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa fa-minus"></i></button>
                    </div>
                </div> <!-- /.box-header -->
                <div class="box-body">
                    <span><?php echo e(trans('app.tracking_id'), false); ?>: <?php echo e($order->tracking_id, false); ?></span><br />
                    <span><?php echo e(trans('app.carrier'), false); ?>:
                        <strong><?php echo e($order->carrier ? $order->carrier->name : ($order->shippingRate ? optional($order->shippingRate->carrier)->name : ''), false); ?></strong></span><br />
                    <span><?php echo e(trans('app.total_weight'), false); ?>:
                        <strong><?php echo e(get_formated_weight($order->shipping_weight), false); ?></strong></span><br />
                    <?php if($order->carrier && $order->tracking_id): ?>
                        <?php
                            $tracking_url = getTrackingUrl($order->tracking_id, $order->carrier_id);
                        ?>
                        <span><a href="<?php echo e($tracking_url, false); ?>"><?php echo e(trans('app.tracking_url'), false); ?></a>:
                            <?php echo e($tracking_url, false); ?></span>
                    <?php endif; ?>
                </div>
            </div>

        </div> <!-- /.col-md-4 -->
    </div> <!-- /.row -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dappr-hype\resources\views/admin/order/show.blade.php ENDPATH**/ ?>