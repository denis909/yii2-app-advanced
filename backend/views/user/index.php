<?php

use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

require __DIR__ . '/_common.php';

$this->params['breadcrumbs'][] = $this->title;

$this->params['actionMenu'][] = ['label' => 'Create', 'url' => ['create'], 'linkOptions' => ['class' => 'btn btn-success']];

$backendTheme = Yii::$app->backendTheme;

$this->params['cardTitle'] = 'Manage';

?>

<?php

/*

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

*/?>

<?= $backendTheme->gridView([
    'dataProvider' => $dataProvider,
    //'filterModel' => $searchModel,
    'columns' => [
        'id',
        'created_at:date',
        'username',
        'email',
        /*
        [
			'attribute' => 'status',
			'value' => function($model){
				return $model->statusAsString;
			}
        ],
        'real_balance',
        'id_partner',	
        */
        [
            'class' => $backendTheme::ACTION_COLUMN,
            'template' => '{update}'
        ],
        [
            'class' => $backendTheme::ACTION_COLUMN,
            'template' => '{delete}'                
        ]
    ]
]);