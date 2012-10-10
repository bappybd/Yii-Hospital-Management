<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'test-category-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'category_name'); ?>
		<?php echo $form->textField($model,'category_name',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'category_name'); ?>
	</div>
   
	<div class="row">
		<?php echo $form->labelEx($model,'parent_id'); ?>
      <?php 
         $categories = TestHelper::getTestCategories(true, $model->id); 
         $list       = CHtml::listData($categories, 'id', 'category_name');
      ?>
		<?php echo $form->dropDownList($model, 'parent_id', $list, array('prompt' => '[No parent]')); ?>
		<?php echo $form->error($model,'parent_id'); ?>
	</div>   
    
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->