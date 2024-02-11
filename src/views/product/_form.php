<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use ZakharovAndrew\sklad\Module;
use ZakharovAndrew\sklad\models\ProductCategory;
use ZakharovAndrew\imageupload\ImageUploadWidget;

/** @var yii\web\View $this */
/** @var ZakharovAndrew\sklad\models\Product $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'product_category_id')->dropDownList(ProductCategory::getList()); ?>
       
    <?= $form->field($model, 'images')->widget(ImageUploadWidget::class, ['url' => '123', 'id'=> 'product-images', 'form' => $form]); ?>    

    <div class="form-group">
        <?= Html::submitButton(Module::t('Save'), ['class' => 'btn btn-success', 'id' => "add-product"]) ?>
    </div>

    <?php ActiveForm::end(); ?>
    
    <?= ImageUploadWidget::afterForm() ?>
