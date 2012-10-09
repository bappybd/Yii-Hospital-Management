<?php
/* @var $this DiagonisticEntryFormController */
/* @var $model DiagonisticEntryForm */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'diagonistic-entry-form-DiagonisticEntryForm-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name'); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'age'); ?>
		<?php echo $form->textField($model,'age'); ?>
		<?php echo $form->error($model,'age'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sex'); ?>
		<?php echo $form->textField($model,'sex'); ?>
		<?php echo $form->error($model,'sex'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'patient_id'); ?>
		<?php echo $form->textField($model,'patient_id'); ?>
		<?php echo $form->error($model,'patient_id'); ?>
	</div>
   <span id="testCloneSpan">
      <div class="row" id="cloneTest" testNo="1">
	   	<?php echo $form->labelEx($model,'tests'); ?>
	   	<?php echo $form->textField($model,'tests[]'); ?>
	   	<?php echo $form->error($model,'tests'); ?>
	   </div>
   </span>
   
   <div class="row addNew">
      <?php echo CHtml::Button('Add Test', array('id' => 'addNewTestButton')); ?>
   </div>
   
	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">
   var lastTestCloneNo = 1;
   $("#addNewTestButton").live('click',function(){
      var testCloneDiv = $("#cloneTest").clone();
      $("#testCloneSpan").append(testCloneDiv);
   });
</script>