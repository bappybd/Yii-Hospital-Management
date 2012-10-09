<?php
$this->breadcrumbs=array(
	'Customer Invoices',
);

$this->menu=array(
	array('label'=>'Create CustomerInvoice', 'url'=>array('create')),
	array('label'=>'Manage CustomerInvoice', 'url'=>array('admin')),
);
?>

<h1>Customer Invoices</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
