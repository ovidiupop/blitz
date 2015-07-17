<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* use kartik\select2\Select2;*/

/* @var $this yii\web\View */
/* @var $model common\models\Imagini */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="imagini-form" style="margin-top: 30px;">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'owner_id')->textInput() ?>

    <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
