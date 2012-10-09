<?php
$this->breadcrumbs=array(
	'Customer Invoices'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CustomerInvoice', 'url'=>array('index')),
	array('label'=>'Manage CustomerInvoice', 'url'=>array('admin')),
);
?>

<h1>Create CustomerInvoice</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>