<?php

use backend\theme\GridView;
use backend\theme\Html;
use backend\theme\ActionColumn;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

require __DIR__ . '/_common.php';

$this->params['breadcrumbs'][] = $this->title;

$this->params['actionMenu'][] = [
    'label' => Yii::t('backend', 'Create'), 
    'url' => ['create'], 
    'linkOptions' => ['class' => 'btn btn-success']
];

$this->params['cardTitle'] = Yii::t('backend', 'Manage');

?>

<?php

/*
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

*/?>

<?= GridView::widget([
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
        */
        [
            'class' => ActionColumn::class,
            'template' => '{update}'
        ],
        [
            'class' => ActionColumn::class,
            'template' => '{delete}'                
        ]
    ]
]);