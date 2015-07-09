<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \dektrium\user\models\User;
use kartik\widgets\Select2;
use \yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Roles */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="roles-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->widget(Select2::classname(), [
                    'data' =>ArrayHelper::map(User::find()->orderby('username', 'ASC')->all(), 'id', 'username'),
                    'options' => [
                        'placeholder' => Yii::t('app', 'Select an user').'...'
                    ],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
            ]);
    ?>

    <?= $form->field($model, 'role_type_id')->widget(Select2::classname(), [
                    'data' =>ArrayHelper::map(\backend\models\RoleTypes::find()->orderby('id', 'ASC')->all(), 'id', 'name'),
                    'options' => [
                        'placeholder' => Yii::t('app', 'Select a role').'...'
                    ],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
            ]);?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
