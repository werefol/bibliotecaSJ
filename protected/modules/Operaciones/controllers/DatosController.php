<?php

class DatosController extends Controller
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
				'actions'=>array('create','update'),
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
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($reg)
	{
		$model = new Datos('reg_user');

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		$tipo = $reg;



		if(isset($_POST['Datos'])){

			if (isset($_POST['tipo'])) {				
			

				if ($_POST['tipo']==1 && $_POST['tipo']!="" ) {
					
					$model->attributes=$_POST['Datos'];

					$model->id_tipo = $_POST['tipo'];
					//echo "<pre>";print_r($_POST);exit;

					if($model->save())
						$this->redirect(array('view','id'=>$model->id));
					
				}elseif ($_POST['tipo']==2 && $_POST['tipo']!="" ) {
					
					$model = new Datos;
					
					$model->attributes=$_POST['Datos'];

					$model->id_tipo = $_POST['tipo'];
					//echo "<pre>";print_r($_POST);print_r($model);exit;

					if($model->save())
						$this->redirect(array('view','id'=>$model->id));
				
				}else{

					echo "Error en el formulario";
					$this->redirect(array('index'));
				}
			
			}else{

				echo "<pre>";print_r($_POST);exit;
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'tipo'=>$tipo,
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
		$tipo = "";

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Datos']))
		{
			$model->attributes=$_POST['Datos'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
			'tipo'=>$tipo,
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
		$dataProvider=new CActiveDataProvider('Datos');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin($tipo)
	{

		if ($tipo == 1) {
			
			$usuarios = Datos::model()->findAll('id_tipo=:tipo', array(':tipo'=>$tipo));

			$model=new Datos('search');
			$model->unsetAttributes();  // clear any default values
			if(isset($_GET['Datos']))
				$model->attributes=$_GET['Datos'];

			$this->render('admin',array(
			'model'=>$model,
			'tipo'=>$tipo,
			'usuarios'=>$usuarios,
			));	

		}else{

			$solicitantes = Datos::model()->findAll('id_tipo=:tipo', array(':tipo'=>$tipo));

			$model=new Datos('search');
			$model->unsetAttributes();  // clear any default values
			if(isset($_GET['Datos']))
				$model->attributes=$_GET['Datos'];

			$this->render('admin',array(
			'model'=>$model,
			'tipo'=>$tipo,
			'solicitantes'=>$solicitantes,
			));				
		}
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Datos::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='datos-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
