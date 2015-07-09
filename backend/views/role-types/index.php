<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\RoleTypesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Role Types');
$this->params['breadcrumbs'][] = $this->title;
?>  

    <p>
        <?= Html::a(Yii::t('app', 'Create Role Types'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

<div class="role-types-index" style="margin-top: 30px;">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'description',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
