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
		<?php echo $form->label($model,'test_name'); ?>
		<?php echo $form->textField($model,'test_name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'category_id'); ?>
		<?php echo $form->textField($model,'category_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'refvalue'); ?>
		<?php echo $form->textField($model,'refvalue'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'test_amount'); ?>
		<?php echo $form->textField($model,'test_amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'test_room'); ?>
		<?php echo $form->textField($model,'test_room',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->