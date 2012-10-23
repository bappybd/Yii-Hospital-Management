<?php
/* @var $this DiagonisticEntryFormController */
/* @var $model DiagonisticEntryForm */
/* @var $form CActiveForm */
?>

<?php Yii::app()->clientScript->registerCoreScript('jquery.ui'); ?>
<?php Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl.'/js/jquery-ui/css/ui-lightness/jquery-ui-1.9.0.custom.min.css'); ?>

<style>
.ui-autocomplete-category {
  font-weight: bold;
  padding: .2em .4em;
  margin: .8em 0 .2em;
  line-height: 1.5;
}
</style>

<script> 

 </script>


<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
   'id'=>'diagonistic-entry-form-DiagonisticEntryForm-form',
   'enableAjaxValidation'=>false,
   'htmlOptions'=>array('onSubmit'=>'return validateForm()')
)); ?>
    <h1>Diagonistic Entry</h1>
   <p class="note">Fields with <span class="required">*</span> are required.</p>

   <?php echo $form->errorSummary($model); ?>

   <?php if((int) $model->id > 0){ ?>
   <div class="row">
      <?php echo $form->labelEx($model,'patient_id'); ?>
      <?php echo $form->textField($model,'patient_id'); ?>
      <?php echo $form->error($model,'patient_id'); ?>
   </div>
   <?php } ?>

   <div class="row">
      <?php echo $form->labelEx($model,'name'); ?>
      <?php echo $form->textField($model,'name'); ?>
      <?php echo $form->error($model,'name'); ?>
   </div>

   <div class="row">
      <?php echo $form->labelEx($model,'age'); ?>
      <?php echo $form->textField($model,'age'); ?>
      <?php echo $form->error($model,'age'); ?>
   </div>

   <div class="row">
      <?php echo $form->labelEx($model,'sex'); ?>
      <?php echo $form->dropDownList($model,'sex', array('Male' => 'Male', 'Female' => 'Female'), array('prompt'=>'Select')); ?>
      <?php echo $form->error($model,'sex'); ?>
   </div>
   
   <div class="row">
      <?php echo $form->labelEx($model,'mobile'); ?>
      <?php echo $form->textField($model,'mobile'); ?>
      <?php echo $form->error($model,'mobile'); ?>
   </div>
   
   <div class="row">
      <?php echo $form->labelEx($model,'original_refby_name'); ?>
      <?php 
         $referers = DiagnosticHelper::getReferer(); 
         $list       = CHtml::listData($referers, 'id', 'value');
      ?>
      <?php echo $form->dropDownList($model, 'original_refby', $list, array('prompt' => '[No referer]')); ?> 
      <?php echo $form->error($model,'original_refby'); ?>
   </div>
   
   <div class="row">
      <?php echo $form->labelEx($model,'refby'); ?>
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
                          $("#DiagonisticEntryForm_refby").val(ui.item.id);
                        }'
                    ),
                    'htmlOptions'=>array(
                       'id'=>'refby',
                       'rel'=>'val',
                       'style' => 'width: 315px'
                    ),
            ));
      ?>
      <?php //echo $form->error($model,'refby'); ?>
   </div>
   
   
   
   <span id="testCloneSpan">
      <div class="row" id="cloneTest" testNo="1">
         <?php echo $form->labelEx($model,'tests'); ?>
         <?php echo $form->textField($model,'tests[]', array('id' => 'test_1', 'class' => 'testAutoComplete', 'testId' => '1')); ?>
         <?php echo $form->textField($model,'testsIds[]', array('id' => 'testId_1', 'class' => 'testHiddenField')); ?>
         &nbsp;&nbsp;<strong>Room NO:</strong> <span id="roomNoSpan_1" class="testRoomSpan"></span>
         &nbsp;&nbsp;<a href="javascript: void(0)" onClick="removeTest(this)" id="roomRemoveButton_1" class="testRoomRemoveSpan" style="display:none">Remove</a>
      </div>
   </span>
   
   <div class="row addNew">
      <?php echo CHtml::Button('Add another test', array('id' => 'addNewTestButton')); ?>
   </div>
   
   <div class="row buttons">
      <?php echo CHtml::submitButton('Submit'); ?>
   </div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">
   var lastTestCloneNo = 1;
   var cache = {};
   
   $.widget( "custom.catcomplete", $.ui.autocomplete, {
        _renderMenu: function( ul, items ) {
            var that = this,
                currentCategory = "";
            $.each( items, function( index, item ) {
                if ( item.category != currentCategory ) {
                    ul.append( "<li class='ui-autocomplete-category'>" + item.category + "</li>" );
                    currentCategory = item.category;
                }
                that._renderItemData( ul, item );
            });
        }
    });

   function bindCatComplete(thisObject)
   {
      $(thisObject).catcomplete({
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
         },
         select: function( event, ui ) {
            var id = $(this).attr('testId');
            $("#testId_"+id).val(ui.item.id);
            $(this).siblings('span.testRoomSpan').html(ui.item.roomno);
         }
     });
   }

    $(function() {
        bindCatComplete($("#test_1"));
    });
   
   
   $("#addNewTestButton").live('click',function(){
      var testCloneDiv = $("#cloneTest").clone();
      var newTestCloneNo = lastTestCloneNo + 1;
      
      var newLabel         = $(testCloneDiv).children('label');
      var newInput         = $(testCloneDiv).children('input.testAutoComplete');
      var newInputId       = $(testCloneDiv).children('input.testHiddenField');
      var newRoomSpan      = $(testCloneDiv).children('span.testRoomSpan');
      var newRoomDeleteBtn = $(testCloneDiv).children('a.testRoomRemoveSpan');
      newRoomSpan.html('');
      newRoomSpan.attr('id', 'roomNoSpan_'+newTestCloneNo);
      
      //main fields
      newInput.val('');
      newInput.attr('id', 'test_'+newTestCloneNo);
      newInput.attr('testId', newTestCloneNo);
      newLabel.html('Test Name '+newTestCloneNo);
      //$("#test_"+newTestCloneNo).catcomplete(catcompleteSettings);
     
      //hidden fields
      newInputId.val('');
      newInputId.attr('id', 'testId_'+newTestCloneNo);

      testCloneDiv.attr('testNo', newTestCloneNo);
      newRoomDeleteBtn.show();
      
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
      
      //bind the autocomplete test
      bindCatComplete($("#test_"+newTestCloneNo));
   });
   
   function removeTest(testObject)
   {  
      var parent = $(testObject).parent();
      
      if(parent.attr('testNo')!=1)
      {   
         parent.remove();
      }
   }
   
   function validateForm()
   {
      var hasTest = false;
      
      $(".testHiddenField").each(function(){
         var testId = $(this).val();console.log($(this));
         if(testId.length > 0)
         {
            hasTest = true;
            return true;
         }
         else
         {
            alert('Please add atleast one Test');
            $(".testAutoComplete:first").focus();
         }
      });

      return false; 
   }   
</script>