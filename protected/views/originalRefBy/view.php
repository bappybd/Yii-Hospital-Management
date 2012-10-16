<?php
/* @var $this OriginalRefByController */
/* @var $model OriginalRefBy */

$this->breadcrumbs=array(
	'Original Ref Bies'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List OriginalRefBy', 'url'=>array('index')),
	array('label'=>'Create OriginalRefBy', 'url'=>array('create')),
	array('label'=>'Update OriginalRefBy', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete OriginalRefBy', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage OriginalRefBy', 'url'=>array('admin')),
);
?>

<h1>View OriginalRefBy #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'deg',
		'hospital_name',
		'mob',
		'email',
		'pic',
	),
)); ?>
