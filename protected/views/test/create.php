<?php
$this->breadcrumbs=array(
	'Tests'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Test', 'url'=>array('index')),
	array('label'=>'Manage Test', 'url'=>array('admin')),
);
?>

<h1>Create Test</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>