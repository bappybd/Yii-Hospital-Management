<?php
$this->breadcrumbs=array(
	'Customer Invoices'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List CustomerInvoice', 'url'=>array('index')),
	array('label'=>'Create CustomerInvoice', 'url'=>array('create')),
	array('label'=>'Update CustomerInvoice', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CustomerInvoice', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CustomerInvoice', 'url'=>array('admin')),
);
?>

<h1>View CustomerInvoice #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'patient_id',
		'name',
		'age',
		'sex',
		'mobile',
		'refby',
		'original_refby',
		'subtotal',
		'less_discount',
		'netpay',
		'recieved',
		'due',
		'create_date',
		'update_date',
	),
)); ?>
