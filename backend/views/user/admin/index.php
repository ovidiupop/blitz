<?php
use dektrium\user\models\UserSearch;
use yii\data\ActiveDataProvider;
use yii\jui\DatePicker;
use yii\web\View;
//use yii\widgets\Pjax;

use kartik\grid\GridView;
use kartik\helpers\Html;
use kartik\grid\EditableColumn;

/**
 * @var View $this
 * @var ActiveDataProvider $dataProvider
 * @var UserSearch $searchModel
 */

$this->title = Yii::t('user', 'Manage users');
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('/_alert', [
    'module' => Yii::$app->getModule('user'),
]) ?>



<?php
$actionCol = ['class' => 'kartik\grid\ActionColumn',
    'template' => '{update} {delete}',
    'header' => Yii::t('app', 'Tools'),
    'vAlign' => 'middle',
//    'buttons' => [
//        'operare' => function ($url, $model) {
//            return Html::a('<span class="fa fa-edit"></span>', $url, [
//                        'title' => 'Operare comanda', 'target'=>'blank'
//            ]);
//        },
//        
//        'proforma' => function ($url, $model) {
//            return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
//                        'title' => 'Vezi proforma', 'target'=>'blank'
//            ]);
//        }
//    ],
            
//    'urlCreator' => function ($action, $model, $key, $index) {
//        if ($action === 'operare') {
//            return Url::toRoute(['comanda/operare', 'comanda'=>$model->numarcomanda]); // your own url generation logic
//        }
//        
//        if ($action === 'proforma') {
//            return $model->urlProforma; // your own url generation logic
//        }
//    }
];

$columns = [
    ['class' => 'kartik\grid\SerialColumn'],
            [
                'attribute'=>'id',
                'width' => '50px',
            ],
            [
            'attribute' => 'username',
            'vAlign' => 'middle',
            'width' => '180px',
            'value' => function ($model) {
                    return $model->username == null
                        ? '<span class="not-set">' . Yii::t('user', '(not set)') . '</span>'
                        : $model->username;
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => yii\helpers\ArrayHelper::map(
                        common\models\user\User::find()->orderBy('username', 'ASC')->all(), 
                        'username', 'username'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => yii::t('app','Search')],
                'format' => 'raw'
            ],
            [
            'attribute' => 'email',
            'vAlign' => 'middle',
            'width' => '250px',
            'value' => function ($model) {
                    return $model->email == null
                        ? '<span class="not-set">' . Yii::t('user', '(not set)') . '</span>'
                        : $model->email;
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => yii\helpers\ArrayHelper::map(
                        common\models\user\User::find()->orderBy('email', 'ASC')->all(), 
                        'email', 'email'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => yii::t('app','Search')],
                'format' => 'raw'
            ],   
                        
            [
            'attribute' => 'userRole',
            'vAlign' => 'middle',
            'width' => '250px',
            'value' => function ($model) {
                    return $model->userRole == null
                        ? '<span class="not-set">' . Yii::t('user', '(not set)') . '</span>'
                        : $model->userRole;
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => yii\helpers\ArrayHelper::map(
                       backend\models\RoleTypes::find()->orderBy('name', 'ASC')->all(), 
                        'id', 'name'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => yii::t('app','Search')],
                'format' => 'raw'
            ],     
                        
            [
            'attribute' => 'registration_ip',
            'vAlign' => 'middle',
                'hAlign'=>'center',
            'width' => '180px',
            'value' => function ($model) {
                    return $model->registration_ip == null
                        ? '<span class="not-set">' . Yii::t('user', '(not set)') . '</span>'
                        : $model->registration_ip;
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => yii\helpers\ArrayHelper::map(
                        common\models\user\User::find()->orderBy('registration_ip', 'ASC')->all(), 
                        'registration_ip', 'registration_ip'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => yii::t('app','Search')],
                'format' => 'raw'
            ],                        
 
        [
            'attribute' => 'created_at',
            'value' => function ($model) {
                return Yii::t('user', '{0, date, MMMM dd, YYYY HH:mm}', [$model->created_at]);
            },
            'filter' => DatePicker::widget([
                'model'      => $searchModel,
                'attribute'  => 'created_at',
                'dateFormat' => 'php:Y-m-d',
                'options' => [
                    'class' => 'form-control'
                ]
            ]),
        ],
        [
            'header' => Yii::t('user', 'Confirmation'),
            'value' => function ($model) {
                if ($model->isConfirmed) {
                    return '<div class="text-center"><span class="text-success">' . Yii::t('user', 'Confirmed') . '</span></div>';
                } else {
                    return Html::a(Yii::t('user', 'Confirm'), ['confirm', 'id' => $model->id], [
                        'class' => 'btn btn-xs btn-success btn-block',
                        'data-method' => 'post',
                        'data-confirm' => Yii::t('user', 'Are you sure you want to confirm this user?'),
                    ]);
                }
            },
            'format' => 'raw',
            'visible' => Yii::$app->getModule('user')->enableConfirmation
        ],
        [
            'header' => Yii::t('user', 'Block status'),
            'value' => function ($model) {
                if ($model->isBlocked) {
                    return Html::a(Yii::t('user', 'Unblock'), ['block', 'id' => $model->id], [
                        'class' => 'btn btn-xs btn-success btn-block',
                        'data-method' => 'post',
                        'data-confirm' => Yii::t('user', 'Are you sure you want to unblock this user?')
                    ]);
                } else {
                    return Html::a(Yii::t('user', 'Block'), ['block', 'id' => $model->id], [
                        'class' => 'btn btn-xs btn-danger btn-block',
                        'data-method' => 'post',
                        'data-confirm' => Yii::t('user', 'Are you sure you want to block this user?')
                    ]);
                }
            },
            'format' => 'raw',
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
                'beforeGrid' => $this->render('_menu'),
//                'afterGrid' => $this->render('_menu'),
            ]
        ]);




