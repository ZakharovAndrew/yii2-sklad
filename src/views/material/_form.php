<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use ZakharovAndrew\sklad\Module;
use ZakharovAndrew\sklad\models\Material;
use ZakharovAndrew\sklad\models\MaterialCategory;
use ZakharovAndrew\imageupload\ImageUploadWidget;

/** @var yii\web\View $this */
/** @var app\models\Material $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="material-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'material_category_id')->dropDownList(MaterialCategory::getList(), ['class' => 'form-select']); ?>

    <?= $form->field($model, 'cost')->textInput() ?>

    <?= $form->field($model, 'units_of_measure')->dropDownList(Material::getUnitsOfMeasureList(), ['class' => 'form-select']); ?>
    
    <?= $form->field($model, 'images')->widget(ImageUploadWidget::class, ['url' => '123', 'id'=> 'product-images', 'form' => $form]); ?>   

    <?= $form->field($model, 'comments')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Module::t('Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?= ImageUploadWidget::afterForm() ?>
</div>
