<?php

namespace backend\controllers;

use Yii;
use common\models\User as Model;
use backend\forms\UserForm as ModelForm;
use common\models\search\UserSearch as ModelSearch;
use yii\web\NotFoundHttpException;
use yii\data\ActiveDataProvider;
use trntv\filekit\actions\DeleteAction;
use trntv\filekit\actions\UploadAction;

class UserController extends \backend\components\BackendController
{

    public $postActions = ['delete'];

    public function actions()
    {
        return [
            'upload-avatar' => [
                'class' => UploadAction::class,
                'deleteRoute' => 'upload-delete-avatar',
                'validationRules' => [
                    [
                        'file',
                        'image',
                        'maxSize' => ModelForm::AVATAR_MAX_SIZE,
                        'extensions' => ModelForm::AVATAR_FILE_TYPES
                    ]
                ],
                'fileStorage' => 'uploadedStorage'
            ],
            'upload-delete-avatar' => [
                'class' => DeleteAction::class,
                'fileStorage' => 'uploadedStorage'
            ]
        ];
    }

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
    public function actionCreate($returnUrl = false)
    {
        $model = new ModelForm;

        if ($model->load(Yii::$app->request->post()) && $model->save())
        {
            if ($returnUrl && \yii\helpers\Url::isRelative($returnUrl))
            {
                return $this->redirect($returnUrl);
            }

            return $this->redirect([$this->defaultAction]);
        } 
        else
        {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id, $returnUrl = false)
    {
        $model = $this->findModel($id, ModelForm::class);

        if ($model->load(Yii::$app->request->post()) && $model->save()) 
        {
            if ($returnUrl && \yii\helpers\Url::isRelative($returnUrl))
            {
                return $this->redirect($returnUrl);
            }

            return $this->redirect([$this->defaultAction]);
        }
        else
        {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
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
            throw new \yii\web\HttpException(500, 'User not deleted.');
        }

        return $this->redirect([$this->defaultAction]);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Model the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $class = Model::class)
    {
        if (($model = $class::find()->where(['id' => $id])->one()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
}
