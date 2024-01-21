<?php

use yii\helpers\Html;
use ZakharovAndrew\sklad\Module;

/** @var yii\web\View $this */
/** @var ZakharovAndrew\sklad\models\ProductMaterials $model */

$this->title = Module::t('Add material to product');
$this->params['breadcrumbs'][] = ['label' => Module::t('Product Lists'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-materials-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form_add_material', [
        'model' => $model,
    ]) ?>

</div>
