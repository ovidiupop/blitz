<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Pair */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Pair',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pairs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="pair-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
