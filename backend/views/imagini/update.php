<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Imagini */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Imagini',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Imaginis'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="imagini-update" style="margin-top: 30px;">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
