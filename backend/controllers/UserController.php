<?php

namespace backend\controllers;

use Yii;
use yii\helpers\Url;
use common\models\User as Model;
use backend\forms\UserForm as ModelForm;
use common\models\search\UserSearch as ModelSearch;
use yii\web\HttpException;
use yii\web\NotFoundHttpException;
use yii\data\ActiveDataProvider;

class UserController extends \backend\components\BackendController
{

    public $postActions = ['delete'];

    /**
     * Lists all models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ModelSearch;

        $query = Model::find();

        $searchModel->load(Yii::$app->request->queryParams);

        $searchModel->applyToQuery($query);

        $dataProvider = new ActiveDataProvider(['query' => $query]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($returnUrl = null)
    {
        $model = new ModelForm;

        if ($model->load(Yii::$app->request->post()) && $model->save())
        {
            if (Yii::$app->request->post('action') == 'save')
            {
                Yii::$app->session->addFlash('success', Yii::t('backend', 'Data saved.'));
                
                return $this->redirect(['update', 'id' => $model->id, 'returnUrl' => $returnUrl]);
            }
            else
            {
                return $this->redirectBack();
            }            
        } 

        return $this->render('create', [
            'model' => $model
        ]);
    }

    /**
     * Updates an existing model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id, ModelForm::class);

        if ($model->load(Yii::$app->request->post()) && $model->save()) 
        {
            if (Yii::$app->request->post('action') == 'save')
            {
                Yii::$app->session->addFlash('success', Yii::t('backend', 'Data saved.'));
            }
            else
            {
                return $this->redirectBack();
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $deleted = $this->findModel($id)->delete();

        if ($deleted == FALSE)
        {
            throw new HttpException(500, 'User not deleted.');
        }

        return $this->redirect([$this->defaultAction]);
    }
    
}