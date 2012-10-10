<?php
class TestHelper extends CApplicationComponent{
   public function getTestCategories($parent = false, $catId = null){
      $categories = array();
      
      //condition
      $criteria = new CDbCriteria();
      if($parent)
      {
         
         $criteria->condition = 'parent_id = 0';
         if((int) $catId)
         {
            $criteria->condition .= ' AND id != '.(int) $catId;
         }
      }
      $categoriesArrayModels = TestCategory::model()->findAll($criteria);
      
      
      if(count($categoriesArrayModels))
      {
         foreach($categoriesArrayModels as $key => $category){
            $data = $category->attributes;
            $categories[] = $data;
            unset($data);
         }
      }

      return $categories;
   }
}
