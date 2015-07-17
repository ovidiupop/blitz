<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\Produs */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Produses');
$this->params['breadcrumbs'][] = $this->title;
?>
<p>
    <?= Html::a(Yii::t('app', 'Create Produs'), ['create'], ['class' => 'btn btn-success']) ?>
</p>

<div class="produs-index" style="margin-top:30px;">

   <!--<h1><?= Html::encode($this->title) ?></h1>-->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'denumire',
            'order',
            'imagine',
            'extra',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
