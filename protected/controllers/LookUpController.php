<?php

class LookUpController extends Controller
{
	public function actionGetTests()
	{
      $categories           = array();
      
      $category             = array();
      $category['id']       = 2;
      $category['label']    = "anders";
      $category['category'] = "Blood";
      
      $categories[] = $category;
      
      /*$string = '[
         { label: "anders", category: "" },
         { label: "andreas", category: "" },
         { label: "antal", category: "" },
         { label: "annhhx10", category: "Products" },
         { label: "annk K12", category: "Products" },
         { label: "annttop C13", category: "Products" },
         { label: "anders andersson", category: "People" },
         { label: "andreas andersson", category: "People" },
         { label: "andreas johnson", category: "People" }
     ];';*/
     
     
     echo json_encode($categories);
      
		
	}

	
}