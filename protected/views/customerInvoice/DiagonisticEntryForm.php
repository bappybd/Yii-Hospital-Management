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
 </script>
 <script>
 $(function() {
     var data = [
         { label: "anders", category: "" },
         { label: "andreas", category: "" },
         { label: "antal", category: "" },
         { label: "annhhx10", category: "Products" },
         { label: "annk K12", category: "Products" },
         { label: "annttop C13", category: "Products" },
         { label: "anders andersson", category: "People" },
         { label: "andreas andersson", category: "People" },
         { label: "andreas johnson", category: "People" }
     ];
     
     var cache = {};
     $( "#test_1" ).catcomplete({
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
            console.log(ui);
            $("#testId_"+id).val(ui.item.id);
         }
     });
 });
 </script>


<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
   'id'=>'diagonistic-entry-form-DiagonisticEntryForm-form',
   'enableAjaxValidation'=>false,
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
   
   
   <span id="testCloneSpan">
      <div class="row" id="cloneTest" testNo="1">
         <?php echo $form->labelEx($model,'tests'); ?>
         <?php echo $form->textField($model,'tests[]', array('id' => 'test_1', 'class' => 'testAutoComplete', 'testId' => '1')); ?>
         <?php echo $form->hiddenField($model,'testsIds[]', array('id' => 'testId_1', 'class' => 'testHiddenField')); ?>
         <?php echo $form->error($model,'tests'); ?>
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
</script>