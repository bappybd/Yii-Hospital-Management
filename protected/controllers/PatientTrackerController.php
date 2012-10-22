<?php

class PatientTrackerController extends Controller
{
   public function actionActivePatientTracker()
   {
      if($_POST){
         $patientId     = isset($_REQUEST['patientId'])  ? $_REQUEST['patientId']  : "";
         $testroomNo    = isset($_REQUEST['testroomNo']) ? $_REQUEST['testroomNo'] : "";
         $formAction    = isset($_REQUEST['formAction']) ? true : false;
         $trackerStatus = isset($_REQUEST['status'])     ? $_REQUEST['status'] : array();
         
         if(count($trackerStatus)){
            foreach($trackerStatus as $key=>$status){
               $patientTrackerModel = PatientTracker::model()->findByPk($key);
               if($patientTrackerModel !== null){
                  $patientTrackerModel->status = $status;
                  $patientTrackerModel->save(false);
               }
            }
         }
         
         Yii::app()->user->setFlash('success','Tests successfully saved');
         $this->redirect($this->createUrl('/PatientTracker/ActivePatientTracker'));
         Yii::app()->end();
      }
      
      $this->render('activePatientTracker');
   }

   public function actionPublishReport()
   {
      $this->render('PublishReport');
   }
   
   public function actionReportDetails(){
      if($_POST){
         echo "<pre>";print_r($_POST);echo "</pre>";
         $patientId     = isset($_REQUEST['patientId'])  ? trim($_REQUEST['patientId'])  : "";
         $trackerIds    = isset($_REQUEST['publishReports']) ? $_REQUEST['publishReports'] : "";
         
         $criteria = new CDbCriteria();
         if(count($trackerIds) && !empty($patientId)){
            echo $criteria->condition ="t.patient_id = '$patientId' AND patientTracker.id IN (".implode(",", $trackerIds).")";
         }
         
         
         
         $invoiceModel = CustomerInvoice::model()->with(array('orginalReferer', 
                                                           'patientTracker.test'))
                                              ->find($criteria);
         echo "<pre>";print_r($invoiceModel->attributes);echo "</pre>";exit;
         $this->render('reportDetails', array('model' => $invoiceModel));
      }
   }
   public function actionLoadPatientTests(){
      $patientId  = isset($_REQUEST['patientId'])  ? $_REQUEST['patientId']  : "";
      $testroomNo = isset($_REQUEST['testroomNo']) ? $_REQUEST['testroomNo'] : "";
      $actionType = isset($_REQUEST['type'])       ? $_REQUEST['type'] : "";
      $params     = array('patientId' => $patientId, 'testroomNo' => $testroomNo, 'actionType' => $actionType);
      
      
      //load the tests
      $condition = "t.patient_id='$patientId' AND test.test_room='$testroomNo'";
      $patientTrackers = PatientTracker::model()->with('test')->findAll($condition);
      
      $this->renderPartial('patientTests', array('patientTrackers' => $patientTrackers,
                                                 'params'=>$params));
   }
   // Uncomment the following methods and override them if needed
   /*
   public function filters()
   {
      // return the filter configuration for this controller, e.g.:
      return array(
         'inlineFilterName',
         array(
            'class'=>'path.to.FilterClass',
            'propertyName'=>'propertyValue',
         ),
      );
   }

   public function actions()
   {
      // return external action classes, e.g.:
      return array(
         'action1'=>'path.to.ActionClass',
         'action2'=>array(
            'class'=>'path.to.AnotherActionClass',
            'propertyName'=>'propertyValue',
         ),
      );
   }
   */
}