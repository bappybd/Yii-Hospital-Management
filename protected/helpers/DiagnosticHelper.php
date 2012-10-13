<?php
class DiagnosticHelper extends CApplicationComponent{
   public function getMaxPatientId(){
      $model            = new CustomerInvoice;
      $criteria         = new CDbCriteria;
      $criteria->select = 'max(id) AS id';
      $row              = $model->model()->find($criteria);
      $maxColumn        = (int) $row['id'];
      
      return $maxColumn;
   }

   public function generatePatientId($params = array()){
      $patiendId = "";
      
      $maxId = self::getMaxPatientId();
      if($maxId == 0){
         $maxId = 1;
      }else{
         $maxId = $maxId + 1;
      }
      
      $patiendId = "PATIENT_".$maxId;
      
      return $patiendId;
   }
   
   public function removeDiagnosticTests($patientId, $customerInvoiceId = 0){
      $patientId = trim($patientId);
      
      if(!empty($patientId) ){
         $condition = " patient_id = '$patientId' ";
         PatientTracker::model()->deleteAll($condition);
      }
      
      return true;
   }
}
