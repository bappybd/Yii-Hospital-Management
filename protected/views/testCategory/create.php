<?php
$this->breadcrumbs=array(
	'Test Categories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TestCategory', 'url'=>array('index')),
	array('label'=>'Manage TestCategory', 'url'=>array('admin')),
);
?>

<h1>Create TestCategory</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>