<?php
/* @var $this PatientTrackerController */

$this->breadcrumbs=array(
	'Patient Tracker'=>array('/patientTracker'),
	'Report Publish Tracker',
);
?>
<h1>Report Publish Tracker</h1>

<div class="form">
  <div class="row">
     <?php echo CHtml::label('Enter Patient ID:', 'EnterPatientId'); ?>
     <?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(                    
                       'name'=>'refby',
                       'source'=>$this->createUrl('/lookUp/getPatientIDs'),// <- path to controller which returns dynamic data
                       // additional javascript options for the autocomplete plugin
                       'options'=>array(
                          'minLength'=>'1', // min chars to start search
                          'select'=>'js:function(event, ui) { 
                             $("#DiagonisticEntryForm_refby").val(ui.item.id);
                           }'
                       ),
                       'htmlOptions'=>array(
                          'id'=>'patientID',
                          'rel'=>'val',
                          'style' => 'width: 315px'
                       ),
               ));
         ?>
   </div>
   <div class="row">
      <?php echo CHtml::label('Enter Test Room No:', 'RoomNo'); ?>
      <?php echo CHtml::textField('testroom_no','', array('id' => 'testroomNO')) ?>
   </div>
   <div class="row">      
      <?php echo CHtml::button('Load Tests', array('onClick'=> "loadTests()")) ?>
   </div>
   
   <div id="testSpan"></div>
</div>

<script type="text/javascript">
function loadTests(){
   var patientID = $("#patientID").val();
   var roomNo    = $("#testroomNO").val();
   
   if( (patientID == "") && (roomNo == "") ){
      alert('Please select both PatientId and RoomNo');
      return false;
   }
   
   //$("#testSpan").html('<img src="'+siteUrl+'/images/ajax-loader.gif" alt="Loading Image" /> Loading...');
   $("#testSpan").html('Loading...');
   
   var ajaxUrl = "/PatientTracker/loadPatientTests";
   $.ajax({
     url: siteUrl+ajaxUrl,
     data: {
        patientId  : patientID,
        testroomNo : roomNo,
     },
     success: function(response){
        $("#testSpan").html(response);
     }
   });
}
</script>