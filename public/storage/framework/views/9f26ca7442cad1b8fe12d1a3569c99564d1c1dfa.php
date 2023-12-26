<div class="form-group">
  <?php echo Form::label('attribute_type_id', trans('app.form.attribute_type') . '*', ['class' => 'with-help']); ?>

  <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.attribute_type'), false); ?>"></i>
  <?php echo Form::select('attribute_type_id', $typeList, null, ['class' => 'form-control select2-normal', 'placeholder' => trans('app.placeholder.attribute_type'), 'required']); ?>

  <div class="help-block with-errors"></div>
</div>

<div class="row">
  <div class="col-md-8 nopadding-right">
    <div class="form-group">
      <?php echo Form::label('name', trans('app.form.attribute_name') . '*'); ?>

      <div class="input-group">
        <?php echo Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.attribute_name'), 'required']); ?>

        <span class="input-group-addon" id="basic-addon1">
          <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.attribute_name'), false); ?>"></i>
        </span>
      </div>
      <div class="help-block with-errors"></div>
    </div>
  </div>
  <div class="col-md-4 nopadding-left">
    <div class="form-group">
      <?php echo Form::label('order', trans('app.form.list_order')); ?>

      <div class="input-group">
        <?php echo Form::number('order', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.list_order')]); ?>

        <span class="input-group-addon" id="basic-addon1">
          <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('help.list_order'), false); ?>"></i>
        </span>
      </div>
      <div class="help-block with-errors"></div>
    </div>
  </div>
</div>

<div class="form-group">
  <?php echo Form::label('categories[]', trans('app.form.categories')); ?>

  <?php echo Form::select('categories[]', $categories, null, ['class' => 'form-control select2-normal', 'multiple' => 'multiple']); ?>

  <div class="help-block with-errors"></div>
</div>

<p class="help-block">* <?php echo e(trans('app.form.required_fields'), false); ?></p>
<?php /**PATH C:\wamp64\www\hype-dappr\resources\views/admin/attribute/_form.blade.php ENDPATH**/ ?>