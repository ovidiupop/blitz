<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Produs */

$this->title = Yii::t('app', 'Create Produs');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Produses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produs-create">

   <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
