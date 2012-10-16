<?php
/* @var $this OriginalRefByController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Original Ref Bies',
);

$this->menu=array(
	array('label'=>'Create OriginalRefBy', 'url'=>array('create')),
	array('label'=>'Manage OriginalRefBy', 'url'=>array('admin')),
);
?>

<h1>Original Ref Bies</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
