<?php

class CustomerInvoiceController extends Controller
{
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
				'actions'=>array('create','update','DiagonisticEntryForm'),
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
       $model=new DiagonisticEntryForm;

       // uncomment the following code to enable ajax-based validation
       /*
       if(isset($_POST['ajax']) && $_POST['ajax']==='diagonistic-entry-form-DiagonisticEntryForm-form')
       {
           echo CActiveForm::validate($model);
           Yii::app()->end();
       }
       */

       if(isset($_POST['DiagonisticEntryForm']))
       {echo "<pre>";print_r($_POST['DiagonisticEntryForm']);echo "<pre/>";exit;
           $model->attributes = $_POST['DiagonisticEntryForm'];
           if($model->validate())
           {
               // form inputs are valid, do something here
               return;
           }
       }
       $this->render('DiagonisticEntryForm',array('model'=>$model));
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
