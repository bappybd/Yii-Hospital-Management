<?php

class CustomerInvoiceController extends Controller
{
   const DIAGNOSTIC_FORM_CREATE_SUCCESS_MSG = 'Diagnostic form created successfully.';
   const INVALID_INVOICE_MEMO_MSG           = 'Invalid invoice memo.';

	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','DiagonisticEntryForm', 'InvoiceMemo'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
   
   public function actionDiagonisticEntryForm()
   {
      $isNewRecrod          = true;
      $id                   = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;
      $model                = new DiagonisticEntryForm;
      $customerInvoiceModel = new CustomerInvoice();
      
      try{
         if($id){
            $customerInvoiceModel = CustomerInvoice::model()->findByPk($id);
            if($customerInvoiceModel !== null){
               $model->attributes = $customerInvoiceModel->attributes;
               $isNewRecrod       = false;
               
            }
         }
         
         // uncomment the following code to enable ajax-based validation
         /*
         if(isset($_POST['ajax']) && $_POST['ajax']==='diagonistic-entry-form-DiagonisticEntryForm-form')
         {
             echo CActiveForm::validate($model);
             Yii::app()->end();
         }
         */
         
         if(isset($_POST['DiagonisticEntryForm']))
         {   
            $postData          = $_POST['DiagonisticEntryForm'];
            $model->attributes = $postData;
            
             $model->attributes = $_POST['DiagonisticEntryForm'];
             if($model->validate())
             {
                 if($id){
                    $customerInvoiceModel = CustomerInvoice::model()->findByPk($id);
                 }   
                 if($customerInvoiceModel === null){
                    $customerInvoiceModel = new CustomerInvoice();
                 }
                 
                 $customerInvoiceModel->attributes = $model->attributes;
                 if(empty($customerInvoiceModel->patient_id)){
                    $customerInvoiceModel->patient_id = DiagnosticHelper::generatePatientId();   
                 }
                 
                 if($isNewRecrod){
                    $customerInvoiceModel->create_date = new CDbExpression('NOW()');
                 }
                 $customerInvoiceModel->update_date = new CDbExpression('NOW()');
                 $customerInvoiceModel->save(false);
                 
                 //saving tests
                 $tests       = $postData['tests'];
                 $testsIds    = $postData['testsIds'];
                 $formTestIds = array();
                 if(count($tests)){
                    //remove the existing invoice tests first
                    DiagnosticHelper::removeDiagnosticTests($customerInvoiceModel->patient_id);
                    
                    //insert the new tests
                    foreach($tests as $key => $thisTest){
                       if(!empty($thisTest) && isset($testsIds[$key])){
                         $formTestIds[] = $testsIds[$key];
                         $patientTrackerModel = new PatientTracker();
                         $patientTrackerModel->patient_id = $customerInvoiceModel->patient_id;
                         $patientTrackerModel->test_id    = $testsIds[$key];
                         //$patientTrackerModel->invoice_id = $customerInvoiceModel->id;
                         $patientTrackerModel->save(false);
                      }  
                   }
                 }
                 
                 Yii::app()->user->setFlash('success', self::DIAGNOSTIC_FORM_CREATE_SUCCESS_MSG);
                 $this->redirect($this->createUrl('/customerInvoice/invoiceMemo', array('id' => $customerInvoiceModel->id)));
                 
                 return;
                 
             }
             else
             {
                //echo $model->getError();exit;
             }
         }
      }catch(Exception $e){
         echo $e->getMessage();exit;
      }
      
      $this->render('DiagonisticEntryForm', array('model' => $model));
   }
   
   public function actionInvoiceMemo() {

     $model = PatientTracker::model()->with('test')->findByPk(1);

      $id           = isset($_REQUEST['id']) ? (int) $_REQUEST['id'] : null;
      
      $invoiceModel = CustomerInvoice::model()->with(array('orginalReferer', 
                                                           'patientTracker.test'))
                                              ->findByPk($id);
      if($invoiceModel === null) { 
         Yii::app()->user->setFlash('error', self::INVALID_INVOICE_MEMO_MSG);
         $this->redirect($this->createUrl('/customerInvoice/index'));
         Yii::app()->end();
      }
      
      $formModel             = new InvoiceMemoForm();      
      $formModel->attributes = $invoiceModel->attributes;
      
      if(isset($_POST['InvoiceMemoForm'])) {   
         $postData              = $_POST['InvoiceMemoForm'];
         $formModel->attributes = $postData;

         //assing selective post values
         $invoiceModel->refby          = $postData['refby'];
         $invoiceModel->original_refby = $postData['original_refby'];
         
         $invoiceModel->subtotal       = $postData['subtotal'];
         $invoiceModel->less_discount  = $postData['less_discount'];
         $invoiceModel->netpay         = $postData['netpay'];
         $invoiceModel->recieved       = $postData['recieved'];
         $invoiceModel->due            = $postData['due'];
         $invoiceModel->save(false);
         
         Yii::app()->user->setFlash('error', self::INVALID_INVOICE_MEMO_MSG);
         $this->redirect($this->createUrl('/customerInvoice/InvoiceMemo', array('id' => $invoiceModel->id)));
            //echo "<pre>";print_r($postData);echo "<pre/>";exit;
      
      }
      
      $this->render('InvoiceMemoForm', array('model' => $formModel, 'invoiceModel' => $invoiceModel));
   }
   
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

   public function actionDiagnosticEntryForm()
   {
       $model=new CustomerInvoice;
   
       // uncomment the following code to enable ajax-based validation
       /*
       if(isset($_POST['ajax']) && $_POST['ajax']==='customer-invoice-DiagnosticEntryForm-form')
       {
           echo CActiveForm::validate($model);
           Yii::app()->end();
       }
       */
   
       if(isset($_POST['CustomerInvoice']))
       {
           $model->attributes=$_POST['CustomerInvoice'];
           if($model->validate())
           {
               // form inputs are valid, do something here
               return;
           }
       }
       $this->render('DiagnosticEntryForm',array('model'=>$model));
   }
   
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new CustomerInvoice;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['CustomerInvoice']))
		{
			$model->attributes=$_POST['CustomerInvoice'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
      //redirect to Invoice Memo for now
      $this->redirect($this->createUrl('/customerInvoice/invoiceMemo', array('id' => $id)));
      Yii::app()->end();
      
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['CustomerInvoice']))
		{
			$model->attributes=$_POST['CustomerInvoice'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('CustomerInvoice');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new CustomerInvoice('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['CustomerInvoice']))
			$model->attributes=$_GET['CustomerInvoice'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=CustomerInvoice::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='customer-invoice-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
