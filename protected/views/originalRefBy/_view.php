<?php
/* @var $this OriginalRefByController */
/* @var $data OriginalRefBy */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deg')); ?>:</b>
	<?php echo CHtml::encode($data->deg); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hospital_name')); ?>:</b>
	<?php echo CHtml::encode($data->hospital_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mob')); ?>:</b>
	<?php echo CHtml::encode($data->mob); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pic')); ?>:</b>
	<?php echo CHtml::encode($data->pic); ?>
	<br />


</div>