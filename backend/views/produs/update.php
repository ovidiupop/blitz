<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Produs */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Produs',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Produses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="produs-update" style="margin-top: 30px;">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
