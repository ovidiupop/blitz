<?php
use kartik\grid\GridView;
use kartik\helpers\Html;
use kartik\grid\EditableColumn;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\PairSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Pairs');
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

