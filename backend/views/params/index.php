<?php

use kartik\grid\GridView;
use kartik\helpers\Html;
use kartik\grid\EditableColumn;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\ParamsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Params');
$this->params['breadcrumbs'][] = $this->title;
?>


<?php
$actionCol = ['class' => 'kartik\grid\ActionColumn',
    'template' => '{view} {update} {delete}',
    'header' => Yii::t('app', 'Tools'),
    'vAlign' => 'middle',
];

$columns = [
    ['class' => 'kartik\grid\SerialColumn'],
            [
                'attribute'=>'id',
                'width' => '50px',
            ],
            [
            'attribute' => 'app_id',
            'vAlign' => 'middle',
            'width' => '180px',
            'value' => function ($model) {
                    return $model->app_id == null
                        ? '<span class="not-set">' . Yii::t('app', '(not set)') . '</span>'
                        : $model->app_id;
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => common\models\Params::arrApps(),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => yii::t('app','Search')],
                'format' => 'raw'
            ],    
            'name',
            'value:ntext',

                        
                       
            $actionCol,
        ];
                
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => $columns,
            'pjax' => true,
            'pjaxSettings' => [
                'neverTimeout' => true,
                'beforeGrid' => $this->render('_addButton'),
////                'afterGrid' => $this->render('_menu'),
            ]
        ]);




