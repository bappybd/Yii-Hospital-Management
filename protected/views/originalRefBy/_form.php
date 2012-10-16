<?php
/* @var $this OriginalRefByController */
/* @var $model OriginalRefBy */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'original-ref-by-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'deg'); ?>
		<?php echo $form->textField($model,'deg',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'deg'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hospital_name'); ?>
		<?php echo $form->textField($model,'hospital_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'hospital_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mob'); ?>
		<?php echo $form->textField($model,'mob',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'mob'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pic'); ?>
		<?php echo $form->textField($model,'pic',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'pic'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->