<?php if(count($patientTrackers)){ ?>
   <form name="activePatientTrackerForm" method="post" action="<?php echo $this->createUrl('/PatientTracker/ActivePatientTracker') ?>">
      <?php echo CHtml::hiddenField('patientId', $params['patientId']); ?>
      <?php echo CHtml::hiddenField('testroomNo', $params['testroomNo']); ?>
      <?php echo CHtml::hiddenField('formAction', 'save'); ?>
      
      <table class="">
         <thead>
            <th>SL</th>
            <th>Investigation Name</th>
            <th>test done</th>
         </thead>
         <tbody>
         <?php foreach($patientTrackers as $tracker){ ?>
            <tr>
               <td><?php echo $tracker->test->id ?></td>
               <td><?php echo $tracker->test->test_name ?></td>
               <td><?php echo CHtml::CheckBox('status['.$tracker->id.']', (int) $tracker->status, array( 'value'=>'1')); ?></td>
            </tr>
         <?php } ?>
         </tbody>
      </table>
      <div class="row">
         <?php echo CHtml::button('Save Changes', array('type'=> 'submit')) ?>
      </div>
   </form>
<?php }else{ ?>
   NO tests found.
<?php } ?>