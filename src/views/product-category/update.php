<?php

use yii\helpers\Html;
use ZakharovAndrew\sklad\Module;

/** @var yii\web\View $this */
/** @var ZakharovAndrew\sklad\models\ProductCategory $model */

$this->title = Module::t('Update Product Category'). ': ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Module::t('Product Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="product-category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
