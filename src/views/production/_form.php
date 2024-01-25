<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use ZakharovAndrew\sklad\Module;

/** @var yii\web\View $this */
/** @var ZakharovAndrew\sklad\models\Production $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="production-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'datetime_day')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'product_id')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'product_count')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Module::t('Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
