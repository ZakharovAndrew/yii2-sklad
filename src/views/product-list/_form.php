<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use ZakharovAndrew\sklad\Module;

/** @var yii\web\View $this */
/** @var ZakharovAndrew\sklad\models\ProductList $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="product-list-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'product_count')->textInput() ?>
    <?= $form->field($model, 'cost')->textInput() ?>

    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'datetime_pay')->input('date') ?>

    <div class="form-group">
        <?= Html::submitButton(Module::t('Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
