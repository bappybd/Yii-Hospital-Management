<?php
$this->breadcrumbs=array(
   'Customer Invoices'=>array('admin'),
   'Tests Lists',
);

$this->menu=array(
   array('label'=>'List CustomerInvoice', 'url'=>array('index')),
   array('label'=>'Create CustomerInvoice', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
   $('.search-form').toggle();
   return false;
});
$('.search-form form').submit(function(){
   $.fn.yiiGridView.update('customer-invoice-grid', {
      data: $(this).serialize()
   });
   return false;
});
");
?>

<h1>Invoices Tests Lists</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
   'id'=>'customer-invoice-grid',
   'dataProvider'=>$model->search(),
   'filter'=>$model,
   'columns'=>array(
      'id',
      'patient_id',
      'test_id',
      'test.test_name',
      'test.testCategory.category_name',
      'test.test_room',
      /*array(
         'class'=>'CButtonColumn',
      ),*/
   ),
)); ?>