<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\Params */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="params-form" style="margin-top:30px;">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'app_id')->widget(Select2::classname(), [
    'data' => common\models\Params::arrApps(),
    'options' => ['placeholder' => Yii::t('app', 'Select')],
            'pluginOptions' => [
                'allowClear' => true
            ],
    ]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'value')
                ->textarea(['rows' => 6])
                ->hint(Yii::t('app', 'Insert arrays into brackets ["a"=>"b", "c"=>"d"]')) 
    ?>  
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
