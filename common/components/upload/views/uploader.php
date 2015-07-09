<?php
    use yii\helpers\Url;
    use kartik\file\FileInput;
    use yii\bootstrap\Modal;

?>
<div class="produsimagine-form">
    <?php
    Modal::begin([
            'header'=>Yii::t('app', 'Load images'),
            'toggleButton' => [
                'label'=>Yii::t('app', 'Add images'), 'class'=>'btn btn-default'
            ],
        ]);
    
        echo FileInput::widget([
            'name'=>'imagine[]',
            'language' => 'fr',
            'options' => ['multiple' => true],
             'pluginOptions' => [
                'uploadUrl' => Url::to('#'),
                'uploadExtraData' => [
                        'folder' => 'test',
//                        'numeProdus' => $produs->nume
                    ],
                'maxFileCount' => 10
            ]
        ]);
    Modal::end();
    ?>
</div>
<?php