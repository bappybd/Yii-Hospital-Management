<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
   
   <?php 
   $cs = Yii::app()->clientScript;
   $cs->scriptMap=array(
      //'jquery.js'=>'https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js',
      //'jquery.min.js'=>'https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js',
      'jquery-ui.js'=> Yii::app()->request->baseUrl.'/js/jquery-ui/js/jquery-ui-1.9.0.custom.js',
      'jquery-ui.min.js'=> Yii::app()->request->baseUrl.'/js/jquery-ui/js/jquery-ui-1.9.0.custom.min.js',
      'jquery-ui.css'=>Yii::app()->request->baseUrl.'/js/jquery-ui/css/ui-lightness/jquery-ui-1.9.0.custom.css',
      'jquery-ui.min.css'=>Yii::app()->request->baseUrl.'/js/jquery-ui/css/ui-lightness/jquery-ui-1.9.0.custom.min.css'
   );
   /*$cs = Yii::app()->getClientScript();
   $cs->packages = array(
       'jquery.ui'=>array(
                'js'=>array(Yii::app()->request->baseUrl.'/js/jquery-ui/js/jquery-ui-1.9.0.custom.min.js'),
                'css'=>array(Yii::app()->request->baseUrl.'/js/jquery-ui/css/ui-lightness/jquery-ui-1.9.0.custom.min.css'),
                'depends'=>array('jquery'),
        ),
   );
   $cs->registerCoreScript('jquery.ui');
   */
     
   ?>
   
   <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
   
   <script type="text/javascript">
   var siteUrl = "<?php echo $this->createAbsoluteUrl('/') ?>";
   </script>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'Diagnostic Form', 'url'=>array('/customerInvoice/diagonisticEntryForm')),
            array('label'=>'Invoice Memo List', 'url'=>array('/customerInvoice/admin')),
            array('label'=>'Active Patient Tracker', 'url'=>array('/PatientTracker/ActivePatientTracker')),
				array('label'=>'Tests', 'url'=>array('/test/admin')),
            array('label'=>'Test Category', 'url'=>array('/testCategory/admin')),
            array('label'=>'Original Referer', 'url'=>array('/originalRefBy/admin')),
            /*array('label'=>'Products', 'url'=>array('product/index'), 'items'=>array(
                array('label'=>'New Arrivals', 'url'=>array('product/new', 'tag'=>'new')),
            )),*/

				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>
   
   <!-- show flash message -->
   <?php $this->renderPartial('/site/flash_message') ?>
   
   <!-- show site content -->
	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
