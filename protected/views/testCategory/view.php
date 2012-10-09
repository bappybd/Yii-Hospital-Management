<?php
$this->breadcrumbs=array(
	'Test Categories'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TestCategory', 'url'=>array('index')),
	array('label'=>'Create TestCategory', 'url'=>array('create')),
	array('label'=>'Update TestCategory', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TestCategory', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TestCategory', 'url'=>array('admin')),
);
?>

<h1>View TestCategory #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'category_name',
		'parent_id',
	),
)); ?>
