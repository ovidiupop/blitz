<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* use kartik\select2\Select2;*/

/* @var $this yii\web\View */
/* @var $model common\models\Produs */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="produs-form" style="margin-top: 30px;">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'denumire')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order')->textInput() ?>

    <?= $form->field($model, 'imagine')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'extra')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
