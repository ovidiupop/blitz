<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\RoleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Roles');
$this->params['breadcrumbs'][] = $this->title;
?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Roles'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
<div class="roles-index" style="margin-top: 30px;">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute'=>'user_id',
                'value'=>'user.username',
                'filter' => yii\helpers\ArrayHelper::map(
                        \dektrium\user\models\User::find()->orderBy('username', 'ASC')->all(), 
                        'id', 'username'), 
            ],
            [
                'attribute'=>'role_type_id',
                'value'=>'roleType.name',
                'filter' => yii\helpers\ArrayHelper::map(
                        \backend\models\RoleTypes::find()->orderBy('name', 'ASC')->all(), 
                        'id', 'name'), 
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
