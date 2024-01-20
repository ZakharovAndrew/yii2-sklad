<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use ZakharovAndrew\sklad\Module;
use ZakharovAndrew\sklad\models\ProductCategory;

/** @var yii\web\View $this */
/** @var ZakharovAndrew\sklad\models\Product $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'images')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'product_category_id')->dropDownList(ProductCategory::getList()); ?>

    <div class="form-group">
        <?= Html::submitButton(Module::t('Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
