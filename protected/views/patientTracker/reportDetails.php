<?php
/* @var $this DiagonisticEntryFormController */
/* @var $model DiagonisticEntryForm */
/* @var $form CActiveForm */
?>

<style type="text/css">
   div.form label.invoiceMemoLabel{display: inline}
   div.form .fixedWidth{display: inline;width: 200px}
</style>

<?php
$this->breadcrumbs=array(
	'Customer Invoices'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Invoice Memo',
);   ?>
   
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
   'id'=>'InvoiceMemoForm',
   'enableAjaxValidation'=>false,
)); ?>
    
   <table>
      <tr>
         <td colspan=3 align="center"><h1>Invoice/Cash Memo</h1></td>
      </tr>
      <tr>
         <td colspan=2>
            <div class="fixedWidth"><?php echo $form->labelEx($model,'patient_id', array('class'=>'invoiceMemoLabel')); ?>:</div> 
            <?php echo $model->patient_id; ?>
            <?php //echo $form->textField($model,'patient_id'); ?>
         </td>
         <td>Date: <?php echo date('Y:m:d h:i:s') ?></td>
      </tr>
      <tr>
         <td colspan=3><?php echo $model->getAttributeLabel('name'); ?>: <?php echo $model->name; ?> <?php //echo $form->textField($model, 'name', array('style' => 'width: 315px')); ?></td>
      </tr>
      <tr>
         <td><?php echo $model->getAttributeLabel('age'); ?>: <?php echo $model->age; ?> <?php //echo $form->textField($model, 'age'); ?></td>
         <td><?php echo $model->getAttributeLabel('sex'); ?>: <?php echo $model->sex; ?> <?php //echo $form->textField($model, 'sex'); ?></td>
         <td><?php echo $model->getAttributeLabel('mobile'); ?>: <?php echo $model->mobile; ?> <?php //echo $form->textField($model, 'mobile'); ?></td>
      </tr>
      
      <tr>
         <td colspan=3>
            <?php echo $model->getAttributeLabel('original_refby'); ?>: 
            <?php 
               $referers = DiagnosticHelper::getReferer(); 
               $list       = CHtml::listData($referers, 'id', 'value');
            ?>
            <?php echo $form->dropDownList($model, 'original_refby', $list, array('prompt' => '[No referer]')); ?>   
            
            </td>
      </tr>
      
      <tr>
         <td colspan=3>
            <?php echo $model->getAttributeLabel('refby'); ?>: 
            <?php
               
            $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                          'model'=> $model,
                          'attribute'=>'refby',
                          'value'=>$model->refby,
                          'source'=>$this->createUrl('/lookUp/getReferer'),// <- path to controller which returns dynamic data
                          // additional javascript options for the autocomplete plugin
                          'options'=>array(
                             'minLength'=>'1', // min chars to start search
                             'select'=>'js:function(event, ui) { 
                                $("#InvoiceMemoForm_refby").val(ui.item.id);
                              }'
                          ),
                          'htmlOptions'=>array(
                             'id'=>'refby',
                             'rel'=>'val',
                             'style' => 'width: 315px'
                          ),
                  ));
            ?>
            </td>
      </tr>
      
      <tr>
         <td colspan=3 align="center">&nbsp;</td>
      </tr>
   </table>
   
   <!-- Patient Tracker list table -->
   <table id="calculateInvoice">
      <thead>
         <tr>
            <th width="15%">SL NO.</th>
            <th width="70%">Test/Investigation Name</th>
            <th width="15%">Amount(tk)</th>
         </tr>
      </thead>
      <tbody>
         <?php if(count($invoiceModel->patientTracker)){ ?>
            <?php $subTotal = 0 ?>
            <?php foreach($invoiceModel->patientTracker as $patientTracker){ ?>
               <tr>
                  <td><?php echo $patientTracker->id ?></td>
                  <td><?php echo $patientTracker->test->test_name ?></td>
                  <td><?php echo $patientTracker->test->test_amount ?></td>
                  <?php $subTotal = $subTotal + $patientTracker->test->test_amount ?>
               </tr> 
            <?php } ?>
            <?php
               $lessDiscount  = $model->less_discount;
               $netPayable    = $subTotal - $lessDiscount;//$model->netpay;
               $amountRecieve = $model->recieved;
               $dueAmount     = $netPayable - $amountRecieve;
            ?>
            <tr>
               <td></td>
               <td style="text-align: center;"><strong>Sub Total</strong></td>
               <td>
                  <span id="subTotalSpan"><?php echo $subTotal ?></span>
                  <?php echo $form->hiddenField($model, 'subtotal', array('value' => $subTotal, 
                                                                        'style' => 'width: 50px;')); ?>
               </td>
            </tr>
            <tr>
               <td></td>
               <td style="text-align: center;"><strong>Less Discount</strong></td>
               <td>
                  <?php echo $form->textField($model, 'less_discount', array('value' => $lessDiscount,
                                                                             'id'    => 'lessDiscountSpan',
                                                                             'style' => 'width: 50px;')); ?>
               </td>
            </tr>
            <tr>
               <td></td>
               <td style="text-align: center;"><strong>Net Payable</strong></td>
               <td>
                  <span id="netPayableSpan"><?php echo $netPayable ?></span>
                  <?php echo $form->hiddenField($model, 'netpay', array('value' => $netPayable, 
                                                                      'style' => 'width: 50px;')); ?>
               </td>
            </tr>
            <tr>
               <td></td>
               <td style="text-align: center;"><strong>Amount Receive</strong></td>
               <td>
                  <?php echo $form->textField($model, 'recieved', array('value' => $amountRecieve,
                                                                   'id'    => 'amountRecieveSpan',
                                                                   'style' => 'width: 50px;')); ?>
               </td>
            </tr>
            <tr>
               <td></td>
               <td style="text-align: center;"><strong>Due Amount</strong></td>
               <td>
                  <span id="dueAmountSpan"><?php echo $dueAmount ?></span>
                  <?php echo $form->hiddenField($model, 'due', array('value' => $dueAmount, 
                                                                   'style' => 'width: 50px;')); ?>
               </td>
            </tr>
         <?php } ?>
      </tbody>
   </table>
   <!-- END -->
   
   <div class="row buttons">
      <?php echo CHtml::submitButton('Update and Print'); ?>
   </div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">
   var lastTestCloneNo = 1;
   var cache = {};
   $("#addNewTestButton").live('click',function(){
      var testCloneDiv = $("#cloneTest").clone();
      var newTestCloneNo = lastTestCloneNo + 1;
      
      var newLabel   = $(testCloneDiv).children('label');
      var newInput   = $(testCloneDiv).children('input.testAutoComplete');
      var newInputId = $(testCloneDiv).children('input.testHiddenField');
      
      newInput.val('');
      newInput.attr('id', 'test_'+newTestCloneNo);
      newInput.attr('testId', newTestCloneNo);
      newLabel.html('Test Name '+newTestCloneNo);
            
      newInput.catcomplete({
         delay: 0,
         /*source: data*/
         source: function( request, response ) {
             var term = request.term;
             if ( term in cache ) {
                 response( cache[ term ] );
                 return;
             }

             $.getJSON( "<?php echo $this->createUrl('/lookUp/getTests')?>", request, function( data, status, xhr ) {
                 cache[ term ] = data;
                 response( data );
             });
         }
     });
      
      $("#testCloneSpan").append(testCloneDiv);
      lastTestCloneNo = newTestCloneNo;
   });
   
   //autocalculate total
   var subTotal = parseInt($("#subTotalSpan").html());

   $("#calculateInvoice input#lessDiscountSpan").bind("blur", function(){
      var lessDiscount = $(this).val();
      var netPayable =  (subTotal - lessDiscount);
      
      $("#netPayableSpan").html(netPayable);
      $("#InvoiceMemoForm_netpay").val(netPayable);
      
      $("#calculateInvoice input#amountRecieveSpan").trigger("blur");
   });
   
   $("#calculateInvoice input#amountRecieveSpan").bind("blur", function(){
      var amountRecieve = $(this).val();
      var netPayable    =  parseInt($("#netPayableSpan").html());
      
      var due = (netPayable - amountRecieve);
      $("#dueAmountSpan").html(due);
      $("#InvoiceMemoForm_due").val(due);
   })
</script>