<?php
$this->breadcrumbs=array(
   'Customer Invoices'=>array('index'),
   'Manage',
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

<h1>Manage Customer Invoices</h1>

<p>
List of Customer invoices.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
   'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
   'id'=>'customer-invoice-grid',
   'dataProvider'=>$model->search(),
   'filter'=>$model,
   'columns'=>array(
      'id',
      'patient_id',
      'name',
      'age',
      'sex',
      'mobile',
      'subtotal',
      'due',
      array(
         'name'  => 'total_tests',
         'type'  => 'raw',
         'value' => 'CHtml::link($data->total_tests, Yii::app()->createUrl("/customerInvoice/InvoiceTestsList", array(\'patient_id\' => $data[\'patient_id\'])), array(\'title\' => \'View Tests\'))',
      ),
      /*
      'refby',
      'original_refby',
      'subtotal',
      'less_discount',
      'netpay',
      'recieved',
      'due',
      'create_date',
      'update_date',
      */
      array(
         'class'=>'CButtonColumn',
      ),
   ),
)); ?>