<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Imagini */

$this->title = Yii::t('app', 'Create Imagini');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Imaginis'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$produs = \common\models\Produs::findOne(1);
?>
<div class="imagini-create">

   <!--<h1><?= Html::encode($this->title) ?></h1>-->

    
    <?= $this->render('uploader', [
        'model'=>$model,
        'attribute' => 'image',
        'produs' => $produs,
    ]) ?>

</div>
