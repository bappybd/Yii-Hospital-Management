<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'test-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'test_name'); ?>
		<?php echo $form->textField($model,'test_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'test_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'category_id'); ?>
		<?php echo $form->textField($model,'category_id'); ?>
		<?php echo $form->error($model,'category_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'refvalue'); ?>
		<?php echo $form->textField($model,'refvalue'); ?>
		<?php echo $form->error($model,'refvalue'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'test_amount'); ?>
		<?php echo $form->textField($model,'test_amount'); ?>
		<?php echo $form->error($model,'test_amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'test_room'); ?>
		<?php echo $form->textField($model,'test_room',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'test_room'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->