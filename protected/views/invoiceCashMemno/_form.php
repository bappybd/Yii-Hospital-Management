<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'customer-invoice-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'patient_id'); ?>
		<?php echo $form->textField($model,'patient_id',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'patient_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'age'); ?>
		<?php echo $form->textField($model,'age'); ?>
		<?php echo $form->error($model,'age'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sex'); ?>
		<?php echo $form->textField($model,'sex',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'sex'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mobile'); ?>
		<?php echo $form->textField($model,'mobile',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'mobile'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'refby'); ?>
		<?php echo $form->textField($model,'refby'); ?>
		<?php echo $form->error($model,'refby'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'original_refby'); ?>
		<?php echo $form->textField($model,'original_refby'); ?>
		<?php echo $form->error($model,'original_refby'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'subtotal'); ?>
		<?php echo $form->textField($model,'subtotal'); ?>
		<?php echo $form->error($model,'subtotal'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'less_discount'); ?>
		<?php echo $form->textField($model,'less_discount'); ?>
		<?php echo $form->error($model,'less_discount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'netpay'); ?>
		<?php echo $form->textField($model,'netpay'); ?>
		<?php echo $form->error($model,'netpay'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'recieved'); ?>
		<?php echo $form->textField($model,'recieved'); ?>
		<?php echo $form->error($model,'recieved'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'due'); ?>
		<?php echo $form->textField($model,'due'); ?>
		<?php echo $form->error($model,'due'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'create_date'); ?>
		<?php echo $form->textField($model,'create_date'); ?>
		<?php echo $form->error($model,'create_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'update_date'); ?>
		<?php echo $form->textField($model,'update_date'); ?>
		<?php echo $form->error($model,'update_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->