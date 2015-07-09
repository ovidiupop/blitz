<?php
use yii\helpers\Html;
    use yii\helpers\ArrayHelper;
    use kartik\widgets\DepDrop;
    use kartik\detail\DetailView;
    use yii\bootstrap\Nav;

$this->title = Yii::t('user', 'Profile settings');
$this->params['breadcrumbs'][] = $this->title;
if(isset($profile)){
    $model=$profile;
}
?>
<?= $this->render('/_alert', ['module' => Yii::$app->getModule('user')]) ?>
<?= $this->render('_menu') ?>
<div class="row">
    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-body">
                <?= Nav::widget([
                    'options' => [
                        'class' => 'nav-pills nav-stacked'
                    ],
                    'items' => [
                        ['label' => Yii::t('user', 'Account details'), 'url' => ['/user/admin/update', 'id' => $user->id]],
                        ['label' => Yii::t('user', 'Profile details'), 'url' => ['/user/admin/update-profile', 'id' => $user->id]],
                        ['label' => Yii::t('user', 'Information'), 'url' => ['/user/admin/info', 'id' => $user->id]],
                        [
                            'label' => Yii::t('user', 'Assignments'),
                            'url' => ['/user/admin/assignments', 'id' => $user->id],
                            'visible' => isset(Yii::$app->extensions['dektrium/yii2-rbac']),
                        ],
                        '<hr>',
                        [
                            'label' => Yii::t('user', 'Confirm'),
                            'url'   => ['/user/admin/confirm', 'id' => $user->id],
                            'visible' => !$user->isConfirmed,
                            'linkOptions' => [
                                'class' => 'text-success',
                                'data-method' => 'post',
                                'data-confirm' => Yii::t('user', 'Are you sure you want to confirm this user?')
                            ],
                        ],
                        [
                            'label' => Yii::t('user', 'Block'),
                            'url'   => ['/user/admin/block', 'id' => $user->id],
                            'visible' => !$user->isBlocked,
                            'linkOptions' => [
                                'class' => 'text-danger',
                                'data-method' => 'post',
                                'data-confirm' => Yii::t('user', 'Are you sure you want to block this user?')
                            ],
                        ],
                        [
                            'label' => Yii::t('user', 'Unblock'),
                            'url'   => ['/user/admin/block', 'id' => $user->id],
                            'visible' => $user->isBlocked,
                            'linkOptions' => [
                                'class' => 'text-success',
                                'data-method' => 'post',
                                'data-confirm' => Yii::t('user', 'Are you sure you want to unblock this user?')
                            ],
                        ],
                        [
                            'label' => Yii::t('user', 'Delete'),
                            'url'   => ['/user/admin/delete', 'id' => $user->id],
                            'linkOptions' => [
                                'class' => 'text-danger',
                                'data-method' => 'post',
                                'data-confirm' => Yii::t('user', 'Are you sure you want to delete this user?')
                            ],
                        ],
                    ]
                ]) ?>
            </div>
        </div>
    </div>
