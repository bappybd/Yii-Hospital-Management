<?php
$this->breadcrumbs=array(
	'Test Categories',
);

$this->menu=array(
	array('label'=>'Create TestCategory', 'url'=>array('create')),
	array('label'=>'Manage TestCategory', 'url'=>array('admin')),
);
?>

<h1>Test Categories</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
