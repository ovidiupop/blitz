<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\RoleTypes */

$this->title = Yii::t('app', 'Create Role Types');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Role Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="role-types-create" style="margin-top: 30px;">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
