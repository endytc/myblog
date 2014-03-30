<?php

class CmsArtikelController extends AdminBlogController
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
			//'postOnly + delete', // we only allow deletion via POST request
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
				'actions'=>array('create','update','delete'),
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

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
                $model=new CmsArtikel('search');
		$model->unsetAttributes();  // clear any default values
                if($_GET['ajax'])
                    $this->renderModal('view',array(
                            'viewModel'=>$this->loadModel($id),'model'=>$model,
                    ));
                else
                    $this->render('view',array(
                            'viewModel'=>$this->loadModel($id),'model'=>$model,
                    ));
		
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new CmsArtikel;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
                
		if(isset($_POST['CmsArtikel']))
		{
			$model->attributes=$_POST['CmsArtikel'];
                        $is_success=$model->save();
                        $this->notice($is_success,'Artikel','create');
			if($is_success){
				$this->redirect(array('update','id'=>$model->id));
                        }else{
                            $this->render('create',array(
                                    'model'=>$model,'kategoriList'=>  CmsKategori::model()->dropdownModel(false)
                            ));
                        }
		}else{
                    if($_GET['ajax'])
                        $this->renderModal('create',array(
                                'model'=>$model,'kategoriList'=>  CmsKategori::model()->dropdownModel(false)
                        ));
                    else
                        $this->render('create',array(
                                'model'=>$model,'kategoriList'=>  CmsKategori::model()->dropdownModel(false)
                        ));
                }
               
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

		if(isset($_POST['CmsArtikel']))
		{
			$model->attributes=$_POST['CmsArtikel'];
                        $is_success=$model->save();
                        $this->notice($is_success,'Artikel','update');
//			if($is_success)
//                            $this->redirect(array('view','id'=>$model->id,'kategoriList'=>  CmsKategori::model()->dropdownModel(false)));
		}
                
                if($_GET['ajax'])
                    $this->renderModal('update',array(
                            'model'=>$model,'kategoriList'=>  CmsKategori::model()->dropdownModel(false)
                    ));
                else{
                    $this->render('update',array(
                                    'model'=>$model,'kategoriList'=>  CmsKategori::model()->dropdownModel(false)
                            ));
                }
		
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
                $is_success=$this->loadModel($id)->delete();
                $this->notice($is_success,'Artikel','delete');
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		//$dataProvider=new CActiveDataProvider('CmsArtikel');
		//$this->render('index',array(
		//	'dataProvider'=>$dataProvider,
		//));
                $this->actionAdmin();
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new CmsArtikel('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['CmsArtikel'])){
                    $model->attributes=$_GET['CmsArtikel'];
                    if(isset($_GET['CmsArtikel']['cmsKategoris']) && $_GET['CmsArtikel']['cmsKategoris']!='')
                        $model->cmsKategoris=array(CmsKategori::model()->findByPk($_GET['CmsArtikel']['cmsKategoris']));
                }
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
		$model=CmsArtikel::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='cms-artikel-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
}
