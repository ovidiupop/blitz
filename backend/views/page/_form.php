<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model common\models\Page */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="page-form" style="margin-top: 30px;">

    <?php $form = ActiveForm::begin(); ?>
    
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>    
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'alias')->textInput(['maxlength' => true]) ?>            
        </div>
    </div>

    <?= $form->field($model, 'body')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'basic'
    ]) ?>       
    
    <?= $form->field($model, 'status')->widget(Select2::classname(), [
        'data' => $model->statuses,
        'options' => ['placeholder' => Yii::t('app', 'Select')],
                'pluginOptions' => [
                    'allowClear' => true,
                    'width'=>'20%'
                ],
    ]); ?>  
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
