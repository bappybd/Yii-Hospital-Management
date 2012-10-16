<?php
/* @var $this OriginalRefByController */
/* @var $model OriginalRefBy */

$this->breadcrumbs=array(
	'Original Ref Bies'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List OriginalRefBy', 'url'=>array('index')),
	array('label'=>'Create OriginalRefBy', 'url'=>array('create')),
	array('label'=>'View OriginalRefBy', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage OriginalRefBy', 'url'=>array('admin')),
);
?>

<h1>Update OriginalRefBy <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>