<?php $__env->startSection('content'); ?>
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title"><?php echo e(trans('app.gift_cards'), false); ?></h3>
      <div class="box-tools pull-right">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', \App\Models\GiftCard::class)): ?>
          
          <a href="javascript:void(0)" data-link="<?php echo e(route('admin.promotion.giftCard.create'), false); ?>" class="ajax-modal-btn btn btn-new btn-flat"><?php echo e(trans('app.add_gift_card'), false); ?></a>
        <?php endif; ?>
      </div>
    </div> <!-- /.box-header -->
    <div class="box-body">
      <table class="table table-hover table-option">
        <thead>
          <tr>
            <th><?php echo e(trans('app.name'), false); ?></th>
            <th><?php echo e(trans('app.value'), false); ?></th>
            <th><?php echo e(trans('app.activation_time'), false); ?></th>
            <th><?php echo e(trans('app.expiry_time'), false); ?></th>
            <th><?php echo e(trans('app.option'), false); ?></th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $valid_cards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $card): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td>
                <img src="<?php echo e(get_storage_file_url(optional($card->image)->path, 'tiny'), false); ?>" class="img-sm" alt="<?php echo e(trans('app.image'), false); ?>">
                <span class="indent10">
                  <?php echo e($card->name, false); ?>

                </span>
                <?php if($card->isInUse()): ?>
                  <span class="label label-primary indent5"><?php echo e(trans('app.in_use'), false); ?></span>
                <?php endif; ?>
              </td>
              <td><?php echo e(get_formated_currency($card->value, 2), false); ?></td>
              <td>
                <?php echo e($card->activation_time ? $card->activation_time->toDayDateTimeString() : '', false); ?>

              </td>
              <td><?php echo e($card->expiry_time ? $card->expiry_time->toDayDateTimeString() : '', false); ?></td>
0              <td class="row-options">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $card)): ?>
                  <a href="javascript:void(0)" data-link="<?php echo e(route('admin.promotion.giftCard.show', $card->id), false); ?>" class="ajax-modal-btn"><i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.detail'), false); ?>" class="fa fa-expand"></i></a>&nbsp;
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $card)): ?>
                  <a href="javascript:void(0)" data-link="<?php echo e(route('admin.promotion.giftCard.edit', $card->id), false); ?>" class="ajax-modal-btn"><i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.edit'), false); ?>" class="fa fa-edit"></i></a>&nbsp;
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $card)): ?>
                  <?php echo Form::open(['route' => ['admin.promotion.giftCard.trash', $card->id], 'method' => 'delete', 'class' => 'data-form']); ?>

                  <?php echo Form::button('<i class="fa fa-trash-o"></i>', ['type' => 'submit', 'class' => 'confirm ajax-silent', 'title' => trans('app.trash'), 'data-toggle' => 'tooltip', 'data-placement' => 'top']); ?>

                  <?php echo Form::close(); ?>

                <?php endif; ?>
              </td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
    </div> <!-- /.box-body -->
  </div> <!-- /.box -->

  <div class="box collapsed-box">
    <div class="box-header with-border">
      <h3 class="box-title"><?php echo e(trans('app.invalid_cards'), false); ?></h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
      </div>
    </div> <!-- /.box-header -->
    <div class="box-body">
      <table class="table table-hover table-option">
        <thead>
          <tr>
            <th><?php echo e(trans('app.name'), false); ?></th>
            <th><?php echo e(trans('app.pin_code'), false); ?></th>
            <th><?php echo e(trans('app.serial_number'), false); ?></th>
            <th><?php echo e(trans('app.value'), false); ?></th>
            <th><?php echo e(trans('app.expiry_time'), false); ?></th>
            <th><?php echo e(trans('app.option'), false); ?></th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $invalid_cards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $card): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td>
                <?php echo e($card->name, false); ?>

                <?php if(!$card->hasRemaining()): ?>
                  <span class="label label-info indent5"><?php echo e(trans('app.used'), false); ?></span>
                <?php endif; ?>
              </td>
              <td><?php echo e($card->pin_code, false); ?></td>
              <td><?php echo e($card->serial_number, false); ?></td>
              <td><?php echo e(get_formated_currency($card->value, 2), false); ?></td>
              <td>
                <?php echo e($card->expiry_time->toDayDateTimeString(), false); ?>

              </td>
              <td class="row-options">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $card)): ?>
                  <a href="javascript:void(0)" data-link="<?php echo e(route('admin.promotion.giftCard.show', $card->id), false); ?>" class="ajax-modal-btn"><i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.detail'), false); ?>" class="fa fa-expand"></i></a>&nbsp;
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $card)): ?>
                  <a href="javascript:void(0)" data-link="<?php echo e(route('admin.promotion.giftCard.edit', $card->id), false); ?>" class="ajax-modal-btn"><i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.edit'), false); ?>" class="fa fa-edit"></i></a>&nbsp;
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $card)): ?>
                  <?php echo Form::open(['route' => ['admin.promotion.giftCard.trash', $card->id], 'method' => 'delete', 'class' => 'data-form']); ?>

                  <?php echo Form::button('<i class="fa fa-trash-o"></i>', ['type' => 'submit', 'class' => 'confirm ajax-silent', 'title' => trans('app.trash'), 'data-toggle' => 'tooltip', 'data-placement' => 'top']); ?>

                  <?php echo Form::close(); ?>

                <?php endif; ?>
              </td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
    </div> <!-- /.box-body -->
  </div> <!-- /.box -->

  <div class="box collapsed-box">
    <div class="box-header with-border">
      <h3 class="box-title"><i class="fa fa-trash-o"></i><?php echo e(trans('app.trash'), false); ?></h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
      </div>
    </div> <!-- /.box-header -->
    <div class="box-body">
      <table class="table table-hover table-2nd-sort">
        <thead>
          <tr>
            <th><?php echo e(trans('app.name'), false); ?></th>
            <th><?php echo e(trans('app.serial_number'), false); ?></th>
            <th><?php echo e(trans('app.value'), false); ?></th>
            <th><?php echo e(trans('app.deleted_at'), false); ?></th>
            <th><?php echo e(trans('app.option'), false); ?></th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $trashes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trash): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($trash->name, false); ?></td>
              <td>
                <?php echo e($trash->serial_number, false); ?>

                <?php if($trash->expiry_time < \Carbon\Carbon::now()): ?>
                  (<?php echo e(trans('app.invalid'), false); ?>)
                <?php endif; ?>
              </td>
              <td><?php echo e(get_formated_currency($trash->value, 2), false); ?></td>
              <td><?php echo e($trash->deleted_at->diffForHumans(), false); ?></td>
              <td class="row-options">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $trash)): ?>
                  <a href="<?php echo e(route('admin.promotion.giftCard.restore', $trash->id), false); ?>"><i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.restore'), false); ?>" class="fa fa-database"></i></a>&nbsp;

                  <?php echo Form::open(['route' => ['admin.promotion.giftCard.destroy', $trash->id], 'method' => 'delete', 'class' => 'data-form']); ?>

                  <?php echo Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'confirm ajax-silent', 'title' => trans('app.delete_permanently'), 'data-toggle' => 'tooltip', 'data-placement' => 'top']); ?>

                  <?php echo Form::close(); ?>

                <?php endif; ?>
              </td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
    </div> <!-- /.box-body -->
  </div> <!-- /.box -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\hype-dappr\resources\views/admin/gift-card/index.blade.php ENDPATH**/ ?>