<div class="col-md-9">
<div class="userprofil-view">
    <?= DetailView::widget([
        'model'=>$model,
        'condensed'=>true,
        'responsive'=>true,
        'hover'=>true,
        'hideIfEmpty'=>true,
        'mode'=>DetailView::MODE_VIEW,
        'panel'=>[
            'heading'=> $model->fullName ? $model->fullName : Yii::$app->user->identity->username,
            'type'=>DetailView::TYPE_INFO,
        ],
        'buttons1'=>'{update}',
        'buttons2'=>'{save} {view}',
        'attributes'=>[
[
'group'=>true,
    'label'=>'INFORMATII FACTURARE CLIENT',
    'rowOptions'=>['class'=>'info'],
],
            [
                'attribute'=>'user_id',
                'value'=>$model->user_id,
                'type'=>DetailView::INPUT_HIDDEN,
                'visible'=>false,
            ],
            [
                'attribute'=>'tip',
                'label'=>Yii::t('app', 'Client type'),
                'format'=>'raw',
                'value'=>$model->tip
                    ? '<span class="label label-info">Persoana juridica</span>'
                    : '<span class="label label-success">Persoana fizica</span>',
                
                'type'=>DetailView::INPUT_SELECT2,
                'inputWidth' => '40%',  
                'widgetOptions'=>[
                    'data'=>[
                        '0' => 'Persoana fizica',
                        '1' => 'Persoana juridica'
                    ],
                    'pluginOptions' => ['allowClear'=>false],
                    'options'=>['id'=>'tip'],
                ],
              
            ],              
            [
                'attribute'=>'lastname',
                'format' => 'html',
                'value'=>'<strong>'.$model->lastname.'</strong>',
                'inputWidth'=>'40%'
            ],
            [
                'attribute'=>'firstname',
                'format' => 'html',
                'value'=>'<strong>'.$model->firstname.'</strong>',
                 'inputWidth'=>'40%'
            ],
            [
                'attribute'=>'cnp',
                'value'=>$model->cnp,
                'type'=>DetailView::INPUT_TEXT,
                'inputWidth'=>'40%'
            ],            
            [
                'attribute'=>'telefon',
                'value'=>$model->telefon,
                'type'=>DetailView::INPUT_TEXT,
                'inputWidth'=>'40%'
            ],
            [
                'attribute'=>'codpostal',
                'value'=>$model->codpostal,
                'type'=>DetailView::INPUT_TEXT,
            ],             
            [
                'attribute'=>'adresa',
                'format'=>'raw',
                'value'=>'<span class="text-justify"><em>' . $model->adresa . '</em></span>',
                'type'=>DetailView::INPUT_TEXTAREA,
                'options'=>['rows'=>2],
                'inputWidth'=>'40%'
            ],
            [
                'attribute'=>'judet',
                'format'=>'raw',
                'value'=>  $model->judet ? \common\models\Judet::findOne($model->judet)->nume : '',
                'type'=>DetailView::INPUT_SELECT2,
                'widgetOptions'=>[
                    'data'=>ArrayHelper::map(\common\models\Judet::find()->orderBy('nume')->asArray()->all(), 'id', 'nume'),
                    'options' => [
                        'placeholder' => 'Selecteaza judetul...',
                        'id'=>'judet'
                        ],
                    'pluginOptions' => ['allowClear'=>false]
                ],
                'inputWidth' => '40%'
            ],
            [
                'attribute'=>'localitate',
                'value'=> $model->localitate ? common\models\Localitate::findOne($model->localitate)->nume : '',
                'format' => 'raw',
                'type'=>DetailView::INPUT_DEPDROP,
                'widgetOptions'=>[
                    //important pentru incarcare automata
                    'data'=>$model->localitate ? [$model->localitate=>common\models\Localitate::findOne($model->localitate)->nume] : [],
                    'options' => [
                        'placeholder' => 'Selecteaza judetul...',
                    ],
                    'pluginOptions'=>[
                        'depends'=>['judet'],
                        'url'=> yii\helpers\Url::toRoute('/ajax/localitati'),
                        //important pentru incarcare automata
//                        'initialize' => true
                    ],
                ],
                'inputWidth'=>'40%'
            ], 
    
            [
                'attribute'=>'newsletter',
                'label'=>Yii::t('app', 'Newsletter'),
                'format'=>'raw',
                'value'=>$model->newsletter
                    ? '<span class="label label-success">'.Yii::t('app', 'Abonat').'</span>'
                    : '<span class="label label-danger">'.Yii::t('app', 'Neabonat').'</span>',
                'type'=>DetailView::INPUT_SWITCH,
                'widgetOptions' => [
                    'pluginOptions' => [
                        'offText' => Yii::t('app', 'Neabonat'),
                        'onText' => Yii::t('app', 'Abonat'),
                        'onColor' => 'success',
                        'offColor' => 'danger',
                    ]
                ]
            ],  

[
'group'=>true,
    'label'=>'DATE FACTURARE PERSOANA JURIDICA',
    'rowOptions'=>['class'=>'info'],
//    'groupOptions'=>['class'=> !$model->tip ? 'kv-view-hidden' : '']
],
            [
                'attribute'=>'firma',
                'value'=>$model->firma,
                'type'=>DetailView::INPUT_TEXT,
            ],
            [
                'attribute'=>'rc',
                'value'=>$model->rc,
                'type'=>DetailView::INPUT_TEXT,
            ],
            [
                'attribute'=>'cui',
                'value'=>$model->cui,
                'type'=>DetailView::INPUT_TEXT,
            ],
            [
                'attribute'=>'iban',
                'value'=>$model->iban,
                'type'=>DetailView::INPUT_TEXT,
            ],
            [
                'attribute'=>'banca',
                'value'=>$model->banca,
                'type'=>DetailView::INPUT_TEXT,
            ],            
            [
                'attribute'=>'contact',
                'value'=>$model->contact,
                'type'=>DetailView::INPUT_TEXT,
            ],
        

[
'group'=>true,
    'label'=>'INFORMATII CONT',
    'rowOptions'=>['class'=>'info kv-edit-hidden'],
],    

            [
                'attribute'=>'status',
                'label'=>Yii::t('app', 'Active'),
                'format'=>'raw',
                'value'=>$model->status ?
                    '<span class="label label-success">'.Yii::t('app', 'Active').'</span>' :
                    '<span class="label label-danger">'.Yii::t('app', 'Inactive').'</span>',
                'type'=>DetailView::INPUT_SWITCH,
                'widgetOptions' => [
                    'pluginOptions' => [
                        'onText' => Yii::t('app', 'Active'),
                        'offText' => Yii::t('app', 'Inactive'),
                        'onColor' => 'success',
                        'offColor' => 'danger',                        
                    ]
                ],
                'rowOptions'=>['class'=>'kv-edit-hidden'],
            ],
            [
                'attribute'=>'locale',
                'format'=>'raw',
                'value'=>$model->locale,
                'type'=>DetailView::INPUT_SELECT2,
                'widgetOptions'=>[
                    'data'=>Yii::$app->params['availableLocales'],
                    'pluginOptions' => ['allowClear'=>false]
                ],
                'inputWidth' => '40%',
                'rowOptions'=>['class'=>'kv-edit-hidden'],
            ],            
        ],
    ]);?>
</div>
</div>
</div>
