<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'patient_id'); ?>
		<?php echo $form->textField($model,'patient_id',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'age'); ?>
		<?php echo $form->textField($model,'age'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sex'); ?>
		<?php echo $form->textField($model,'sex',array('size'=>6,'maxlength'=>6)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mobile'); ?>
		<?php echo $form->textField($model,'mobile',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'refby'); ?>
		<?php echo $form->textField($model,'refby'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'original_refby'); ?>
		<?php echo $form->textField($model,'original_refby'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'subtotal'); ?>
		<?php echo $form->textField($model,'subtotal'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'less_discount'); ?>
		<?php echo $form->textField($model,'less_discount'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'netpay'); ?>
		<?php echo $form->textField($model,'netpay'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'recieved'); ?>
		<?php echo $form->textField($model,'recieved'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'due'); ?>
		<?php echo $form->textField($model,'due'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'create_date'); ?>
		<?php echo $form->textField($model,'create_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'update_date'); ?>
		<?php echo $form->textField($model,'update_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->