<?php
/* @var $this OriginalRefByController */
/* @var $model OriginalRefBy */

$this->breadcrumbs=array(
	'Original Ref Bies'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List OriginalRefBy', 'url'=>array('index')),
	array('label'=>'Manage OriginalRefBy', 'url'=>array('admin')),
);
?>

<h1>Create OriginalRefBy</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>