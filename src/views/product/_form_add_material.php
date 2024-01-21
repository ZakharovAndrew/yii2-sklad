<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use ZakharovAndrew\sklad\models\Material;

/** @var yii\web\View $this */
/** @var ZakharovAndrew\sklad\models\ProductMaterials $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="product-materials-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'product_id')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'material_id')->dropDownList(Material::getList(), ['class' => 'form-select']); ?>

    <?= $form->field($model, 'material_count')->textInput() ?>

    <?= $form->field($model, 'comments')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
