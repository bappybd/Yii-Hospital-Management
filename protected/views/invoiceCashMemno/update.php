<?php
$this->breadcrumbs=array(
	'Customer Invoices'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CustomerInvoice', 'url'=>array('index')),
	array('label'=>'Create CustomerInvoice', 'url'=>array('create')),
	array('label'=>'View CustomerInvoice', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CustomerInvoice', 'url'=>array('admin')),
);
?>

<h1>Update CustomerInvoice <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>