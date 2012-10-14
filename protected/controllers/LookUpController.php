<?php

class LookUpController extends Controller
{
   public function actionGetTests() {
      $list           = array();
      $term           = isset($_REQUEST['term']) ? trim($_REQUEST['term']) : "";
      $term           = addcslashes($term, '%_'); // escape LIKE's special characters
   
      $criteria = new CDbCriteria();
      $params   = array();
      if(!empty($term)){
        $criteria->condition =   "t.test_name LIKE :term" ;
        $params[':term'] = "%$term%";
      }
      
      $criteria->params = $params;
      $criteria->offset = 0;
      $criteria->limit  = 50;
      $criteria->order  = "test_name ASC";
      $tests            = Test::model()->with('testCategory')->findAll($criteria);

      foreach($tests as $test){
         $item             = array();
         $item['id']       = $test->id;
         $item['label']    = $test->test_name;
         $item['category'] = isset($test->testCategory) ? $test->testCategory->category_name : "";
         $item['roomno']   = $test->test_room;
         
         $list[] = $item;
      }
      
      echo json_encode($list);
      Yii::app()->end();
   }
   
   
   public function actionGetReferer() {
      $list           = array();
      $term           = isset($_REQUEST['term']) ? trim($_REQUEST['term']) : "";
      $term           = addcslashes($term, '%_'); // escape LIKE's special characters
   
      $criteria = new CDbCriteria();
      $params   = array();
      if(!empty($term)){
        $criteria->condition =   "t.name LIKE :term" ;
        $params[':term'] = "%$term%";
      }
      
      $criteria->params = $params;
      $criteria->offset = 0;
      $criteria->limit  = 50;
      $criteria->order  = "name ASC";
      $referers         = OriginalRefBy::model()->findAll($criteria);

      foreach($referers as $test){
         $item             = array();
         $item['id']       = $test->id;
         $item['value']    = $test->name;
         
         $list[] = $item;
      }
      
      echo json_encode($list);
      Yii::app()->end();
   }
   
}