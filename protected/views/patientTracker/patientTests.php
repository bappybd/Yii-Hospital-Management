<?php if(count($patientTrackers)){ ?>
   
   <?php 
   if($params['actionType'] == 'update'){
      $formActionUrl = $this->createUrl('/PatientTracker/ActivePatientTracker');   
   }else{
      $formActionUrl = $this->createUrl('/PatientTracker/reportDetails');
   }
   ?> 
   <form name="activePatientTrackerForm" method="post" action="<?php echo $formActionUrl ?>">
      <?php echo CHtml::hiddenField('patientId', $params['patientId']); ?>
      <?php echo CHtml::hiddenField('testroomNo', $params['testroomNo']); ?>
      <?php echo CHtml::hiddenField('formAction', 'save'); ?>
      
      <table class="">
         <thead>
            <th>SL</th>
            <th>Investigation Name</th>
            <?php if($params['actionType'] == 'update'){ ?>
            <th>test done</th>
            <?php }else{ ?>
            <th>Report Publish</th>
            <?php } ?>
         </thead>
         <tbody>
         <?php foreach($patientTrackers as $tracker){ ?>
            <tr>
               <td><?php echo $tracker->id ?></td>
               <td><?php echo $tracker->test->test_name ?></td>
               <?php if($params['actionType'] == 'update'){ ?>
               <td><?php echo CHtml::CheckBox('status['.$tracker->id.']', (int) $tracker->status, array( 'value'=>'1')); ?></td>
               <?php }else{ ?>
               <td><?php echo CHtml::CheckBox('publishReports[]', $tracker->id, array( 'value'=>$tracker->id)); ?></td>
               <?php } ?>
            </tr>
         <?php } ?>
         </tbody>
      </table>
      <div class="row">
         <?php if($params['actionType'] == 'update'){ ?>
         <?php echo CHtml::button('Save Changes', array('type'=> 'submit')) ?>
         <?php }else{ ?>
         <?php echo CHtml::button('Publish', array('type'=> 'submit')) ?>
         <?php } ?>
         
      </div>
   </form>
<?php }else{ ?>
   NO tests found.
<?php } ?>