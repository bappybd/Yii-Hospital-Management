<?php
$this->breadcrumbs=array(
	'Test Categories'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TestCategory', 'url'=>array('index')),
	array('label'=>'Create TestCategory', 'url'=>array('create')),
	array('label'=>'View TestCategory', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TestCategory', 'url'=>array('admin')),
);
?>

<h1>Update TestCategory <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>