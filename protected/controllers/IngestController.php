<?php

class IngestController extends Controller
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
			'postOnly + delete', // we only allow deletion via POST request
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
				'actions'=>array('view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update', 'shared2me', 'index'),
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
	    $comment=new Comment;
	    $shareingest=new Sharedingest;
		$this->render('view',array(
			'model'=>$this->loadModel($id),
            'comment'=>$comment,
            'singest'=>$shareingest,
		));

        if(isset($_POST['Sharedingest'])) {
            $shareingest->attributes = $_POST['Sharedingest'];
            $email = User::listAll()[$shareingest->user_id];
            $criteria = new CDbCriteria;
            $criteria->condition = "email='{$email}'";
            $user = User::model()->findAll($criteria);
            if (isset($user[0])) {
                $shareingest->user_id = $user[0]->id;
                $shareingest->save();
            }
            //$this->refresh();
        }

		if(isset($_POST['Comment'])) {
            $comment->attributes = $_POST['Comment'];
            $comment->save();
            //$this->refresh(); //Al refrescar intenta meter de nuevo la entrada en la BD!!!!!MAL!!
        }
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Ingest;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Ingest'])) {
            $model->attributes = $_POST['Ingest'];
            $model->food = Food::listAll()[$model->food];
            $criteria = new CDbCriteria;
            $criteria->condition = "Nombre='{$model->food}'";
            $food = Food::model()->findAll($criteria);
            if (isset($food[0])) {
                $model->food_id = $food[0]->id;
                if ($model->save())
                    $this->redirect(array('view', 'id' => $model->id));
            }
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

		if(isset($_POST['Ingest']))
		{
			$model->attributes=$_POST['Ingest'];
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
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
	    $usr_id = Yii::app()->user->id;
	    $criteria = new CDbCriteria;
        $criteria->condition = "user_id = '{$usr_id}'";
		$dataProvider=new CArrayDataProvider(Ingest::model()->findAll($criteria));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

    public function actionShared2Me()
    {
        $usr_id = Yii::app()->user->id;
        $criteria = new CDbCriteria;
        $criteria->condition = "id IN(SELECT ingest_id FROM sharedingest WHERE user_id = {$usr_id})";
        $dataProvider=new CArrayDataProvider(Ingest::model()->findAll($criteria));
        $this->render('index',array(
            'dataProvider'=>$dataProvider,
        ));
    }

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Ingest('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Ingest']))
			$model->attributes=$_GET['Ingest'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Ingest the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Ingest::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Ingest $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='ingest-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
