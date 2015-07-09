<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Pair */

$this->title = Yii::t('app', 'Create Pair');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pairs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pair-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
