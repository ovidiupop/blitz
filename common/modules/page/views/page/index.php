<?php

//use yii\helpers\Html;
//use yii\grid\GridView;

//use kartik\widgets\DatePicker;
use kartik\grid\GridView;
use kartik\helpers\Html;
use kartik\grid\EditableColumn;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\PageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Pages');
$this->params['breadcrumbs'][] = $this->title;
?>
<p>
    <?= Html::a(Yii::t('app', 'Create Page'), ['create'], ['class' => 'btn btn-success']) ?>
</p>

<div class="page-index" style="margin-top:30px;">

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
            'attribute' => 'title',
            'vAlign' => 'middle',
            'width' => '180px',
            'value' => function ($model) {
                    return $model->title == null
                        ? '<span class="not-set">' . Yii::t('app', '(not set)') . '</span>'
                        : $model->title;
                },
            ],
            [
            'attribute' => 'alias',
            'vAlign' => 'middle',
            'width' => '250px',
            'value' => function ($model) {
                    return $model->alias == null
                        ? '<span class="not-set">' . Yii::t('app', '(not set)') . '</span>'
                        : $model->alias;
                },
            ],   
                        
            [
            'attribute' => 'status',
            'vAlign' => 'middle',
            'width' => '250px',
            'value' => function ($model) {
                    return $model->statusname;
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \common\modules\page\models\Page::cmbStatuses(),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => yii::t('app','Search')],
                'format' => 'raw'
            ],     
                        
            $actionCol,
        ];
                
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => $columns,
            'pjax' => true,
            'pjaxSettings' => [
                'neverTimeout' => true,
//                'beforeGrid' => $this->render('_menu'),
//                'afterGrid' => $this->render('_menu'),
            ]
        ]);

?>
</div>
