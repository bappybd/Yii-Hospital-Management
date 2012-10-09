<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('test_name')); ?>:</b>
	<?php echo CHtml::encode($data->test_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('category_id')); ?>:</b>
	<?php echo CHtml::encode($data->category_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('refvalue')); ?>:</b>
	<?php echo CHtml::encode($data->refvalue); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('test_amount')); ?>:</b>
	<?php echo CHtml::encode($data->test_amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('test_room')); ?>:</b>
	<?php echo CHtml::encode($data->test_room); ?>
	<br />


</div>