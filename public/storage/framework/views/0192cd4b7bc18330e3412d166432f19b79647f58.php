<div class="modal-dialog modal-md">
    <div class="modal-content">
        <div class="modal-body" style="padding: 0px;">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="position: absolute; top: 5px; right: 10px; z-index: 9;">×</button>
            <div class="col-md-12 nopadding">
				<table class="table no-border">
					<tr>
						<th class="text-right"><?php echo e(trans('app.name'), false); ?>:</th>
						<td style="width: 65%;"><span class="lead"><?php echo e($giftCard->name, false); ?></span></td>
					</tr>
					<tr>
						<th class="text-right"><?php echo e(trans('app.value'), false); ?>:</th>
						<td style="width: 65%;">
							<span class="label label-primary"><?php echo e(get_formated_currency($giftCard->value, 2), false); ?></span>
						</td>
					</tr>
	                <tr>
	                	<th class="text-right"><?php echo e(trans('app.status'), false); ?>: </th>
	                	<td style="width: 65%;">
							<?php if($giftCard->expiry_time < \Carbon\Carbon::now()): ?>
								<?php echo e(trans('app.expired'), false); ?>

							<?php else: ?>
								<?php echo e(($giftCard->active) ? trans('app.active') : trans('app.inactive'), false); ?>

							<?php endif; ?>
	                	</td>
	                </tr>
					<tr>
						<th class="text-right"><?php echo e(trans('app.created_at'), false); ?>:</th>
						<td style="width: 65%;"><?php echo e($giftCard->created_at->toDayDateTimeString(), false); ?></td>
					</tr>
					<tr>
						<th class="text-right"><?php echo e(trans('app.updated_at'), false); ?>:</th>
						<td style="width: 65%;"><?php echo e($giftCard->updated_at->toDayDateTimeString(), false); ?></td>
					</tr>
				</table>
			</div>
			<div class="clearfix"></div>
			<!-- Custom Tabs -->
			<div class="nav-tabs-custom">
				<ul class="nav nav-tabs nav-justified">
				  <li class="active"><a href="#tab_1" data-toggle="tab">
					<?php echo e(trans('app.basic_info'), false); ?>

				  </a></li>
				  <li><a href="#tab_2" data-toggle="tab">
					<?php echo e(trans('app.description'), false); ?>

				  </a></li>
				</ul>
				<div class="tab-content">
				    <div class="tab-pane active" id="tab_1">
				        <table class="table">
			                <tr>
			                	<th><?php echo e(trans('app.pin_code'), false); ?>: </th>
			                	<td><?php echo e($giftCard->pin_code, false); ?></td>
			                </tr>
			                <tr>
			                	<th><?php echo e(trans('app.serial_number'), false); ?>: </th>
			                	<td><?php echo e($giftCard->serial_number, false); ?></td>
			                </tr>
			                <tr>
			                	<th><?php echo e(trans('app.allow_partial_use'), false); ?>: </th>
			                	<td><?php echo $giftCard->partial_use ? '<i class="fa fa-check"></i>' : '<i class="fa fa-close"></i>'; ?></td>
			                </tr>
			                <tr>
			                	<th><?php echo e(trans('app.exclude_offer_items'), false); ?>: </th>
			                	<td><?php echo $giftCard->exclude_offer_items ? '<i class="fa fa-check"></i>' : '<i class="fa fa-close"></i>'; ?></td>
			                </tr>
			                <tr>
			                	<th><?php echo e(trans('app.exclude_tax_n_shipping'), false); ?>: </th>
			                	<td><?php echo $giftCard->exclude_tax_n_shipping ? '<i class="fa fa-check"></i>' : '<i class="fa fa-close"></i>'; ?></td>
			                </tr>
			                <tr>
			                	<th><?php echo e(trans('app.active_from'), false); ?>: </th>
			                	<td><?php echo e($giftCard->activation_time ? $giftCard->activation_time->toDayDateTimeString() : '', false); ?></td>
			                </tr>
			                <tr>
			                	<th><?php echo e(trans('app.active_till'), false); ?>: </th>
			                	<td><?php echo e($giftCard->expiry_time ? $giftCard->expiry_time->toDayDateTimeString() : '', false); ?></td>
			                </tr>
				        </table>
				    </div>
				    <!-- /.tab-pane -->
				    <div class="tab-pane" id="tab_2">
					  <div class="box-body">
				        <?php if($giftCard->description): ?>
				            <?php echo htmlspecialchars_decode($giftCard->description); ?>

				        <?php else: ?>
				            <p><?php echo e(trans('app.description_not_available'), false); ?> </p>
				        <?php endif; ?>
					  </div>
				    </div>
				    <!-- /.tab-pane -->
				</div>
				<!-- /.tab-content -->
			</div>
        </div>
    </div> <!-- / .modal-content -->
</div> <!-- / .modal-dialog --><?php /**PATH C:\wamp64\www\hype-dappr\resources\views/admin/gift-card/_show.blade.php ENDPATH**/ ?>