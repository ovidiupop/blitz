<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\RoleTypes */

$this->title = Yii::t('app', 'Role Types') . '('.$model->name.')';

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Role Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="role-types-view" style="margin-top: 30px;">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a(Yii::t('app', 'Create'), ['create'], ['class' => 'btn btn-success']) ?>        
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'description',
        ],
    ]) ?>

</div>
